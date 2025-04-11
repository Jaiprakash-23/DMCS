@extends('layouts.app')
@section('content')
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<div class="account-content">
				<!--<a href="job-list.html" class="btn btn-primary apply-btn">Apply Job</a> -->
				<div class="container">

					<!-- Account Logo -->
					<div class="account-logo">
						<a href=""><img src="assets/img/logo2.png" alt="Websbaba Technologies"></a>
					</div>
					<!-- /Account Logo -->

					<div class="account-box">
						<div class="account-wrapper">
							<h3 class="account-title">Login</h3>
							<p class="account-subtitle">Access to our dashboard</p>

							<!-- Account Form -->
							<form action="{{ route('loginMatch') }}" method="POST">
                                @csrf
								<div class="form-group">
									<label>Email Address</label>
									<input class="form-control" type="email" name="email">
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                     @enderror
								</div>

								<div class="form-group">
											<label>Password</label>
									<input class="form-control" type="password" name="password">
                                    @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
								</div>

								<div class="form-group text-center">
									<button class="btn btn-primary account-btn" type="submit">Login</button>
								</div>
								<!--<div class="account-footer">
									<p>Don't have an account yet? <a href="register.html">Register</a></p>
								</div>-->
							</form>
							<!-- /Account Form -->

						</div>
					</div>
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
       @endsection
