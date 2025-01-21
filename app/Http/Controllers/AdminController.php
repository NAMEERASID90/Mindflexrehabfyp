<?php

namespace App\Http\Controllers;

use App\Models\User;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Appointment;

class AdminController extends Controller
{
    public function adminLogin(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('user_name', 'password');

        if (Auth::attempt(['user_name' => $credentials['user_name'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();

            $user = Auth::user(); // Get the authenticated user
            if ($user->type === 'admin') {
                return redirect()->intended('/adminhomepage');
            } elseif ($user->type === 'patient') {
                return redirect()->intended('/patientview');
            } else {
                return redirect()->intended('/doctorhomepage');
            }
        }

        return back()->withErrors([
            'user_name' => 'The provided credentials do not match our records.',
            'password' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function admin_login()
    {
        return view('loginform');
    }

    public function homepage()
    {
        // Fetch all users
        $users = User::all();
    
        // Calculate counts based on user types
        $doctorCount = User::where('type', 'doctor')->count();
        $patientCount = User::where('type', 'patient')->count();
        $appointmentCount = Appointment::count();
    
        // Pass both users and counts to the view
        return view('admin.adminhomepage', compact('users', 'doctorCount', 'patientCount', 'appointmentCount'));
    }

    public function adminlogout(Request $request)
    {
        $user = Auth::user();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // Redirect based on user role
        if ($user->isAdmin()) {
            return redirect('/login');
        } elseif ($user->patient()) {
            return redirect('/patientlogin');
        } else {
            return redirect('/doctorlogin');
        }
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.homepage')->with('success', 'User deleted successfully');
    }

    public function doctor()
    {
        return view('doctor.doctors');
    }


    public function index()
    {
        // Fetch only users where type is 'patient'
        $patients = User::where('type', 'patient')->get();

        // Return the view with patients data
        return view('admin.patient', compact('patients'));
    }


    public function profile()
    {
        return view('admin.profile');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => ['required', 'current_password'],
            'new_password' => ['required', 'min:8', 'confirmed'],
        ]);
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('status', 'Password updated successfully!');
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function adminappointment()
    {
        $appointments = DB::table('appointments')
            ->leftJoin('users as doctor_users', 'appointments.doctor_id', '=', 'doctor_users.id')
            ->leftJoin('doctors', 'doctor_users.id', '=', 'doctors.user_id')
            ->join('specialities', 'doctors.specialization', '=', 'specialities.id')
            ->leftJoin('users as patient_users', 'appointments.patient_id', '=', 'patient_users.id')
            ->select(
                'appointments.*', 
                'doctor_users.*', 
                'doctors.*', 
                'patient_users.first_name as patient_name', 
                'patient_users.email as patient_email',
                'specialities.name',
                'appointments.time as appointment_time' // Alias the time column
            )
            ->get();
    
        return view('admin.adminappointment', compact('appointments'));
    }
    

    
}
