<div class="profile-sidebar">
    <div class="widget-profile pro-widget-content">
        <div class="profile-info-widget">
            <a href="#" class="booking-doc-img">

                <?php
                    
                    
                    $user = Auth::user();
                    $doctor = $user->doctor; 

                 ?>
                {{-- @dd($doctor->image) --}}
                <img src="{{ asset('images/' . $doctor->image) }}" alt="User Image">
            </a>
            <div class="profile-det-info">
                <h3>{{ Auth::user()->first_name}} {{ Auth::user()->last_name}}</h3>

                <div class="patient-details">
                    <h5 class="mb-0">{{ Auth::user()->type}}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-widget">
        <nav class="dashboard-menu">
            <ul>
                {{-- <li>
                    <a href="{{ route('doctorhomepage') }}">
                        <i class="fas fa-columns"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="active">
                    <a href="{{ route('dappointment') }}">
                        <i class="fas fa-calendar-check"></i>
                        <span>Appointments</span>
                    </a>
                </li>
                <li>
                    <a href="my-patients.html">
                        <i class="fas fa-user-injured"></i>
                        <span>My Patients</span>
                    </a>
                </li> --}}


                {{-- <li>
                    <a href="chat-doctor.html">
                        <i class="fas fa-comments"></i>
                        <span>Message</span>
                        <small class="unread-msg">23</small>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dprofile') }}">
                        <i class="fas fa-user-cog"></i>
                        <span>Profile Settings</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('chngepass') }}">
                        <i class="fas fa-lock"></i>
                        <span>Change Password</span>
                    </a>
                </li> --}}
                <li class="{{ request()->routeIs('doctorhomepage') ? 'active' : '' }}">
                    <a href="{{ route('doctorhomepage') }}">
                        <i class="fas fa-columns"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('dappointment') ? 'active' : '' }}">
                    <a href="{{ route('dappointment') }}">
                        <i class="fas fa-calendar-check"></i>
                        <span>Appointments</span>
                    </a>
                </li>

                <li class="{{ request()->is('my-patients.html') ? 'active' : '' }}">
                    <a href="{{ route('mypatient') }}">
                        <i class="fas fa-user-injured"></i>
                        <span>My Patients</span>
                    </a>
                </li>

                {{-- <li class="{{ request()->is('chat-doctor.html') ? 'active' : '' }}">
                    <a href="chat-doctor.html">
                        <i class="fas fa-comments"></i>
                        <span>Message</span>
                        <small class="unread-msg">23</small>
                    </a>
                </li> --}}

                <li class="{{ Route::currentRouteName() == 'exercise' ? 'active' : '' }}">
                    <a href="{{ route('exercise') }}">
                        <i class="fas fa-dumbbell"></i>
                        <span>Exercise</span>
                    </a>
                </li>

                {{-- <li class="{{ request()->routeIs('medical-history.create') ? 'active' : '' }}">
                    <a href="{{ route('medical-history.create') }}">
                        <i class="fas fa-user-cog"></i>
                        <span>Patient's Medical History</span>
                    </a>
                </li> --}}

                <li class="{{ request()->routeIs('dprofile') ? 'active' : '' }}">
                    <a href="{{ route('dprofile') }}">
                        <i class="fas fa-user-cog"></i>
                        <span>Profile Settings</span>
                    </a>
                </li>


                <li class="{{ request()->routeIs('chngepass') ? 'active' : '' }}">
                    <a href="{{ route('chngepass') }}">
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
            </ul>
        </nav>
    </div>
</div>