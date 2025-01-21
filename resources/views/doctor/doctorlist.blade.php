<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Mindflex Rehab</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/feathericon.min.css') }}">

    <!-- Morris CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
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
                        <div class="col-sm-7 col-auto">
                            <h3 class="page-title">Doctor List</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Doctors</li>
                            </ul>
                        </div>
                        <div class="col-sm-5 col">
                            <a href="{{ route('admin.createdoctor') }}" class="btn btn-primary float-right mt-2">Create
                                Doctor</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <!-- Search Bar -->
                <div class="row mb-3">
                    <div class="col-md-6 offset-md-3">
                        <input type="text" id="searchBar" class="form-control" placeholder="Search by Name, Email, or Gender">
                    </div>
                </div>
                <!-- /Search Bar -->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="datatable table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Age</th>
                                                <th>Email</th>
                                                <th>Type</th>
                                                <th>User Name</th>
                                                <th>Gender</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                            <tr id="doctor-{{ $user->id }}">
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                                <td>{{ $user->age }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->type }}</td>
                                                <td>{{ $user->user_name }}</td>
                                                <td>{{ $user->gender }}</td>
                                                <td class="text-right">
                                                    @if($user->type !== 'admin')
                                                    {{-- <a href="#" class="btn btn-sm bg-success-light">
                                                        <i class="fe fe-pencil"></i> Edit
                                                    </a> --}}
                                                    <button type="button" class="btn btn-sm bg-danger-light delete-btn" data-id="{{ $user->id }}" data-toggle="modal" data-target="#Delete_Doctor_Details">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </button>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Wrapper -->

        <div class="modal fade" id="Delete_Doctor_Details" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-content p-2">
                            <h4 class="modal-title">Delete</h4>
                            <p class="mb-4">Are you sure you want to delete this doctor?</p>
                            <form id="deleteDoctorForm" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">Yes, Delete</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Datatables JS -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <!-- Search Bar Script -->
    <script>
        $(document).ready(function() {
            $('#searchBar').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('table tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });

            var deleteForm = $('#deleteDoctorForm');
            var doctorId;

            $('.delete-btn').on('click', function() {
                doctorId = $(this).data('id');
                var url = '{{ route("admin.deletedoctor", ":id") }}'.replace(':id', doctorId);
                deleteForm.attr('action', url);
            });

            deleteForm.on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: deleteForm.attr('action'),
                    type: 'DELETE',
                    data: deleteForm.serialize(),
                    success: function(response) {
                        if (response.success) {
                            $('#doctor-' + doctorId).remove();
                            $('#Delete_Doctor_Details').modal('hide');
                            window.location.reload();
                        } else {
                            alert('Failed to delete doctor: ' + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                        alert('An error occurred while deleting the doctor.');
                    }
                });
            });
        });
    </script>
</body>

</html>
