<!DOCTYPE html>
<html lang="en">

@include('layout.app')

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-dark m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-secondary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    @include('topbar')
    <!-- Topbar End -->


    <!-- Navbar Start -->
    @include('nav')
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


    <!-- Hero Start -->
    <!-- <div class="container-fluid bg-primary py-5 hero-header mb-5">
        <div class="row py-3">
            <div class="col-12 text-center">
                <h1 class="display-3 text-white animated zoomIn">Doctor</h1>
                <a href="" class="h4 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="" class="h4 text-white">doctors</a>
            </div>
        </div>
    </div> -->
    <!-- Hero End -->

    <!-- form start  -->
    <!-- <div class="container">
    <form id="loginForm" onsubmit="validateForm(event)">
      <h2>Login</h2>
      <div class="input-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <small class="error" id="usernameError"></small>
      </div>
      <div class="input-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <small class="error" id="passwordError"></small>
      </div>
      <button type="submit">Login</button>
    </form>
  </div> -->
    <style>
        .container {
            max-width: 400px;
            margin-top: 50px;
        }

        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>
  <div class="container">
    <form action="{{ route('login') }}" method="POST">
        @csrf
    
        <h2 class="text-center mb-4">
            @if (url()->current() == url('login'))
                Admin Login
            @elseif (url()->current() == url('patientlogin'))
                Patient Login
            @else
                Doctor Login
            @endif
        </h2>
    
        <div class="mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" id="username" name="user_name"
                class="form-control @error('user_name') is-invalid @enderror" value="{{ old('user_name') }}" required>
            @error('user_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" id="password" name="password"
                class="form-control @error('password') is-invalid @enderror" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
    
        <!-- Forgot Password Link -->
        @if (url()->current() != url('login'))
            <p class="mt-3 text-center">
                <a href="{{ route('password.reset.form') }}">Forgot Password?</a>
            </p>
        @endif
    
        <!-- Signup Link -->
        @if (url()->current() != url('login') && url()->current() != url('doctorlogin'))
            <p class="mt-3 text-center">Don't have an account? <a href="{{ route('signup') }}">Create new account</a>
            </p>
        @endif
    </form>
    
</div>



    <script>
        function validateForm(event) {
            event.preventDefault();

            // Reset previous errors
            document.getElementById('usernameError').textContent = '';
            document.getElementById('passwordError').textContent = '';

            // Get form inputs
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;

            // Validate username
            if (username.trim() === '') {
                document.getElementById('usernameError').textContent = 'Username is required';
                return;
            }

            // Validate password
            if (password.trim() === '') {
                document.getElementById('passwordError').textContent = 'Password is required';
                return;
            }

            // If both fields are filled, you can proceed with the login process
            // For now, let's just show a success message
            alert('Login successful!');
        }
    </script>
    <!-- form end  -->
    <script src="https://cdn.botpress.cloud/webchat/v2.1/inject.js"></script>
    <script src="https://mediafiles.botpress.cloud/073ae091-2b73-4d40-92d3-01b67eab1e30/webchat/v2.1/config.js"></script> 

    <!-- Back to Top -->
    <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a> -->


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