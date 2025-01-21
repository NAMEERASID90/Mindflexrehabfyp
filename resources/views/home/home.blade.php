

<!DOCTYPE html>
<html lang="en">



@include('layout.app')

<body>
    
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-dark m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-secondary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
  @include('topbar')
    <!-- Topbar End -->


    <!-- Navbar Start -->
    @include('nav')
    <!-- Navbar End -->
    


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpeg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Welcome To Mindflex</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Your Trusted Partner In Rehabilitation</h1>
                            {{-- <a href="appointment.html" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Appointment</a> --}}
                            <a href="appointment.html" id="appointment-btn" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Appointment</a>

<div id="popup" class="popup">
    <div class="popup-content">
        <span class="close-btn">&times;</span>
        <br>
        <p style="color: black;">You have to login first to make an appointment.</p>
        <div class="popup-buttons">
            <a href="{{ route('patientlogin') }}">
                <button class="login-btn">Login</button>
            </a>
            
        </div>
    </div>
</div>

<!-- Add JavaScript for the popup behavior -->
<script>
    const appointmentBtn = document.getElementById('appointment-btn');
    const popup = document.getElementById('popup');
    const closeBtn = document.querySelector('.close-btn');

    appointmentBtn.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent default link behavior

        // Get the button's position and size
        const btnRect = appointmentBtn.getBoundingClientRect();
        
        // Position the popup above the button
        popup.style.top = `${btnRect.top - popup.offsetHeight - 10}px`;
        popup.style.left = `${btnRect.left}px`;
        popup.style.display = 'block'; // Show the popup
    });

    closeBtn.addEventListener('click', function () {
        popup.style.display = 'none'; // Hide the popup
    });

    window.addEventListener('click', function (event) {
        if (event.target === popup) {
            popup.style.display = 'none'; // Hide the popup
        }
    });
</script>


 

<!-- Add some basic CSS to style the popup -->
<style>
 /* Popup container */
.popup {
    position: absolute; /* Changed from fixed to absolute to position it near the button */
    display: none; /* Initially hidden */
    z-index: 1000;
}

/* Popup content */
.popup-content {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.15);
    text-align: center;
    width: 300px;
    position: relative;
    animation: fadeIn 0.5s ease-in-out;
}

/* Close button */
.close-btn {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 20px;
    font-weight: bold;
    color: #333;
    cursor: pointer;
    transition: color 0.3s ease;
}

.close-btn:hover {
    color: #ff5a5f;
}

/* Popup buttons */
.popup-buttons button {
    padding: 10px 20px;
    margin: 10px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

/* Login button */
.login-btn {
    background-color:#06A3DA;
    color: white;
}

.login-btn:hover {
    background-color: #F57E57;
}

/* Signup button */
.signup-btn {
    background-color: #06A3DA;
    color: white;
}

.signup-btn:hover {
    background-color: #F57E57;
}

/* Popup animation */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}


</style>

                            <a href="{{ route('contact') }}" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                        </div>
                    </div>
                </div>
                <!-- <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Welcome To Mindflex</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Your Trusted Partner In Rehabilitation</h1>
                            <a href="appointment.html" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Appointment</a>
                            <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                        </div>
                    </div>
                </div> -->
            </div>
            <!-- <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button> -->
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Banner Start -->
    <div class="container-fluid banner mb-5">
        <div class="container">
            <div class="row gx-0">
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
                    <div class="bg-primary d-flex flex-column p-5" style="height: 300px;">
                        <center><h3 class="text-white mb-3">Virtual Therapy</h3></center>
                        <div class="d-flex justify-content-between text-white mb-3">
                            <!-- <h6 class="text-white mb-0">Mon - Fri</h6>
                            <p class="mb-0"> 8:00am - 9:00pm</p> -->
                            
                            Explore a new dimension of therapy with 
                            VRTherapy—where recovery meets technology
                            
                           
                        </div>
                        <br>
                        <!-- <a href="loginform.html" class="btn btn-primary py-2 px-4 ms-3" style="background-color: #FF5733; color: white;">Join Now</a> -->
                        <a href="{{ route('patientlogin') }}" class="btn btn-primary py-2 px-4 ms-3 custom-button">Join Now</a>

<!-- CSS for hover effect -->
<style>
.custom-button {
    background-color: #091E3E; /* Original color */
    color: white;
}

.custom-button:hover {
    background-color:  #F57E57  ; /* Darker shade for hover effect */
    color: white;
}
</style>
                        <!-- <div class="d-flex justify-content-between text-white mb-3">
                            <h6 class="text-white mb-0">Saturday</h6>
                            <p class="mb-0"> 8:00am - 7:00pm</p>
                        </div> -->
                        <!-- <div class="d-flex justify-content-between text-white mb-3">
                            <h6 class="text-white mb-0">Sunday</h6>
                            <p class="mb-0"> 8:00am - 5:00pm</p>
                        </div> -->
                        <!-- <a class="btn btn-light" href="">Appointment</a> -->
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
                    <div class="bg-dark d-flex flex-column p-5" style="height: 300px;">
                       <center> <h3 class="text-white mb-3">Search A Doctor</h3> </center>
                        <div class="date mb-3" id="date" data-target-input="nearest">
                            <input type="text" class="form-control bg-light border-0 datetimepicker-input"
                                placeholder="Appointment Date" data-target="#date" data-toggle="datetimepicker" style="height: 40px;">
                        </div>
                        <select class="form-select bg-light border-0 mb-3" style="height: 40px;">
                            <option selected>Select A Service</option>
                            <option value="1">Phsiotherapist</option>
                            <option value="2">Phsycologist</option>
                        
                        </select>
                        <a class="btn btn-light" href="">Search Doctor</a>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="bg-secondary d-flex flex-column p-5" style="height: 300px;">
                        <center><h3 class="text-white mb-3">Make Appointment</h3> </center>
                        <br>
                        <center>
                        <p class="text-white">
                        Ready For Your Rehabilitation Journey?
                        </p>
                        </center>
                       <br>
                     
                        
                        
                        <!-- <h2 class="text-white mb-0">+012 345 6789</h2> -->
                        
                        
                        
                        <!-- <div class="col-12"> -->
                           
                           
                            
                            <a href="{{ route('patientlogin') }}" class="btn btn-primary py-2 px-4 ms-3">Book Now</a>
                        </div>
                        <br>
                       <!-- <p class="text-white">Start Your Path to Recovery Today.</p>  --> 
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Start -->


    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title mb-4">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">About Us</h5>
                        <h1 class="display-5 mb-0">Building the Future of Rehabilitation Together</h1>
                    </div>
                    <h4 class="text-body fst-italic mb-4">We're Mindflex, a passionate startup dedicated to providing exceptional rehabilitation services. We may be new, but we're backed by the expertise of established institutions like the Karachi Down Syndrome Program (KDSP) and Brain and Mind Diagnostics and Rehabilitation</h4>
                    <p class="mb-4">We're a new kind of rehabilitation company one built on collaboration and a commitment to your success.Our team of highly skilled professionals brings their expertise to create a personalized plan tailored to your unique needs and goals. We use cutting-edge techniques while keeping services accessible through flexible scheduling and fair pricing.  We believe in a supportive and encouraging environment, fostering your healing journey every step of the way.</p>
                    <div class="row g-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.3s">
                            <h5 class="mb-3"><i class="fa fa-check-circle text-primary me-3"></i>VR Therapy</h5>
                            <h5 class="mb-3"><i class="fa fa-check-circle text-primary me-3"></i>Professional Doctors</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.6s">
                            <h5 class="mb-3"><i class="fa fa-check-circle text-primary me-3"></i>24/7 Opened</h5>
                            <h5 class="mb-3"><i class="fa fa-check-circle text-primary me-3"></i>Fair Prices</h5>
                        </div>
                    </div>
                    <!-- <a href="appointment.html" class="btn btn-primary py-3 px-5 mt-4 wow zoomIn" data-wow-delay="0.6s">Make Appointment</a> -->
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="img/pilates-vr.jpg" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Appointment Start
    <div class="container-fluid bg-primary bg-appointment my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6 py-5">
                    <div class="py-5">
                        <h1 class="display-5 text-white mb-4">We Are A Certified and Award Winning Rehab Center You Can Trust</h1>
                        <p class="text-white mb-0">Eirmod sed tempor lorem ut dolores. Aliquyam sit sadipscing kasd ipsum. Dolor ea et dolore et at sea ea at dolor, justo ipsum duo rebum sea invidunt voluptua. Eos vero eos vero ea et dolore eirmod et. Dolores diam duo invidunt lorem. Elitr ut dolores magna sit. Sea dolore sanctus sed et. Takimata takimata sanctus sed.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="appointment-form h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn" data-wow-delay="0.6s">
                        <h1 class="text-white mb-4">Make Appointment</h1>
                        <form>
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <select class="form-select bg-light border-0" style="height: 55px;">
                                        <option selected>Select A Service</option>
                                        <option value="1">Pyhsiotherapist</option>
                                        <option value="2">Phsycologist</option>
                                        <option value="3">Service 3</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select class="form-select bg-light border-0" style="height: 55px;">
                                        <option selected>Select Doctor</option>
                                        <option value="1">Doctor Nameera</option>
                                        <option value="2">Doctor Marayam</option>
                                        <option value="3">Doctor hiba </option>
                                        <option value="4">Doctor bushra </option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control bg-light border-0" placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="date" id="date1" data-target-input="nearest">
                                        <input type="text"
                                            class="form-control bg-light border-0 datetimepicker-input"
                                            placeholder="Appointment Date" data-target="#date1" data-toggle="datetimepicker" style="height: 55px;">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="time" id="time1" data-target-input="nearest">
                                        <input type="text"
                                            class="form-control bg-light border-0 datetimepicker-input"
                                            placeholder="Appointment Time" data-target="#time1" data-toggle="datetimepicker" style="height: 55px;">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-dark w-100 py-3" type="submit">Make Appointment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    
    <!-- Appointment End -->


    <!-- Service Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5 mb-5">
                <div class="col-lg-5 wow zoomIn" data-wow-delay="0.3s" style="min-height: 400px;">
                    <div class="twentytwenty-container position-relative h-100 rounded overflow-hidden">
                        <img class="position-absolute w-100 h-100" src="img/sad.jpg" style="object-fit: cover;">
                        <img class="position-absolute w-100 h-100" src="img/happy.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-title mb-5">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">Our Services</h5>
                        <h1 class="display-5 mb-0">Reclaim Your Wellbeing: We Offer Top-Tier Rehab with Cutting-Edge VR Technology</h1>
                    </div>
                    <div class="row g-5">
                        <div class="col-md-6 service-item wow zoomIn" data-wow-delay="0.6s">
                            <div class="rounded-top overflow-hidden">
                                <img class="img-fluid" src="img/A5.jpg" alt="">
                            </div>
                            <div class="position-relative bg-light rounded-bottom text-center p-4">
                                <h5 class="m-0">Cognitive Behavioral Therapy</h5>
                            </div>
                        </div>
                        <div class="col-md-6 service-item wow zoomIn" data-wow-delay="0.9s">
                            <div class="rounded-top overflow-hidden">
                                <img class="img-fluid" src="img/A1.jpg" alt="">
                            </div>
                            <div class="position-relative bg-light rounded-bottom text-center p-4">
                                <h5 class="m-0">Dialectical Behavior Therapy (DBT)</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-7">
                    <div class="row g-5">
                        <div class="col-md-6 service-item wow zoomIn" data-wow-delay="0.3s">
                            <div class="rounded-top overflow-hidden">
                                <img class="img-fluid" src="img/A2.jpg" alt="">
                            </div>
                            <div class="position-relative bg-light rounded-bottom text-center p-4">
                                <h5 class="m-0">Neurological Physiotherapy</h5>
                            </div>
                        </div>
                        <div class="col-md-6 service-item wow zoomIn" data-wow-delay="0.6s">
                            <div class="rounded-top overflow-hidden">
                                <img class="img-fluid" src="img/A3.jpg" alt="">
                            </div>
                            <div class="position-relative bg-light rounded-bottom text-center p-4">
                                <h5 class="m-0">Orthopedic Physiotherapy</h5>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <!-- <div class="col-lg-5 service-item wow zoomIn" data-wow-delay="0.9s">
                    <div class="position-relative bg-primary rounded h-100 d-flex flex-column align-items-center justify-content-center text-center p-4">
                        <h3 class="text-white mb-3">Make Appointment</h3>
                        <p class="text-white mb-3">Clita ipsum magna kasd rebum at ipsum amet dolor justo dolor est magna stet eirmod</p>
                        <h2 class="text-white mb-0">+012 345 6789</h2>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Offer Start -->
    <div class="container-fluid bg-offer my-5 py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-7 wow zoomIn" data-wow-delay="0.6s">
                    <div class="offer-text text-center rounded p-5">
                        <h1 class="display-5 text-white">Save 50% On Your First Virtual Checkup</h1>
                        <p class="text-white mb-4">Experience the convenience and effectiveness of online consultations with our top-rated therapists.Don't miss this chance to connect with our expert therapists and explore personalized VR therapy options.  Call today to book your appointment!</p>
                        <a href="appointment.html" class="btn btn-dark py-3 px-5 me-3">Appointment</a>
                        <a href="" class="btn btn-light py-3 px-5">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Pricing Start -->
    {{-- <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5">
                    <div class="section-title mb-4">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">Pricing Plan</h5>
                        <h1 class="display-5 mb-0">We Offer Fair Prices for Our Treatment</h1>
                    </div>
                    <p class="mb-4">We prioritize fair and transparent pricing for our rehab plans. During your consultation, we'll create a personalized plan outlining services and costs so you can make informed decisions. We offer flexible payment options like self-pay, Card payment, and payment plans. Invest in your well-being, schedule a consultation today!</p>
                    
                </div>
                <div class="col-lg-7">
                    <div class="owl-carousel price-carousel wow zoomIn" data-wow-delay="0.9s">
                        <div class="price-item pb-4">
                            <div class="position-relative">
                                <img class="img-fluid rounded-top" src="img/A6.jpg" alt="">
                                <div class="d-flex align-items-center justify-content-center bg-light rounded pt-2 px-3 position-absolute top-100 start-50 translate-middle" style="z-index: 2;">
                                    <h2 class="text-primary m-0">1000Rs-1500Rs</h2>
                                </div>
                            </div>
                            <div class="position-relative text-center bg-light border-bottom border-primary py-5 p-4">
                                <h4>Cognitive behavorial therapy(CBT)</h4>
                                <hr class="text-primary w-50 mx-auto mt-0">
                                <div class="d-flex justify-content-between mb-3"><span>VR base exercise</span><i class="fa fa-check text-primary pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-3"><span>Professional Doctors</span><i class="fa fa-check text-primary pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-2"><span>24/7 chat Support</span><i class="fa fa-check text-primary pt-1"></i></div>
                                <a href="appointment.html" class="btn btn-primary py-2 px-4 position-absolute top-100 start-50 translate-middle">Appointment</a>
                            </div>
                        </div>
                        <div class="price-item pb-4">
                            <div class="position-relative">
                                <img class="img-fluid rounded-top" src="img/A9.jpg" alt="">
                                <div class="d-flex align-items-center justify-content-center bg-light rounded pt-2 px-3 position-absolute top-100 start-50 translate-middle" style="z-index: 2;">
                                    <h2 class="text-primary m-0">1000Rs-1800Rs</h2>
                                </div>
                            </div>
                            <div class="position-relative text-center bg-light border-bottom border-primary py-5 p-4">
                                <h4>Dialectical Behavior Therapy (DBT)</h4>
                                <hr class="text-primary w-50 mx-auto mt-0">
                                <div class="d-flex justify-content-between mb-3"><span>VR base exercise</span><i class="fa fa-check text-primary pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-3"><span>Professional Doctors</span><i class="fa fa-check text-primary pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-2"><span>24/7 Chat Support</span><i class="fa fa-check text-primary pt-1"></i></div>
                                <a href="appointment.html" class="btn btn-primary py-2 px-4 position-absolute top-100 start-50 translate-middle">Appointment</a>
                            </div>
                        </div>
                        <div class="price-item pb-4">
                            <div class="position-relative">
                                <img class="img-fluid rounded-top" src="img/A10.jpeg" alt="">
                                <div class="d-flex align-items-center justify-content-center bg-light rounded pt-2 px-3 position-absolute top-100 start-50 translate-middle" style="z-index: 2;">
                                    <h2 class="text-primary m-0">900RS-1800Rs</h2>
                                </div>
                            </div>
                            <div class="position-relative text-center bg-light border-bottom border-primary py-5 p-4">
                                <h4>Orthopedic Physiotherapy</h4>
                                <hr class="text-primary w-50 mx-auto mt-0">
                                <div class="d-flex justify-content-between mb-3"><span>VR Equipment</span><i class="fa fa-check text-primary pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-3"><span>Professional Doctors</span><i class="fa fa-check text-primary pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-2"><span>24/7 Chat Support</span><i class="fa fa-check text-primary pt-1"></i></div>
                                <a href="appointment.html" class="btn btn-primary py-2 px-4 position-absolute top-100 start-50 translate-middle">Appointment</a>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Pricing End -->


    <!-- Testimonial Start -->
    {{-- <div class="container-fluid bg-primary bg-testimonial py-5 my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="owl-carousel testimonial-carousel rounded p-5 wow zoomIn" data-wow-delay="0.6s">
                        <div class="testimonial-item text-center text-white">
                            <img class="img-fluid mx-auto rounded mb-4" src="img/testimonial-1.jpg" alt="">
                            <p class="fs-5">Psychologists like myself are constantly looking for ways to better serve our patients. This website's focus on virtual consultations is a game-changer.  By offering online appointments, patients with busy schedules or limited mobility can access the mental healthcare they deserve.  Virtual care also reduces costs for both patients (travel) and therapists (overhead).It's a fantastic initiative that will empower more people to reach their mental well-being goals!</p>
                            <hr class="mx-auto w-25">
                            <h4 class="text-white mb-0">Dr Maryam</h4>
                        </div>
                        <div class="testimonial-item text-center text-white">
                            <img class="img-fluid mx-auto rounded mb-4" src="img/testimonial-2.jpg" alt="">
                            <p class="fs-5">In my years as a physiotherapy, I've seen firsthand the challenges patients face in accessing consistent rehabilitation care.  Travel time, busy schedules, and even physical limitations can create barriers to recovery.  This website's focus on online consultations and VR therapy is a breath of fresh air!.</p>
                            <hr class="mx-auto w-25">
                            <h4 class="text-white mb-0">Dr Zara</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Testimonial End -->


    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.1s">
                    <div class="section-title bg-light rounded h-100 p-5">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">Our Doctors</h5>
                        <h1 class="display-6 mb-4">Meet Our Certified & Experienced Doctors</h1>
                        <a href="appointment.php" class="btn btn-primary py-3 px-5">Appointment</a>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="position-relative rounded-top" style="z-index: 1;">
                            <img class="img-fluid rounded-top w-100" src="img/team-1.jpg" alt="">
                            <div class="position-absolute top-100 start-50 translate-middle bg-light rounded p-2 d-flex">
                                <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
                            <h4 class="mb-2">Dr. Zara</h4>
                            <p class="text-primary mb-0">indsutrial Phsycologist</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                    <div class="team-item">
                        <div class="position-relative rounded-top" style="z-index: 1;">
                            <img class="img-fluid rounded-top w-100" src="img/team-2.jpg" alt="">
                            <div class="position-absolute top-100 start-50 translate-middle bg-light rounded p-2 d-flex">
                                <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
                            <h4 class="mb-2">Dr. Maryam Naeem</h4>
                            <p class="text-primary mb-0">Clinical Phsycologist</p>
                        </div>
                    </div>
                </div>
                <!--
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="position-relative rounded-top" style="z-index: 1;">
                            <img class="img-fluid rounded-top w-100" src="img/team-3.jpg" alt="">
                            <div class="position-absolute top-100 start-50 translate-middle bg-light rounded p-2 d-flex">
                                <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
                            <h4 class="mb-2">Dr. John Doe</h4>
                            <p class="text-primary mb-0">Implant Surgeon</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="position-relative rounded-top" style="z-index: 1;">
                            <img class="img-fluid rounded-top w-100" src="img/team-4.jpg" alt="">
                            <div class="position-absolute top-100 start-50 translate-middle bg-light rounded p-2 d-flex">
                                <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
                            <h4 class="mb-2">Dr. John Doe</h4>
                            <p class="text-primary mb-0">Implant Surgeon</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                    <div class="team-item">
                        <div class="position-relative rounded-top" style="z-index: 1;">
                            <img class="img-fluid rounded-top w-100" src="img/team-5.jpg" alt="">
                            <div class="position-absolute top-100 start-50 translate-middle bg-light rounded p-2 d-flex">
                                <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
                            <h4 class="mb-2">Dr. John Doe</h4>
                            <p class="text-primary mb-0">Implant Surgeon</p>
                        </div>
                        <!-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Newsletter Start -->
    
    {{-- <div class="container-fluid position-relative pt-5 wow fadeInUp" data-wow-delay="0.1s" style="z-index: 1;">
        <div class="container">
            <div class="bg-primary p-5">
                <form class="mx-auto" style="max-width: 600px;">
                    <h3>Subscribe to our Newsletter <h3>
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-3" placeholder="Your Email">
                        <button class="btn btn-dark px-4">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
    <!-- Newsletter End -->

@include('footer')

    
    <!-- CHATBOT CODE  -->
    <!-- <div id="chatbot-icon">
    <img src="chatbot-icon.png" alt="Chatbot Icon">
</div> -->
<!-- CHATBOT CODE -->

<!-- Chatbot button -->
    <!-- <button class="chatbot-button" id="chatbot-button" onclick="toggleChatbot()">
            <img class="chatbot-icon" src="img/chatbot-.png" alt="Chatbot">
        </button>
    

        Chatbot container
        <div class="chatbot-container" id="chatbot-container">
            <div class="chatbot-header">
                <span>Chatbot</span>
                <button class="close-button" onclick="closeChatbot()">X</button>
            </div>
            <div class="chatbot-body" id="chatbot-body">
                <div class="message other">
                    <div class="message-content">
                        Hello! How can I assist you?
                    </div>
                </div>
            </div>
            <div class="chatbot-input">
                <input type="text" id="chatbot-input" placeholder="Type your message...">
                <button onclick="sendMessage()">Send</button>
            </div>
        </div>

        <script>
            function toggleChatbot() {
                var chatbotContainer = document.getElementById('chatbot-container');
                var chatbotButton = document.getElementById('chatbot-button');
                if (chatbotContainer.style.display === 'none' || chatbotContainer.style.display === '') {
                    chatbotContainer.style.display = 'block';
                    chatbotButton.style.display = 'none';
                } else {
                    chatbotContainer.style.display = 'none';
                    chatbotButton.style.display = 'block';
                }
            }

            function closeChatbot() {
                var chatbotContainer = document.getElementById('chatbot-container');
                var chatbotButton = document.getElementById('chatbot-button');
                chatbotContainer.style.display = 'none';
                chatbotButton.style.display = 'block';
            }

            function sendMessage() {
                var messageInput = document.getElementById('chatbot-input').value.trim();
                if (messageInput !== '') {
                    appendMessage('self', messageInput);
                    document.getElementById('chatbot-input').value = '';
                    // Here you would typically send the message to your backend or process it
                    // with your chatbot and receive a response.
                    // For demonstration purposes, I'll simulate a response after a delay.
                    setTimeout(function() {
                        var response = "This is a placeholder response from the bot.";
                        appendMessage('other', response);
                    }, 1000);
                }
            }

            function appendMessage(sender, message) {
                var chatBody = document.getElementById('chatbot-body');
                var messageClass = sender === 'self' ? 'self' : 'other';
                var messageDiv = document.createElement('div');
                messageDiv.classList.add('message', messageClass);
                var messageContent = document.createElement('div');
                messageContent.classList.add('message-content');
                messageContent.textContent = message;
                messageDiv.appendChild(messageContent);
                chatBody.appendChild(messageDiv);
                chatBody.scrollTop = chatBody.scrollHeight; // Scroll to bottom
            }
        </script> -->



        <script src="https://cdn.botpress.cloud/webchat/v2.1/inject.js"></script>
        <script src="https://mediafiles.botpress.cloud/073ae091-2b73-4d40-92d3-01b67eab1e30/webchat/v2.1/config.js"></script> 
 

    <!-- <script>
        function toggleChatbot() {
            var chatbotContainer = document.querySelector('.bp-widget-web');
            var chatbotButton = document.getElementById('chatbot-button');
            if (chatbotContainer.style.display === 'none' || chatbotContainer.style.display === '') {
                chatbotContainer.style.display = 'block';
                chatbotButton.style.display = 'none';
            } else {
                chatbotContainer.style.display = 'none';
                chatbotButton.style.display = 'block';
            }
        }
    </script> -->
</body>
</html>
    <!-- Back to Top -->
    <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a> -->


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="lib/twentytwenty/jquery.event.move.js"></script>
    <script src="lib/twentytwenty/jquery.twentytwenty.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>