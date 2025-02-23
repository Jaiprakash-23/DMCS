@extends('layouts.app')
@section('content')
@include('layouts.admin-sidebar')

 <!-- Page Wrapper -->
            <div class="page-wrapper">

				<!-- Page Content -->
                <div class="content container-fluid">
					<div class="row">
						<div class="col-md-8 offset-md-2">
							<form action="{{route('save_location')}}" method="POST">
                                @csrf
								<h3 class="page-title">Add New Location (Site)  </h3>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label> Site Name  Name <span class="text-danger">*</span></label>
											<input class="form-control" name="site_name" type="text" value="CassaWood">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Contact Person</label>
											<input class="form-control " name="contact_person" value="Lakshy" type="text">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-10">
									<div class="form-group">
									<label>Address</label>
									<input class="form-control " name="address" value="Casawoodstock, Opposite, 12th Ave, Greater Noida, Uttar Pradesh 201307" type="text">
									</div>
									</div>
									<div class="col-sm-2">
									<div class="form-group">
									<label>Area</label>
									<input class="form-control " name="area" value="Sector 62" type="text">
									</div>
									</div>
									<div class="col-sm-6 col-md-6 col-lg-3">
										<div class="form-group">
											<label>Country</label>
											<select class="form-control select" name="country">
												<option >INDIA</option>

											</select>
										</div>
									</div>
									<div class="col-sm-6 col-md-6 col-lg-3">
										<div class="form-group">
											<label>City</label>
											<input class="form-control" name="city" value="Sherman Oaks" type="text">
										</div>
									</div>
									<div class="col-sm-6 col-md-6 col-lg-3">
										<div class="form-group">
											<label>State/Province</label>
											<select class="form-control select" name="state">
												<option>California</option>
												<option>Alaska</option>
												<option>Alabama</option>
											</select>
										</div>
									</div>
									<div class="col-sm-6 col-md-6 col-lg-3">
										<div class="form-group">
											<label>Postal Code</label>
											<input class="form-control" name="postal_code" value="91403" type="text">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Email</label>
											<input class="form-control"  name="email" value="danielporter@example.com" type="email">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Phone Number</label>
											<input class="form-control" name="phone" value="818-978-7102" type="text">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Mobile Number</label>
											<input class="form-control" name="mobile" value="818-635-5579" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Fax</label>
											<input class="form-control" name="fax" value="818-978-7102" type="text">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Website Url</label>
											<input class="form-control" name="website_url" value="https://www.example.com" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Number Of Guard</label>
											<input class="form-control" name="no_of_guard" value="58" type="text">
										</div>
									</div>
								</div>
								<div class="submit-section">
									<button class="btn btn-primary submit-btn">Save</button>
								</div>
							</form>
						</div>
					</div>
                </div>
				<!-- /Page Content -->
@endsection
