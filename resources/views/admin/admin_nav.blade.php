   <!-- Navbar Start -->
   <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
    <a href="index.php" class="navbar-brand p-0">
        <h1 class="m-0 text-primary"><i class="fa fa-brain me-2"></i>Mindflex Rehabilitation</h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="{{ route('admin.homepage') }}" class="nav-item nav-link">All users </a>
            <a href="{{ route('admin.doctorlist') }}" class="nav-item nav-link">Doctors</a>
            <a href="about.html" class="nav-item nav-link">Requests</a>
            <a href="service.html" class="nav-item nav-link">Appointment List</a>
           
            <form action="{{ route('adminlogout') }}" method="POST">
              @csrf
              <button class="btn btn-primary py-2 px-4 ms-3" type="submit" style="margin-top: 4px;">
                Logout</button>
          </form>
        </div>
   
    </div>
</nav>