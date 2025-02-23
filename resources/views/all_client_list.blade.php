@extends('layouts.app')
@section('content')
@include('layouts.admin-sidebar')

<div class="page-wrapper">

				<!-- Page Content -->
                <div class="content container-fluid">

					<!-- Page Title -->
					<div class="row">
						<div class="col">
							<h4 class="page-title"> All Clients</h4>
						</div>
						<div class="col-12 text-right m-b-30">
							<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_client"><i class="fa fa-plus"></i> Add Client</a>
							<div class="view-icons">
								<a href="all_location.php" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
								<a href="all_location_list.php" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
							</div>
						</div>
					</div>
					<!-- Page Title -->

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

					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
											<th>Name</th>
											<th>Client ID</th>
											<th>Contact Person</th>
											<th>Email</th>
											<th>Mobile</th>
											<th>Status</th>
											<th class="text-right">Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<h2 class="table-avatar">
													<a href="client-profile.html" class="avatar"><img src="assets/img/profiles/avatar-19.jpg" alt=""></a>
													<a href="client-profile.html">Global Technologies</a>
												</h2>
											</td>
											<td>CLT-0001</td>
											<td>Barry Cuda</td>
											<td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="c4a6a5b6b6bda7b1a0a584a1bca5a9b4a8a1eaa7aba9">[email&#160;protected]</a></td>
											<td>9876543210</td>
											<td>
												<div class="dropdown action-label">
													<a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-success"></i> Active </a>
													<div class="dropdown-menu">
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
													</div>
												</div>
											</td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<h2 class="table-avatar">
													<a href="client-profile.html" class="avatar"><img src="assets/img/profiles/avatar-29.jpg" alt=""></a>
													<a href="client-profile.html">Delta Infotech</a>
												</h2>
											</td>
											<td>CLT-0002</td>
											<td>Tressa Wexler</td>
											<td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b0c4c2d5c3c3d1c7d5c8dcd5c2f0d5c8d1ddc0dcd59ed3dfdd">[email&#160;protected]</a></td>
											<td>9876543210</td>
											<td>
												<div class="dropdown action-label">
													<a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-danger"></i> Inactive </a>
													<div class="dropdown-menu">
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
													</div>
												</div>
											</td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<h2 class="table-avatar">
													<a href="client-profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-07.jpg"></a>
													<a href="client-profile.html">Cream Inc</a>
												</h2>
											</td>
											<td>CLT-0003</td>
											<td>Ruby Bartlett</td>
											<td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d9abacbba0bbb8abadb5bcadad99bca1b8b4a9b5bcf7bab6b4">[email&#160;protected]</a></td>
											<td>9876543210</td>
											<td>
												<div class="dropdown action-label">
													<a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-success"></i> Active </a>
													<div class="dropdown-menu">
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
													</div>
												</div>
											</td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<h2 class="table-avatar">
													<a href="client-profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-06.jpg"></a>
													<a href="client-profile.html">Wellware Company</a>
												</h2>
											</td>
											<td>CLT-0004</td>
											<td>Misty Tison</td>
											<td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="533e3a20272a273a203c3d13362b323e233f367d303c3e">[email&#160;protected]</a></td>
											<td>9876543210</td>
											<td>
												<div class="dropdown action-label">
													<a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-success"></i> Active </a>
													<div class="dropdown-menu">
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
													</div>
												</div>
											</td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<h2 class="table-avatar">
													<a href="client-profile.html" class="avatar"><img src="assets/img/profiles/avatar-14.jpg" alt=""></a>
													<a href="client-profile.html">Mustang Technologies</a>
												</h2>
											</td>
											<td>CLT-0005</td>
											<td>Daniel Deacon</td>
											<td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="6004010e09050c040501030f0e200518010d100c054e030f0d">[email&#160;protected]</a></td>
											<td>9876543210</td>
											<td>
												<div class="dropdown action-label">
													<a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-success"></i> Active </a>
													<div class="dropdown-menu">
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
													</div>
												</div>
											</td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<h2 class="table-avatar">
													<a href="client-profile.html" class="avatar"><img src="assets/img/profiles/avatar-18.jpg" alt=""></a>
													<a href="client-profile.html">International Software Inc</a>
												</h2>
											</td>
											<td>CLT-0006</td>
											<td>Walter Weaver</td>
											<td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b6c1d7dac2d3c4c1d3d7c0d3c4f6d3ced7dbc6dad398d5d9db">[email&#160;protected]</a></td>
											<td>9876543210</td>
											<td>
												<div class="dropdown action-label">
													<a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-success"></i> Active </a>
													<div class="dropdown-menu">
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
													</div>
												</div>
											</td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<h2 class="table-avatar">
													<a href="client-profile.html" class="avatar"><img src="assets/img/profiles/avatar-28.jpg" alt=""></a>
													<a href="client-profile.html">Mercury Software Inc</a>
												</h2>
											</td>
											<td>CLT-0007</td>
											<td>Amanda Warren</td>
											<td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="77161a1619131600160505121937120f161a071b125914181a">[email&#160;protected]</a></td>
											<td>9876543210</td>
											<td>
												<div class="dropdown action-label">
													<a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-success"></i> Active </a>
													<div class="dropdown-menu">
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
													</div>
												</div>
											</td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<h2 class="table-avatar">
													<a href="client-profile.html" class="avatar"><img src="assets/img/profiles/avatar-22.jpg" alt=""></a>
													<a href="client-profile.html">Carlson Tech</a>
												</h2>
											</td>
											<td>CLT-0008</td>
											<td>Betty Carlson</td>
											<td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="caa8afbebeb3a9abb8a6b9a5a48aafb2aba7baa6afe4a9a5a7">[email&#160;protected]</a></td>
											<td>9876543210</td>
											<td>
												<div class="dropdown action-label">
													<a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-danger"></i> Inactive </a>
													<div class="dropdown-menu">
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
													</div>
												</div>
											</td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
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
								<form>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">First Name <span class="text-danger">*</span></label>
												<input class="form-control" type="text">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Last Name</label>
												<input class="form-control" type="text">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Username <span class="text-danger">*</span></label>
												<input class="form-control" type="text">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Email <span class="text-danger">*</span></label>
												<input class="form-control floating" type="email">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Password</label>
												<input class="form-control" type="password">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Confirm Password</label>
												<input class="form-control" type="password">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Client ID <span class="text-danger">*</span></label>
												<input class="form-control floating" type="text">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Phone </label>
												<input class="form-control" type="text">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Company Name</label>
												<input class="form-control" type="text">
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
										<button class="btn btn-primary submit-btn">Submit</button>
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
