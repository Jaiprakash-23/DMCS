@extends('layouts.app')
@section('content')
@include('layouts.admin-sidebar')

			<!-- /Sidebar -->

			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
					<div class="row">
						<div class="col-sm-8">
							<h4 class="page-title">Attendance</h4>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="card punch-status">
								<div class="card-body">
									<h5 class="card-title">Timesheet <!--<small class="text-muted">11 Mar 2019</small>--></h5>
									<div class="punch-det">
										<h6>Punch In at</h6>
										<p>Wed, 11th Mar 2019 10.00 AM</p>
									</div>
									<div class="punch-info">
										<div class="punch-hours">
											<span>3.45 hrs</span>
										</div>
									</div>
									<div class="punch-btn-section">
										<button type="button" class="btn btn-primary punch-btn"> Duty On </button>
									</div>
									<div class="statistics">
										<div class="row">
											<div class="col-md-6 col-6 text-center">
												<div class="stats-box">
													<p>Site Name </p>
													<h6>Gaur City</h6>
												</div>
											</div>
											<div class="col-md-6 col-6 text-center">
												<div class="stats-box">
													<p>Overtime</p>
													<h6>0 hrs</h6>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card att-statistics">
								<div class="card-body">
									<h5 class="card-title">Statistics</h5>
									<div class="stats-list">
										<div class="stats-info">
											<p>Today <strong>3.45 <small>/ 8 hrs</small></strong></p>
											<div class="progress">
												<div class="progress-bar bg-primary" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
										<div class="stats-info">
											<p>This Week <strong>28 <small>/ 40 hrs</small></strong></p>
											<div class="progress">
												<div class="progress-bar bg-warning" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
										<div class="stats-info">
											<p>This Month <strong>90 <small>/ 160 hrs</small></strong></p>
											<div class="progress">
												<div class="progress-bar bg-success" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
										<div class="stats-info">
											<p>Remaining <strong>90 <small>/ 160 hrs</small></strong></p>
											<div class="progress">
												<div class="progress-bar bg-danger" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
										<div class="stats-info">
											<p>Overtime <strong>4</strong></p>
											<div class="progress">
												<div class="progress-bar bg-info" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card recent-activity">
								<div class="card-body">
									<h5 class="card-title">Your Leave </h5>
									<!--<ul class="res-activity-list">
										<li>
											<p class="mb-0">Punch In at</p>
											<p class="res-activity-time">
												<i class="fa fa-clock-o"></i>
												10.00 AM.
											</p>
										</li>
										<li>
											<p class="mb-0">Punch Out at</p>
											<p class="res-activity-time">
												<i class="fa fa-clock-o"></i>
												11.00 AM.
											</p>
										</li>
										<li>
											<p class="mb-0">Punch In at</p>
											<p class="res-activity-time">
												<i class="fa fa-clock-o"></i>
												11.15 AM.
											</p>
										</li>
										<li>
											<p class="mb-0">Punch Out at</p>
											<p class="res-activity-time">
												<i class="fa fa-clock-o"></i>
												1.30 PM.
											</p>
										</li>
										<li>
											<p class="mb-0">Punch In at</p>
											<p class="res-activity-time">
												<i class="fa fa-clock-o"></i>
												2.00 PM.
											</p>
										</li>
										<li>
											<p class="mb-0">Punch Out at</p>
											<p class="res-activity-time">
												<i class="fa fa-clock-o"></i>
												7.30 PM.
											</p>
										</li>
									</ul>-->
									<div class="card-body">
											<div class="time-list">
												<div class="dash-stats-list">
													<h4>4 </h4>
													<p>Leave Taken</p>
												</div>
												<div class="dash-stats-list">
													<h4>0</h4>
													<p>Remaining</p>
												</div>
											</div>
											<div class="request-btn">
												<a class="btn btn-primary" href="{{ route('apply_leave') }}">Apply Leave</a>
											</div>
										</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Search Filter -->
					<div class="row filter-row">
						<div class="col-sm-3">
							<div class="form-group form-focus select-focus">
								<select class="select floating">
									<option>--Select Site--</option>
									<option>Jan</option>
									<option>Feb</option>
									<option>Mar</option>
									<option>Apr</option>
									<option>May</option>
									<option>Jun</option>
									<option>Jul</option>
									<option>Aug</option>
									<option>Sep</option>
									<option>Oct</option>
									<option>Nov</option>
									<option>Dec</option>
								</select>
								<label class="focus-label"> Location </label>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group form-focus">
								<div class="cal-icon">
									<input class="form-control floating datetimepicker" type="text">
								</div>
								<label class="focus-label">From</label>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group form-focus">
								<div class="cal-icon">
									<input class="form-control floating datetimepicker" type="text">
								</div>
								<label class="focus-label">To</label>
							</div>
						</div>
						<div class="col-sm-3">
							<a href="#" class="btn btn-success btn-block"> Search </a>
						</div>
                    </div>
					<!-- /Search Filter -->

                    <div class="row">
                        <div class="col-lg-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table mb-0">
									<thead>
										<tr>
											<th>#</th>
											<th>Date </th>
											<th>Punch In</th>
											<th>Punch Out</th>
											<th>Production</th>
											<th>Overtime</th>
											<th>Sleeping </th>
											<th>Duty Location </th>

										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>19 Feb 2019</td>
											<td>08:00 AM</td>
											<td>08:00 PM</td>
											<td>12 hrs</td>
											<td>0 Day</td>
											<td> 1 </td>
											<td>Cassa Wood </td>

										</tr>
										<tr>
											<td>2</td>
											<td>20 Feb 2019</td>
											<td>08:00 AM</td>
											<td>08:00 PM</td>
											<td>12 hrs</td>
											<td>1 Day</td>
											<td>0</td>
											<td>Gaur City </td>

										</tr>
									</tbody>
								</table>
							</div>
                        </div>
                    </div>
                </div>
				<!-- /Page Content -->

            </div>
			<!-- Page Wrapper -->
		@endsection
