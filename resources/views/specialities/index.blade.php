<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:20 GMT -->

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

	<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
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
							<h3 class="page-title">Specialities</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
								<li class="breadcrumb-item active">Specialities</li>
							</ul>
						</div>
						<div class="col-sm-5 col">
							<a href="#Add_Specialities_details" data-toggle="modal"
								class="btn btn-primary float-right mt-2">Add</a>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				<div class="row">
					<div class="col-sm-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table class="datatable table table-hover table-center mb-0">
										<thead>
											<tr>
												<th>#</th>
												<th>Specialities</th>
												<th class="text-right">Actions</th>
											</tr>
										</thead>
										<tbody>
											@foreach($specialities as $speciality)
											<tr>
												<td>#{{ $speciality->id }}</td>
												<td>
													<h2 class="table-avatar">
														<a href="javascript:void(0);" class="avatar avatar-sm mr-2">
															<img class="avatar-img" src="{{ asset($speciality->image) }}" alt="">
														</a>
														<a href="javascript:void(0);">{{ $speciality->name }}</a>
													</h2>
												</td>
												<td class="text-right">
													{{-- <div class="actions">
														{{-- <a class="btn btn-sm bg-success-light" data-toggle="modal" href="#edit_specialities_details_{{ $speciality->id }}">
															<i class="fe fe-pencil"></i> Edit
														</a>
														<a data-toggle="modal" href="#delete_modal_{{ $speciality->id }}" class="btn btn-sm bg-danger-light">
															<i class="fe fe-trash"></i> Delete
														</a> --}}
													{{-- </div> --}} 
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


		<!-- Add Modal -->
		<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add Specialities</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{ route('specialities.store') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="row form-row">
								<div class="col-12 col-sm-6">
									<div class="form-group">
										<label for="speciality_name">Speciality Name <span style="color: red;">*</span></label>
										<input type="text" name="name" class="form-control" required value="">
									</div>
								</div>
								<div class="col-12 col-sm-6">
									<div class="form-group">
										<label>Image</label>
										<input type="file" name="image" class="form-control" required  value="">
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
						</form>

					</div>
				</div>
			</div>
		</div>
		<!-- /ADD Modal -->

		<!-- Edit Details Modal -->
		<div class="modal fade" id="edit_specialities_details" aria-hidden="true" role="dialog">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Specialities</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						{{-- <form action="{{ route('specialities.update', $speciality->id) }}" method="POST"
							enctype="multipart/form-data">
							@csrf
							<div class="row form-row">
								<div class="col-12 col-sm-6">
									<div class="form-group">
										<label>Speciality Name</label>
										<input type="text" name="name" class="form-control"
											value="{{ $speciality->name }}" required>
									</div>
								</div>
								<div class="col-12 col-sm-6">
									<div class="form-group">
										<label>Image</label>
										<input type="file" name="image" class="form-control">
										@if($speciality->image_path)
										<img src="{{ asset($speciality->image_path) }}" alt="speciality image"
											width="50">
										@endif
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
						</form> --}}

					</div>
				</div>
			</div>
		</div>
		<!-- /Edit Details Modal -->

		<!-- Delete Modal -->
		<div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<!--	<div class="modal-header">
							<h5 class="modal-title">Delete</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>-->
					<div class="modal-body">
						<div class="form-content p-2">
							<h4 class="modal-title">Delete</h4>
							<p class="mb-4">Are you sure want to delete?</p>
							<button type="button" class="btn btn-primary">Save </button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Delete Modal -->
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
</body>
<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/specialities.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:51 GMT -->

</html>