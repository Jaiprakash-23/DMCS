
@extends('layouts.app')
@section('content')
@include('layouts.admin-sidebar')

	<!-- Page Wrapper -->
            <div class="page-wrapper">

				<!-- Page Content -->
                <div class="content container-fluid">

					<!-- Page Title -->
					<div class="row">
						<div class="col">
							<h4 class="page-title">Employee</h4>
						</div>
						<div class="col-auto text-right float-right ml-auto m-b-30">
							<!--<a href="add-my_profile.php" class="btn add-btn"><i class="fa fa-plus"></i> Add Employee</a>-->
							<div class="view-icons">
								<a href="allemploy.php" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
								<a href="{{route('allemploy_list_section')}}" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
							</div>
						</div>
					</div>
					<!-- /Page Title -->

					<!-- Search Filter -->
					<div class="row filter-row">
						<div class="col-sm-6 col-md-3">
							<div class="form-group form-focus">
								<input type="text" class="form-control floating">
								<label class="focus-label">Employee ID</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group form-focus">
								<input type="text" class="form-control floating">
								<label class="focus-label">Employee Name</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group form-focus select-focus">
								<select class="select floating">
									<option>Select Designation</option>
									<option>Web Developer</option>
									<option>Web Designer</option>
									<option>Android Developer</option>
									<option>Ios Developer</option>
								</select>
								<label class="focus-label">Designation</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<a href="#" class="btn btn-success btn-block"> Search </a>
						</div>

                    </div>
					<!-- Search Filter -->

					<div class="row staff-grid-row">
                        @foreach ($all_employee_report as $allemp)
                        <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
							<div class="profile-widget">
								<div class="profile-img">
									<a href="my_profile.php" class="avatar"><img src="assets/img/profiles/avatar-02.jpg" alt=""></a>
								</div>
								<div class="dropdown profile-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="edit_employ.php" ><i class="fa fa-pencil m-r-5"></i> Edit</a>
										<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
									</div>
								</div>
								<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="my_profile.php">{{$allemp->fullname}}</a></h4>
								<div class="small text-muted">{{$allemp->designation}}</div>
							</div>
						</div>
                        @endforeach



					</div>
                </div>
				<!-- /Page Content -->



            </div>
			<!-- /Page Wrapper -->
@endsection
