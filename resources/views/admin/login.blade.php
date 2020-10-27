<!DOCTYPE html>
<html lang="en">
<head>
	<title>Astacode - Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<!-- Favicons -->
  	<link href="{{ asset('assets/img/favicon/favicon-32x32.png') }}" rel="icon">
  	<link href="{{ asset('assets/img/favicon/apple-touch-icon.png') }}" rel="apple-touch-icon">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/login/fonts/iconic/css/material-design-iconic-font.min.css') }}">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/login/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/login/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
					@csrf

					<span class="login100-form-title p-b-48 text-center">
						<img src="admin/login/images/logo.png" class="img-full">
					</span>

					<div class="wrap-input100 validate-input @error('email') alert-validate @enderror" data-validate = "Enter a valid email">
						<input id="email" type="email" class="input100" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input id="password" type="password" class="input100" name="password" autocomplete="current-password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn">
								Login
							</button>
						</div>
					</div>

					<div class="form-group row">
                        <div class="col-md-12">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link forgot-pass" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('admin/login/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('admin/login/js/main.js') }}"></script>

</body>
</html>