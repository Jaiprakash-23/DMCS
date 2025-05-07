@extends('layouts.app')

@section('content')
    @include('layouts.admin-sidebar')

    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Salary Distribution</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item active">Salary Management</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Form Container -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h4 class="card-title mb-0">Define Salary Range</h4>
                        </div>

                        <form id="salaryForm" action="{{ route('salary_save') }}" method="POST">
                            @csrf

                            <div class="card-body">
                                <!-- Area and Site Selection -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Area <span class="text-danger">*</span></label>
                                            <select id="areaSelect" name="area" class="form-control select2" required>
                                                <option value="">-- Select Area --</option>
                                                @foreach ($data as $location_data)
                                                    <option value="{{ $location_data->area }}"
                                                        {{ old('area') == $location_data->area ? 'selected' : '' }}>
                                                        {{ $location_data->area }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('area')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Site Name <span class="text-danger">*</span></label>
                                            <select id="siteSelect" name="site_name" class="form-control select2" required>
                                                <option value="">-- Select Site --</option>
                                                @if(old('site_name'))
                                                    <option value="{{ old('site_name') }}" selected>{{ old('site_name') }}
                                                    </option>
                                                @endif
                                            </select>
                                            @error('site_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Designation and Salary -->
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Designation <span class="text-danger">*</span></label>
                                            <select name="designation" class="form-control select2" required>
                                                <option value="">-- Select Designation --</option>
                                                @foreach ($designation_data as $designation)
                                                    <option value="{{ $designation->id }}"
                                                        {{ old('designation') == $designation->designation ? 'selected' : '' }}>
                                                        {{ $designation->designation }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('designation')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Salary Amount <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text">₹</span>
                                                <input type="number" name="salary_amount" class="form-control"
                                                    value="{{ old('salary_amount') }}" placeholder="Enter salary amount"
                                                    required>
                                            </div>
                                            @error('salary_amount')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-end">
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <button type="submit" class="btn btn-primary">Save Salary</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


        <script>
            $(document).ready(function () {
                // Initialize select2
                $('.select2').select2({
                    width: '100%'
                });

                // AJAX for loading sites based on area
                $('#areaSelect').change(function () {
                    var selectedArea = $(this).val();
                    $('#siteSelect').empty().append('<option value="">-- Select Site --</option>');

                    if (selectedArea) {
                        $.ajax({
                            url: '/get-sites/' + selectedArea,
                            type: 'GET',
                            dataType: 'json',
                            success: function (data) {
                                $.each(data, function (index, site) {
                                    $('#siteSelect').append(
                                        $('<option>', {
                                            value: site.id,
                                            text: site.site_name
                                        })
                                    );
                                });
                            },
                            error: function (xhr) {
                                console.error('Error fetching sites:', xhr.responseText);
                                toastr.error('Failed to load sites. Please try again.');
                            }
                        });
                    }
                });

                // Form validation
                $('#salaryForm').validate({
                    rules: {
                        area: "required",
                        site_name: "required",
                        designation: "required",
                        salary_amount: {
                            required: true,
                            number: true,
                            min: 0
                        }
                    },
                    messages: {
                        area: "Please select an area",
                        site_name: "Please select a site",
                        designation: "Please select a designation",
                        salary_amount: {
                            required: "Please enter salary amount",
                            number: "Please enter a valid number",
                            min: "Salary must be positive"
                        }
                    },
                    errorElement: 'span',
                    errorPlacement: function (error, element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight: function (element, errorClass, validClass) {
                        $(element).addClass('is-invalid');
                    },
                    unhighlight: function (element, errorClass, validClass) {
                        $(element).removeClass('is-invalid');
                    }
                });
            });
        </script>
    @endsection

