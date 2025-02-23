@extends('layouts.app')
@section('content')
@include('layouts.admin-sidebar')


 <div class="page-wrapper">

			<div class="content container-fluid">

			<div class="row">
						<div class="col-sm-4 col-5">
							<h4 class="page-title"> All Employee Salary</h4>
						</div>
						<!--<div class="col-sm-8 col-7 text-right m-b-30">
							<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_salary"><i class="fa fa-plus"></i> Add Salary</a>
						</div>-->
					</div>

					<div class="row">
						<!--<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
							 <div class="dash-widget clearfix card-box">
								<span class="dash-widget-icon"><i class="fa fa-users"></i></span>
								<div class="dash-widget-info">
									<h3> 2 </h3>
					      			<span> Total Employees </span>

								</div>
								</div>
						</div>-->
						 <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
							<div class="dash-widget clearfix card-box">
								<span class="dash-widget-icon"><i class="fa fa-building-o"></i></span>
								<div class="dash-widget-info">
									<h3> 39,698.00</h3>
									<span> Total Payable </span>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
							<div class="dash-widget clearfix card-box">
								<span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
								<div class="dash-widget-info">
									<h3>23,350.00</h3>
									<span>Paid Salary</span>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
							<div class="dash-widget clearfix card-box">
								<span class="dash-widget-icon"><i class="fa fa-user"></i></span>
								<div class="dash-widget-info">
									<h3>16,348.00</h3>
									<span> Total Unpaid Salary </span>
								</div>
							</div>
						</div>
					</div>
					</div>

				<!-- Page Content -->
                <div class="content container-fluid">

					<!-- Page Title -->
					<!--<div class="row">
						<div class="col-sm-4 col-5">
							<h4 class="page-title">Employee Salary</h4>
						</div>
						<div class="col-sm-8 col-7 text-right m-b-30">
							<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_salary"><i class="fa fa-plus"></i> Add Salary</a>
						</div>
					</div>-->
					<!-- /Page Title -->

					<!-- Search Filter -->
					<div class="row filter-row">
					   <div class="col-sm-6 col-md-2 col-lg-2 col-xl-2 col-12">
							<div class="form-group form-focus">
								<input type="text" class="form-control floating">
								<label class="focus-label">Employee ID</label>
							</div>
					   </div>
					   <div class="col-sm-6 col-md-2 col-lg-2 col-xl-2 col-12">
							<div class="form-group form-focus select-focus">
								<select class="select floating">
									<option value=""> -- Select Designation -- </option>
									<option value=""> Guard </option>
									<option value=""> Bounser </option>
									<option value="1"> Officer </option>
									<option value="1"> Management </option>
								</select>
								<label class="focus-label"> Designation </label>
							</div>
					   </div>
					   <div class="col-sm-6 col-md-2 col-lg-2 col-xl-2 col-12">
							<div class="form-group form-focus select-focus">
								<select class="select floating">
									<option> -- Select Site-- </option>
									<option> Gaur City </option>
									<option> CassaWood </option>
									<option> White Archid </option>
								</select>
								<label class="focus-label">Site Wise</label>
							</div>
					   </div>

					   <div class="col-sm-6 col-md-2 col-lg-2 col-xl-2 col-12">
							<div class="form-group form-focus">
								<div class="cal-icon">
									<input class="form-control floating datetimepicker" type="text">
								</div>
								<label class="focus-label">From</label>
							</div>
						</div>
						 <div class="col-sm-6 col-md-2 col-lg-2 col-xl-2 col-12">
							<div class="form-group form-focus">
								<div class="cal-icon">
									<input class="form-control floating datetimepicker" type="text">
								</div>
								<label class="focus-label">To</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-2 col-lg-2 col-xl-2 col-12">
							<a href="#" class="btn btn-success btn-block"> Search </a>
						</div>
                    </div>
					<!-- /Search Filter -->

					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
										    <th>Employee Name </th>
											<th>Employee ID</th>
										    <th>Join Date</th>
											<th>Uniform </th>
											<th>Advance</th>
											<th>Fine</th>
											<th>Salary</th>
											<th>Payslip</th>
											<th class="text-right">Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<h2 class="table-avatar">
													<a href="" class="avatar"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
													<a href="">John Doe <span> Web Designer </span></a>
												</h2>
											</td>
											<td>FT-0001</td>
											<td>1 Jan 2013</td>
											<td> </td>
											<td>
											</td>
											<td>
											</td>
											<td>$59698</td>
											<td><a class="btn btn-sm btn-primary" href="salary-slip.php">Generate Slip</a></td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="salary-slip.php" ><i class="fa fa-eye m-r-5"></i> View</a>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<h2 class="table-avatar">
													<a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-09.jpg" alt=""></a>
													<a href="profile.html">Richard Miles <span>Web Developer</span></a>
												</h2>
											</td>
											<td>FT-0002</td>
										    <td>1 Jan 2013</td>
											<td> </td>
											<td>
											</td>
											<td>
											</td>
											<td>$28698</td>
											<td><a class="btn btn-sm btn-primary" href="salary-slip.php">Generate Slip</a></td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="salary-slip.php" ><i class="fa fa-eye m-r-5"></i> View</a>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<h2 class="table-avatar">
													<a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-10.jpg" alt=""></a>
													<a href="profile.html">John Smith <span>Android Developer</span></a>
												</h2>
											</td>
											<td>FT-0003</td>
											<td>1 Jan 2013</td>
											<td> </td>
											<td>
											</td>
											<td>
											</td>
											<td>$48200</td>
											<td><a class="btn btn-sm btn-primary" href="salary-slip.php">Generate Slip</a></td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="salary-slip.php" ><i class="fa fa-eye m-r-5"></i> View</a>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<h2 class="table-avatar">
													<a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-05.jpg" alt=""></a>
													<a href="profile.html">Mike Litorus <span>IOS Developer</span></a>
												</h2>
											</td>
											<td>FT-0004</td>
											<td>1 Jan 2013</td>
											<td> </td>
											<td>
											</td>
											<td>
											</td>
											<td>$59698</td>
											<td><a class="btn btn-sm btn-primary" href="salary-slip.php">Generate Slip</a></td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="salary-slip.php" ><i class="fa fa-eye m-r-5"></i> View</a>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<h2 class="table-avatar">
													<a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-11.jpg" alt=""></a>
													<a href="profile.html">Wilmer Deluna <span>Team Leader</span></a>
												</h2>
											</td>
											<td>FT-0005</td>
											<td>1 Jan 2013</td>
											<td> </td>
											<td>
											</td>
											<td>
											</td>
											<td>$43000</td>
											<td><a class="btn btn-sm btn-primary" href="salary-slip.php">Generate Slip</a></td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="salary-slip.php" ><i class="fa fa-eye m-r-5"></i> View</a>
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

				<!-- Add Salary Modal -->

				<!-- /Add Salary Modal -->

				<!-- Edit Salary Modal -->
				<div id="edit_salary" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-md" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Staff Salary</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="row">
										<div class="col-sm-6">
											<label>Employee ID</label>
											<input class="form-control" type="text" value="FT-0001">
										</div>
										<div class="col-sm-6">
											<label>Net Pay (Rounded) </label>
											<input class="form-control" type="text" value="8,955.00">
										</div>
									</div>
									<br/>
									<div class="row">
										<div class="col-sm-6">
											<h4 class="text-primary">Earnings</h4>
											<div class="form-group">
												<label>Wages</label>
												<input class="form-control" type="text" value="12,000.00">
											</div>
											<div class="form-group">
												<label>Basic Salary</label>
												<input class="form-control" type="text" value="4,8000.00">
											</div>
											<div class="form-group">
												<label>House Rent Allowance</label>
												<input class="form-control" type="text" value="7,200.00">
											</div>
											<div class="form-group">
												<label>Gross Salary</label>
												<input class="form-control" type="text" value="12,000.00">
											</div>
											<!--<div class="form-group">
												<label>Allowance</label>
												<input class="form-control" type="text" value="$30">
											</div>
											<div class="form-group">
												<label>Medical  Allowance</label>
												<input class="form-control" type="text" value="$20">
											</div>
											<div class="form-group">
												<label>Others</label>
												<input class="form-control" type="text">
											</div> -->
										</div>
										<div class="col-sm-6">
											<h4 class="text-primary">Deductions</h4>
											<div class="form-group">
												<label>Provident Fund </label>
												<input class="form-control" type="text" value="576.00">
											</div>
											<div class="form-group">
												<label>Employees State Insurance</label>
												<input class="form-control" type="text" value="480.00">
											</div>
											<div class="form-group">
												<label>Advance</label>
												<input class="form-control" type="text" value="1,000.00">
											</div>
											<div class="form-group">
												<label>Uniform</label>
												<input class="form-control" type="text" value="600">
											</div>
											<div class="form-group">
												<label>Fine (Penalty)</label>
												<input class="form-control" type="text" value="1 days salary ">
											</div>
											<!--<div class="form-group">
												<label>Labour Welfare</label>
												<input class="form-control" type="text" value="$10">
											</div>
											<div class="form-group">
												<label>Fund</label>
												<input class="form-control" type="text" value="$40">
											</div>
											<div class="form-group">
												<label>Others</label>
												<input class="form-control" type="text" value="$15">
											</div>-->
										</div>
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Edit Salary Modal -->

				<!-- Delete Salary Modal -->
				<div class="modal custom-modal fade" id="delete_salary" role="dialog">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-body">
								<div class="form-header">
									<h3>Delete Salary</h3>
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
				<!-- /Delete Salary Modal -->

            </div>
			<!-- /Page Wrapper -->

@endsection
