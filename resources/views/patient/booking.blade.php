<!DOCTYPE html>
<html lang="en">
@include('layout.app')
@include('patient.head')

<style>
    .date-dropdown,
    .time-dropdown {
        margin-bottom: 15px;
    }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">

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
                                <li class="breadcrumb-item active" aria-current="page">Booking</li>
                            </ol>
                        </nav>
                        <h2 class="breadcrumb-title">Booking</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->

        <!-- Page Content -->
        <div class="container">
            <form action="{{ route('appointment.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card">
							<div class="card-body">
								<div class="booking-doc-info">
									<a href="doctor-profile.html" class="booking-doc-img">
										<img class="img-fluid" alt="User Image" src="{{ asset('images/' . $doctors->image) }}">
									</a>
									<div class="booking-info">
										<h4><a href="doctor-profile.html">{{ $doctors->first_name }} {{ $doctors->last_name }}</a></h4>
										<p class="text-muted mb-0"><i class="fas fa-map-marker-alt"></i> {{ $doctors->address }}</p>
										
										<!-- Add Available Hours Section -->
										<div class="available-hours mt-3">
											<strong>Available Hours: </strong>
											<span>9:00 AM - 12:00 PM</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						

                        <!-- Schedule Widget -->
                        <div class="card booking-schedule schedule-widget">
                            <!-- Schedule Header -->
                            <div class="schedule-header">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- Date Dropdown -->
                                        <div class="date-dropdown">
                                            <select id="date-picker" class="form-control">
                                                <option value="" disabled selected>Select Date</option>
                                                <!-- Dates will be populated by JavaScript -->
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Schedule Header -->

                            <!-- Schedule Content -->
                            <div class="schedule-cont">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- Time Dropdown -->
                                        <div class="time-dropdown">
                                            <select id="time-picker" class="form-control" disabled>
                                                <option value="" disabled selected>Select Time</option>
                                                <!-- Time slots will be populated based on selected date -->
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Schedule Content -->
                        </div>
                        <!-- /Schedule Widget -->

                        <!-- Hidden Inputs -->
                        <input type="hidden" name="date" id="hidden-date">
                        <input type="hidden" name="time" id="hidden-time">
                        <input type="hidden" name="doctor_id" id="doctor_id" value="{{ $doctors->user_id }}">
                        <input type="hidden" name="patient_id" id="patient_id" value="{{ auth()->id() }}">
                        <!-- Submit Section -->
                        <div class="submit-section proceed-btn text-right">
                            <button id="submit-btn" class="btn btn-primary submit-btn" disabled type="submit">Proceed </button>
                        </div>
                        <!-- /Submit Section -->
                    </div>
                </div>
            </form>
        </div>
    </div>
	<script>
		document.addEventListener('DOMContentLoaded', function () {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    // Now your JavaScript will safely access the CSRF token
});

	document.addEventListener('DOMContentLoaded', function () {
		const datePicker = document.getElementById('date-picker');
		const timePicker = document.getElementById('time-picker');
		const submitBtn = document.getElementById('submit-btn');
		const hiddenDate = document.getElementById('hidden-date');
		const hiddenTime = document.getElementById('hidden-time');
	
		// Function to check if a day is a valid booking day (Monday, Tuesday, Wednesday)
		function isValidBookingDay(date) {
			const day = date.getDay();
			return day === 1 || day === 2 || day === 3; // 1 = Monday, 2 = Tuesday, 3 = Wednesday
		}
	
		// Function to generate the next 3 weeks of valid dates
		function generateDateOptions() {
			const today = new Date();
			for (let i = 0; i < 21; i++) { // 3 weeks = 21 days
				const date = new Date(today);
				date.setDate(today.getDate() + i);
	
				if (isValidBookingDay(date) && date > today) {
					const day = date.getDate();
					const month = date.toLocaleString('default', { month: 'short' });
					const year = date.getFullYear();
					const formattedDate = `${day} ${month} ${year}`;
					const option = document.createElement('option');
					option.value = date.toISOString().split('T')[0]; // Format YYYY-MM-DD
					option.textContent = formattedDate;
					datePicker.appendChild(option);
				}
			}
		}
	
		generateDateOptions();
	
		// Generate time slots for 9 AM to 11 AM only
		function generateTimeSlots() {
			const times = [];
			const hours = [9, 10, 11]; // Only include 9, 10, 11 hours
	
			hours.forEach(hour => {
				const timeAMPM = (hour <= 12 ? hour : hour - 12) + ':00 ' + (hour < 12 ? 'AM' : 'PM');
				times.push(timeAMPM);
			});
			return times;
		}
	
		// Listen for date selection
		datePicker.addEventListener('change', function () {
			const selectedDate = this.value;
			hiddenDate.value = selectedDate; // Set hidden input value
	
			console.log(`Date selected: ${selectedDate}`); // Debugging line
	
			// Reset time picker options
			timePicker.innerHTML = '<option value="" disabled selected>Select Time</option>';
			const timeSlots = generateTimeSlots(); // Generate time slots dynamically
			timeSlots.forEach(time => {
				const option = document.createElement('option');
				option.value = time;
				option.textContent = time;
				timePicker.appendChild(option);
			});
	
			timePicker.disabled = false; // Enable time picker
			submitBtn.disabled = true; // Disable submit button until a time is selected
		});
	
		// Listen for time selection
		timePicker.addEventListener('change', function () {
			const selectedTime = this.value;
			hiddenTime.value = selectedTime; // Set hidden input value
	
			console.log(`Time selected: ${selectedTime}`); // Debugging line
	
			// Check if the selected time is already booked
			fetch(`/check-slot-availability`, {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json',
					'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
				},
				body: JSON.stringify({
					date: hiddenDate.value,
					time: hiddenTime.value,
					doctor_id: document.getElementById('doctor_id').value
				})
			})
			.then(response => response.json())
			.then(data => {
				console.log(data); // Log the response from the server for debugging
	
				if (data.isBooked) {
					alert('This time slot is already booked. Please choose another time.');
					timePicker.value = ''; // Reset time picker
					submitBtn.disabled = true; // Disable submit button
				} else {
					submitBtn.disabled = false; // Enable submit button if time is available
				}
			})
			.catch(error => {
				console.error('Error checking slot availability:', error);
			});
		});
	});
</script>	

    <!-- Footer -->
    <footer style="background-color: #06A3DA; color: #ecf0f1; padding: 40px 0;">
        <div style="max-width: 1200px; margin: 0 auto; display: flex; flex-wrap: wrap; justify-content: space-between;">
            <!-- Contact Information -->
            <div style="flex: 1; margin-bottom: 20px;">
                <h4>Contact Us</h4>
                <p><strong>Phone:</strong> +1 234 567 890</p>
                <p><strong>Email:</strong> info@Mindflex.com</p>
                <p><strong>Address:</strong> 123 Karachi ,Pakistan</p>
            </div>
        </div>
    </footer>
    <!-- /Footer -->

</body>
</html>
