<!DOCTYPE html>
<html lang="en">

<!-- doccure/doctor-dashboard.html  30 Nov 2019 04:12:03 GMT -->

@include('doctor.head')
@include('layout.app')

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

								<!-- again add home page link here upprrrr -->

								<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
							</ol>
						</nav>
						<h2 class="breadcrumb-title">Dashboard</h2>
					</div>
				</div>
			</div>
		</div>
		<!-- /Breadcrumb -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

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

						<div class="row">
							<div class="col-md-12">
								<div class="card dash-card">
									<div class="card-body">
										<div class="row">
											<!-- Total Patients -->
											<div class="col-md-4">
												<div class="card">
													<div class="card-body">
														<h5>Total Patients</h5>
														<h3>{{ $totalPatients }}</h3>
														<p>Till Today</p>
													</div>
												</div>
											</div>
										
											<!-- Today's Patients -->
											<div class="col-md-4">
												<div class="card">
													<div class="card-body">
														<h5>Today's Patients</h5>
														<h3>{{ $todayPatients }}</h3>
														<p>{{ \Carbon\Carbon::today()->format('d, F Y') }}</p>
													</div>
												</div>
											</div>
										
											<!-- Total Appointments -->
											<div class="col-md-4">
												<div class="card">
													<div class="card-body">
														<h5>Total Appointments</h5>
														<h3>{{ $totalAppointments }}</h3>
														<p>{{ \Carbon\Carbon::today()->format('d, F Y') }}</p>
													</div>
												</div>
											</div>
										</div>
										
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<h4 class="mb-4">Patient Appoinments</h4>
								<div class="appointment-tab">

									<!-- Appointment Tab -->
									<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
										<li class="nav-item">
											<a class="nav-link active" href="#upcoming-appointments"
												data-toggle="tab">Total Appointments</a>
										</li>
									</ul>
									<!-- /Appointment Tab -->

									<div class="tab-content">

										<!-- Upcoming Appointment Tab -->
										<div class="tab-pane show active" id="upcoming-appointments">
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0">
															<thead>
																<tr>
																	<th>Patient Name</th>
																	<th>Appt Date</th>
																	<th>Gender</th>
																	
																	
																	<th class="text-center">Age</th>
																	<th class="text-center">status</th>
																</tr>
															</thead>

															<tbody>
																@foreach($appointments as $appointment)
						
																<tr>
																	<td>
																		<h2 class="table-avatar">
																			<a href="{{ url('patient-profile/' . $appointment->patient_id) }}"
																				class="avatar avatar-sm mr-2">
																				<img src="./passets/img/patients/images.png" alt="User Image">

																			</a>
																			<a
																				href="{{ url('patient-profile/' . $appointment->patient_id) }}">
																				{{ $appointment->patient->first_name }} {{ $appointment->patient->last_name }}
																				
																			</a>
																		</h2>
																	</td>
																	<td>{{
																		\Carbon\Carbon::parse($appointment->date)->format('d
																		M Y') }}
																		<span class="d-block text-info">{{
																			\Carbon\Carbon::parse($appointment->time)->format('h:i
																			A') }}</span>
																	</td>
																	<td>{{ $appointment->patient->gander }}</td>
																	
																	<td class="text-center">{{ $appointment->patient->age
																		}}</td>
																	<td class="text-right">
																		<div class="table-action">
																			{{-- <a href="javascript:void(0);"
																				class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a> --}}
																			<!-- Accept Button -->
<!-- Sample Appointments (repeat this block for each appointment) -->



{{-- <div class="appointment" data-appointment-id="{{ $appointment->id }}">
    <button class="accept-button">Accept</button>
    <button class="cancel-button">Cancel</button>
    <div class="accepted-message" style="display: none;">Accepted!</div>
    <div class="canceled-message" style="display: none;">Canceled!</div>
</div> --}}

{{-- <div class="appointment" data-appointment-id="{{ $appointment->id }}" data-status="{{ $appointment->status }}">
    <button class="accept-button" style="{{ $appointment->status ? 'display: none;' : '' }}">Accept</button>
    <button class="cancel-button" style="{{ $appointment->status ? 'display: none;' : '' }}">Cancel</button>
    <div class="accepted-message" style="{{ $appointment->status === 'accepted' ? '' : 'display: none;' }}">Accepted!</div>
    <div class="canceled-message" style="{{ $appointment->status === 'canceled' ? '' : 'display: none;' }}">Canceled!</div>
</div> --}}

<div class="appointment" data-appointment-id="{{ $appointment->id }}" data-status="{{ $appointment->status }}">
    @if ($appointment->status === 'pending')
        <button class="accept-button">Accept</button>
        <button class="cancel-button">Cancel</button>
    @endif
    <div class="accepted-message" style="{{ $appointment->status === 'accepted' ? '' : 'display: none;' }}">Accepted!</div>
    <div class="canceled-message" style="{{ $appointment->status === 'canceled' ? '' : 'display: none;' }}">Canceled!</div>
	
</div>

 
 
 <!-- Popup Confirmation -->
 <div id="confirmationPopup" style="display: none;">
	<div class="popup-content">
	   <p id="confirmationMessage"></p>
	   <button onclick="closePopup()">OK</button>
	</div>
 </div>
 
 <style>
	/* Popup styling */
	#confirmationPopup {
	   position: fixed;
	   top: 0;
	   left: 0;
	   width: 100%;
	   height: 100%;
	   background-color: rgba(0, 0, 0, 0.5);
	   display: flex;
	   align-items: center;
	   justify-content: center;
	}
	.popup-content {
	   background: white;
	   padding: 20px;
	   border-radius: 8px;
	   text-align: center;
	}
 </style>
 

 


																		
																		</div>
																	</td>
																</tr>
																@endforeach
															</tbody>

														</table>
													</div>
												</div>
											</div>
										</div>
										<!-- Upcoming Appointment Tab -->
										<script>
											document.addEventListener('DOMContentLoaded', () => {
    const baseUrl = 'http://127.0.0.1:8000'; // Backend URL

    document.querySelectorAll('.accept-button').forEach(button => {
        button.addEventListener('click', function () {
            const parentDiv = this.closest('.appointment');
            const appointmentId = parentDiv.dataset.appointmentId; // Fetches the 'id' from the data-appointment-id attribute
            console.log('Fetched Appointment ID:', appointmentId); // Debugging

            fetch(`${baseUrl}/appointments/accept`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({ appointment_id: appointmentId }),
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        parentDiv.querySelector('.accepted-message').style.display = 'block';
                        parentDiv.querySelector('.canceled-message').style.display = 'none';
                    } else {
                        alert(data.message);
                    }
                });
        });
    });

    document.querySelectorAll('.cancel-button').forEach(button => {
        button.addEventListener('click', function () {
            const parentDiv = this.closest('.appointment');
            const appointmentId = parentDiv.dataset.appointmentId; // Fetches the 'id' from the data-appointment-id attribute
            console.log('Fetched Appointment ID:', appointmentId); // Debugging

            fetch(`${baseUrl}/appointments/cancel`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({ appointment_id: appointmentId }),
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        parentDiv.querySelector('.canceled-message').style.display = 'block';
                        parentDiv.querySelector('.accepted-message').style.display = 'none';
                    } else {
                        alert(data.message);
                    }
                });
        });
    });
});

										
										 </script>

<script>
	document.addEventListener("DOMContentLoaded", () => {
    const appointments = document.querySelectorAll(".appointment");

    appointments.forEach(appointment => {
        const appointmentId = appointment.dataset.appointmentId;
        const acceptButton = appointment.querySelector(".accept-button");
        const cancelButton = appointment.querySelector(".cancel-button");
        const acceptedMessage = appointment.querySelector(".accepted-message");
        const canceledMessage = appointment.querySelector(".canceled-message");

        const updateStatus = (status) => {
            fetch("/appointment/update-status", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({
                    appointment_id: appointmentId,
                    status: status,
                }),
            })
                .then(response => response.json())
                .then(data => {
                    if (status === "accepted") {
                        acceptButton.style.display = "none";
                        cancelButton.style.display = "none";
                        acceptedMessage.style.display = "block";
                    } else if (status === "canceled") {
                        acceptButton.style.display = "none";
                        cancelButton.style.display = "none";
                        canceledMessage.style.display = "block";
                    }
                })
                .catch(error => console.error("Error updating status:", error));
        };

        // Handle Accept Button Click
        acceptButton.addEventListener("click", () => updateStatus("accepted"));

        // Handle Cancel Button Click
        cancelButton.addEventListener("click", () => updateStatus("canceled"));
    });
});


</script>
									</div>
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

<!-- doccure/doctor-dashboard.html  30 Nov 2019 04:12:09 GMT -->

</html>