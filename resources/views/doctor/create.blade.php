<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Mindflex Rehab</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/feathericon.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        @include('admin.header')
        <!-- /Header -->

        <!-- Sidebar -->
        @include('admin.adminnav')
        <!-- /Sidebar -->

        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">
                <h2 class="mb-4">Create New Doctor</h2>
                <form action="{{ route('admin.doctorstore') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="firstName">First Name:</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                            <small class="form-text error" id="firstNameError"></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastName">Last Name:</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                            <small class="form-text error" id="lastNameError"></small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="age">Age:</label>
                            <input type="number" class="form-control" id="age" name="age" required min="1" max="80" oninput="validateAge(this)">
                            <small class="form-text error" id="ageError"></small>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="user_name" name="user_name" required>
                            <small class="form-text error" id="usernameError"></small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            <small class="form-text error" id="emailError"></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <small class="form-text error" id="passwordError"></small>
                        </div>
                    </div>

                    <input type="hidden" name="type" value="doctor" />

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="gender">Gender:</label>
                            <select class="form-control" id="gender" name="gander" required>
                                <option value="">Choose Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                            <small class="form-text error" id="genderError"></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="specialization">Specialization:</label>
                            <select class="form-control" id="specialization" name="specialization" required>
                                <option value="" disabled selected>Select Specialization</option>
                                @foreach($specialities as $speciality)
                                <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                                @endforeach
                            </select>
                            <small class="form-text error" id="specializationError"></small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="experience">Experience (Years):</label>
                            <input type="number" class="form-control" id="experience" name="experience" required>
                            <small class="form-text error" id="experienceError"></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">Phone Number:</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                            <small class="form-text error" id="phoneError"></small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="address">Address:</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                            <small class="form-text error" id="addressError"></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="notes">Additional Notes:</label>
                            <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="form-group col-md-6">
                            <label for="documents">Doctor's Documents:</label>
                            <input type="file" class="form-control-file" id="documents" name="documents[]"
                                accept=".pdf,.doc,.docx" multiple required>
                            <small class="form-text error" id="documentsError"></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="image">Doctor's Image:</label>
                            <input type="file" class="form-control-file" id="image" name="image" accept="image/*"
                                required>
                            <small class="form-text error" id="imageError"></small>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Save</button>
                </form>
            </div>
        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
<script>
    function validateAge(input) {
    const age = input.value;
    const ageError = document.getElementById('ageError');
    
    if (age < 1) {
        ageError.textContent = "Age must be at least 1.";
        input.setCustomValidity("Invalid age");
    } else if (age > 80) {
        ageError.textContent = "Age must not exceed 80.";
        input.setCustomValidity("Invalid age");
    } else {
        ageError.textContent = "";
        input.setCustomValidity("");  // Clear the validation error
    }
}

</script>