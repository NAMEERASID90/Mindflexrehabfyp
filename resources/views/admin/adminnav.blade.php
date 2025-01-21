<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                {{-- <li class="menu-title"> 
                    <span>Main</span>
                </li> --}}
                <li class="{{ request()->routeIs('admin.homepage') ? 'active' : '' }}">
                    <a href="{{ route('admin.homepage') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                <li class="{{ request()->routeIs('admin.adminappointment') ? 'active' : '' }}">
                    <a href="{{ route('admin.adminappointment') }}"><i class="fe fe-layout"></i> <span>Appointments</span></a>
                </li>
                <li class="{{ request()->routeIs('specialities.index') ? 'active' : '' }}">
                    <a href="{{ route('specialities.index') }}"><i class="fe fe-users"></i> <span>Specialities</span></a>
                </li>
                <li class="{{ request()->routeIs('admin.doctorlist') ? 'active' : '' }}">
                    <a href="{{ route('admin.doctorlist') }}"><i class="fe fe-user-plus"></i> <span>Doctors</span></a>
                </li>
                <li class="{{ request()->routeIs('patients.index') ? 'active' : '' }}">
                    <a href="{{ route('patients.index') }}"><i class="fe fe-user"></i> <span>Patients</span></a>
                </li>
                {{-- <li class="{{ request()->routeIs('admin.reviews') ? 'active' : '' }}">
                    <a href="reviews.html"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
                </li>
                <li class="{{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                    <a href="{{ route('admin.settings') }}"><i class="fe fe-vector"></i> <span>Settings</span></a>
                </li> --}}
                
                
                {{-- <li class="menu-title"> 
                    <span>Pages</span>
                </li>
                <li> 
                    <a href="{{ route('admin.profile') }}"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
                </li> --}}
                
                
            </ul>
        </div>
    </div>
</div>