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
							<h4 class="page-title"> Salary Distribution </h4>
						</div>
						<!--<div class="col-sm-7 col-8 text-right m-b-30">
							<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_pf"><i class="fa fa-plus"></i> Add Provident Fund</a>
						</div>-->
					</div>
					<!-- /Page Title -->

					<div class="row">

						<div class="col-12 col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header"> Define Salary Range </div>

									<div class="card-body">
									<div class="row filter-row">
					   <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
							<div class="form-group form-focus select-focus">
								<select class="select floating">
									<option> -- Select Select Area -- </option>
									<option>DLF Phase 1 Gurgaon</option>
															<option>DLF Phase 2 Gurgaon</option>
															<option>DLF Phase 3 Gurgaon</option>
															<option>DLF Phase 4 Gurgaon</option>
															<option>DLF Phase 5 Gurgaon</option>
									</select>
								<label class="focus-label"> Area </label>
							</div>
					   </div>
					   <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
							<div class="form-group form-focus select-focus">
								<select class="select floating">
									<option> -- Select Site-- </option>
									<option>Casual Leave</option>
									<option>Medical Leave</option>
									<option>Loss of Pay</option>
								</select>
								<label class="focus-label"> Site Name </label>
							</div>
					   </div>
					   <br/>
					   <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
							<div class="form-group form-focus select-focus">
								<select class="select floating">
									<option> -- Select Designation -- </option>
									<option> SECURITY GUARD </option>
									<option> LADY GAURD </option>
									<option> SECURITY GUNMAN</option>
								    <option> HEAD GUARD </option>
									</select>
								<label class="focus-label"> Designation </label>
							</div>
					   </div>

					   <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
							<div class="form-group form-focus">
								<input type="text" class="form-control floating" />
								<label class="focus-label">Salary Amount  </label>
							</div>
					   </div>


                    </div>


									</div>
									<div class="card-footer text-muted"> All employee Salary Range </div>



								</div>

								<div class="form-group">
                                                        <div class="col-md-12 col-xs-12">
                                                        <p class="text-center"> <input type="submit" class="btn btn-primary btn-lg" value="Save"/> </p>
                                                       </div>
                                                </div>
						</div>




				</div>

				 </div>
			<!-- /Page Wrapper -->
@endsection
