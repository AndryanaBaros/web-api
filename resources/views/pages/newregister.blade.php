
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>My Login Page &mdash; Bootstrap 4 Login Page Snippet</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="{{asset('mylogin/css/my-login.css')}}">
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper pt-5">
					<div class="card fat">
						<div class="card-body box-login font-dashboard ">
							@if($messages = Session::get('error'))
							<div class="alert alert-danger ">
								<div class="strong text-align-center text-center">{{ $messages }}</div>
							</div>
							@endif
							<h4 class="card-title font-weight-bold color-text2" >Register</h4>
							<form method="POST" class="my-login-validation" action="{{ route('newsaveregister')}}" >
								@csrf
								<div class="form-group" >
									<label for="name">Name</label>
									<input id="name" type="text" class="form-control" name="name" required autofocus placeholder="name" value="{{ old('name') }}">
									<div class="invalid-feedback">
										What's your name?
									</div>
								</div>

								<div class="form-group">
									<label for="email">E-Mail Address</label>
									@error('email')
									<input id="email" type="email" class="form-control is-invalid" name="email"  required data-eye placeholder="email" value="{{ old('email') }}">
									<div class="invalid-feedback">
								    	{{ $message }}
									</div>
									@else
									<input id="email" type="email" class="form-control" name="email"  required data-eye placeholder="email" value="{{ old('email') }}">

									@enderror
								</div>

								<div class="form-group">
									<label for="msisdn">Phone Number</label>
									
									@error('msisdn')
									<input id="msisdn" type="number" class="form-control is-invalid" name="msisdn"  required data-eye placeholder="phone number" value="{{ old('msisdn') }}">
									<div class="invalid-feedback">
								    	{{ $message }}
									</div>
									@else
									<input id="msisdn" type="number" class="form-control" name="msisdn"  required data-eye placeholder="phone number" value="{{ old('msisdn') }}">
									@enderror

								</div>

								<div class="form-group">
									<label for="department">Department</label>
									<input id="department" type="department" class="form-control" name="department" required data-eye placeholder="department" value="{{ old('department') }}">
									<div class="invalid-feedback">
										Department is required
									</div>
								</div>

								<div class="form-group">
									<label for="password">Password</label>

									@error('password')
									<input id="password" type="password" class="form-control is-invalid" name="password"  required data-eye placeholder="password" value="{{ old('password') }}">
									<div class="invalid-feedback">
								    	{{ $message }}
									</div>
									@else
									<input id="password" type="password" class="form-control" name="password"  required data-eye placeholder="password" value="{{ old('password') }}">
									@enderror

								</div> 

								<div class="form-group m-0">
									<button type="submit" class="btn btn-cust btn-block">
										Register
									</button>
								</div>
								<div class="mt-4 text-center">
									Already have an account? <a href="{{route('login')}}" class="color-text2">Login</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</body>
</html>