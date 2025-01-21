<!DOCTYPE html>
<html lang="en">

@include('layout.app')

<body>

    <script crossorigin src="https://unpkg.com/react@18/umd/react.development.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@18/umd/react-dom.development.js"></script>
    <!-- Spinner Start -->

    <!-- Spinner End -->


    <!-- Topbar Start -->
    @include('topbar')
    <!-- Topbar End -->


    <!-- Navbar Start -->
    @if(Auth::user()->isAdmin())
    @include('admin.admin_nav')
    
    @elseif(Auth::user()->patient())
    @include('patient.patient_nav')
    @else
    @include('nav')
    @endif
    <!-- Navbar End -->

    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3"
                            placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->


    <style>
        .container {
            max-width: 600px;
            margin-top: 50px;
        }

        .error {
            color: red;
        }
    </style>


    <div class="container">
        <form action="{{ isset($patient) ? route('patient.update', $patient->id) : route('patientstore') }}"
            method="POST">
            @csrf
            @if(isset($patient))
            @method('PUT')
            @endif

            <h2 class="text-center">{{ isset($patient) ? 'Edit Patient' : 'Signup' }}</h2>

            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name"
                    value="{{ old('first_name', $patient->first_name ?? '') }}" required>
                <small class="form-text error" id="firstNameError"></small>
            </div>

            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" class="form-control" id="last_name" name="last_name"
                    value="{{ old('last_name', $patient->last_name ?? '') }}" required>
                <small class="form-text error" id="lastNameError"></small>
            </div>

            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" class="form-control" id="age" name="age"
                    value="{{ old('age', $patient->age ?? '') }}" required>
                <small class="form-text error" id="ageError"></small>
            </div>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="user_name" name="user_name"
                    value="{{ old('user_name', $patient->user_name ?? '') }}" required>
                <small class="form-text error" id="usernameError"></small>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{ old('email', $patient->email ?? '') }}" required>
                <small class="form-text error" id="emailError"></small>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" {{ isset($patient) ? ''
                    : 'required' }}>
                <small class="form-text error" id="passwordError"></small>
            </div>

            <input type="hidden" name="type" value="patient" />
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" id="gender" name="gander" required>
                    <option value="">Choose Gender</option>
                    <option value="Male" {{ old('gender', $patient->gander ?? '') == 'Male' ? 'selected' : '' }}>Male
                    </option>
                    <option value="Female" {{ old('gender', $patient->gander ?? '') == 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Other" {{ old('gender', $patient->gander ?? '') == 'Other' ? 'selected' : '' }}>Other
                    </option>
                </select>
                <small class="form-text error" id="genderError"></small>
            </div>

            <button type="submit" class="btn btn-primary" style="margin-top: 23px;">{{ isset($patient) ? 'Update' :
                'Signup' }}</button>
        </form>
    </div>


    <script>
        function validateForm(event) {
            event.preventDefault();

            // Reset previous errors
            document.getElementById('firstNameError').textContent = '';
            document.getElementById('lastNameError').textContent = '';
            document.getElementById('ageError').textContent = '';
            document.getElementById('genderError').textContent = '';
            document.getElementById('usernameError').textContent = '';
            document.getElementById('emailError').textContent = '';
            document.getElementById('passwordError').textContent = '';
            document.getElementById('confirmPasswordError').textContent = '';

            // Get form inputs
            var firstName = document.getElementById('firstName').value;
            var lastName = document.getElementById('lastName').value;
            var age = document.getElementById('age').value;
            var gender = document.getElementById('gender').value;
            var username = document.getElementById('username').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirmPassword').value;

            // Validate first name (no numbers allowed)
            if (/\d/.test(firstName)) {
                document.getElementById('firstNameError').textContent = 'First name cannot contain numbers';
                return;
            }

            // Validate last name (no numbers allowed)
            if (/\d/.test(lastName)) {
                document.getElementById('lastNameError').textContent = 'Last name cannot contain numbers';
                return;
            }
            // Validate age (must be 18 or older)
            if (age < 18) {
                document.getElementById('ageError').textContent = 'You must be 18 or older to signup';
                return;
            }
            // Validate gender
            if (gender === '') {
                document.getElementById('genderError').textContent = 'Please choose a gender';
                return;
            }

            // Validate username
            if (username.trim() === '') {
                document.getElementById('usernameError').textContent = 'Username is required';
                return;
            }

            // Validate password strength
            var passwordStrength = getPasswordStrength(password);
            if (passwordStrength === 'weak') {
                document.getElementById('passwordError').textContent = 'Password is too weak';
                return;
            }

            // Validate confirm password
            if (password !== confirmPassword) {
                document.getElementById('confirmPasswordError').textContent = 'Passwords do not match';
                return;
            }

            // If all validations pass, you can proceed with the signup process
            // For now, let's just show a success message
            alert('Signup successful!');
        }

        function getPasswordStrength(password) {
            // Password strength criteria: At least 8 characters, contains lowercase and uppercase letters, and contains numbers
            var regexStrong = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

            if (regexStrong.test(password)) {
                return 'strong';
            } else {
                return 'weak';
            }
        }
    </script>
    <!-- form end  -->


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="lib/twentytwenty/jquery.event.move.js"></script>
    <script src="lib/twentytwenty/jquery.twentytwenty.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>