@extends('layouts.app')
@section('content')
@include('layouts.admin-sidebar')

 <!-- Page Wrapper -->
 <div class="page-wrapper">

				<!-- Page Content -->
                <div class="content container-fluid">


                    <div class="row">
						<div class="col-sm-4 col-5">
							<h4 class="page-title"> All  Employee Salary Report </h4>
						</div>

					</div>

					<div class="row">

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

					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable mb-0">
									<thead>
										<tr>
											<th> Employee Name</th>
											<th> Employee ID </th>
                                            <th> Month  </th>
                                            <th> Payable </th>
                                            <th> Paid  </th>
                                            <th> Unpaid  </th>
                                            <th class="text-right"> Action </th>
											</tr>
									</thead>
									<tbody>
                                        @foreach ($all_empl_salary as $emp_salary)
										<tr>

											<td>



												<h2 class="table-avatar">
													<a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
													<a href="profile.html">{{$emp_salary->fullname}} <span>Web Designer</span></a>
												</h2>
											</td>
											<td>{{$emp_salary->emp_id}}</td>
											<td>1 Oct 2019</td>
											<td> {{$emp_salary->salary_month}}</td>
                                            <td> {{$emp_salary->net_pay}} </td>
                                            <td> 2000 </td>
											<td class="text-right">

													<a href="salary-genrate.php" class="action-icon"><i class="fa fa-pencil m-r-5"></i> Edit</a>

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
			<!-- /Page Wrapper -->
@endsection
