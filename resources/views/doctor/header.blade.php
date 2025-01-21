<header class="header">
    <nav class="navbar navbar-expand-lg header-nav">
        <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
            <a href="doctor-dashboard.html" class="navbar-brand logo">
                <img src="../dassets/img/only mindflex 201x52.jpg" class="img-fluid" alt="Logo">
                <!-- idhr image logo hy mindflex ka upper code -->
            </a>
        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="index-2.html" class="menu-logo">
                    <img src="../dassets/img/Mindflex logo 201x52.png" class="img-fluid" alt="Logo">
                </a>
                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                    <i class="fas fa-times"></i>
                </a>
            </div>
            <ul class="main-nav">
                <li>
                    <a href="index-2.html">Home</a>
                    <!-- carefully home tag rkhrhi hoon idhr home page connect krna upr okay upper code -->
                </li>
                <li class="has-submenu active">
                    <a href="#">Doctor <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li class="active"><a href="{{ route('doctorhomepage') }}">Doctor Dashboard</a></li>
                        <li><a href="{{ route('dappointment') }}">Appointments</a></li>
                        <li><a href="my-patients.html">Patients List</a></li>
                        <li><a href="chat-doctor.html">Chat</a></li>
                        {{-- <li><a href="invoices.html">Invoices</a></li> --}}
                        <li><a href="{{ route('dprofile') }}">Profile Settings</a></li>
                        <li><a href="reviews.html">Reviews</a></li>
                    </ul>
                </li>
                <li class="login-link">
                    <a href="login.html">Login / Signup</a>
                </li>
            </ul>
        </div>
        <ul class="nav header-navbar-rht">
            <li class="nav-item welcome-dr">
                <span class="nav-link">Welcome, Dr. {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
            </li>
            {{-- <li class="nav-item contact-item">
                <div class="header-contact-img">
                    <i class="far fa-hospital"></i>
                </div>
                <div class="header-contact-detail">
                    <p class="contact-header">Contact</p>
                    <p class="contact-info-header"> +1 315 369 5943</p>
                </div>
            </li> --}}

            <!-- User Menu -->
            <li class="nav-item dropdown has-arrow logged-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <span class="user-img">
                        <?php
                    
                    
                        $user = Auth::user();
    $doctor = $user->doctor; 
    
    ?>
                    {{-- @dd($doctor->image) --}}
                    <img src="{{ asset('images/' . $doctor->image) }}" alt="User Image">
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="user-header">
                        <div class="avatar avatar-sm">
                            <img src="{{ asset('images/' . $doctor->image) }}" alt="User Image">

                        </div>
                        <div class="user-text">
                            <h6> {{ Auth::user()->first_name}} {{ Auth::user()->last_name}}</h6>
                            <p class="text-muted mb-0">{{ Auth::user()->type}}</p>
                        </div>
                    </div>
                    <div>
                        <a class="dropdown-item" href="{{ route('doctorhomepage') }}">Dashboard</a>
                        <a class="dropdown-item" href="{{ route('dprofile') }}">Profile Settings</a>
                    
                        <form action="{{ route('adminlogout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button class="dropdown-item" type="submit">Logout</button>
                        </form>
                    </div>
            </li>
            <!-- /User Menu -->

        </ul>
    </nav>
</header>