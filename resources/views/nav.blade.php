<nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
    <a href="#" class="navbar-brand p-0">
        <h1 class="m-0 text-primary"><i class="fa fa-brain me-2"></i>Mindflex Rehabilitation</h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a  href="{{ route('home') }}"class="nav-item nav-link">Home</a>
            {{-- <a href="" class="nav-item nav-link">Blog</a> --}}
            <a href="{{ route('about') }}" class="nav-item nav-link">About</a>

            <a href="{{ route('service') }}" class="nav-item nav-link">Service</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu m-0">
                    {{-- <a href="{{ route('price') }}" class="nav-item nav-link">price</a> --}}
                    <a href="{{ route('doctors') }}" class="nav-item nav-link">Our Doctors</a>
                    <a href="{{ route('testimonals') }}" class="nav-item nav-link">Testimonals</a>
                    {{-- <a href="{{ route('appointment') }}" class="nav-item nav-link">Appointment</a> --}}
                </div>
            </div>
            <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
        </div>
        <button type="button" class="btn text-dark" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
        <!-- <a href="loginform.html" class="btn btn-primary py-2 px-4 ms-3">Login</a> -->
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle py-2 px-4 ms-3" type="button" id="loginDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              Login
            </button>
            <ul class="dropdown-menu" aria-labelledby="loginDropdown">
                <li><a class="dropdown-item" href="{{ route('doctorlogin') }}">Doctor</a></li>
                <li><a class="dropdown-item" href="{{ route('patientlogin') }}">Patient</a></li>
                <li><a class="dropdown-item"href="{{ route('login') }}">Admin</a></li> 
            </ul>
          </div>
    </div>
</nav>