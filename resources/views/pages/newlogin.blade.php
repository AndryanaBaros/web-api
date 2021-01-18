
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>My Login Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('login/css/my-login.css')}}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper ">
					<div class="card fat">
						
						@if($messages = Session::get('success'))
						<div class="alert alert-info">
							<div class=" text-align-center login-success">{{$messages}}</div>
						</div>
						@endif

						<div class="card-body box-login font-dashboard">
							<h4 class="card-title font-weight-bold color-text2">Login</h4>
							<form method="POST" action="{{ route('newlogin') }}" class="my-login-validation" novalidate="">
                                @csrf
								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email" value="" required autofocus >
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>

								<div class="form-group color-text1">
									<label class="" for="password">Password
										<a href="forgot.html" class="float-right color-text2">
											Forgot Password?
										</a>
									</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
								</div>
								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="remember" id="remember" class="custom-control-input">
										<label for="remember" class="custom-control-label">Remember Me</label>
									</div>
								</div>

								@if($messages = Session::get('error'))
								<div class="alert alert-danger ">
									<div class="strong text-align-center text-center">{{ $messages }}</div>
								</div>
								@endif
								
								
								<div class="form-group m-0">
									<button type="submit" class="btn btn-cust btn-block">
										Login
									</button>
								</div>
								<div class="mt-4 text-center color-text">
									Don't have an account? <a href="{{route('newregister')}}" class="color-text2">Create One</a>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; 2020 &mdash;
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</body>
</html>
