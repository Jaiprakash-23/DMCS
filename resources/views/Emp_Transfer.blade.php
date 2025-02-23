@extends('layouts.app')
@section('content')
@include('layouts.admin-sidebar')

<!-- Page Wrapper -->
<div class="page-wrapper">

			<!-- Page Content -->
			<div class="content container-fluid">

				<!-- Page Title -->
				<div class="row">
					<div class="col">
						<h4 class="page-title"> Emp Transfer</h4>
					</div>
					<div class="col-12 text-right m-b-30">


					</div>
				</div>


					<!-- Search Filter -->
					<div class="row filter-row">
						<div class="col-sm-6 col-md-2">
							<div class="form-group form-focus">
								<input type="text" class="form-control floating">
								<label class="focus-label">Employee ID</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-2">
							<div class="form-group form-focus">
								<input type="text" class="form-control floating">
								<label class="focus-label">Employee Name</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-2">
							<div class="form-group form-focus select-focus">
								<select class="select floating">
									<option>Select Site Frome</option>
									<option>Web Developer</option>
									<option>Web Designer</option>
									<option>Android Developer</option>
									<option>Ios Developer</option>
								</select>

							</div>
						</div>


						<div class="col-sm-6 col-md-2">
							<div class="form-group form-focus select-focus">
								<select class="select floating">
									<option>Select Site To</option>
									<option>Casa</option>
									<option>Nasia</option>
									<option>Diysutra</option>
									<option>Websbaba</option>
								</select>

							</div>
						</div>

						<div class="col-sm-6 col-md-2">
							<div class="form-group form-focus select-focus">
								<select class="select floating">
									<option>Reporting</option>
									<option>Arjun</option>
									<option>Akash</option>
									<option>Subash</option>
									<option>Kamal</option>
								</select>

							</div>
						</div>

						<div class="col-sm-6 col-md-2">
							<a href="#" class="btn btn-success btn-block"> Send </a>
						</div>



                    </div>


			@endsection
