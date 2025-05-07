
		@extends('layouts.app')
		@section('content')
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
			@include('layouts.admin-sidebar')

			<!-- Page Wrapper -->
			<div class="page-wrapper">

				<!-- Page Content -->
				<div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Employee Transfer</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="">Dashboard</a></li>
									<li class="breadcrumb-item active">Transfer Management</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<!-- Transfer Form -->
					<div class="row">
						<div class="col-lg-12">
							<div class="card transfer-form-card">
								<div class="card-header bg-primary text-white">
									<h5 class="card-title mb-0">Transfer Request Form</h5>
								</div>
								<div class="card-body">
									<form action="{{ route('emp-transfer') }}" method="post" id="inputForm">
										@csrf
										<div class="row">
											<!-- Employee ID Field -->
											<div class="col-md-6 col-lg-4">
												<div class="form-group">
													<label for="userInput" class="form-label">Employee ID *</label>
													<input type="text" id="userInput" name="emp_id"
														class="form-control transfer-input" placeholder="Enter employee ID"
														autocomplete="off">
													<div class="input-feedback"></div>
												</div>
											</div>

											<!-- Employee Name Field -->
											<div class="col-md-6 col-lg-4">
												<div class="form-group">
													<label for="emp_name" class="form-label">Employee Name</label>
													<input type="text" name="emp_name" id="emp_name"
														class="form-control transfer-input" placeholder="Will auto-fill"
														readonly>
												</div>
											</div>

											<!-- Site From Field -->
											<div class="col-md-6 col-lg-4">
												<div class="form-group">
													<label class="form-label">Current Site *</label>
													<select class="form-control transfer-select" name="site_from">
														<option value="">Select Current Site</option>
														@foreach ($site_name as $site)
															<option value="{{ $site->id }}">{{ $site->site_name }}</option>
														@endforeach
													</select>
												</div>
											</div>

											<!-- Site To Field -->
											<div class="col-md-6 col-lg-4">
												<div class="form-group">
													<label class="form-label">Transfer To Site *</label>
													<select class="form-control transfer-select" name="site_to">
														<option value="">Select New Site</option>
														@foreach ($site_name as $site)
															<option value="{{ $site->id }}">{{ $site->site_name }}</option>
														@endforeach
													</select>
												</div>
											</div>

											<!-- Reporting To Field -->
											<div class="col-md-6 col-lg-4">
												<div class="form-group">
													<label class="form-label">New Reporting To *</label>
													<select class="form-control transfer-select" name="report_to">
														<option value="">Select Supervisor</option>
														@foreach ($report as $rep)
															<option value="{{ $rep->id }}">{{ $rep->designation }}</option>
														@endforeach
													</select>
												</div>
											</div>

											<!-- Submit Button -->
											<div class="col-md-12 text-right mt-3">
												<button type="submit" class="btn btn-primary transfer-submit-btn">
													<i class="fas fa-paper-plane mr-2"></i> Submit Transfer Request
												</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- /Transfer Form -->
				</div>
				<!-- /Page Content -->
			</div>
			<!-- /Page Wrapper -->
			<script>
				// Enhanced AJAX employee lookup with debouncing
				document.getElementById('userInput').addEventListener('input', function (e) {
					let input = this.value.trim();
					
					if (input.length < 3) return;

					// Show loading state
					let feedbackEl = this.nextElementSibling;
					feedbackEl.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Searching...';
					feedbackEl.style.display = 'block';

					// Debounce the API call
					clearTimeout(this.timer);
					this.timer = setTimeout(() => {
						fetch('/process-input', {
							method: 'POST',
							headers: {
								'Content-Type': 'application/json',
								'X-CSRF-TOKEN': '{{ csrf_token() }}'
							},
							body: JSON.stringify({ user_input: input })
						})
							.then(response => response.json())
							.then(data => {
								if (data.user) {
									document.getElementById('emp_name').value = data.user.fullname;
									feedbackEl.innerHTML = '<i class="fas fa-check text-success"></i> Employee found';
									setTimeout(() => feedbackEl.style.display = 'none', 2000);
								} else {
									document.getElementById('emp_name').value = '';
									feedbackEl.innerHTML = '<i class="fas fa-times text-danger"></i> Employee not found';
								}
							})
							.catch(error => {
								console.error('Error:', error);
								feedbackEl.innerHTML = '<i class="fas fa-times text-danger"></i> Search failed';
							});
					}, 500);
				});

				// Form validation
				document.getElementById('inputForm').addEventListener('submit', function (e) {
					let isValid = true;
					const requiredFields = this.querySelectorAll('[required]');

					requiredFields.forEach(field => {
						if (!field.value.trim()) {
							field.style.borderColor = '#dc3545';
							isValid = false;
						} else {
							field.style.borderColor = '#ced4da';
						}
					});

					if (!isValid) {
						e.preventDefault();
						alert('Please fill all required fields marked with *');
					}
				});
			</script>
			<style>
				/* Form Container */
				.transfer-form-card {
					border-radius: 10px;
					box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
					border: none;
				}

				/* Form Inputs */
				.transfer-input {
					border-radius: 8px;
					padding: 12px 15px;
					border: 1px solid #e0e6ed;
					transition: all 0.3s;
					height: 45px;
				}

				.transfer-input:focus {
					border-color: #5c6bc0;
					box-shadow: 0 0 0 3px rgba(92, 107, 192, 0.2);
				}

				/* Select Dropdowns */
				.transfer-select {
					height: 45px;
					border-radius: 8px;
					padding: 10px 15px;
					appearance: none;
					background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%235c6bc0' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
					background-repeat: no-repeat;
					background-position: right 15px center;
					background-size: 12px;
				}

				/* Submit Button */
				.transfer-submit-btn {
					padding: 12px 30px;
					border-radius: 8px;
					font-weight: 500;
					letter-spacing: 0.5px;
					transition: all 0.3s;
					background: linear-gradient(135deg, #5c6bc0 0%, #3949ab 100%);
					border: none;
				}

				.transfer-submit-btn:hover {
					transform: translateY(-2px);
					box-shadow: 0 4px 12px rgba(92, 107, 192, 0.3);
				}

				/* Input Feedback */
				.input-feedback {
					font-size: 12px;
					margin-top: 5px;
					display: none;
				}

				/* Responsive Adjustments */
				@media (max-width: 768px) {

					.transfer-input,
					.transfer-select {
						height: 42px;
						padding: 10px 12px;
					}

					.transfer-submit-btn {
						width: 100%;
						padding: 12px;
					}
				}
			</style>
		@endsection

		
			
		