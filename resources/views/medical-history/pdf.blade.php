<!DOCTYPE html>
<html>
<head>
    <title>Medical History PDF</title>
</head>
<body>
    <h1>Mindflex Rehab Patient's Medical History</h1>
    <p><strong>Patient Name:</strong> {{ $medicalHistory->first_name }} {{ $medicalHistory->last_name }}</p>
    <p><strong>Date of Birth:</strong> {{ $medicalHistory->date_of_birth }}</p>
    <p><strong>Gender:</strong> {{ $medicalHistory->gender }}</p>
    <p><strong>Doctor Name:</strong> {{ $medicalHistory->doctor_first_name }} {{ $medicalHistory->doctor_last_name }}</p>
    <p><strong>Consultation Date:</strong> {{ $medicalHistory->consultation_date }}</p>
    <p><strong>Past Medical History:</strong> {{ $medicalHistory->past_medical_history }}</p>
    <p><strong>Current Medications:</strong> {{ $medicalHistory->current_medications }}</p>
    <p><strong>Reason for Visit:</strong> {{ $medicalHistory->reason_for_visit }}</p>
    <p><strong>Allergies:</strong> {{ $medicalHistory->allergies ? 'Yes' : 'No' }}</p>
    <p><strong>Allergy Details:</strong> {{ $medicalHistory->allergy_details }}</p>
    <p><strong>Health Rating:</strong> {{ $medicalHistory->health_rating }}</p>
    <p><strong>Family History:</strong> {{ $medicalHistory->family_history ? 'Yes' : 'No' }}</p>
    <p><strong>Family History Details:</strong> {{ $medicalHistory->family_history_details }}</p>
    <p><strong>Regular Exercise:</strong> {{ $medicalHistory->exercise ? 'Yes' : 'No' }}</p>
    <p><strong>Additional Comments:</strong> {{ $medicalHistory->comments }}</p>
</body>
</html>
