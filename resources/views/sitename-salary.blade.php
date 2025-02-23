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
							<h4 class="page-title"> Site Name & salary   </h4>
						</div>

					</div>
					<!-- /Page Title -->

					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable mb-0">
									<thead>
										<tr>
											<th> Site  Name</th>
											<th> Guard </th>
											<th> Lady Guard </th>
											<th> Gunman </th>
											<th> Supervisor </th>
											<th> Field Officer </th>
											</tr>
									</thead>
									<tbody>
                                        @foreach ($site_salary_data as $sitesalary)
                                        <tr>
											<td>
												<h2 class="table-avatar">
													<a href="#"> Ca</a>
												</h2>
											</td>
											<td> ₹ 12000 </td>
											<td> ₹ 12500 </td>
											<td> ₹ 13500 </td>
											<td> ₹ 15000 </td>
											<td> ₹ 18000 </td>

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
