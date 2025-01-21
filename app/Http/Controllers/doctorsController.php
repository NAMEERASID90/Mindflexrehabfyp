<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use App\Models\User;
use App\Models\Doctor;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Models\Appointment; // Import the Appointment model
use Illuminate\Support\Facades\Hash; // Add this line
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class doctorsController extends Controller
{

    public function doctorlogin()
    {
        return view('loginform');
    }
    public function doctorhomepage()
    {
        $appointments = Appointment::with('doctor', 'patient')->whereHas('doctor', function($d)
        {
            $d->where('id', auth()->id());
        })->get();
        // dd($appointments);

        // Total number of patients for the doctor
        $totalPatients = User::where('type', 'patient')
                            ->whereIn('id', function($query) {
                                $query->select('patient_id')
                                      ->from('appointments')
                                      ->where('doctor_id', auth()->id());
                            })
                            ->count();

        // Number of patients with appointments today for the doctor
        $todayPatients = User::where('type', 'patient')
                            ->whereIn('id', function($query) {
                                $query->select('patient_id')
                                      ->from('appointments')
                                      ->where('doctor_id', auth()->id())
                                      ->whereDate('appointments.created_at', Carbon::today());
                            })
                            ->count();

        // Total number of appointments for the doctor
        $totalAppointments = Appointment::where('doctor_id', auth()->id())->count();

        // Pass all data to the view
        return view('doctor.doctorhomepage', compact('appointments', 'totalPatients', 'todayPatients', 'totalAppointments'));
    }

    public function doctors()
    {

        return view('doctor.doctors');
    }

    public function doctorlist()
    {

        $users = User::where('type', 'doctor')->get();
        return view('doctor.doctorlist', compact('users'));
    }
    public function createdoctor()
    {
        $specialities = Speciality::all();

        return view('doctor.create', compact('specialities'));

    }

    public function doctorstore(Request $request)
    { {
            // Save user data
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'user_name' => $request->user_name,
                'gander' => $request->gander, // Fixed typo from 'gander' to 'gender'
                'age' => $request->age,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'type' => $request->type,
            ]);

            // Save doctor-specific data
            $doctor = new Doctor();
            $doctor->user_id = $user->id;
            $doctor->specialization = $request->specialization;
            $doctor->experience = $request->experience;
            $doctor->phone = $request->phone;
            $doctor->address = $request->address;

            // Handle image upload
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $imageName);
                $doctor->image = $imageName;
            }

            // Handle documents upload
            if ($request->hasFile('documents')) {
                $documentNames = [];
                foreach ($request->file('documents') as $document) {
                    $docName = time() . '_' . $document->getClientOriginalName();
                    $document->move(public_path('documents'), $docName);
                    $documentNames[] = $docName;
                }
                $doctor->documents = json_encode($documentNames);
            }

            $doctor->notes = $request->notes;
            $doctor->save();

            return redirect()->route('admin.doctorlist')->with('success', 'Doctor created successfully.');
        }

    }
    public function destroy($id)
    {
        \Log::info('Attempting to delete user with ID: ' . $id);

        try {
            $user = User::findOrFail($id);
            $user->delete();
            \Log::info('Successfully deleted user with ID: ' . $id);
            return response()->json(['success' => true]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            \Log::error('User not found with ID: ' . $id);
            return response()->json(['success' => false, 'message' => 'User not found']);
        } catch (\Exception $e) {
            \Log::error('Failed to delete user with ID: ' . $id . ' Error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function chngepass()
    {
        return view('doctor.chngepass');

    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'The provided password does not match your current password.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('status', 'Password changed successfully!');
    }

    public function dprofile()
    {
        $doctorProfile = DB::table('doctors')
            ->join('users', 'doctors.user_id', '=', 'users.id')
            ->join('specialities', 'doctors.specialization', '=', 'specialities.id')
            ->select('doctors.*', 'users.*', 'specialities.name')
            ->where('users.id', auth()->id())
            ->first();
        return view('doctor.dprofiles', compact('doctorProfile'));
    }

    public function dappointment()
    {
        $appointments = DB::table('appointments')
            ->leftJoin('users as doc', 'appointments.doctor_id', '=', 'doc.id')
            ->leftJoin('users as pat', 'appointments.patient_id', '=', 'pat.id')
            ->select(
                'appointments.*',
                'pat.*' // add more patient fields as needed
            )
            ->where('appointments.doctor_id', auth()->id())
            ->get();

        return view('doctor.dappointments', compact('appointments'));

    }


    public function mypatient()
    {
        $patients = DB::table('appointments')
            ->leftJoin('users as doc', 'appointments.doctor_id', '=', 'doc.id')
            ->leftJoin('users as pat', 'appointments.patient_id', '=', 'pat.id')
            ->select(
                DB::raw('MAX(appointments.id) as appointment_id'),
                DB::raw('MAX(appointments.date) as latest_appointment_date'),
                DB::raw('MAX(pat.first_name) as first_name'),
                DB::raw('MAX(pat.last_name) as last_name'),
                DB::raw('MAX(pat.user_name) as user_name'),
                DB::raw('MAX(pat.age) as age'),
                DB::raw('MAX(pat.type) as type'),
                DB::raw('MAX(pat.gander) as gander'),
                DB::raw('MAX(pat.email) as email'),
                'appointments.patient_id'
            )
            ->where('appointments.doctor_id', auth()->id())
            ->groupBy('appointments.patient_id') // group by patient_id
            ->get();
        return view('doctor.mypatient', compact('patients'));
    }

    public function exercise()
    {
        return view('doctor.exercise');
    }

    public function saveSharedLink(Request $request)
    {
        // Validate the request
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'link' => 'required|url',
        ]);

        // Save the shared link in the database
        DB::table('shared_links')->insert([
            'patient_id' => $request->patient_id,
            'link' => $request->link,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['success' => true]);
    }
}
