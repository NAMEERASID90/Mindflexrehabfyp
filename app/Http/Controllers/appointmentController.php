<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class appointmentController extends Controller
{
    public function appointment()
    {

        return view('appointment.appointment');
    }
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required|string',
            'doctor_id' => 'required|exists:doctors,user_id', // Validate doctor_id
            'patient_id' => 'required', // Correct validation rule
        ]);

        // Save the data
        $appointment = new Appointment();
        $appointment->date = $request->input('date');
        $appointment->time = $request->input('time');
        $appointment->id = $request->input('id');
        $appointment->doctor_id = $request->input('doctor_id'); // Store the doctor_id
        $appointment->patient_id = $request->input('patient_id'); // Use the patient_id from the request
        $appointment->save();

         // Store the appointment ID in the session for later use (if needed)
    session(['appointment_id' => $appointment->id]);
        // Redirect or respond as needed
        return redirect()->route('checkout', ['id' => $appointment->id]);
    }
    public function checkSlotAvailability(Request $request)
{
    // Log the incoming request data for debugging
    \Log::info('Check slot availability request:', $request->all());

    $date = $request->input('date');
    $time = $request->input('time');
    $doctorId = $request->input('doctor_id');

    // Check if the selected time is already booked
    $appointment = Appointment::where('doctor_id', $doctorId)
        ->where('date', $date)
        ->where('time', $time)
        ->first();

    if ($appointment) {
        // Log if the slot is already booked
        \Log::info('Slot is booked:', ['date' => $date, 'time' => $time]);
        return response()->json(['isBooked' => true]);
    } else {
        // Log if the slot is available
        \Log::info('Slot is available:', ['date' => $date, 'time' => $time]);
        return response()->json(['isBooked' => false]);
    }
}
public function accept(Request $request)
{
    $appointmentId = $request->appointment_id;
    // Fetch appointment and update status
    $appointment = Appointment::find($appointmentId);
    if ($appointment) {
        $appointment->status = 'accepted';
        $appointment->save();
        return response()->json(['status' => 'success']);
    }
    return response()->json(['status' => 'error', 'message' => 'Appointment not found']);
}

public function cancel(Request $request)
{
    $appointmentId = $request->appointment_id;
    // Fetch appointment and update status
    $appointment = Appointment::find($appointmentId);
    if ($appointment) {
        $appointment->status = 'canceled';
        $appointment->save();
        return response()->json(['status' => 'success']);
    }
    return response()->json(['status' => 'error', 'message' => 'Appointment not found']);
}


    public function showAppointments()
{
    $appointments = Appointment::all(); // Fetch all appointments from the database
    return view('appointments', compact('appointments'));
}
public function index()
{
    $appointments = DB::table('appointments')->get(); // Fetch all appointments with all columns, including 'id'
    return view('appointments.indec', compact('appointments'));
}

}
