@extends('layouts.app')
@section('content')
@include('layouts.admin-sidebar')

 <!-- Page Wrapper -->
 <div class="page-wrapper">

				<!-- Page Content -->
                <div class="content container-fluid">

					<!-- Page Title -->
					<div class="row">
						<div class="col-sm-5 col-4">
							<h4 class="page-title">Provident Fund</h4>
						</div>
						<!--<div class="col-sm-7 col-8 text-right m-b-30">
							<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_pf"><i class="fa fa-plus"></i> Add Provident Fund</a>
						</div>-->
					</div>
					<!-- /Page Title -->

					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable mb-0">
									<thead>
										<tr>
											<th>Employee Name</th>
											<th>Employee ID </th>
											<th>Joining Date </th>
											<th>PF Number</th>
											<th>ESI Number</th>
											</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<h2 class="table-avatar">
													<a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
													<a href="profile.html">John Doe <span>Web Designer</span></a>
												</h2>
											</td>
											<td>FT-0001</td>
											<td>1 Jan 2013</td>
											<td> PF/07</td>
											<td> ESI67GHT</td>

										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>

				 </div>
			<!-- /Page Wrapper -->
@endsection
