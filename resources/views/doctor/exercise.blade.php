<!DOCTYPE html>
<html lang="en">

<!-- doccure/patient-dashboard.html  30 Nov 2019 04:12:16 GMT -->

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
								<li class="breadcrumb-item"><a href="patient-dashboard.html">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Excercise</li>
							</ol>
						</nav>
						<h2 class="breadcrumb-title">Excercise</h2>
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
					<div class="col-md-3 col-lg-4 col-xl-3 theiaStickySidebar">
                        <!-- Profile Sidebar -->
                        @include('doctor.siderbar')
                        <!-- /Profile Sidebar -->
                    </div>

					<div class="col-md-7 col-lg-8 col-xl-9">
						<div class="card">
							<div class="card-body pt-0">

								<section class="comp-section comp-cards">
									<div class="comp-header">
										<h3 class="comp-title">Exercises For Physical Pain</h3>
										<div class="line"></div>
									</div>

									<div class="row row-grid">
										<div class="col-12 col-md-6 col-lg-4 d-flex">
											<div class="card flex-fill">
												<img alt="Card Image" src="./passets/img/bridge.jpeg" class="card-img-top">
												<div class="card-header">
													<h5 class="card-title mb-0">Bridging</h5>
												</div>
												<div class="card-body">
													<p class="card-text">Lie on your back with knees bent and feet flat
														on the floor. Lift your hips towards the ceiling while squeezing
														your glutes, forming a straight line from shoulders to knees.
														Hold briefly, then lower back down.</p>
													<a class="btn btn-primary mb-2 me-2"
														href="https://www.youtube.com/watch?v=Ce3XDuWXXq4"
														target="_blank">Watch Video</a>
														<a class="btn btn-secondary mb-2" href="#" onclick="shareLink()">
															Share Link
														</a>
												</div>
											</div>
										</div>

										<div class="col-12 col-md-6 col-lg-4 d-flex">
											<div class="card flex-fill">
												<img alt="Card Image" src="./passets/img/clamshell.jpeg"
													class="card-img-top">
												<div class="card-header">
													<h5 class="card-title mb-0">Clamshells</h5>
												</div>
												<div class="card-body">
													<p class="card-text"> Lie on your side with legs stacked and knees
														bent at a 90-degree angle. Keeping your feet together, lift the
														top knee towards the ceiling without rotating your hips. Slowly
														lower it back down.</p>
														<br>
													<a class="btn btn-primary mb-2 me-2"
														href="https://www.youtube.com/watch?v=CiqvDV8pzRk"
														target="_blank">Watch Video</a>
														<a class="btn btn-secondary mb-2" href="#" onclick="shareLink()">
															Share Link
														</a>
												</div>
											</div>
										</div>
										<div class="col-12 col-md-6 col-lg-4 d-flex">
											<div class="card flex-fill">
												<img alt="Card Image" src="./passets/img/Heel-Slides-Right.jpeg"
													class="card-img-top">
												<div class="card-header">
													<h5 class="card-title mb-0">Heel Slides</h5>
												</div>
												<div class="card-body">
													<p class="card-text">Lie on your back with one leg straight and the
														other bent. Slide the heel of the bent leg along the floor,
														bringing your knee towards your chest. Then, slide it back out
														to the starting position.</p>
													<a class="btn btn-primary mb-2 me-2"
														href="https://www.youtube.com/watch?v=A7fcobCVppc"
														target="_blank">Watch Video</a>
														<a class="btn btn-secondary mb-2" href="#" onclick="shareLink()">
															Share Link
														</a>
												</div>
											</div>
										</div>
										<div class="col-12 col-md-6 col-lg-4 d-flex">
											<div class="card flex-fill">
												<img alt="Card Image" src="./passets/img/quadset.jpeg" class="card-img-top">
												<div class="card-header">
													<h5 class="card-title mb-0">Quad Sets</h5>
												</div>
												<div class="card-body">
													<p class="card-text">Sit or lie down with your leg extended straight
														out. Tighten the quadriceps muscle by pressing the back of your
														knee towards the floor. Hold for a few seconds, then relax.</p>
														<br>
													<a class="btn btn-primary mb-2 me-2"
														href="https://www.youtube.com/watch?v=5TUK4uT2nnw"
														target="_blank">Watch Video</a>
														<a class="btn btn-secondary mb-2" href="#" onclick="shareLink()">
															Share Link
														</a>
												</div>
											</div>
										</div>
										<div class="col-12 col-md-6 col-lg-4 d-flex">
											<div class="card flex-fill">
												<img alt="Card Image" src="./passets/img/wall-slides.jpeg"
													class="card-img-top">
												<div class="card-header">
													<h5 class="card-title mb-0">Wall Slides</h5>
												</div>
												<div class="card-body">
													<p class="card-text">Stand with your back against a wall and feet a
														few inches away from it. Slowly slide down the wall by bending
														your knees, keeping your back flat against the wall. Slide back
														up to the starting position.This exercise engages the muscles of
														the upper back.</p>
														<a class="btn btn-primary mb-2 me-2" href="https://www.youtube.com/watch?v=LvW1tOPwTBM" target="_blank">
															Watch Video
														</a>
														<a class="btn btn-secondary mb-2" href="#" onclick="shareLink()">
															Share Link
														</a>
														
												</div>
											</div>
										</div>
										<script>
											function shareLink() {
												const url = "https://www.youtube.com/watch?v=LvW1tOPwTBM";
												navigator.clipboard.writeText(url).then(() => {
													alert('Link copied to clipboard!');
												}).catch(err => {
													console.error('Failed to copy: ', err);
												});
											}
											</script>
										<div class="col-12 col-md-6 col-lg-4 d-flex">
											<div class="card flex-fill">
												<img alt="Card Image" src="./passets/img/straight leg.jpeg"
													class="card-img-top">
												<div class="card-header">
													<h5 class="card-title mb-0">Straight Leg Raise</h5>
												</div>
												<div class="card-body">
													<p class="card-text"> Lie on your back with one leg bent and the
														other straight. Tighten your quadriceps and lift the straight
														leg up to the level of the bent knee. Hold briefly, then lower
														slowly.</p>
														<br>
													<a class="btn btn-primary mb-2 me-2"
														href="https://www.youtube.com/watch?v=gobteD5GWkE"
														target="_blank">Watch Video</a>
														<a class="btn btn-secondary mb-2" href="#" onclick="shareLink()">
															Share Link
														</a>
												</div>
											</div>
										</div>
										<div class="col-12 col-md-6 col-lg-4 d-flex">
											<div class="card flex-fill">
												<img alt="Card Image" src="./passets/img/Shoulder-pendulum.jpeg"
													class="card-img-top">
												<div class="card-header">
													<h5 class="card-title mb-0">Pendulum Exercise</h5>
												</div>
												<div class="card-body">
													<p class="card-text">Lean over a table or chair, letting your arm
														hang straight down. Gently swing your arm in small circles or
														back and forth without using your shoulder muscles to lift it.
													</p> <br>
													<a class="btn btn-primary mb-2 me-2"
														href="https://www.youtube.com/watch?v=YYvl59eU78M"
														target="_blank">Watch Video</a>
														<a class="btn btn-secondary mb-2" href="#" onclick="shareLink()">
															Share Link
														</a>
												</div>
											</div>
										</div>
										<div class="col-12 col-md-6 col-lg-4 d-flex">
											<div class="card flex-fill">
												<img alt="Card Image" src="./passets/img/ankle.jpeg" class="card-img-top">
												<div class="card-header">
													<h5 class="card-title mb-0">Ankle Pumps</h5>
												</div>
												<div class="card-body">
													<p class="card-text">While sitting or lying down, flex and point
														your toes up and down repeatedly. You can also rotate your ankle
														in circles.Improves ankle flexibility and mobility, strengthens
														the muscles around the ankle.Enhances ankle flexibility,
														stretches the calf muscles, and strengthens the ankle.</p>
													<br>
													<a class="btn btn-primary mb-2 me-2"
														href="https://www.youtube.com/watch?v=1NA0N8F0Nds"
														target="_blank">Watch Video</a>
														<a class="btn btn-secondary mb-2" href="#" onclick="shareLink()">
															Share Link
														</a>
												</div>
											</div>
										</div>
										<div class="col-12 col-md-6 col-lg-4 d-flex">
											<div class="card flex-fill">
												<img alt="Card Image" src="./passets/img/hamstring-stretches.jpeg"
													class="card-img-top">
												<div class="card-header">
													<h5 class="card-title mb-0">Hamstring Stretch</h5>
												</div>
												<div class="card-body">
													<p class="card-text"> Lie on your back and lift one leg up while
														keeping it straight. Use a strap or towel around the foot to
														gently pull the leg towards you, stretching the back of your
														thigh.Stretches the hamstrings, improves flexibility in the back
														of the thigh and lower back.Increases hamstring flexibility and
														helps relieve lower back tension.Provides a deep stretch for the
														hamstrings, improves flexibility.</p>
													<a class="btn btn-primary mb-2 me-2"
														href="https://www.youtube.com/watch?v=me22JRV7pJc"
														target="_blank">Watch Video</a>
														<a class="btn btn-secondary mb-2" href="#" onclick="shareLink()">
															Share Link
														</a>
												</div>
											</div>
										</div>












									</div>
							</div>
							<div class="col-12 col-md-6 col-lg-4 d-flex">

							</div>
						</div>
						</section>



					</div>
					<!-- Tab Content -->

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
	<script src="./passets/js/jquery.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="./passets/js/popper.min.js"></script>
	<script src="./passets/js/bootstrap.min.js"></script>

	<!-- Sticky Sidebar JS -->
	<script src="./passets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
	<script src="./passets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

	<!-- Circle Progress JS -->
	<script src="./passets/js/circle-progress.min.js"></script>

	<!-- Custom JS -->
	<script src="./passets/js/script.js"></script>

</body>

<!-- doccure/invoices.html  30 Nov 2019 04:12:14 GMT -->

</html>