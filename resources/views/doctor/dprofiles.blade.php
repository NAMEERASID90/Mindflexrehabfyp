<!DOCTYPE html>
<html lang="en">

<!-- doccure/doctor-profile-settings.html  30 Nov 2019 04:12:14 GMT -->


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
					<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

						<!-- Profile Sidebar -->
						<!-- Profile Sidebar -->
						@include('doctor.siderbar')
						<!-- /Profile Sidebar -->

					</div>
					<div class="col-md-7 col-lg-8 col-xl-9">
						<h1>Doctor Information</h1>
						<form action="#" method="POST" enctype="multipart/form-data">
							@csrf
					
							<div class="row">
								<div class="form-group col-md-6">
									<label for="firstName">First Name:</label>
									<input type="text" class="form-control" id="first_name" name="first_name" required readonly value="{{ $doctorProfile->first_name }}">
									<small class="form-text error" id="firstNameError"></small>
								</div>
								<div class="form-group col-md-6">
									<label for="lastName">Last Name:</label>
									<input type="text" class="form-control" id="last_name" name="last_name" readonly required value="{{ $doctorProfile->last_name }}">
									<small class="form-text error" id="lastNameError"></small>
								</div>
							</div>
					
							<div class="row">
								<div class="form-group col-md-6">
									<label for="age">Age:</label>
									<input type="number" class="form-control" id="age" name="age" readonly required max="80" oninput="validateAge(this)" value="{{ $doctorProfile->age }}">
									<small class="form-text error" id="ageError"></small>
								</div>
								<div class="form-group col-md-6">
									<label for="username">Username:</label>
									<input type="text" class="form-control" id="user_name" name="user_name"  readonly required value="{{ $doctorProfile->user_name }}">
									<small class="form-text error" id="usernameError"></small>
								</div>
							</div>
					
							<div class="row">
								<div class="form-group col-md-6">
									<label for="email">Email:</label>
									<input type="email" class="form-control" id="email" name="email" required readonly  value="{{ $doctorProfile->email }}">
									<small class="form-text error" id="emailError"></small>
								</div>
								{{-- <div class="form-group col-md-6">
									<label for="password">Password:</label>
									<input type="password" class="form-control" id="password" name="password" required>
									<small class="form-text error" id="passwordError"></small>
								</div> --}}
							</div>
					
							<input type="hidden" name="type" value="doctor" />
					
							<div class="row">
								<div class="form-group col-md-6">
									<label for="gender">Gender:</label>
									<select class="form-control" id="gender" name="gender" required readonly>
										<option value="">Choose Gender</option>
										<option value="male" {{ $doctorProfile->gander == 'male' ? 'selected' : '' }}>Male</option>
										<option value="female" {{ $doctorProfile->gander == 'female' ? 'selected' : '' }}>Female</option>
										<option value="other" {{ $doctorProfile->gander == 'other' ? 'selected' : '' }}>Other</option>
									</select>
									<small class="form-text error" id="genderError"></small>
								</div>
								<div class="form-group col-md-6">
									<label for="specialization">Specialization:</label>
									<input type="text" class="form-control" id="specialization" readonly name="specialization" required value="{{ $doctorProfile->name }}">
									<small class="form-text error" id="specializationError"></small>
								</div>
							</div>
					
							<div class="row">
								<div class="form-group col-md-6">
									<label for="experience">Experience (Years):</label>
									<input type="number" class="form-control" id="experience" readonly name="experience" required value="{{ $doctorProfile->experience }}">
									<small class="form-text error" id="experienceError"></small>
								</div>
								<div class="form-group col-md-6">
									<label for="phone">Phone Number:</label>
									<input type="tel" class="form-control" id="phone" name="phone"  readonly required value="{{ $doctorProfile->phone }}">
									<small class="form-text error" id="phoneError"></small>
								</div>
							</div>
					
							<div class="row">
								<div class="form-group col-md-6">
									<label for="address">Address:</label>
									<textarea class="form-control" id="address" name="address"  readonly rows="3" required>{{ $doctorProfile->address }}</textarea>
									<small class="form-text error" id="addressError"></small>
								</div>
								<div class="form-group col-md-6">
									<label for="notes">Additional Notes:</label>
									<textarea class="form-control" id="notes" name="notes" readonly rows="3">{{ $doctorProfile->notes }}</textarea>
								</div>
							</div>
					
							<div class="row mt-4">
								<div class="form-group col-md-6">
									<label for="documents">Doctor's Documents:</label>
									<input type="hidden" class="form-control-file" id="documents" readonly name="documents[]" accept=".pdf,.doc,.docx" multiple>
									<small class="form-text error" id="documentsError"></small>
							
									@if(!empty($doctorProfile->documents))
										<div class="mt-2">
											
											<ul>
												@foreach(json_decode($doctorProfile->documents) as $document)
													<li><a href="{{ asset('storage/documents/' . $document) }}" target="_blank">{{ $document }}</a></li>
												@endforeach
											</ul>
										</div>
									@endif
								</div>
							
								<div class="form-group col-md-6">
									<label for="image">Doctor's Image:</label>
									<input type="hidden" class="form-control-file" id="image" readonly name="image" accept="image/*">
									<small class="form-text error" id="imageError"></small>
							
									@if(!empty($doctorProfile->image))
										<div class="mt-2">
											

											<img class="img-fluid" alt="Doctor's Image"  style="max-width: 150px;"
																				src="{{ asset('images/' . $doctorProfile->image) }}">
										</div>
									@endif
								</div>
							</div>
							
							{{-- <button type="submit" class="btn btn-primary mt-4">Save</button> --}}
						</form>
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

</body>

<!-- doccure/doctor-profile-settings.html  30 Nov 2019 04:12:15 GMT -->

</html>