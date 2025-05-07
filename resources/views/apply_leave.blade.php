@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@section('content')
    @include('layouts.admin-sidebar')

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Success/Error Alerts -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Page Content -->
        <div class="content container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <h4 class="page-title">Apply for Leave</h4>
                    <p class="text-muted">Fill in the details below to submit your leave request.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card leave-form-card">
                        <div class="card-header">
                            <h5 class="card-title">Leave Application</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('apply_leave_save') }}" method="post" class="leave-form">
                                @csrf
                                
                                <!-- Subject -->
                                <div class="form-group">
                                    <label for="subject" class="form-label">Leave Subject *</label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('subject') is-invalid @enderror" 
                                        id="subject" 
                                        name="subject" 
                                        placeholder="e.g., Sick Leave, Vacation"
                                        value="{{ old('subject') }}"
                                    >
                                    @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="form-group">
                                    <label for="description" class="form-label">Reason for Leave *</label>
                                    <textarea 
                                        class="form-control @error('description') is-invalid @enderror" 
                                        id="description" 
                                        name="description" 
                                        rows="4"
                                        placeholder="Please describe the reason for your leave"
                                    >{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Date Range -->
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="from" class="form-label">From Date *</label>
                                        <input 
                                            type="date" 
                                            class="form-control @error('from') is-invalid @enderror" 
                                            id="from" 
                                            name="from"
                                            value="{{ old('from') }}"
                                        >
                                        @error('from')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="to" class="form-label">To Date *</label>
                                        <input 
                                            type="date" 
                                            class="form-control @error('to') is-invalid @enderror" 
                                            id="to" 
                                            name="to"
                                            value="{{ old('to') }}"
                                        >
                                        @error('to')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="form-group text-right mt-4">
                                    <button type="submit" class="btn btn-submit">
                                        <i class="fas fa-paper-plane mr-2"></i> Submit Request
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
    </div>
    <!-- /Page Wrapper -->
    <style>
    /* Custom CSS for Leave Form */
    .leave-form-card {
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border: none;
    }

    .leave-form-card .card-header {
        background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        color: white;
        border-radius: 10px 10px 0 0 !important;
        padding: 15px 20px;
    }

    .leave-form-card .card-title {
        margin: 0;
        font-weight: 600;
    }

    .leave-form {
        padding: 20px;
    }

    .form-label {
        font-weight: 600;
        color: #495057;
        margin-bottom: 8px;
    }

    .form-control {
        border-radius: 8px;
        padding: 10px 15px;
        border: 1px solid #ced4da;
        transition: all 0.3s;
    }

    .form-control:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .btn-submit {
        background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        border: none;
        padding: 10px 25px;
        border-radius: 8px;
        font-weight: 600;
        color: white;
        transition: all 0.3s;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 14px;
    }

    .text-muted {
        color: #6c757d !important;
    }
</style>
@endsection



