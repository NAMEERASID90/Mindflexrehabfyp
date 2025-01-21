<!DOCTYPE html>
<html lang="en">

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
								<li class="breadcrumb-item active" aria-current="page">Doctors</li>
							</ol>
						</nav>
						<h2 class="breadcrumb-title">Doctors</h2>
					</div>
				</div>
			</div>
		</div>
		<!-- /Breadcrumb -->

		<style>

			/* General Styles */
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f4f7f6;
    color: #2c3e50;
    margin: 0;
    padding: 0;
}

/* Header */
.breadcrumb-bar {
    background-color: #3498db;
    padding: 20px 0;
}

.breadcrumb-bar h2.breadcrumb-title {
    color: #ffffff;
    font-size: 24px;
    font-weight: 600;
}

/* Doctors Section */
.profile-widget {
    background-color: #ffffff;
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease-in-out;
	min-height: 350px; /* Adjust this value as needed */
    display: flex;
    flex-direction: column; /* Ensure elements stack vertically */
    padding: 20px; /* Add padding */
}

.profile-widget:hover {
    transform: translateY(-10px);
}

.doc-img img {
    border-radius: 10px 10px 0 0;
}

.pro-content {
    padding: 20px;
}

.pro-content h3.title {
    font-size: 20px;
    color: #333;
    margin-bottom: 10px;
}

.pro-content h3.title a {
    color: #2c3e50;
    text-decoration: none;
}

.pro-content h3.title a:hover {
    color: #3498db;
}

.pro-content .speciality {
    font-size: 14px;
    color: #7f8c8d;
    margin-bottom: 10px;
}

.available-info li {
    color: #2c3e50;
    margin-bottom: 5px;
    font-size: 14px;
}

.available-info li:before {
   
    margin-right: 10px;
    color: #3498db;
}

/* Buttons */
.view-btn, .book-btn {
    background-color: #3498db;
    color: white;
    border: none;
    padding: 10px 15px;
    font-size: 14px;
    border-radius: 20px;
    transition: background-color 0.3s ease-in-out;
}

.view-btn:hover, .book-btn:hover {
    background-color: #2980b9;
}

.message-btn {
    background-color: #2ecc71;
    color: white;
    border: none;
    padding: 10px 15px;
    font-size: 14px;
    border-radius: 20px;
    width: 100%;
    transition: background-color 0.3s ease-in-out;
}

.message-btn:hover {
    background-color: #27ae60;
}

/* Footer */
footer {
    background-color: #34495e;
    color: #ecf0f1;
    padding: 40px 0;
}

footer h4 {
    color: #ffffff;
    font-size: 18px;
    margin-bottom: 15px;
}

footer ul li a {
    color: #ecf0f1;
    text-decoration: none;
    transition: color 0.3s ease-in-out;
}

footer ul li a:hover {
    color: #3498db;
}

footer a {
    color: #ecf0f1;
    text-decoration: none;
}

footer a:hover {
    color: #3498db;
}

/* Responsive Design */
@media (max-width: 767px) {
    .breadcrumb-bar {
        padding: 15px;
    }

    .profile-widget {
        margin-bottom: 20px;
    }

    .pro-content {
        padding: 15px;
    }
}

		</style>
		<!-- Page Content -->
		<div class="content">
			<div class="container-fluid">
				<div class="row">


					<!-- Profile Sidebar -->
					@include('patient.patientprofile')
					<!-- Page Content -->
					<div class="col-md-7 col-lg-8 col-xl-9">
						@foreach($doctors as $speciality_name => $doctorGroup)
						<h2>{{ $speciality_name }}</h2> <!-- Speciality Heading -->
						<div class="row row-grid">
							@foreach($doctorGroup as $doctor)
							<!-- Doctors under each speciality -->
							<div class="col-md-6 col-lg-4 col-xl-3">
								<div class="profile-widget">
									<div class="doc-img">
										{{-- <a href="#">
											<img class="img-fluid" alt="User Image"
												src="{{ asset('images/1725295166.png' . $doctor->image) }}">
										</a> --}}
										<a href="javascript:void(0)" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="#">{{ $doctor->first_name }} {{ $doctor->last_name }}</a>
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">{{ $doctor->speciality_name }}</p>

										<ul class="available-info">
											{{-- <li>
												<i class="fas fa-briefcase"></i> 
												<span>{{ $doctor->experience }}</span>
											</li> --}}
											<li>
												<i class="fas fa-envelope"></i> <!-- Icon for email -->
												<span>{{ $doctor->email }}</span>
											</li>
											<li>
												<i class="fas fa-phone"></i> <!-- Icon for phone number -->
												<span>{{ $doctor->phone }}</span>
											</li>
											<li>
												<i class="fas fa-map-marker-alt"></i> <!-- Icon for address -->
												<span>{{ $doctor->address }}</span>
											</li>
										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="{{ route('doprofile',['id' => $doctor->user_id]) }}"
													class="btn view-btn">View Profile</a>
											</div>
											<div class="col-6">
												<a href="{{ route('booking', ['id' => $doctor->user_id]) }}"
													class="btn book-btn">Book Now</a>
											</div>
											<!-- Add Message Button -->
											<div class="col-12 mt-2">
												<button class="btn message-btn"
													data-doctor-id="{{ $doctor->user_id }}">Message</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						@endforeach
					</div>



				</div>
			</div>

		</div>
		<!-- /Page Content -->

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

	<!-- Custom JS -->
	<script src="assets/js/script.js"></script>



	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$(document).ready(function() {
        $('.message-btn').on('click', function() {
            var doctorId = $(this).data('doctor-id');
            $.ajax({
                url: "{{ route('start.chat') }}",
                method: 'POST',
                data: {

                    doctor_id: doctorId,
                    patient_id: "{{ auth()->id() }}",
                    _token: "{{ csrf_token() }}"
                },

				
				
                success: function(response) {
                    var chatUrl = `{{ url('chat') }}/${response.session}`;
                    window.location.href = chatUrl;
                },
				
                error: function(xhr) {
                    console.log('Error:', xhr.responseText);
                }
            });
        });
    });
	</script>

</body>

<!-- doccure/favourites.html  30 Nov 2019 04:12:17 GMT -->

</html>