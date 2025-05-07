@extends('layouts.app')

@section('content')
    @include('layouts.admin-sidebar')

    <style>
        .location-form {
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .form-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 10px 10px 0 0;
        }

        .form-body {
            padding: 30px;
        }

        .form-section {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }

        .form-section:last-child {
            border-bottom: none;
        }

        .form-section-title {
            color: #6c757d;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .form-section-title i {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .form-control {
            border-radius: 5px;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        .select2-container--default .select2-selection--single {
            height: 46px;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 46px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 44px;
        }

        .btn-submit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-reset {
            background-color: #f8f9fa;
            border: 1px solid #e0e0e0;
            color: #6c757d;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-reset:hover {
            background-color: #e9ecef;
        }

        .input-group-text {
            background-color: #f1f3f5;
            border: 1px solid #e0e0e0;
        }

        .-field::after {
            content: " *";
            color: #dc3545;
        }

        @media (max-width: 768px) {
            .form-body {
                padding: 20px;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Add New Location</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href=""><i class="fas fa-home"></i> Dashboard</a></li>
                            <li class="breadcrumb-item"><a href=""><i class="fas fa-map-marker-alt"></i> Locations</a></li>
                            <li class="breadcrumb-item active"><i class="fas fa-plus-circle"></i> Add New</li>
                        </ul>
                    </div>
                    
                    <!-- <div class="col-auto">
                        <a href="" class="btn btn-light">
                            <i class="fas fa-arrow-left"></i> Back to Locations
                        </a>
                    </div> -->
                </div>
                @if(session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="location-form">
                        <div class="form-header">
                            <h4><i class="fas fa-map-marked-alt"></i> Location Information</h4>
                            <p class="mb-0">Fill in the details below to add a new location</p>
                        </div>

                        <form id="locationForm" action="{{ route('save_location') }}" method="POST" class="form-body">
                            @csrf

                            <!-- Basic Information Section -->
                            <div class="form-section">
                                <h5 class="form-section-title"><i class="fas fa-info-circle"></i> Basic Information</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="-field">Site Name</label>

                                            <input class="form-control @error('site_name') is-invalid @enderror"
                                                name="site_name" type="text" >
                                            @error('site_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contact Person</label>
                                            <input class="form-control @error('contact_person') is-invalid @enderror"
                                                name="contact_person" value="" type="text">
                                            @error('contact_person')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Address Section -->
                            <div class="form-section">
                                <h5 class="form-section-title"><i class="fas fa-map-marker-alt"></i> Address Details</h5>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="-field">Address</label>
                                            <input class="form-control @error('address') is-invalid @enderror"
                                                name="address" value="">
                                            @error('address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="-field">Area</label>
                                            <input class="form-control @error('area') is-invalid @enderror" name="area"
                                                value="">
                                            @error('area')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select class="form-control select @error('country') is-invalid @enderror"
                                                name="country">
                                                <option value="INDIA" selected>INDIA</option>
                                                <!-- Add more countries as needed -->
                                            </select>
                                            @error('country')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="-field">City</label>
                                            <input class="form-control @error('city') is-invalid @enderror" name="city"
                                                value="">
                                            @error('city')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="-field">Postal Code</label>
                                            <input class="form-control @error('postal_code') is-invalid @enderror"
                                                name="postal_code" value="">
                                            @error('postal_code')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Contact Information Section -->
                            <div class="form-section">
                                <h5 class="form-section-title"><i class="fas fa-phone-alt"></i> Contact Information</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                </div>
                                                <input class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="" type="email">
                                            </div>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input class="form-control @error('phone') is-invalid @enderror"
                                                    name="phone" value="" type="tel">
                                            </div>
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mobile Number</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                                </div>
                                                <input class="form-control @error('mobile') is-invalid @enderror"
                                                    name="mobile" value="" type="tel">
                                            </div>
                                            @error('mobile')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Fax</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-fax"></i></span>
                                                </div>
                                                <input class="form-control @error('fax') is-invalid @enderror" name="fax"
                                                    value="" type="tel">
                                            </div>
                                            @error('fax')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Additional Information Section -->
                            <div class="form-section">
                                <h5 class="form-section-title"><i class="fas fa-info-circle"></i> Additional Information
                                </h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Website URL</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-globe"></i></span>
                                                </div>
                                                <input class="form-control @error('website_url') is-invalid @enderror"
                                                    name="website_url" value="" type="url">
                                            </div>
                                            @error('website_url')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Number Of Guards</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user-shield"></i></span>
                                                </div>
                                                <input class="form-control @error('no_of_guard') is-invalid @enderror"
                                                    name="no_of_guard" value="" type="number"
                                                    min="0">
                                            </div>
                                            <input type="text" name="id" value="" hidden>
                                            @error('no_of_guard')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-footer text-right">
                                <button type="reset" class="btn btn-reset mr-2">
                                    <i class="fas fa-undo"></i> Reset
                                </button>
                                <button type="submit" class="btn btn-submit">
                                    <i class="fas fa-save"></i> Save Location
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>
            $(document).ready(function () {
                // Initialize select2 with custom styling
                $('.select').select2({
                    width: '100%',
                    theme: 'bootstrap4',
                    placeholder: $(this).data('placeholder'),
                    allowClear: Boolean($(this).data('allow-clear')),
                });

                // Form validation with custom messages
                $('#locationForm').validate({
                    rules: {
                        site_name: "",
                        address: "",
                        area: "",
                        city: "",
                        state: "",
                        postal_code: "",
                        email: {
                            email: true
                        },
                        website_url: {
                            url: true
                        },
                        no_of_guard: {
                            number: true,
                            min: 0
                        }
                    },
                    messages: {
                        site_name: "Please enter site name",
                        address: "Please enter address",
                        area: "Please enter area",
                        city: "Please enter city",
                        state: "Please select state",
                        postal_code: "Please enter postal code",
                        email: {
                            email: "Please enter a valid email address"
                        },
                        website_url: {
                            url: "Please enter a valid URL (include http:// or https://)"
                        },
                        no_of_guard: {
                            number: "Please enter a valid number",
                            min: "Number must be positive"
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
                    },
                    submitHandler: function (form) {
                        // Show loading state
                        $('.btn-submit').html('<i class="fas fa-spinner fa-spin"></i> Saving...').prop('disabled', true);
                        form.submit();
                    }
                });
            });
        </script>
    @endsection

@endsection