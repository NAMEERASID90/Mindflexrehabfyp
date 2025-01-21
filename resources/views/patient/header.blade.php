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
      <a href="index-2.html" class="navbar-brand logo">
        <img src="../passets/img/only mindflex 201x52.jpg" class="img-fluid" alt="Logo">
      </a>
    </div>
    <div class="main-menu-wrapper">
      <div class="menu-header">
        <a href="index-2.html" class="menu-logo">
          <img src="../passets/img/only mindflex 201x52.jpg" class="img-fluid" alt="Logo">
        </a>
        <a id="menu_close" class="menu-close" href="javascript:void(0);">
          <i class="fas fa-times"></i>
        </a>
      </div>
      <ul class="main-nav">
        <li>
          <a href="{{ route('patientview') }}">Home</a>
        </li>
          
        <li class="has-submenu active">
          <a href="{{ route('patientview') }}">Patients <i class="fas fa-chevron-down"></i></a>
          <ul class="submenu">
            <li><a href="search.html">Search Doctor</a></li>
            <li><a  href="{{ route('doctorview') }}">Doctor Profile</a></li>
            <li class="active"><a href="patient-dashboard.html">Patient Dashboard</a></li>
            <li><a href="chat.html">Chat</a></li>
            <li><a href="{{ route('pprofile') }}">Profile Settings</a></li>
            <li><a  href="{{ route('changepass') }}">Change Password</a></li>
          </ul>
        </li>	
        
        
        <li class="login-link">
          <a href="login.html">Login / Signup</a>
        </li>
      </ul>
    </div>		 
    <ul class="nav header-navbar-rht">
      <li class="nav-item contact-item">
        <div class="header-contact-img">
        					
        </div>
        <li class="nav-item welcome-item">
          <p class="welcome-text">Welcome, {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>
        </li>
        {{-- <div class="header-contact-detail">
          <p class="contact-header">Contact</p>
          <p class="contact-info-header"> +1 315 369 5943</p>
        </div> --}}
      </li>
      
      <!-- User Menu -->
      <li class="nav-item dropdown has-arrow logged-item">
        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
          <span class="user-img">
            <img class="rounded-circle" src="../passets/img/patients/images.png" width="31" alt="Ryan Taylor">
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="user-header">
            <div class="avatar avatar-sm">
              <img src="../passets/img/patients/images.png" alt="User Image" class="avatar-img rounded-circle">
            </div>
            <div class="user-text">
              <h6>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h6>
              <p class="text-muted mb-0">{{ auth()->user()->type }}</p>
            </div>
          </div>
          <a class="dropdown-item" href="{{ route('patientview') }}">Dashboard</a>
          <a class="dropdown-item" href="{{ route('pprofile') }}">Profile Settings</a>
          <form action="{{ route('adminlogout') }}" method="POST" style="display: inline;">
            @csrf
            <button class="dropdown-item" type="submit">
                Logout
            </button>
        </form>
        </div>
      </li>
      <!-- /User Menu -->
      
    </ul>
  </nav>
</header>