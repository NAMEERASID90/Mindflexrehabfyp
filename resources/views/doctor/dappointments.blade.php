<!DOCTYPE html>
<html lang="en">

<!-- doccure/appointments.html  30 Nov 2019 04:12:09 GMT -->

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
								<li class="breadcrumb-item active" aria-current="page">Appointments</li>
							</ol>
						</nav>
						<h2 class="breadcrumb-title">Appointments</h2>
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
						<div class="appointments">

							

							<!-- Appointment List -->
							@foreach($appointments as $appointment)
							<div class="appointment-list">
								<div class="profile-info-widget">
									<a href="{{ url('patient-profile/' . $appointment->patient_id) }}"
										
										class="avatar avatar-sm mr-2">
										<img src="./passets/img/patients/images.png" alt="User Image">

									</a>
									
									<div class="profile-det-info">
										<h3><a href="#">{{
												$appointment->first_name }}</a></h3>
										<div class="patient-details">
											<h5><i class="far fa-clock"></i> {{ $appointment->date }}, {{
												$appointment->time }}</h5>
											<h5><i class="fas fa-map-marker-alt"></i> {{ $appointment->type }}</h5>
											<h5><i class="fas fa-envelope"></i> {{ $appointment->email	 }}</h5>
										
										</div>
									</div>
								</div>
								<div class="appointment-action">
									{{-- <a href="#" class="btn btn-sm bg-info-light" data-toggle="modal" data-target="#viewPatientModal" onclick="viewPatient({{ $appointment->id }})">
										<i class="far fa-eye"></i> View
									</a> --}}
									<!-- Patient Profile Modal -->
<div id="viewPatientModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Patient Profile</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p><strong>Name:</strong> <span id="patientName"></span></p>
                <p><strong>Email:</strong> <span id="patientEmail"></span></p>
                <!-- Add other patient information here -->
            </div>
        </div>
    </div>
</div>
<script>
	function viewPatient(appointmentId) {
    // Fetch patient details with AJAX and display in modal
    $.ajax({
        url: `/appointments/${appointmentId}`,
        method: 'GET',
        success: function(data) {
            $('#patientName').text(data.first_name);
            $('#patientEmail').text(data.email);
            // Fill in other details as needed
        }
    });
}

</script>

									<!-- Accept Button with Confirmation -->
<a href="#" class="btn btn-sm bg-success-light" onclick="acceptAppointment({{ $appointment->id }})">
    <i class="fas fa-check"></i> Accept
</a>
<script>
	function acceptAppointment(appointmentId) {
    if (confirm("Do you want to accept this appointment?")) {
        $.ajax({
            url: `/appointments/${appointmentId}/accept`,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                alert("Appointment accepted!");
                // Optionally, update the appointment status on the page
            }
        });
    }
}

</script>

									<!-- Cancel Button with Confirmation -->
<a href="#" class="btn btn-sm bg-danger-light" onclick="cancelAppointment({{ $appointment->id }})">
    <i class="fas fa-times"></i> Cancel
</a>
<script>
	function cancelAppointment(appointmentId) {
    if (confirm("Are you sure you want to cancel this appointment?")) {
        $.ajax({
            url: `/appointments/${appointmentId}/cancel`,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                alert("Appointment canceled!");
                // Optionally, remove or update the appointment on the page
            }
        });
    }
}

</script>

								</div>
							</div>
							@endforeach

					

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

<!-- doccure/appointments.html  30 Nov 2019 04:12:09 GMT -->

</html>