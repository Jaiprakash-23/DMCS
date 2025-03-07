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
						<h4 class="page-title">Clients</h4>
					</div>
					<div class="col-12 text-right m-b-30">
						<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_client"><i class="fa fa-plus"></i> Add Client</a>
						<div class="view-icons">
							<a href="all_location.php" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
							<a href="all_location_list.php" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
						</div>
					</div>
				</div>
				<!-- /Page Title -->

				<!-- Search Filter -->
				<div class="row filter-row">
					<div class="col-sm-6 col-md-3">
						<div class="form-group form-focus">
							<input type="text" class="form-control floating">
							<label class="focus-label">Client ID</label>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="form-group form-focus">
							<input type="text" class="form-control floating">
							<label class="focus-label">Client Name</label>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="form-group form-focus select-focus">
							<select class="select floating">
								<option>Select Company</option>
								<option>Global Technologies</option>
								<option>Delta Infotech</option>
							</select>
							<label class="focus-label">Company</label>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<a href="#" class="btn btn-success btn-block"> Search </a>
					</div>
				</div>
				<!-- Search Filter -->

				<div class="row staff-grid-row">
					<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
						<div class="profile-widget">
							<div class="profile-img">
								<a href="client_details.php" class="avatar"><img alt="" src="assets/img/profiles/avatar-19.jpg"></a>
							</div>
							<div class="dropdown profile-action">
								<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
							</div>
							</div>
							<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client_details.php">Global Technologies</a></h4>
							<h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client_details.php">Barry Cuda</a></h5>
							<div class="small text-muted">CEO</div>
							<a href="chat.html" class="btn btn-white btn-sm m-t-10">Message</a>
							<a href="client_details.php" class="btn btn-white btn-sm m-t-10">View Profile</a>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
						<div class="profile-widget">
							<div class="profile-img">
								<a href="client_details.php" class="avatar"><img alt="" src="assets/img/profiles/avatar-29.jpg"></a>
							</div>
							<div class="dropdown profile-action">
								<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
							</div>
							</div>
							<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client_details.php">Delta Infotech</a></h4>
							<h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client_details.php">Tressa Wexler</a></h5>
							<div class="small text-muted">Manager</div>
							<a href="chat.html" class="btn btn-white btn-sm m-t-10">Message</a>
							<a href="client_details.php" class="btn btn-white btn-sm m-t-10">View Profile</a>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
						<div class="profile-widget">
							<div class="profile-img">
								<a href="client_details.php" class="avatar"><img src="assets/img/profiles/avatar-07.jpg" alt=""></a>
							</div>
							<div class="dropdown profile-action">
								<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
							</div>
							</div>
							<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client_details.php">Cream Inc</a></h4>
							<h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client_details.php">Ruby Bartlett</a></h5>
							<div class="small text-muted">CEO</div>
							<a href="chat.html" class="btn btn-white btn-sm m-t-10">Message</a>
							<a href="client_details.php" class="btn btn-white btn-sm m-t-10">View Profile</a>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
						<div class="profile-widget">
							<div class="profile-img">
								<a href="client_details.php" class="avatar"><img src="assets/img/profiles/avatar-06.jpg" alt=""></a>
							</div>
							<div class="dropdown profile-action">
								<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
							</div>
							</div>
							<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client_details.php">Wellware Company</a></h4>
							<h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client_details.php">Misty Tison</a></h5>
							<div class="small text-muted">CEO</div>
							<a href="chat.html" class="btn btn-white btn-sm m-t-10">Message</a>
							<a href="client_details.php" class="btn btn-white btn-sm m-t-10">View Profile</a>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
						<div class="profile-widget">
							<div class="profile-img">
								<a href="client_details.php" class="avatar"><img alt="" src="assets/img/profiles/avatar-14.jpg"></a>
							</div>
							<div class="dropdown profile-action">
								<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
							</div>
							</div>
							<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client_details.php">Mustang Technologies</a></h4>
							<h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client_details.php">Daniel Deacon</a></h5>
							<div class="small text-muted">CEO</div>
							<a href="chat.html" class="btn btn-white btn-sm m-t-10">Message</a>
							<a href="client_details.php" class="btn btn-white btn-sm m-t-10">View Profile</a>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
						<div class="profile-widget">
							<div class="profile-img">
								<a href="client_details.php" class="avatar"><img alt="" src="assets/img/profiles/avatar-18.jpg"></a>
							</div>
							<div class="dropdown profile-action">
								<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
							</div>
							</div>
							<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client_details.php">International Software Inc</a></h4>
							<h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client_details.php">Walter Weaver</a></h5>
							<div class="small text-muted">CEO</div>
							<a href="chat.html" class="btn btn-white btn-sm m-t-10">Message</a>
							<a href="client_details.php" class="btn btn-white btn-sm m-t-10">View Profile</a>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
						<div class="profile-widget">
							<div class="profile-img">
								<a href="client_details.php" class="avatar"><img alt="" src="assets/img/profiles/avatar-28.jpg"></a>
							</div>
							<div class="dropdown profile-action">
								<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
							</div>
							</div>
							<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client_details.php">Mercury Software Inc</a></h4>
							<h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client_details.php">Amanda Warren</a></h5>
							<div class="small text-muted">CEO</div>
							<a href="chat.html" class="btn btn-white btn-sm m-t-10">Message</a>
							<a href="client_details.php" class="btn btn-white btn-sm m-t-10">View Profile</a>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
						<div class="profile-widget">
							<div class="profile-img">
								<a href="client_details.php" class="avatar"><img alt="" src="assets/img/profiles/avatar-13.jpg"></a>
							</div>
							<div class="dropdown profile-action">
								<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
							</div>
							</div>
							<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client_details.php">Carlson Tech</a></h4>
							<h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client_details.php">Betty Carlson</a></h5>
							<div class="small text-muted">CEO</div>
							<a href="chat.html" class="btn btn-white btn-sm m-t-10">Message</a>
							<a href="client_details.php" class="btn btn-white btn-sm m-t-10">View Profile</a>
						</div>
					</div>
				</div>
			</div>
			<!-- /Page Content -->

			<!-- Add Client Modal -->
			<div id="add_client" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add Client</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="{{route('client_save')}}" method="POST">
                                @csrf
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">First Name <span class="text-danger">*</span></label>
											<input class="form-control" name="first_name" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Last Name</label>
											<input class="form-control" name="last_name" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Username <span class="text-danger">*</span></label>
											<input class="form-control" name="username" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Email <span class="text-danger">*</span></label>
											<input class="form-control floating" name="email" type="email">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Password</label>
											<input class="form-control" name="password" type="password">
										</div>
									</div>
									{{-- <div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Confirm Password</label>
											<input class="form-control" name type="password">
										</div>
									</div> --}}
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Client ID <span class="text-danger">*</span></label>
											<input class="form-control floating" name="client_id" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Phone </label>
											<input class="form-control" name="phone" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Company Name</label>
											<input class="form-control" name="company_name" type="text">
										</div>
									</div>
								</div>
								{{-- <div class="table-responsive m-t-15">
									<table class="table table-striped custom-table">
										<thead>
											<tr>
												<th>Module Permission</th>
												<th class="text-center">Read</th>
												<th class="text-center">Write</th>
												<th class="text-center">Create</th>
												<th class="text-center">Delete</th>
												<th class="text-center">Import</th>
												<th class="text-center">Export</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Projects</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
											</tr>
											<tr>
												<td>Tasks</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
											</tr>
											<tr>
												<td>Chat</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
											</tr>
											<tr>
												<td>Estimates</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
											</tr>
											<tr>
												<td>Invoices</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
											</tr>
											<tr>
												<td>Timing Sheets</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
											</tr>
										</tbody>
									</table>
								</div> --}}
								<div class="submit-section">
									<button type="submit" class="btn btn-primary submit-btn">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Add Client Modal -->

			<!-- Edit Client Modal -->
			<div id="edit_client" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Edit Client</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">First Name <span class="text-danger">*</span></label>
											<input class="form-control" value="Barry" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Last Name</label>
											<input class="form-control" value="Cuda" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Username <span class="text-danger">*</span></label>
											<input class="form-control" value="barrycuda" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Email <span class="text-danger">*</span></label>
											<input class="form-control floating" value="barrycuda@example.com" type="email">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Password</label>
											<input class="form-control" value="barrycuda" type="password">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Confirm Password</label>
											<input class="form-control" value="barrycuda" type="password">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Client ID <span class="text-danger">*</span></label>
											<input class="form-control floating" value="CLT-0001" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Phone </label>
											<input class="form-control" value="9876543210" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Company Name</label>
											<input class="form-control" type="text" value="Global Technologies">
										</div>
									</div>
								</div>
								<div class="table-responsive m-t-15">
									<table class="table table-striped custom-table">
										<thead>
											<tr>
												<th>Module Permission</th>
												<th class="text-center">Read</th>
												<th class="text-center">Write</th>
												<th class="text-center">Create</th>
												<th class="text-center">Delete</th>
												<th class="text-center">Import</th>
												<th class="text-center">Export</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Projects</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
											</tr>
											<tr>
												<td>Tasks</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
											</tr>
											<tr>
												<td>Chat</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
											</tr>
											<tr>
												<td>Estimates</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
											</tr>
											<tr>
												<td>Invoices</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
											</tr>
											<tr>
												<td>Timing Sheets</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="submit-section">
									<button class="btn btn-primary submit-btn">Save</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Edit Client Modal -->

			<!-- Delete Client Modal -->
			<div class="modal custom-modal fade" id="delete_client" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body">
							<div class="form-header">
								<h3>Delete Client</h3>
								<p>Are you sure want to delete?</p>
							</div>
							<div class="modal-btn delete-action">
								<div class="row">
									<div class="col-6">
										<a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
									</div>
									<div class="col-6">
										<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Delete Client Modal -->

		</div>
		<!-- /Page Wrapper -->

@endsection
