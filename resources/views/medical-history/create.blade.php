<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical History Form</title>
    <style>
        /* General Reset and Body Styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background-color: #EEF9FF;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            min-height: 100vh;
        }

        /* Form Container */
        form {
            background-color: #ffffff;
            border-radius: 8px;
            max-width: 600px;
            width: 100%;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Form Elements */
        label {
            font-size: 0.9rem;
            color: #333333;
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #06A3DA;
            border-radius: 4px;
            background-color: #EEF9FF;
            color: #333;
            font-size: 1rem;
        }

        input[type="text"]::placeholder {
            color: #888;
        }

        input[type="radio"] {
            margin-right: 8px;
        }

        textarea {
            resize: vertical;
        }

        /* Button Styling */
        button[type="submit"] {
            width: 100%;
            padding: 12px;
            font-size: 1rem;
            color: #ffffff;
            background-color: #06A3DA;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-weight: bold;
        }

        button[type="submit"]:hover {
            background-color: #045d99;
        }

        /* Radio Group Styling */
        .radio-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        /* Responsive Layout */
        @media (max-width: 600px) {
            form {
                padding: 15px;
            }
        }
    </style>
</head>

<body>

    <form action="{{ route('medical-history.store') }}" method="POST">
        @csrf

        <!-- Patient Name -->
        <label>Patient Name:</label>
        <input type="text" name="first_name" placeholder="First Name" required>
        <input type="text" name="last_name" placeholder="Last Name" required>

        <!-- Date of Birth -->
        <label>Date of Birth:</label>
        <input type="date" name="date_of_birth" required>

        <!-- Gender -->
        <label>Gender:</label>
        <select name="gender" required>
            <option value="">Please select</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>

        <!-- Doctor Name -->
        <label>Doctor Name:</label>
        <input type="text" name="doctor_first_name" placeholder="First Name" required>
        <input type="text" name="doctor_last_name" placeholder="Last Name" required>

        <!-- Consultation Date -->
        <label>Consultation Date:</label>
        <input type="date" name="consultation_date" required>

        <!-- Past Medical History -->
        <label>Past Medical History:</label>
        <textarea name="past_medical_history" rows="4"></textarea>

        <!-- Current Medications -->
        <label>Current Medications:</label>
        <textarea name="current_medications" rows="4"></textarea>

        <!-- Reason for Visit -->
        <label>Reason for Visit:</label>
        <select name="reason_for_visit" required>
            <option value="">Please select</option>
            <option value="Check-up">Check-up</option>
            <option value="Follow-up">Follow-up</option>
            <option value="Emergency">Emergency</option>
            <option value="Consultation">Consultation</option>
        </select>

        <!-- Known Allergies -->
        <label>Any Known Allergies?</label>
        <div class="radio-group">
            <input type="radio" name="allergies" value="1"> Yes
            <input type="radio" name="allergies" value="0" checked> No
        </div>

        <!-- Allergy Details -->
        <label>Allergy Details:</label>
        <textarea name="allergy_details" rows="4"></textarea>

        <!-- Health Rating -->
        <label>Rate Patient's overall current health (1-10):</label>
        <input type="number" name="health_rating" min="1" max="10" required>

        <!-- Family Medical History -->
        <label>Any Family History of Medical Conditions?</label>
        <div class="radio-group">
            <input type="radio" name="family_history" value="1"> Yes
            <input type="radio" name="family_history" value="0" checked> No
        </div>

        <label>Family History Details:</label>
        <textarea name="family_history_details" rows="4"></textarea>

        <!-- Regular Exercise -->
        <label>Do you exercise regularly?</label>
        <div class="radio-group">
            <input type="radio" name="exercise" value="1"> Yes
            <input type="radio" name="exercise" value="0" checked> No
        </div>

        <!-- Additional Comments -->
        <label>Additional Comments or Concerns:</label>
        <textarea name="comments" rows="4"></textarea>

        <button type="submit">Download PDF</button>
    </form>

</body>

</html>
