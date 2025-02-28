@php
    use App\Models\Department;
    use App\Models\Attendance;
@endphp
@extends('layouts.app')
@section('content')
    @include('layouts.admin-sidebar')

    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-sm-8 col-6">
                    <h4 class="page-title">Attendance {{ $department_name }}</h4>
                </div>
                <!--<div class="col-sm-4 col-6 text-right m-b-30">
               <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_leave"><i class="fa fa-plus"></i> Add Attendance</a>
              </div>-->
            </div>
            <!-- /Page Title -->

            <!-- Leave Statistics -->

            <!-- /Leave Statistics -->

            <!-- Search Filter -->
            <div class="row filter-row">
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
            </div>
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
                                    @if ($department_name == 'All Employee')
                                        <th>Department</th>
                                    @endif
                                    <th>Date</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employee as $emp)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $emp->fullname }}</td>
                                        <td>{{ $emp->emp_id }}</td>
                                        @if ($department_name == 'All Employee')
                                            @php
                                                $departmentname = Department::where('id', $emp->department)->first()
                                                    ->department;
                                            @endphp
                                            <td>{{ $departmentname }}</td>
                                        @endif
                                        <td>{{ date('d-m-Y') }}</td>
                                        <td class="text-center" id="statustd{{ $emp->id }}">
                                            @php
                                             $date=date("Y-m-d H:i:s");
                                            $attendance_tbl=Attendance::where("date",date("Y-m-d"))->where("emp_id",$emp->id)->first();
                                            @endphp
                                            @if (!empty($attendance_tbl))
                                               @if ($attendance_tbl->attendance_status==1)
                                               <a class="dropdown-item"><i class="fa fa-dot-circle-o text-success"></i> Present</a>
                                               @else
                                               <a class="dropdown-item"><i class="fa fa-dot-circle-o text-danger"></i> Absent</a>
                                               @endif
                                             @else
                                            <div class="dropdown action-label">
                                                <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-dot-circle-o text-danger"></i> Select </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" onclick="changeStatus(1,{{ $emp->id }},'{{ $date }}')"><i
                                                            class="fa fa-dot-circle-o text-success"></i> Present</a>
                                                    <a class="dropdown-item" onclick="changeStatus(0,{{ $emp->id }},'{{ $date }}')"><i
                                                            class="fa fa-dot-circle-o text-danger"></i> Absent</a>
                                                </div>
                                            </div>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                    aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                                        data-target="#edit_leave"><i class="fa fa-pencil m-r-5"></i>
                                                        Edit</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <script>
                                    function changeStatus(status_id,emp_id,date) {
                                        $.ajax({
                                            url: "{{ route('present_absent') }}",
                                            type: 'POST',
                                            data: {
                                                'status_id': status_id,
                                                'emp_id': emp_id,
                                                'date': date,
                                                "_token": "{{ csrf_token() }}"
                                            },
                                            success: function(response) {
                                                console.log(response.status);
                                                if(response.status==1){
                                                    if(response.status_id==1){
                                                        $("#statustd"+emp_id).html('<a class="dropdown-item"><i class="fa fa-dot-circle-o text-success"></i> Present</a>')
                                                    }else{
                                                        $("#statustd"+emp_id).html('<a class="dropdown-item"><i class="fa fa-dot-circle-o text-danger"></i> Absent</a>')
                                                    }
                                                }
                                            },

                                        });
                                    }
                                </script>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

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
                                <textarea rows="4" class="form-control" placeholder="End Shift, Moved,Error Report"></textarea>
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

        <!-- Approve Leave Modal -->
        <div class="modal custom-modal fade" id="approve_leave" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Leave Approve</h3>
                            <p>Are you sure want to approve for this leave?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6">
                                    <a href="javascript:void(0);" class="btn btn-primary continue-btn">Approve</a>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:void(0);" data-dismiss="modal"
                                        class="btn btn-primary cancel-btn">Decline</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Approve Leave Modal -->

    </div>
    <!-- /Page Wrapper -->
@endsection
