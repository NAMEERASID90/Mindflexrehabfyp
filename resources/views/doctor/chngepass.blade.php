<!DOCTYPE html>
<html lang="en">

<!-- doccure/doctor-change-password.html  30 Nov 2019 04:12:36 GMT -->


@include('doctor.head')

<body>

	<!-- Main Wrapper -->
	<div class="main-wrapper">

		<!-- Header -->
		@include('doctor.header')
		<!-- /Header -->

		<!-- Breadcrumb -->
		<div class="breadcrumb-bar">
			<div class="container-fluid">
				<div class="row align-items-center">
					<div class="col-md-12 col-12">
						<nav aria-label="breadcrumb" class="page-breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Change Password</li>
							</ol>
						</nav>
						<h2 class="breadcrumb-title">Change Password</h2>
					</div>
				</div>
			</div>
		</div>
		<!-- /Breadcrumb -->

		<!-- Page Content -->
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

						<!-- Profile Sidebar -->
						@include('doctor.siderbar')
						<!-- /Profile Sidebar -->

					</div>
					<div class="col-md-7 col-lg-8 col-xl-9">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-12 col-lg-6">
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
										<!-- Change Password Form -->
										<form method="POST" action="{{ route('password.update') }}">
											@csrf
											<div class="form-group">
												<label for="old_password">Old Password</label>
												<input type="password" name="old_password" class="form-control" id="old_password" required>
											</div>
											<div class="form-group">
												<label for="new_password">New Password</label>
												<input type="password" name="new_password" class="form-control" id="new_password" required>
											</div>
											<div class="form-group">
												<label for="new_password_confirmation">Confirm Password</label>
												<input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation" required>
											</div>
											<div class="submit-section">
												<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
											</div>
										</form>
										
										<!-- /Change Password Form -->

									</div>
								</div>
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

	<!-- Sticky Sidebar JS -->
	<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
	<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

	<!-- Circle Progress JS -->
	<script src="assets/js/circle-progress.min.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/script.js"></script>

</body>

<!-- doccure/doctor-change-password.html  30 Nov 2019 04:12:36 GMT -->

</html>