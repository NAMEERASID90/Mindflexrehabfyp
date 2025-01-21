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
  
    @include('admin.admin_nav')
    
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


        @if(isset($patient))
        @method('PUT')
        @endif

        <h2 class="text-center">{{ isset($patient) ? 'Show Patient' : 'Signup' }}</h2>

        <div class="form-group">
            <label for="firstName">First Name:</label>
            <input type="text" class="form-control" id="first_name" name="first_name"
                value="{{ old('first_name', $patient->first_name ?? '') }}" readonly>
            <small class="form-text error" id="firstNameError"></small>
        </div>

        <div class="form-group">
            <label for="lastName">Last Name:</label>
            <input type="text" class="form-control" id="last_name" name="last_name"
                value="{{ old('last_name', $patient->last_name ?? '') }}" readonly>
            <small class="form-text error" id="lastNameError"></small>
        </div>

        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" class="form-control" id="age" name="age" value="{{ old('age', $patient->age ?? '') }}"
                readonly>
            <small class="form-text error" id="ageError"></small>
        </div>

        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="user_name" name="user_name"
                value="{{ old('user_name', $patient->user_name ?? '') }}" readonly>
            <small class="form-text error" id="usernameError"></small>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email"
                value="{{ old('email', $patient->email ?? '') }}" readonly>
            <small class="form-text error" id="emailError"></small>
        </div>



        <input type="hidden" name="type" value="patient" />
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select class="form-control" id="gender" name="gander" readonly>
                <option value="">Choose Gender</option>
                <option value="Male" {{ old('gender', $patient->gander ?? '') == 'Male' ? 'selected' : '' }}>Male
                </option>
                <option value="Female" {{ old('gender', $patient->gander ?? '') == 'Female' ? 'selected' : ''
                    }}>Female</option>
                <option value="Other" {{ old('gender', $patient->gander ?? '') == 'Other' ? 'selected' : '' }}>Other
                </option>
            </select>
            <small class="form-text error" id="genderError"></small>
        </div>
        <a href="{{ route('admin.homepage') }}" class="btn btn-primary" style="margin-top: 23px;">{{ isset($patient) ?
            'Back Too' :
            'Signup' }}</a>
    </div>
</body>
</html>