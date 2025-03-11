@extends('layouts.app')
@section('content')
@include('layouts.admin-sidebar')

			<!-- /Sidebar -->

			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
					<div class="row">
						<div class="col-sm-8">
							<h4 class="page-title">Apply Leave</h4>
						</div>
					</div>

					<div class="row">

                        <div class="col-sm-12">
                            <div class="card p-5">
                                <form action="{{ route('apply_leave_save') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Subject</label>
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                                      </div>
                                      @error('subject')
                                      <div class="text-danzer">{{ $message }}</div>
                                      @enderror
                                      <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                                        <textarea class="form-control" id="discription" name="discription" rows="3"></textarea>
                                        @error('discription')
                                        <div class="text-danzer">{{ $message }}</div>
                                        @enderror
                                      </div>
                                      <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Send</button>
                                       </div>
                                </form>
                            </div>
                        </div>


					</div>



                </div>
				<!-- /Page Content -->

            </div>
			<!-- Page Wrapper -->
		@endsection
