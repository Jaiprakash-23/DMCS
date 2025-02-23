@extends('layouts.app')
@section('content')
@include('layouts.admin-sidebar')

			<!-- /Sidebar -->

			<!-- Page Wrapper -->
            <div class="page-wrapper">

				<!-- Page Content -->
                <div class="content container-fluid" id="add-profile-view">

					<!-- Page Title -->
					<div class="row">
						<div class="col-sm-12">
							<h4 class="page-title">My Profile</h4>
						</div>
					</div>
					<!-- /Page Title -->

					<div class="card-box mb-0" >
						<div class="row">
							<div class="col-md-12">
								<div class="profile-view">
									<div class="profile-img-wrap edit-img">
                                        <img class="inline-block" src="assets/img/profiles/avatar-02.jpg" alt="user">
                                        <div class="fileupload btn">
                                            <span class="btn-text">edit</span>
                                            <input class="upload" type="file">
                                        </div>
                                    </div>
									<div class="profile-basic">
										<div class="row">
											<div class="col-md-5">
												<div class="profile-info-left">
													<div class="form-group">
														<input type="text" class="form-control" value="John" placeholder="Full Name">
                                                    </div>
                                                    <div class="form-group">
                                                            <select class="select">
                                                                <option>Select Department</option>
                                                                <option>Web Development</option>
                                                                <option>IT Management</option>
                                                                <option>Marketing</option>
                                                            </select>
                                                        </div>
                                                    <div class="form-group">
                                                            <select class="select">
                                                                    <option>Select Site </option>
                                                                    <option>Web Designer</option>
                                                                    <option>Web Developer</option>
                                                                    <option>Android Developer</option>
                                                                </select>
                                                    </div>
                                                    <div class="form-group">
														<input type="text" class="form-control" value="FT-0001" placeholder="Employee ID">
													</div>

                                                    <div class="form-group">
														<input class="form-control datetimepicker" type="text" value="05/06/1985" placeholder="Date of joining">
													</div>
                                                    <!--<div class="form-group">
														<a class="btn btn-custom" href="chat.html">Send Message</a>

													</div>-->

														<div class="title">Reports to:</div>
														<div class="text">
                                                                <div class="form-group">
                                                                        <select class="select">
                                                                            <option>-</option>
                                                                            <option>Wilmer Deluna</option>
                                                                            <option>Lesley Grauer</option>
                                                                            <option>Jeffery Lalor</option>
                                                                        </select>
                                                                    </div>
														</div>

												</div>
											</div>
											<div class="col-md-7">
												<ul class="personal-info">
													<li>
														<div class="title">Phone:</div>
														<div class="text">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" value="631-889-3206" placeholder="Phone Number">
                                                            </div>
                                                        </div>
													</li>
													<li>
														<div class="title">Email:</div>
														<div class="text">
                                                                <div class="form-group">
                                                                    <input type="email" class="form-control" value="johndoe@example.com" placeholder="Email">
                                                                </div>
                                                        </div>
													</li>
													<li>
														<div class="title">Birthday:</div>
														<div class="text">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control datetimepicker" value="" placeholder="Date Of Birth">
                                                                </div>
                                                            </div>
													</li>
													<li>
														<div class="title">Gender:</div>
														<div class="text">
                                                                <div class="form-group">
                                                                        <select class="select">
                                                                                <option value="male selected">Male</option>
                                                                                <option value="female">Female</option>
                                                                        </select>
                                                                    </div>
                                                        </div>
													</li>
													<li>
														<div class="title">Address:</div>
														<div class="text">
                                                                <div class="form-group">
                                                                    <input type="email" class="form-control" value="" placeholder="Address">
                                                                </div>
                                                        </div>
													</li>


												</ul>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>

					<div class="card-box tab-box">
						<div class="row user-tabs">
							<div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
								<ul class="nav nav-tabs nav-tabs-bottom">
									<li class="nav-item"><a href="#emp_profile" data-toggle="tab" class="nav-link active">Profile</a></li>
									<!--<li class="nav-item"><a href="#bank_statutory" data-toggle="tab" class="nav-link">Bank & Statutory <small class="text-danger">(Admin Only)</small></a></li>-->
								</ul>
							</div>
						</div>
					</div>

					<div class="tab-content">

						<!-- Profile Info Tab -->
						<div id="emp_profile" class="pro-overview tab-pane fade show active">
							<div class="row">
								<div class="col-md-6">
									<div class="card-box profile-box">
										<h3 class="card-title">Personal Informations </h3>
										<ul class="personal-info">
											<li>
												<div class="title">Aadhaar Number</div>
												<div class="text">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" value="" placeholder="Aadhaar Number">
                                                        </div>
                                                </div>
											</li>
											<li>
												<div class="title">Voter Id Number </div>
												<div class="text">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control datetimepicker" value="" placeholder="Voter Id Number">
                                                        </div>
                                                </div>
											</li>
											<li>
												<div class="title">Nationality </div>
												<div class="text">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" value="" placeholder="Indian">
                                                        </div>
                                                </div>
											</li>

											<li>
												<div class="title">Religion</div>
												<div class="text">
                                                        <div class="form-group">
                                                            <input class="form-control" type="text" value="" placeholder="Hindu">
                                                        </div>
                                                    </div>
											</li>
											<li>
												<div class="title">Marital status</div>
												<div class="text">
                                                        <div class="form-group">
                                                                <select class="select form-control">
                                                                        <option>-</option>
                                                                        <option>Single</option>
                                                                        <option>Married</option>
                                                                    </select>
                                                        </div>
                                                    </div>
											</li>
											<li>
												<div class="title">Identity Mark</div>
												<div class="text">
                                                        <div class="form-group">
                                                            <input class="form-control" type="text" value="" placeholder="left hand black mark">
                                                        </div>
                                                    </div>
											</li>
											<li>
												<div class="title"> Blood Group </div>
												<div class="text">
                                                        <div class="form-group">
                                                            <input class="form-control" type="text" value="" placeholder="A+">
                                                        </div>
                                                    </div>
											</li>
											<li>
												<div class="title"> Height & Wight </div>
												<div class="text">
                                                        <div class="form-group">
                                                            <input class="form-control" type="text" value="" placeholder="169cm , 70kg">
                                                        </div>
                                                    </div>
											</li>
											<li>
												<div class="title"> Colour Of Skin </div>
												<div class="text">
                                                        <div class="form-group">
                                                            <input class="form-control" type="text" value="" placeholder="Undertones ( हल्का रंग )">
                                                        </div>
                                                    </div>
											</li>
										</ul>
									</div>
								</div>
								<div class="col-md-6">
									<div class="card-box profile-box">
										<h3 class="card-title">Emergency Contact </h3>
										<h5 class="section-title">Primary</h5>
										<ul class="personal-info">
											<li>
												<div class="title">Name</div>
												<div class="text">
                                                        <div class="form-group">
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
											</li>
											<li>
												<div class="title">Relationship</div>
												<div class="text">
                                                        <div class="form-group">
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
											</li>
											<li>
												<div class="title">Phone </div>
                                                <div class="text">
                                                        <div class="form-group">
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
											</li>
										</ul>
										<hr>
										<h5 class="section-title">Secondary</h5>
										<ul class="personal-info">
											<li>
												<div class="title">Name</div>
												<div class="text">
                                                        <div class="form-group">
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
											</li>
											<li>
												<div class="title">Relationship</div>
												<div class="text">
                                                        <div class="form-group">
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
											</li>
											<li>
												<div class="title">Phone </div>
                                                <div class="text">
                                                        <div class="form-group">
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="card-box profile-box">
										<h3 class="card-title">Bank information</h3>
										<ul class="personal-info">
											<li>
												<div class="title">Bank name</div>
												<div class="text">
                                                        <div class="form-group">
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
                                            </li>

                                        	<li>
												<div class="title">Bank account No.</div>
												<div class="text">
                                                        <div class="form-group">
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
											</li>
											<li>
												<div class="title">IFSC Code</div>
												<div class="text">
                                                        <div class="form-group">
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
											</li>
											<li>
												<div class="title">PAN No</div>
												<div class="text">
                                                        <div class="form-group">
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
											</li>
										</ul>
									</div>
								</div>
								<div class="col-md-6">
                                        <div class="card-box profile-box">
                                                <h3 class="card-title">Family Members</h3>
                                                <ul class="personal-info">
                                                    <li>
                                                        <div class="title">Name</div>
                                                        <div class="text">
                                                                <div class="form-group">
                                                                    <input class="form-control" type="text">
                                                                </div>
                                                            </div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Relationship</div>
                                                        <div class="text">
                                                                <div class="form-group">
                                                                    <input class="form-control" type="text">
                                                                </div>
                                                            </div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Phone </div>
                                                        <div class="text">
                                                                <div class="form-group">
                                                                    <input class="form-control" type="text">
                                                                </div>
                                                            </div>
                                                    </li>
                                                </ul>

                                                <ul class="personal-info">
                                                    <li>
                                                        <div class="title">Address </div>
                                                        <div class="text">
                                                                <div class="form-group">
                                                                    <input class="form-control" type="text">
                                                                </div>
                                                            </div>
                                                    </li>


                                                </ul>
                                            </div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
                                        <div class="card-box profile-box">
                                                <h3 class="card-title">Educational Information </h3>
                                                <ul class="personal-info">
                                                    <li>
                                                        <div class="title">Institution</div>
                                                        <div class="text">
                                                                <div class="form-group">
                                                                    <input class="form-control" type="text">
                                                                </div>
                                                            </div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Degree</div>
                                                        <div class="text">
                                                                <div class="form-group">
                                                                    <input class="form-control" type="text">
                                                                </div>
                                                            </div>
                                                    </li>

                                                    <li>
                                                            <div class="title">Grade</div>
                                                            <div class="text">
                                                                    <div class="form-group">
                                                                        <input class="form-control" type="text">
                                                                    </div>
                                                                </div>
                                                        </li>
                                                        <li>
                                                                <div class="title">Starting Date</div>
                                                                <div class="text">
                                                                        <div class="form-group">
                                                                            <input class="form-control datetimepicker" type="text">
                                                                        </div>
                                                                    </div>
                                                            </li>
                                                            <li>
                                                                    <div class="title">Completion Date</div>
                                                                    <div class="text">
                                                                            <div class="form-group">
                                                                                <input class="form-control datetimepicker" type="text">
                                                                            </div>
                                                                        </div>
                                                                </li>
                                                </ul>
                                                <hr>
                                                <ul class="personal-info">
                                                        <li>
                                                            <div class="title">Institution</div>
                                                            <div class="text">
                                                                    <div class="form-group">
                                                                        <input class="form-control" type="text">
                                                                    </div>
                                                                </div>
                                                        </li>
                                                        <li>
                                                            <div class="title">Degree</div>
                                                            <div class="text">
                                                                    <div class="form-group">
                                                                        <input class="form-control" type="text">
                                                                    </div>
                                                                </div>
                                                        </li>

                                                        <li>
                                                                <div class="title">Grade</div>
                                                                <div class="text">
                                                                        <div class="form-group">
                                                                            <input class="form-control" type="text">
                                                                        </div>
                                                                    </div>
                                                            </li>
                                                            <li>
                                                                    <div class="title">Starting Date</div>
                                                                    <div class="text">
                                                                            <div class="form-group">
                                                                                <input class="form-control datetimepicker" type="text">
                                                                            </div>
                                                                        </div>
                                                                </li>
                                                                <li>
                                                                        <div class="title">Completion Date</div>
                                                                        <div class="text">
                                                                                <div class="form-group">
                                                                                    <input class="form-control datetimepicker" type="text">
                                                                                </div>
                                                                            </div>
                                                                    </li>
                                                    </ul>
                                               <hr>
                                               <ul class="personal-info">
                                                    <li>
                                                        <div class="title">Institution</div>
                                                        <div class="text">
                                                                <div class="form-group">
                                                                    <input class="form-control" type="text">
                                                                </div>
                                                            </div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Degree</div>
                                                        <div class="text">
                                                                <div class="form-group">
                                                                    <input class="form-control" type="text">
                                                                </div>
                                                            </div>
                                                    </li>

                                                    <li>
                                                            <div class="title">Grade</div>
                                                            <div class="text">
                                                                    <div class="form-group">
                                                                        <input class="form-control" type="text">
                                                                    </div>
                                                                </div>
                                                        </li>
                                                        <li>
                                                                <div class="title">Starting Date</div>
                                                                <div class="text">
                                                                        <div class="form-group">
                                                                            <input class="form-control datetimepicker" type="text">
                                                                        </div>
                                                                    </div>
                                                            </li>
                                                            <li>
                                                                    <div class="title">Completion Date</div>
                                                                    <div class="text">
                                                                            <div class="form-group">
                                                                                <input class="form-control datetimepicker" type="text">
                                                                            </div>
                                                                        </div>
                                                                </li>
                                                </ul>


                                            </div>
								</div>
								<div class="col-md-6">
									<div class="card-box profile-box">
										<h3 class="card-title">Experience </h3>
										<div class="experience-box">
											<ul class="personal-info">
												<li>
                                                        <div class="title">Company Name</div>
                                                        <div class="text">
                                                                <div class="form-group">
                                                                    <input class="form-control" type="text">
                                                                </div>
                                                            </div>
												</li>
                                                <li>
                                                        <div class="title">Location</div>
                                                        <div class="text">
                                                                <div class="form-group">
                                                                    <input class="form-control" type="text">
                                                                </div>
                                                            </div>
												</li>

                                                <li>
                                                        <div class="title">Job Position</div>
                                                        <div class="text">
                                                                <div class="form-group">
                                                                    <input class="form-control" type="text">
                                                                </div>
                                                            </div>
												</li>

                                                <li>
                                                        <div class="title">Period From</div>
                                                        <div class="text">
                                                                <div class="form-group">
                                                                    <input class="form-control datetimepicker" type="text">
                                                                </div>
                                                            </div>
												</li>
												<li>
                                                        <div class="title">Period To</div>
                                                        <div class="text">
                                                                <div class="form-group">
                                                                    <input class="form-control datetimepicker" type="text">
                                                                </div>
                                                            </div>
												</li>

                                            </ul>
                                            <hr>
                                            <ul class="personal-info">
                                                    <li>
                                                            <div class="title">Company Name</div>
                                                            <div class="text">
                                                                    <div class="form-group">
                                                                        <input class="form-control" type="text">
                                                                    </div>
                                                                </div>
                                                    </li>
                                                    <li>
                                                            <div class="title">Location</div>
                                                            <div class="text">
                                                                    <div class="form-group">
                                                                        <input class="form-control" type="text">
                                                                    </div>
                                                                </div>
                                                    </li>

                                                    <li>
                                                            <div class="title">Job Position</div>
                                                            <div class="text">
                                                                    <div class="form-group">
                                                                        <input class="form-control" type="text">
                                                                    </div>
                                                                </div>
                                                    </li>

                                                    <li>
                                                            <div class="title">Period From</div>
                                                            <div class="text">
                                                                    <div class="form-group">
                                                                        <input class="form-control datetimepicker" type="text">
                                                                    </div>
                                                                </div>
                                                    </li>
                                                    <li>
                                                            <div class="title">Period To</div>
                                                            <div class="text">
                                                                    <div class="form-group">
                                                                        <input class="form-control datetimepicker" type="text">
                                                                    </div>
                                                                </div>
                                                    </li>

                                                </ul>
                                                <hr>
                                                <ul class="personal-info">
                                                        <li>
                                                                <div class="title">Company Name</div>
                                                                <div class="text">
                                                                        <div class="form-group">
                                                                            <input class="form-control" type="text">
                                                                        </div>
                                                                    </div>
                                                        </li>
                                                        <li>
                                                                <div class="title">Location</div>
                                                                <div class="text">
                                                                        <div class="form-group">
                                                                            <input class="form-control" type="text">
                                                                        </div>
                                                                    </div>
                                                        </li>

                                                        <li>
                                                                <div class="title">Job Position</div>
                                                                <div class="text">
                                                                        <div class="form-group">
                                                                            <input class="form-control" type="text">
                                                                        </div>
                                                                    </div>
                                                        </li>

                                                        <li>
                                                                <div class="title">Period From</div>
                                                                <div class="text">
                                                                        <div class="form-group">
                                                                            <input class="form-control datetimepicker" type="text">
                                                                        </div>
                                                                    </div>
                                                        </li>
                                                        <li>
                                                                <div class="title">Period To</div>
                                                                <div class="text">
                                                                        <div class="form-group">
                                                                            <input class="form-control datetimepicker" type="text">
                                                                        </div>
                                                                    </div>
                                                        </li>

                                                    </ul>

										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /Profile Info Tab -->



						<!-- Bank Statutory Tab -->
						<!--<div class="tab-pane fade" id="bank_statutory">
							<div class="card">
								<div class="card-body">
									<h3 class="card-title"> Basic Salary Information</h3>
									<form>
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group">
													<label class="col-form-label">Salary basis <span class="text-danger">*</span></label>
													<select class="select">
														<option>Select salary basis type</option>
														<option>Hourly</option>
														<option>Daily</option>
														<option>Weekly</option>
														<option>Monthly</option>
													</select>
											   </div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<label class="col-form-label">Salary amount <small class="text-muted">per month</small></label>
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text">$</span>
														</div>
														<input type="text" class="form-control" placeholder="Type your salary amount" value="0.00">
													</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<label class="col-form-label">Payment type</label>
													<select class="select">
														<option>Select payment type</option>
														<option>Bank transfer</option>
														<option>Check</option>
														<option>Cash</option>
													</select>
											   </div>
											</div>
										</div>
										<hr>
										<h3 class="card-title"> PF Information</h3>
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group">
													<label class="col-form-label">PF contribution</label>
													<select class="select">
														<option>Select PF contribution</option>
														<option>Yes</option>
														<option>No</option>
													</select>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<label class="col-form-label">PF No. <span class="text-danger">*</span></label>
													<select class="select">
														<option>Select PF contribution</option>
														<option>Yes</option>
														<option>No</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group">
													<label class="col-form-label">Employee PF rate</label>
													<select class="select">
														<option>Select PF contribution</option>
														<option>Yes</option>
														<option>No</option>
													</select>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
													<select class="select">
														<option>Select additional rate</option>
														<option>0%</option>
														<option>1%</option>
														<option>2%</option>
														<option>3%</option>
														<option>4%</option>
														<option>5%</option>
														<option>6%</option>
														<option>7%</option>
														<option>8%</option>
														<option>9%</option>
														<option>10%</option>
													</select>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<label class="col-form-label">Total rate</label>
													<input type="text" class="form-control" placeholder="N/A" value="11%">
												</div>
											</div>
									   </div>
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group">
													<label class="col-form-label">Employee PF rate</label>
													<select class="select">
														<option>Select PF contribution</option>
														<option>Yes</option>
														<option>No</option>
													</select>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
													<select class="select">
														<option>Select additional rate</option>
														<option>0%</option>
														<option>1%</option>
														<option>2%</option>
														<option>3%</option>
														<option>4%</option>
														<option>5%</option>
														<option>6%</option>
														<option>7%</option>
														<option>8%</option>
														<option>9%</option>
														<option>10%</option>
													</select>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<label class="col-form-label">Total rate</label>
													<input type="text" class="form-control" placeholder="N/A" value="11%">
												</div>
											</div>
										</div>

										<hr>
										<h3 class="card-title"> ESI Information</h3>
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group">
													<label class="col-form-label">ESI contribution</label>
													<select class="select">
														<option>Select ESI contribution</option>
														<option>Yes</option>
														<option>No</option>
													</select>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<label class="col-form-label">ESI No. <span class="text-danger">*</span></label>
													<select class="select">
														<option>Select ESI contribution</option>
														<option>Yes</option>
														<option>No</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group">
													<label class="col-form-label">Employee ESI rate</label>
													<select class="select">
														<option>Select ESI contribution</option>
														<option>Yes</option>
														<option>No</option>
													</select>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
													<select class="select">
														<option>Select additional rate</option>
														<option>0%</option>
														<option>1%</option>
														<option>2%</option>
														<option>3%</option>
														<option>4%</option>
														<option>5%</option>
														<option>6%</option>
														<option>7%</option>
														<option>8%</option>
														<option>9%</option>
														<option>10%</option>
													</select>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<label class="col-form-label">Total rate</label>
													<input type="text" class="form-control" placeholder="N/A" value="11%">
												</div>
											</div>
									   </div>

										<div class="submit-section">
											<button class="btn btn-primary submit-btn" type="submit">Save</button>
										</div>
									</form>
								</div>
							</div>
						</div>--->
						<!-- /Bank Statutory Tab -->

					</div>
                </div>
				<!-- /Page Content -->
				<div class="submit-section">
											<button class="btn btn-primary submit-btn" type="submit">Save</button>
										</div>
            </div>
			<!-- /Page Wrapper -->
@endsection
