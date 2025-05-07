@extends('layouts.app')
@section('content')
    @include('layouts.admin-sidebar')
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-sm-8 col-6">
                    <h4 class="page-title">My Leave</h4>
                </div>
                <!--<div class="col-sm-4 col-6 text-right m-b-30">
                                                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_leave"><i class="fa fa-plus"></i> Add Attendance</a>
                                                </div>-->
            </div>
            <!-- /Page Title -->

            <!-- Leave Statistics -->

            <!-- /Leave Statistics -->

            <!-- Search Filter -->
            <!-- <div class="row filter-row">
                        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 col-12">
                            <div class="form-group form-focus">
                                <input type="text" class="form-control floating">
                                <label class="focus-label">Employee ID </label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 col-12">
                            <div class="form-group form-focus select-focus">
                                <select class="select floating">
                                    <option> -- Select Site-- </option>
                                    <option>Casual Leave</option>
                                    <option>Medical Leave</option>
                                    <option>Loss of Pay</option>
                                </select>
                                <label class="focus-label">Select Location </label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 col-12">
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

                        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 col-12">
                            <a href="#" class="btn btn-success btn-block"> Search </a>
                        </div>
                    </div> -->
            <!-- /Search Filter -->

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Employee</th>
                                    <th> Employee ID</th>
                                    <th>Date</th>
                                    <th> description </th>
                                    <th> Subject </th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leave as $lev)
                                    <tr>
                                        <td>{{ $lev->id }}</td>
                                        <td>{{ $lev->employee_name }}</td>
                                        <td>{{ $lev->emp_id }}</td>
                                        <td>{{ $lev->from }} To {{ $lev->to }}</td>
                                        <td>{{ $lev->description }}</td>
                                        <td>{{ $lev->subject }}</td>
                                        @if($lev->status == 'Approved')
                                            <td class="text-success">
                                                <i class="fa fa-check-circle"></i> {{ $lev->status }}
                                            </td>
                                        @elseif ($lev->status == 'Rejected')
                                            <td class="text-danger">
                                                <i class="fa fa-dot-circle-o text-danger"></i> {{ $lev->status }}
                                            </td>
                                        @else
                                            <td class="text-danger">
                                                <i class="fa fa-dot-circle-o text-danger"></i> {{ $lev->status }}
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

        <!-- Add Leave Modal -->
        <!--<div id="add_leave" class="modal custom-modal fade" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Add Leave</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <div class="form-group">
                                                                <label>Leave Type <span class="text-danger">*</span></label>
                                                                <select class="select">
                                                                    <option>Select Leave Type</option>
                                                                    <option>Casual Leave 12 Days</option>
                                                                    <option>Medical Leave</option>
                                                                    <option>Loss of Pay</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>From <span class="text-danger">*</span></label>
                                                                <div class="cal-icon">
                                                                    <input class="form-control datetimepicker" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>To <span class="text-danger">*</span></label>
                                                                <div class="cal-icon">
                                                                    <input class="form-control datetimepicker" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Number of days <span class="text-danger">*</span></label>
                                                                <input class="form-control" readonly type="text">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Remaining Leaves <span class="text-danger">*</span></label>
                                                                <input class="form-control" readonly value="12" type="text">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Leave Reason <span class="text-danger">*</span></label>
                                                                <textarea rows="4" class="form-control"></textarea>
                                                            </div>
                                                            <div class="submit-section">
                                                                <button class="btn btn-primary submit-btn">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->
        <!-- /Add Leave Modal -->

        <!-- Edit Attendance Modal -->
        <div id="edit_leave" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Attendance </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>

                            <div class="form-group form-focus select-focus">
                                <select class="select floating">
                                    <option> -- Select Status -- </option>
                                    <option> Present </option>
                                    <option> Absent </option>
                                </select>
                                <label class="focus-label"> Present Status </label>
                            </div>
                            <div class="form-group form-focus select-focus">
                                <select class="select floating">
                                    <option> -- Select Status -- </option>
                                    <option> On </option>
                                    <option> Off </option>
                                </select>
                                <label class="focus-label"> Duty Status </label>
                            </div>
                            <div class="form-group focus-label">
                                <label>Remark <span class="text-danger">*</span></label>
                                <textarea rows="4" class="form-control"
                                    placeholder="End Shift, Moved,Error Report"></textarea>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Leave Modal -->



        <!-- Delete Leave Modal -->
        <!--<div class="modal custom-modal fade" id="delete_approve" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="form-header">
                                                            <h3>Delete Leave</h3>
                                                            <p>Are you sure want to delete this leave?</p>
                                                        </div>
                                                        <div class="modal-btn delete-action">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                                                                </div>
                                                                <div class="col-6">
                                                                    <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->
        <!-- /Delete Leave Modal -->

    </div>

@endsection