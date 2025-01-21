<!DOCTYPE html>
<html lang="en">

<!-- de/doctor-profile.html  30 Nov 20 04:12:16 GMT -->

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
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Doctor Profile</li>
							</ol>
						</nav>
						<h2 class="breadcrumb-title">{{ $doctor->first_name }} {{ $doctor->last_name }}</h2>
					</div>
				</div>
			</div>
		</div>
		<!-- /Breadcrumb -->

		<!-- Page Content -->
		<div class="content">
			<div class="container">
				<div class="row">

<!-- Profile Sidebar -->
@include('patient.patientprofile')
<!-- Page Content -->
<div class="col-md-7 col-lg-8 col-xl-9">
				<!-- Doctor Widget -->
				<div class="card">
					<div class="card-body">
						<div class="doctor-widget">
							<div class="doc-info-left">
								<div class="doctor-img">
									<img src="{{ asset('images/' . $doctor->image) }}" class="img-fluid"
										alt="Doctor Image">
								</div>
								<div class="doc-info-cont">
									<h4 class="doc-name">Dr. {{ $doctor->first_name }} {{ $doctor->last_name }}</h4>
									{{-- <p class="doc-speciality">{{ $doctor->specialization }}</p> --}}
								
									<div class="clinic-details">
										<p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{
											$doctor->address }} - <a href="javascript:void(0);"></a></p>
									</div>
									<div class="clinic-services">
										<span>Phone: {{ $doctor->phone }}</span>
										<span>Experience: {{ $doctor->experience }} years</span>
									</div>
									<br>
									<div class="available-hours">
										<p><i class="fas fa-clock"></i> Available Hours: 9:00 AM - 12:00 PM</p>
									</div>
								</div>
							</div>
							<div class="doc-info-right">
								<div class="clini-infos">
									<ul>
										<li><i class="fas fa-envelope"></i> {{ $doctor->email }}</li>
										<li><i class="far fa-user"></i> Age: {{ $doctor->age }}</li>
										<li><i class="fas fa-user-md"></i> Gender: {{ $doctor->gander }}</li>
									</ul>
								</div>
								<div class="clinic-booking">
									<a class="apt-btn"
										href="{{ route('booking', ['id' => $doctor->user_id]) }}">Book
										Appointment</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Doctor Widget -->
			</div>
			</div>
		</div>
	</div>
		<!-- /Page Content -->

		</div>
		<!-- /Main Wrapper -->

		<!-- Voice Call Modal -->
		<div class="modal fade call-modal" id="voice_call">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<!-- Outgoing Call -->
						<div class="call-box incoming-box">
							<div class="call-wrapper">
								<div class="call-inner">
									<div class="call-user">
										<img alt="User Image" src="assets/img/doctors/doctor-thumb-02.jpg"
											class="call-avatar">
										<h4>Dr. Darren Elder</h4>
										<span>Connecting...</span>
									</div>
									<div class="call-items">
										<a href="javascript:void(0);" class="btn call-item call-end"
											data-dismiss="modal" aria-label="Close"><i
												class="material-icons">call_end</i></a>
										<a href="voice-call.html" class="btn call-item call-start"><i
												class="material-icons">call</i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- Outgoing Call -->

					</div>
				</div>
			</div>
		</div>
		<!-- /Voice Call Modal -->

		<!-- Video Call Modal -->
		<div class="modal fade call-modal" id="video_call">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-body">

						<!-- Incoming Call -->
						<div class="call-box incoming-box">
							<div class="call-wrapper">
								<div class="call-inner">
									<div class="call-user">
										<img class="call-avatar" src="assets/img/doctors/doctor-thumb-02.jpg"
											alt="User Image">
										<h4>Dr. Darren Elder</h4>
										<span>Calling ...</span>
									</div>
									<div class="call-items">
										<a href="javascript:void(0);" class="btn call-item call-end"
											data-dismiss="modal" aria-label="Close"><i
												class="material-icons">call_end</i></a>
										<a href="video-call.html" class="btn call-item call-start"><i
												class="material-icons">videocam</i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- /Incoming Call -->

					</div>
				</div>
			</div>
		</div>
		<!-- Video Call Modal -->
	<!-- Footer -->
<footer style="background-color: #06A3DA; color: #ecf0f1; padding: 40px 0;">
	<div
		style="max-width: 1200px; margin: 0 auto; display: flex; flex-wrap: wrap; justify-content: space-between;">
	
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

<!-- doccure/invoices.html  30 Nov 2019 04:12:14 GMT -->

</html>


</body>

<!-- doccure/doctor-profile.html  30 Nov 2019 04:12:16 GMT -->

</html>