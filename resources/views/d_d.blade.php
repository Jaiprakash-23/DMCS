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
							<h4 class="page-title">Designation & Department </h4>
						</div>
						<!--<div class="col-sm-7 col-8 text-right m-b-30">
							<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_pf"><i class="fa fa-plus"></i> Add Provident Fund</a>
						</div>-->
					</div>
					<!-- /Page Title -->

					<div class="row">


						<div class="col-12 col-md-6 col-lg-6">
								<div class="card">
									<div class="card-header">
										Designations

										<div class="col-sm-12 col-6 text-right m-b-30">
							<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_designation"><i class="fa fa-plus"></i> Add Designation</a>
						</div>
									</div>
									<div class="card-body">

                        <table class="table table-striped custom-table mb-0 datatable">
									<thead>
										<tr>
											<th style="width: 30px;">#</th>
											<th>Designation1 </th>
											<th>Department 2</th>
											<!--<th class="text-right">Action</th>-->
										</tr>

									</thead>
									<tbody>
									<tr>
											 @foreach ($depart as $key => $value)
										<tr>


											<td>{{$loop->iteration}}</td>
											<td>{{$value->designation_name}}</td>
											<td> {{$value->department}} </td>
											<!--<td class="text-right">
                                            <div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_designation"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_designation"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
												</div>
											</td>-->
										</tr>
											@endforeach

									</tbody>
								</table>

									</div>
									<div class="card-footer text-muted">
										All Designations
									</div>
								</div>
						</div>
						<div class="col-12 col-md-6 col-lg-6">
								<div class="card">
									<div class="card-header">
										Department
										<div class="col-sm-12 col-6 text-right m-b-30">
							<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_department"><i class="fa fa-plus"></i> Add Department</a>
						</div>
									</div>
									<div class="card-body">
										<table class="table table-striped custom-table mb-0 datatable">
									<thead>
										<tr>
											<th style="width: 30px;">#</th>
											<th>Department Name</th>
											<th class="text-right">Action</th>
										</tr>
									</thead>
									<tbody>
									@php
										$i =1;
									@endphp
									@foreach ($depart_name as $key => $dep)
									@php
									$ids=$dep->id;

									@endphp
										<tr>
											<td>{{$i++}}</td>
											<td>{{$dep->department}}</td>
											<td class="text-right">
                                            <div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="{{ route('edit_group', $dep->id) }}" data-toggle="modal" data-target="#edit_department{{$dep->id}}"><i class="fa fa-pencil m-r-5"></i> Edit1</a>

                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_department"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
												</div>
											</td>
										</tr>

										<div id="edit_department{{$dep->id}}" class="modal custom-modal fade" role="dialog">
											<div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title">Edit Department</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">


														<form action="{{ route('edit_group', $dep->id) }}" method="post">
														 @csrf
															<div class="form-group">
																<label>Department Name <span class="text-danger">*</span></label>
																<input class="form-control" type="text" name="department" value="{{ $dep->department }}">
															</div>
															<div class="submit-section">
																<button class="btn btn-primary submit-btn">Submit</button>
															</div>
														</form>

													</div>
												</div>
											</div>
										</div>
										@endforeach

									</tbody>
								</table>
									</div>
									<div class="card-footer text-muted">
										All Department
									</div>
								</div>
							</div>
                </div>

				 </div>
			<!-- /Page Wrapper -->

			<!-- Add Department Modal -->
				<div id="add_department" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Department</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{route('rolesgroup')}}" method="post">
								 @csrf
									<div class="form-group">
										<label>Department Name <span class="text-danger">*</span></label>
										<input class="form-control" type="text" name="department" value="">
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Add edittt Department Modal -->


				<!-- end edittt Department Modal -->
				<!-- Add Designation Modal -->
				<div id="add_designation" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Designation</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">

								<form action="{{route('desingroup')}}" method="post">
								@csrf
									<div class="form-group">
										<label>Designation Name <span class="text-danger">*</span></label>
										<input class="form-control" type="text" name="designation" value="">
									</div>
									<div class="form-group">

										<label>Department <span class="text-danger">*</span></label>
										<select class="select" name="dept_id">
									@foreach ($depart_name as $dep)
					                <option value="{{$dep->id}}">{{ $dep->department }}</option>
				                       @endforeach
										</select>


									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Add Designation Modal -->




			{{-- <div class="container">
		    			<h2 class="block-head">SEO Packages</h2>
		    			<p style="font-size: 20px" class="center">Here are our SEO Packages, Choose as per your business requirement. Do contact us for custom plan.</p>
					<br>
			    			<div class="cell-3 fx animated flipInY" data-animate="flipInY">
			    				<div class="pricing-table-2">
			    					<div class="dots-pattern dark-bg head-all">
				    					<div class="head witTxt">Starter Plan</div>
				    					<i class="fa fa-envelope alter-color"></i>
			    					</div>
			    					<ul>
		                                <li class="price"><span class="alter-color">$550.00</span> /quarterly</li>
		                                <!-- .head end -->
		                                <li style="color:blue;" class="even">10 Keywords</li>
		                                <li>10% keywords top 10 Guarantee</li>

										<li style="color:#4c69c5;font-size:20px">On-Page Activities</li>
										<li class="even">Title Tag Optimization</li>
										<li>Meta Description Optimization</li>
										<li class="even">Keyword Optimization</li>
										<li>Canonicalization</li>
										<li class="even">Website Page Load Optimization</li>
										<li>Internal link structuring &amp; optimization</li>
										<li class="even">Image &amp; Hyperlink Optimization</li>
										<li>Robots.txt File Creation</li>
										<li class="even">HTML &amp; XML Sitemap</li>
										<li>Google &amp; Bing Webmaster Tools</li>
										<li class="even">Google Analytics Setup</li>

										<li style="color:#4c69c5;font-size:20px">OFF-Page Activities</li>
		                                <li class="even">15 Directory Submissions</li>
		                                <li>45 Bookmarking Submissions</li>
		                                <li class="even">2 Article Submissions</li>
										<li>0 Presss Release Submissions</li>
		                                <li class="even">2 Blog Submissions</li>
										<li>10 PPT Submissions/month</li>
		                                <li class="even">15 Classified Submissions</li>
										<li>5-10 Business Listings</li>
		                                <li class="even">5 PDF Submissions</li>
										<li>5 Documents Sharing</li>
		                                <li class="even">5 Search Engine Submission</li>
										<li>5 Ping Submissions</li>
		                                <li class="even">0 Guest Posting</li>
										<li>15 Blog Commenting</li>
		                                <li class="even">5 Event Submissions</li>

										<li style="color:#4c69c5;font-size:15px"><strong>Report (Monthly)</strong></li>
									    <li class="even" style="color:#4c69c5;font-size:15px"><strong>Support: Email/Chat/Phone</strong></li>
								<br>
								<div class="form-input" style="text-align: center;">
			    						<a href="contact.php"><input type="submit" class="btn btn-large main-bg" value="Enquire Now"></a>
			    					</div>

		                            </ul>
			    				</div>
			    			</div>

			    			<div class="cell-3 fx animated flipInY" data-animate="flipInY">
			    				<div class="pricing-table-2">
			    					<div class="dots-pattern dark-bg head-all">
				    					<div class="head witTxt">Basic Plan</div>
				    					<i class="fa fa-envelope alter-color"></i>
			    					</div>
			    					<ul>
		                                <li class="price"><span class="alter-color">$850.00	</span> /quarterly</li>
		                                <!-- .head end -->

		                                <li style="color:#4c69c5;" class="even">20 Keywords</li>
		                                <li>10% keywords top 10 Guarantee</li>

										<li style="color:#4c69c5;font-size:20px">On-Page Activities</li>
										<li class="even">Title Tag Optimization</li>
										<li>Meta Description Optimization</li>
										<li class="even">Keyword Optimization</li>
										<li>Canonicalization</li>
										<li class="even">Website Page Load Optimization</li>
										<li>Internal link structuring &amp; optimization</li>
										<li class="even">Image &amp; Hyperlink Optimization</li>
										<li>Robots.txt File Creation</li>
										<li class="even">HTML &amp; XML Sitemap</li>
										<li>Google &amp; Bing Webmaster Tools</li>
										<li class="even">Google Analytics Setup</li>

										<li style="color:#4c69c5;font-size:20px">OFF-Page Activities</li>
		                                <li class="even">30 Directory Submissions</li>
		                                <li>70 Bookmarking Submissions</li>
		                                <li class="even">4 Article Submissions</li>
										<li>1 Presss Release Submissions</li>
		                                <li class="even">4 Blog Submissions</li>
										<li>15 PPT Submissions/month</li>
		                                <li class="even">15 Classified Submissions</li>
										<li>5-10 Business Listings</li>
		                                <li class="even">10 PDF Submissions</li>
										<li>10 Documents Sharing</li>
		                                <li class="even">10 Search Engine Submission</li>
										<li>15 Ping Submissions</li>
		                                <li class="even">1 Guest Posting</li>
										<li>20 Blog Commenting</li>
		                                <li class="even">5 Event Submissions</li>

										<li style="color:#4c69c5;font-size:15px"><strong>Report (Monthly)</strong></li>
                                        <li class="even" style="color:#4c69c5;font-size:15px"><strong>Support: Email/Chat/Phone</strong></li>
								<br>
								<div class="form-input" style="text-align: center;">
			    						<a href="contact.php"><input type="submit" class="btn btn-large main-bg" value="Enquire Now"></a>
			    					</div>

		                            </ul>
			    				</div>
			    			</div>
			    			<div class="cell-3 fx animated flipInY" data-animate="flipInY" data-animation-delay="200" style="animation-delay: 200ms;">
			    				<div class="pricing-table-2">
			    					<div class="dots-pattern dark-bg head-all">
				    					<div class="head witTxt">Classic Plan</div>
				    					<i class="fa fa-gear alter-color"></i>
			    					</div>
			    					<ul>
		                                <li class="price"><span class="alter-color">$1,200.00</span> /quarterly</li>
		                                <!-- .head end -->
		                                <li style="color:blue;" class="even">30 Keywords</li>
		                                <li>10% keywords top 10 Guarantee</li>

		                                <li style="color:#4c69c5;font-size:20px">On-Page Activities</li>
										<li class="even">Title Tag Optimization</li>
										<li>Meta Description Optimization</li>
										<li class="even">Keyword Optimization</li>
										<li>Canonicalization</li>
										<li class="even">Website Page Load Optimization</li>
										<li>Internal link structuring &amp; optimization</li>
										<li class="even">Image &amp; Hyperlink Optimization</li>
										<li>Robots.txt File Creation</li>
										<li class="even">HTML &amp; XML Sitemap</li>
										<li>Google &amp; Bing Webmaster Tools</li>
										<li class="even">Google Analytics Setup</li>

										<li style="color:#4c69c5;font-size:20px">OFF-Page Activities</li>
		                                <li class="even">50 Directory Submissions</li>
		                                <li>90 Bookmarking Submissions</li>
		                                <li class="even">6 Article Submissions</li>
										<li>2 Presss Release Submissions</li>
		                                <li class="even">6 Blog Submissions</li>
										<li>20 PPT Submissions/month</li>
		                                <li class="even">20 Classified Submissions</li>
										<li>5-10 Business Listings</li>
		                                <li class="even">20 PDF Submissions</li>
										<li>20 Documents Sharing</li>
		                                <li class="even">20 Search Engine Submission</li>
										<li>20 Ping Submissions</li>
		                                <li class="even">2 Guest Posting </li>
										<li>35 Blog Commenting</li>
		                                <li class="even">20 Event Submissions</li>

										<li style="color:#4c69c5;font-size:15px"><strong>Report (Twice in a Month)</strong></li>
								        <li class="even" style="color:#4c69c5;font-size:15px"><strong>Support: Email/Chat/Phone</strong></li>
								<br>
								<div class="form-input" style="text-align: center;">
			    						<a href="contact.php"><input type="submit" class="btn btn-large main-bg" value="Enquire Now"></a>
			    					</div>

		                            </ul>
			    				</div>
			    			</div>
							<div class="cell-3 fx animated flipInY" data-animate="flipInY" data-animation-delay="200" style="animation-delay: 200ms;">
			    				<div class="pricing-table-2">
			    					<div class="dots-pattern dark-bg head-all">
				    					<div class="head witTxt">Premium SEO Plan</div>
				    					<i class="fa fa-gear alter-color"></i>
			    					</div>
			    					<ul>
		                                <li class="price"><span class="alter-color">$1,400.00</span> /quarterly</li>
		                                <!-- .head end -->
		                                <li style="color:blue;" class="even">40 Keywords</li>
		                                <li>10% keywords top 10 Guarantee</li>

		                                <li style="color:#4c69c5;font-size:20px">On-Page Activities</li>
										<li class="even">Title Tag Optimization</li>
										<li>Meta Description Optimization</li>
										<li class="even">Keyword Optimization</li>
										<li>Canonicalization</li>
										<li class="even">Website Page Load Optimization</li>
										<li>Internal link structuring &amp; optimization</li>
										<li class="even">Image &amp; Hyperlink Optimization</li>
										<li>Robots.txt File Creation</li>
										<li class="even">HTML &amp; XML Sitemap</li>
										<li>Google &amp; Bing Webmaster Tools</li>
										<li class="even">Google Analytics Setup</li>

		                                <li style="color:#4c69c5;font-size:20px">OFF-Page Activities</li>
		                                <li class="even">50 Directory Submissions</li>
		                                <li>120 Bookmarking Submissions</li>
		                                <li class="even">10 Article Submissions</li>
										<li>3 Presss Release Submissions</li>
		                                <li class="even">10 Blog Submissions</li>
										<li>30 PPT Submissions/month</li>
		                                <li class="even">35 Classified Submissions</li>
										<li>5-10 Business Listings</li>
		                                <li class="even">30 PDF Submissions</li>
										<li>30 Documents Sharing</li>
		                                <li class="even">30 Search Engine Submission</li>
										<li>45 Ping Submissions</li>
		                                <li class="even">5 Guest Posting</li>
										<li>50 Blog Commenting</li>
		                                <li class="even">35 Event Submissions</li>

										<li style="color:#4c69c5;font-size:15px"><strong>Report (Weekly)</strong></li>
								        <li class="even" style="color:#4c69c5;font-size:15px"><strong>Support: Email/Chat/Phone</strong></li>
								<br>
								<div class="form-input" style="text-align: center;">
			    						<a href="contact.php"><input type="submit" class="btn btn-large main-bg" value="Enquire Now"></a>
			    					</div>

		                            </ul>
			    				</div>
			    			</div>
		    			</div> --}}
@endsection
