<!DOCTYPE html>
<html lang="en">
@include('doctor.head')
@include('layout.app')

<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        @include('doctor.header')

        <!-- Breadcrumb -->
        <div class="breadcrumb-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-12 col-12">
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">My Patients</li>
                            </ol>
                        </nav>
                        <h2 class="breadcrumb-title">My Patients</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->

        <!-- Page Content -->
        <div class="content">
            <div class="container-fluid">
                <!-- Search Bar -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <input
                            type="text"
                            id="patient-search"
                            class="form-control"
                            placeholder="Search patients by name or ID..."
                            onkeyup="filterPatients()"
                        />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
                        <!-- Profile Sidebar -->
                        @include('doctor.siderbar')
                        <!-- /Profile Sidebar -->
                    </div>

                    <!-- Dynamic Content with foreach -->
                    <div class="col-md-7 col-lg-8 col-xl-9" id="patient-list">
                        @foreach($patients as $patient)
                        <div class="col-md-6 col-lg-4 col-xl-3 patient-card" data-name="{{ strtolower($patient->first_name . ' ' . $patient->last_name) }}" data-id="{{ $patient->patient_id }}">
                            <div class="card widget-profile pat-widget-profile">
                                <div class="card-body">
                                    <div class="pro-widget-content">
                                        <div class="profile-info-widget">
                                            <a href="#" class="booking-doc-img">
                                                <img src="./passets/img/patients/images.png" alt="User Image">
                                            </a>
                                            <div class="profile-det-info">
                                                <h3>{{ $patient->first_name }} {{ $patient->last_name }}</h3>
                                                <div class="patient-details">
                                                    <h5><b>Patient ID :</b> {{ $patient->patient_id }}</h5>
                                                    <h5 class="mb-0">{{ $patient->user_name }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="patient-info">
                                        <ul>
                                            <li>Type <span>{{ $patient->type }}</span></li>
                                            <li>Age <span>{{ $patient->age }} Years</span></li>
                                            <li>Gender <span>{{ $patient->gander }}</span></li>
                                            <li>Email <span>{{ $patient->email }}</span></li>
                                        </ul>
                                    </div>
                    
                                    <!-- Buttons for Message and Medical History -->
                                    <div class="text-center mt-3">
                                        <!-- Message Button -->
                                        <form action="{{ route('start.chat') }}" method="POST" style="display: inline;">
                                            @csrf
                                            <input type="hidden" name="doctor_id" value="{{ auth()->user()->id }}">
                                            <input type="hidden" name="patient_id" value="{{ $patient->patient_id }}">
                                            <button type="submit" class="btn btn-primary">Message</button>
                                        </form>
<br><br>
                                        <!-- Medical History Button -->
                                        <form action="{{ route('medical-history.create') }}" method="GET" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-secondary">Medical History</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>

    <!-- Search Filtering Script -->
    <script>
        function filterPatients() {
            const searchInput = document.getElementById('patient-search').value.toLowerCase();
            const patientCards = document.querySelectorAll('.patient-card');

            patientCards.forEach(card => {
                const name = card.getAttribute('data-name');
                const id = card.getAttribute('data-id');

                if (name.includes(searchInput) || id.includes(searchInput)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>
