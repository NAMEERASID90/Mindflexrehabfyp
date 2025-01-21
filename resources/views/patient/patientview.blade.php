@include('layout.app')
@include('patient.head')

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
								<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
							</ol>
						</nav>
						<h2 class="breadcrumb-title">Dashboard</h2>
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
							<div class="card-body pt-0">

								<!-- Tab Menu -->
								<nav class="user-tabs mb-4">

									<!-- /Tab Menu -->
									<section class="main">
										{{-- <div class="main-top">
											<h1>Welcome Back! </h1><br>
											<i class="fas fa-user-cog"></i>
										</div> --}}
										<div class="main-skills">
											<div class="card" onmouseover="enlargeCard(this)" onmouseout="shrinkCard(this)">
												<i class="fas fa-dumbbell"></i>
												<h3>Exercise Analytics</h3>
										<br>
										<br>
												<button class="btn-animate">Get Started</button>
											</div>
											<div class="card" onmouseover="enlargeCard(this)" onmouseout="shrinkCard(this)">
												<i class="fas fa-video"></i>
												<h3>Virtual Consultation</h3>
												<br>
												<button class="btn-animate" onclick="window.location.href='https://meet.google.com/your-meet-link';">
													Join call
												</button>
											</div>
											
											<div class="card" onmouseover="enlargeCard(this)" onmouseout="shrinkCard(this)">
												<i class="fas fa-chart-line"></i>
												<h3>Daily performance</h3>
												<br>
												<br>
												<button class="btn-animate">Get Started</button>
											</div>
											<div class="card" onmouseover="enlargeCard(this)" onmouseout="shrinkCard(this)">
												<i class="fas fa-tasks"></i>
												<h3>TO DO</h3>
												<br>
												<br>
												<button class="btn-animate" onclick="showPopup()">Generate</button>
											</div>
										
											<!-- Modal Popup -->
											<div id="taskModal" class="modal">
												<div class="modal-content">
													<span class="close" onclick="closePopup()">&times;</span>
													<h2>Select Your Daily Healthy Tasks</h2>
													<form id="taskForm">
														<label>
															<input type="checkbox" name="task" value="Morning Walk"> Morning Walk
														</label><br>
														<label>
															<input type="checkbox" name="task" value="Drink 8 Glasses of Water"> Drink 8 Glasses of Water
														</label><br>
														<label>
															<input type="checkbox" name="task" value="Meditation"> Meditation
														</label><br>
														<label>
															<input type="checkbox" name="task" value="Healthy Breakfast"> Healthy Breakfast
														</label><br>
														<label>
															<input type="checkbox" name="task" value="Stretching Exercise"> Stretching Exercise
														</label><br>
														<label>
															<input type="checkbox" name="task" value="Take a 15-Minute Walk After Lunch"> Take a 15-Minute Walk After Lunch
														</label><br>
														<label>
															<input type="checkbox" name="task" value="Drink Herbal Tea"> Drink Herbal Tea
														</label><br>
														<label>
															<input type="checkbox" name="task" value="Eat More Vegetables"> Eat More Vegetables
														</label><br>
														<label>
															<input type="checkbox" name="task" value="Get 7-8 Hours of Sleep"> Get 7-8 Hours of Sleep
														</label><br>
													<center>	<button type="button" class="btn-animate" onclick="generateToDoList()">Generate To-Do List</button> </center>
													</form>
												</div>
											</div>
											
											<style>
												/* Modal Styles */
.modal {
  display: none; /* Initially hidden */
  position: fixed;
  z-index: 1000;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.6); /* Dark overlay with transparency */
  justify-content: center;
  align-items: center;
  animation: fadeIn 0.3s ease-in-out; /* Smooth fade-in effect */
}

/* Modal Content */
.modal-content {
  background: linear-gradient(135deg, #f0f1f1,#9edcf3); /* Soft gradient background */
  border-radius: 15px;
  padding: 25px;
  width: 90%;
  max-width: 450px; /* Responsive size */
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2); /* Subtle shadow */
  text-align: left;
  position: relative;
  animation: slideDown 0.3s ease; /* Slide-down animation */
}

/* Close Button */
.close {
  color: #555;
  font-size: 28px;
  font-weight: bold;
  position: absolute;
  top: 10px;
  right: 15px;
  cursor: pointer;
  transition: color 0.2s;
}

.close:hover {
  color: #F57E57; /* Eye-catching hover color */
}

/* Headline */
.modal-content h2 {
  font-size: 24px;
  color: #333;
  margin-bottom: 20px;
  font-family: 'Poppins', sans-serif;
}

/* Form Styling */
#taskForm label {
  font-size: 16px;
  color: #555;
  display: block;
  margin-bottom: 10px;
  cursor: pointer;
  font-family: 'Roboto', sans-serif;
}

#taskForm input[type="checkbox"] {
  margin-right: 10px;
  transform: scale(1.2);
  accent-color: #F57E57; /* Custom checkbox color */
}

/* Button Styling */
.btn-animate {
  background-color: #F57E57;
  color: white;
  font-size: 16px;
  font-family: 'Poppins', sans-serif;
  border: none;
  border-radius: 25px;
  padding: 10px 20px;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
}

.btn-animate:hover {
  background-color:#F57E57;
  box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
  transform: translateY(-3px);
}

/* Responsive Design */
@media (max-width: 500px) {
  .modal-content {
    padding: 20px;
    width: 95%;
  }
}

/* Animations */
@keyframes fadeIn {
  from {
    background-color: rgba(0, 0, 0, 0);
  }
  to {
    background-color: rgba(0, 0, 0, 0.6);
  }
}

@keyframes slideDown {
  from {
    transform: translateY(-50px);
    opacity: 0;
  }
  to {
    transform: translateY(0);
    opacity: 1;
  }
}

											</style>
											

											
										
											<script>
												// Show popup
function showPopup() {
	document.getElementById("taskModal").style.display = "flex";
}

// Close popup
function closePopup() {
	document.getElementById("taskModal").style.display = "none";
}

// Generate To-Do List
function generateToDoList() {
	const selectedTasks = document.querySelectorAll('input[name="task"]:checked');
	const toDoList = document.getElementById("toDoList");

	// Clear the previous list
	toDoList.innerHTML = "";

	// Add selected tasks to the list
	selectedTasks.forEach(task => {
		const listItem = document.createElement("li");
		listItem.textContent = task.value;
		toDoList.appendChild(listItem);
	});

	// Show the To-Do List container
	document.getElementById("toDoListContainer").style.display = "block";

	// Close the popup
	closePopup();
}

											</script>
										
											{{-- <section class="main-course">
												<h1>Exercise Tracking</h1>
												<div class="course-box">
													<ul>
														<li class="active">In Progress</li>
													</ul>
													<div class="video-box">
														<h3>Cognitive Behavioral Therapy</h3>
														<div class="video-player">
															<div class="video-progress">
																<div class="progress-bar"><span style="width: 0%;"></span></div>
															</div>
															<button class="play-pause-btn" onclick="toggleVideo()">Play</button>
															<p>0% - progress</p>
														</div>
													</div>
												</div>
											</section> --}}
										</section>
									</section>
									<!-- To-Do List -->
									<div id="toDoListContainer" class="to-do-list">
										<h3>Todays To-Do List</h3>
										<ul id="toDoList"></ul>
									</div>

									{{-- style for to do list  --}}
									<style>
										/* To-Do List Container */
										#toDoListContainer {
											background-color: #f9f9f9;
											border-radius: 8px;
											padding: 20px;
											margin-top: 20px;
											box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
											max-width: 500px;
											margin-left: auto;
											margin-right: auto;
										}
									
										#toDoListContainer h3 {
											font-size: 24px;
											color: #06A3DA;
											text-align: center;
											margin-bottom: 15px;
										}
									
										/* To-Do List Items */
										#toDoList {
											list-style-type: none;
											padding: 0;
											margin: 0;
										}
									
										#toDoList li {
											font-size: 18px;
											color: #333;
											padding: 10px;
											background-color: #fff;
											border: 2px solid #e3e3e3;
											border-radius: 6px;
											margin-bottom: 10px;
											display: flex;
											align-items: center;
											transition: transform 0.3s ease, box-shadow 0.3s ease;
										}
									
										#toDoList li:hover {
											transform: translateX(10px);
											box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
										}
									
										/* Checkboxes */
										#toDoList li input[type="checkbox"] {
											margin-right: 15px;
											accent-color: #06A3DA;
										}
									
										/* Add icon or styling to checkboxes */
										#toDoList li input[type="checkbox"]:checked {
											background-color: #06A3DA;
											border: 2px solid #06A3DA;
										}
									
										/* Add task completed style */
										#toDoList li.completed {
											background-color: #d4edda;
											border-color: #28a745;
											text-decoration: line-through;
											color: #6c757d;
										}
									
										#toDoList li.completed input[type="checkbox"] {
											background-color: #28a745;
										}
									</style>
{{-- style for to do list end here									 --}}
								
								
									
									
									
									
									<script>
										function enlargeCard(card) {
											card.style.transform = 'scale(1.05)';
										}
									
										function shrinkCard(card) {
											card.style.transform = 'scale(1)';
										}
									</script>
									
							<!-- Tab Content -->

						</div>
					</div>
				</div>
			</div>

		</div>

	</div>




	<!-- /Page Content -->

	<!-- Footer Start -->
{{-- @include('footer') --}}
<!-- Footer End -->

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