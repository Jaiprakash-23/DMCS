@extends('layouts.app')
@section('content')
	<!-- Main Wrapper -->
	<div class="main-wrapper">
		<div class="account-content">
			<div class="container">
				<!-- Account Logo -->

				<!-- /Account Logo -->

				<div class="account-box">
					<div class="account-wrapper">
						<div class="account-logo flex justify-center">
							<a href="{{ url('/') }}">
								<img src="{{ asset('assets/img/logo2.png') }}" alt="Websbaba Technologies"
									class="logo-hover">
							</a>
						</div>
						<div class="login-header">
							<h3 class="account-title">Welcome Back!</h3>
							<p class="account-subtitle">Access your dashboard</p>
						</div>

						<!-- Display Success Message if exists -->
						@if(session('success'))
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								{{ session('success') }}
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						@endif

						<!-- Account Form -->
						<form action="{{ route('loginMatch') }}" method="POST" id="loginForm">
							@csrf
							<div class="form-group">
								<label>Email Address <span class="text-danger">*</span></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-envelope"></i></span>
									</div>
									<input class="form-control" type="email" name="email" placeholder="Enter your email"
										value="{{ old('email') }}" autofocus>
								</div>
								@error('email')
									<div class="text-danger mt-1">{{ $message }}</div>
								@enderror
							</div>

							<div class="form-group">
								<div class="d-flex justify-content-between">
									<label>Password <span class="text-danger">*</span></label>
									<a href="{{ route('password.request') }}" class="forgot-link">Forgot Password?</a>
								</div>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-lock"></i></span>
									</div>
									<input class="form-control" type="password" name="password" id="password"
										placeholder="Enter your password">
									<div class="input-group-append">
										<span class="input-group-text toggle-password" onclick="togglePassword()">
											<i class="fas fa-eye"></i>
										</span>
									</div>
								</div>
								@error('password')
									<div class="text-danger mt-1">{{ $message }}</div>
								@enderror
							</div>

							<div class="form-group">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" name="remember" id="remember">
									<label class="form-check-label" for="remember">Remember me</label>
								</div>
							</div>

							<div class="form-group text-center">
								<button class="btn btn-primary account-btn" type="submit">
									<span id="loginText">Login</span>
									<span id="loginSpinner" class="spinner-border spinner-border-sm d-none" role="status"
										aria-hidden="true"></span>
								</button>
							</div>

							<div class="account-footer text-center mt-3">
								<p>Don't have an account? <a href="{{ route('register') }}" class="register-link">Register
										here</a></p>
							</div>
						</form>
						<!-- /Account Form -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Main Wrapper -->

	@section('scripts')
		<script>
			// Toggle password visibility
			function togglePassword() {
				const password = document.getElementById('password');
				const icon = document.querySelector('.toggle-password i');
				if (password.type === 'password') {
					password.type = 'text';
					icon.classList.replace('fa-eye', 'fa-eye-slash');
				} else {
					password.type = 'password';
					icon.classList.replace('fa-eye-slash', 'fa-eye');
				}
			}

			// Show loading spinner during form submission
			document.getElementById('loginForm').addEventListener('submit', function () {
				document.getElementById('loginText').classList.add('d-none');
				document.getElementById('loginSpinner').classList.remove('d-none');
			});
		</script>
	@endsection

	<style>
		/* Custom CSS for enhanced look */
		.account-box {
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
			border-radius: 10px;
			transition: all 0.3s ease;
		}

		.account-box:hover {
			box-shadow: 0 0 25px rgba(0, 0, 0, 0.15);
		}

		.logo-hover:hover {
			transform: scale(1.05);
			transition: transform 0.3s ease;
		}

		.account-btn {
			padding: 10px 30px;
			font-weight: 600;
			transition: all 0.3s ease;
		}

		.account-btn:hover {
			transform: translateY(-2px);
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
		}

		.forgot-link,
		.register-link {
			color: #6c757d;
			transition: color 0.3s ease;
		}

		.forgot-link:hover,
		.register-link:hover {
			color: #007bff;
			text-decoration: none;
		}

		.toggle-password {
			cursor: pointer;
			background-color: #f8f9fa;
		}

		.login-header {
			margin-bottom: 1.5rem;
		}
	</style>
@endsection