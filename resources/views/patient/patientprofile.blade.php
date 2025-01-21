
<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
    <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="#" class="booking-doc-img">
                    <img src="{{ asset('passets/img/patients/images.png') }}" alt="User Image">

                </a>
                <div class="profile-det-info">
                    <h3>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h3>
                    <div class="patient-details">
                        <h5><i class="fas fa-birthday-cake"></i>{{ auth()->user()->created_at }}</h5>
                        <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i>{{ auth()->user()->email }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-widget">
            <nav class="dashboard-menu">
                <ul>
                    <li class="{{ Route::currentRouteName() == 'patientview' ? 'active' : '' }}">
                        <a href="{{ route('patientview') }}">
                            <i class="fas fa-columns"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    
                    <li class="{{ Route::currentRouteName() == 'doctorview' ? 'active' : '' }}">
                        <a href="{{ route('doctorview') }}">
                            <i class="fas fa-user-md"></i>
                            <span>Doctors</span>
                        </a>
                    </li>
                    
                    <li class="{{ Route::currentRouteName() == 'pappointment' ? 'active' : '' }}">
                        <a href="{{ route('pappointment') }}">
                            <i class="fas fa-calendar-check"></i>
                            <span>Appointments</span>
                        </a>
                    </li>
                    
                    
                    
                    {{-- <li class="{{ request()->is('chat.html') ? 'active' : '' }}">
                        <a href="chat.html">
                            <i class="fas fa-comments"></i>
                            <span>Message</span>
                            <small class="unread-msg">23</small>
                        </a>
                    </li> --}}
                    
                    <li class="{{ Route::currentRouteName() == 'pprofile' ? 'active' : '' }}">
                        <a href="{{ route('pprofile') }}">
                            <i class="fas fa-user-cog"></i>
                            <span>Profile Settings</span>
                        </a>
                    </li>
                    
                    <li class="{{ Route::currentRouteName() == 'changepass' ? 'active' : '' }}">
                        <a href="{{ route('changepass') }}">
                            <i class="fas fa-lock"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                    
                    <li>
                        <form action="{{ route('adminlogout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit"
                                style="border: none; background: none; padding: 20px 16px; margin: 0; cursor: pointer; color: inherit; font: inherit; display: flex; align-items: center;     font-size: 16px;margin-right: 10px;width: 16px">
                                <i class="fas fa-sign-out-alt"></i>
                                <span style="margin-left: 16px;">Logout</span>
                            </button>
                        </form>
                    </li>
                    
                    {{-- <li>
                        <form action="{{ route('adminlogout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button class="dropdown-item" type="submit">
                                <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                            </button>
                        </form>
                    </li> --}}
                </ul>
            </nav>
        </div>

    </div>
</div>