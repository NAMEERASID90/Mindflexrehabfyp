<!DOCTYPE html>
<html lang="en">

<!-- doccure/profile-settings.html  30 Nov 2019 04:12:18 GMT -->

@include('patient.head')
@include('layout.app')


<body>

	<!-- Main Wrapper -->
	<div class="main-wrapper">

		<!-- Header -->
		@include('patient.header')
		<!-- /Header -->
		<!-- Breadcrumb -->
		<div class="breadcrumb-bar">
			<div class="container-fluid">
				<div class="row align-items-center">
					<div class="col-md-12 col-12">
						<nav aria-label="breadcrumb" class="page-breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
							</ol>
						</nav>
						<h2 class="breadcrumb-title">Profile Settings</h2>
					</div>
				</div>
			</div>
		</div>
		<!-- /Breadcrumb -->

		<!-- Page Content -->
		<div class="content">
			<div class="container-fluid">
				<div class="row">

					<!-- Profile Sidebar -->

					@include('patient.patientprofile')
					<!-- / Profile Sidebar -->

					<div class="col-md-7 col-lg-8 col-xl-9">
						<div class="card">
							<div class="card-body">
					
								<!-- Profile Settings Form -->
								<div class="container">
									<h2 class="text-center">Patient</h2>
					
									<form action="{{ route('updateProfile') }}" method="POST">
										@csrf
									
										<div class="form-group">
											<label for="firstName">First Name:</label>
											<input type="text" class="form-control" id="first_name" name="first_name" value="{{ auth()->user()->first_name }}">
										</div>
									
										<div class="form-group">
											<label for="lastName">Last Name:</label>
											<input type="text" class="form-control" id="last_name" name="last_name" value="{{ auth()->user()->last_name }}">
										</div>
									
										<div class="form-group">
											<label for="age">Age:</label>
											<input type="number" class="form-control" id="age" name="age" value="{{ auth()->user()->age }}">
										</div>
									
										<div class="form-group">
											<label for="username">Username:</label>
											<input type="text" class="form-control" id="user_name" name="user_name" value="{{ auth()->user()->user_name }}">
										</div>
									
										<div class="form-group">
											<label for="email">Email:</label>
											<input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}">
										</div>
									
										<div class="form-group">
											<label for="gender">Gender:</label>
											<select class="form-control" id="gender" name="gander">
												<option value="Male" {{ auth()->user()->gender == 'Male' ? 'selected' : '' }}>Male</option>
												<option value="Female" {{ auth()->user()->gender == 'Female' ? 'selected' : '' }}>Female</option>
											</select>
										</div>
									
										<div class="form-group">
											<input type="hidden" class="form-control" id="password" name="password" value="{{ auth()->user()->password }}">
										</div>
										<input type="hidden" name=" type" value="patient">
									
										<button type="submit" class="btn btn-primary">Update</button>
									</form>
									
					
								</div>
								<!-- /Profile Settings Form -->
					
							</div>
						</div>
					</div>
					
					
				</div>
			</div>

		</div>
		<!-- /Page Content -->

		<!-- Footer -->
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
		<!-- /Footer -->

	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script src="assets/js/jquery.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<!-- Select2 JS -->
	<script src="assets/plugins/select2/js/select2.min.js"></script>

	<!-- Datetimepicker JS -->
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

	<!-- Sticky Sidebar JS -->
	<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
	<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/script.js"></script>

</body>

<!-- doccure/profile-settings.html  30 Nov 2019 04:12:18 GMT -->

</html>