<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Mindflex Rehab</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="assets/css/feathericon.min.css">

    <link rel="stylesheet" href="assets/plugins/morris/morris.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        @include('admin.header')
        <!-- /Header -->

        <!-- Sidebar -->
        @include('admin.adminnav')
        <!-- /Sidebar -->

        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Appointments</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Appointments</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-md-12">

                        <!-- Search Bar -->
                        <div class="mb-3">
                            <input type="text" id="searchBar" class="form-control" placeholder="Search by Patient Name, Appointment Date, or Time">
                        </div>
                        <!-- /Search Bar -->

                        <!-- Recent Orders -->
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="datatable table table-hover table-center mb-0" id="appointmentTable">
                                        <thead>
                                            <tr>
                                                <th>Doctor Name</th>
                                                <th>Speciality</th>
                                                <th>Patient Name</th>
                                                <th>Date</th>
                                                <th>Appointment Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($appointments as $appointment)
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{ url('doctor-profile', $appointment->doctor_id) }}"
                                                            class="avatar avatar-sm mr-2">
                                                            <img class="img-fluid" alt="User Image"
                                                                src="{{ asset('images/' . $appointment->image) }}">
                                                        </a>
                                                        <a href="#">
                                                            Dr. {{ $appointment->first_name }} {{ $appointment->last_name }}
                                                            <span>{{ $appointment->name }}</span>
                                                        </a>
                                                    </h2>
                                                </td>
                                                <td>{{ $appointment->name }}</td>
                                                <td>{{ $appointment->patient_name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($appointment->created_at)->format('d M Y') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('H:i A') }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /Recent Orders -->

                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Datatables JS -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/datatables.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>

    <script>
        // Search functionality
        document.getElementById('searchBar').addEventListener('keyup', function () {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('#appointmentTable tbody tr');

            rows.forEach(row => {
                const patientName = row.cells[2].innerText.toLowerCase();
                const appointmentDate = row.cells[3].innerText.toLowerCase();
                const appointmentTime = row.cells[4].innerText.toLowerCase();

                if (patientName.includes(searchValue) || appointmentDate.includes(searchValue) || appointmentTime.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>

</body>

</html>
