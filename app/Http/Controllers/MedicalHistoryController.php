<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalHistory;
use Barryvdh\DomPDF\Facade\Pdf;

class MedicalHistoryController extends Controller
{
    public function create()
    {
        return view('medical-history.create');
    }
    
    public function store(Request $request)
{
    $data = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'date_of_birth' => 'required|date',
        'gender' => 'required|string',
        'doctor_first_name' => 'required|string|max:255',
        'doctor_last_name' => 'required|string|max:255',
        'consultation_date' => 'required|date',
        'past_medical_history' => 'nullable|string',
        'current_medications' => 'nullable|string',
        'reason_for_visit' => 'required|string',
        'allergies' => 'required|boolean',
        'allergy_details' => 'nullable|string',
        'health_rating' => 'required|integer|min:1|max:10',
        'family_history' => 'required|boolean',
        'family_history_details' => 'nullable|string',
        'exercise' => 'required|boolean',
        'comments' => 'nullable|string',
    ]);

    $medicalHistory = MedicalHistory::create($data);

    return redirect()->route('medical-history.pdf', $medicalHistory->id);
}

public function generatePDF($id)
{
    $medicalHistory = MedicalHistory::findOrFail($id);
    $pdf = Pdf::loadView('medical-history.pdf', compact('medicalHistory'));

    return $pdf->download('medical_history.pdf');
}
}
