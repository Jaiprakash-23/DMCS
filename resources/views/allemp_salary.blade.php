<?php
use App\Models\Department;
use App\Http\Controllers\CommonController;
?>
@extends('layouts.app')
@section('content')
@include('layouts.admin-sidebar')

 <!-- Page Wrapper -->
 <div class="page-wrapper">

				<!-- Page Content -->
                <div class="content container-fluid">


                    <div class="row">
						<div class="col-sm-4 col-5">
							<h4 class="page-title"> All  Employee Salary Report </h4>
						</div>

					</div>

					<div class="row">
                         <div class="col-sm-3"></div>
                         <div class="col-sm-6">
                          <div class="card">
                            <div class="card-header">Select Month</div>
                            <div class="card-body">
                                <form action="{{ route('salary_get_month_wise') }}" method="get">
                                    @csrf
                                    <input type="month" id="month" name="month" class="form-control" max="<?php echo date("Y-m"); ?>" required>
                                    <div class="mt-3">
                                        <input type="submit" class="btn btn-primary" value="Submit">
                                    </div>
                                    <div class="mt-3">
                                        <a href="{{ route('emp_salary_report') }}"><input type="button" class="btn btn-primary" value="Current Month"></a>
                                    </div>

                                </form>
                            </div>
                          </div>
                          @if (isset($firstDate))
                             <h4>Month Name:- {{ date("M, Y",strtotime($firstDate)) }}</h4>
                         @else
                             <h4> Month Name:- {{ date("M, Y") }}</h4>
                          @endif
                         </div>
                         <div class="col-sm-3"></div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable mb-0">
									<thead>
										<tr>
											<th> Employee Name</th>
											<th> Employee ID </th>
                                            <th> Month  </th>
                                            <th>Amount</th>
                                            <th class="text-right"> Action </th>
											</tr>
									</thead>
									<tbody>
                                        @foreach ($emp as $emps)
                                        @if(isset($firstDate))
                                            @php
                                            $date=$firstDate;
                                            @endphp
                                        @else
                                            @php
                                            $date=date("Y-m-d");
                                            @endphp
                                        @endif
                                        @php
                                        $comm=new CommonController();

                                        $total_salary=$comm->getSalary($emps->id,$date);
                                            $departmentname = Department::where('id', $emps->department)->first()
                                            ->department;
                                        @endphp
										<tr>
											<td>
												<h2 class="table-avatar">
													<a href="" class="avatar"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
													<a href="">{{ $emps->fullname }} <span> {{ $departmentname  }} </span></a>
												</h2>
											</td>
											<td>{{ $emps->emp_id }}</td>
											<td>{{ date("d M Y",strtotime($emps->date_of_joining)) }}</td>
											<td>{{ round($total_salary,2) }}</td>
											<td><a class="btn btn-sm btn-primary" href="{{ route('salary_slip',['id'=>$emps->id,'date'=>date("Ymd",strtotime($date))]) }}">Generate Slip</a></td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="salary-slip.php" ><i class="fa fa-eye m-r-5"></i> View</a>
													</div>
												</div>
											</td>
										</tr>


                                        @endforeach

									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>

				 </div>
			<!-- /Page Wrappe
@endsection
