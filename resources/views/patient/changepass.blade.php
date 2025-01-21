<!DOCTYPE html>
<html lang="en">

<head>
    @include('patient.head')
    @include('layout.app')
</head>

<body>

    <div class="main-wrapper">

        @include('patient.header')

        <div class="breadcrumb-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-12 col-12">
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                            </ol>
                        </nav>
                        <h2 class="breadcrumb-title">Change Password</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @include('patient.patientprofile')

                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <div class="card">
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('user.update-password') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input type="password" name="old_password" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" name="new_password" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="new_password_confirmation" class="form-control" required>
                                    </div>
                                    <div class="submit-section">
                                        <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer style="background-color: #06A3DA; color: #ecf0f1; padding: 40px 0;">
            <div style="max-width: 1200px; margin: 0 auto; display: flex; flex-wrap: wrap; justify-content: space-between;">
                
                <!-- About Section -->
                
                
                <!-- Contact Information -->
                <div style="flex: 1; margin-bottom: 20px;">
                    <h4>Contact Us</h4>
                    <p><strong>Phone:</strong> +1 234 567 890</p>
                    <p><strong>Email:</strong> info@Mindflex.com</p>
                    <p><strong>Address:</strong> 123 Karachi ,Pakistan</p>
                </div>
                
                <!-- Quick Links -->
                <div style="flex: 1; margin-bottom: 20px;">
                    <h4>Quick Links</h4>
                    <ul style="list-style-type: none; padding: 0;">
                        <li><a href="#" style="color: #ecf0f1; text-decoration: none;">Home</a></li>
                        <li><a href="#" style="color: #ecf0f1; text-decoration: none;">About Us</a></li>
                        <li><a href="#" style="color: #ecf0f1; text-decoration: none;">Services</a></li>
                        <li><a href="#" style="color: #ecf0f1; text-decoration: none;">Contact</a></li>
                        <li><a href="#" style="color: #ecf0f1; text-decoration: none;">Privacy Policy</a></li>
                    </ul>
                </div>
                
                <!-- Social Media Links -->
                <div style="flex: 1; margin-bottom: 20px;">
                    <h4>Follow Us</h4>
                    <a href="#" style="color: #ecf0f1; text-decoration: none; margin-right: 15px;">Facebook</a>
                    <a href="#" style="color: #ecf0f1; text-decoration: none; margin-right: 15px;">Twitter</a>
                    <a href="#" style="color: #ecf0f1; text-decoration: none; margin-right: 15px;">Instagram</a>
                </div>
                
            </div>
            <div style="text-align: center; padding: 20px 0; border-top: 1px solid #34495e;">
                <p style="margin: 0;">&copy; 2024 Rehab Center. All rights reserved.</p>
            </div>
        </footer>

    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
    <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
    <script src="assets/js/script.js"></script>

</body>
</html>
