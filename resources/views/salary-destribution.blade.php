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
                    <form action="{{route('salary_save')}}" method="POST">
                        @csrf
					<div class="row">

						<div class="col-12 col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header"> Define Salary Range </div>

									<div class="card-body">
									<div class="row filter-row">
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                                            <div class="form-group form-focus select-focus">
                                                <select id="areaSelect" name="area" class="select floating">
                                                    <option> -- Select Area -- </option>
                                                    @foreach ($data as $location_data)
                                                        <option value="{{ $location_data->area }}">{{ $location_data->area }}</option>
                                                    @endforeach
                                                </select>
                                                <label class="focus-label">Area</label>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                                            <div class="form-group form-focus select-focus">
                                                <select id="siteSelect" name="site_name" class="select floating">
                                                    <option> -- Select Site -- </option>
                                                </select>
                                                <label class="focus-label">Site Name</label>
                                            </div>
                                        </div>

                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                        <script>
                                            $(document).ready(function() {

                                                $('#areaSelect').change(function() {
                                                    var selectedArea = $(this).val();
                                                    // alert(selectedArea);
                                                    if (selectedArea) {
                                                        $.ajax({
                                                            url: '/get-sites/' + selectedArea,
                                                            type: 'GET',
                                                            dataType: 'json',
                                                            success: function(data) {
                                                                // console.log(data);
                                                                $('#siteSelect').empty().append('<option> -- Select Site -- </option>');

                                                                $.each(data, function(index, site) {
                                                                    $('#siteSelect').append('<option value="' + site.site_name + '">' + site.site_name + '</option>');
                                                                });
                                                            },

                                                        });
                                                    } else {
                                                        $('#siteSelect').empty().append('<option> -- Select Site -- </option>');
                                                    }
                                                });
                                            });
                                        </script>

					   <br/>
					   <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
							<div class="form-group form-focus select-focus">
								<select class="select floating" name="designation">
									<option> -- Select Designation -- </option>
                                    @foreach ($designation_data as $designation)
									<option> {{$designation->designation}} </option>
                                    @endforeach

									</select>
								<label class="focus-label"> Designation </label>
							</div>
					   </div>

					   <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
							<div class="form-group form-focus">
								<input type="text" name="salary_amount" class="form-control floating" />
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
            </form>
				 </div>
			<!-- /Page Wrapper -->
@endsection
