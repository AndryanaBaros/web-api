
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTE/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body class="hold-transition register-page font-dashboard">
<div class="register-box">
  <div class="card box-login">
    <div class="card-body register-card-body box-login ">
      <p class="login-box-msg text-register">REGISTER</p>

      <form action="{{ route('saveregister') }}" method="get">
      {{ csrf_field() }}
        <div class="input-group mb-3">
          <input type="name" class="form-control" name="name" placeholder="Nama">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input  class="form-control" name=" phone_number" placeholder="Phone Number">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="name" class="form-control" name="department" placeholder="Departement">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
        {{-- @error('password') --}}
        <div class="form-group font-error">
          <label class="col-form-label font-error" for="inputError"><i class="far fa-times-circle"></i> Password harus 8 karakter</label>
          <input type="text" class="form-control is-invalid" id="inputError" placeholder="Enter ...">
        </div> 
        {{-- @else --}}
        <div class="input-group has-error mb-3">
          <input type="password" for="inputError" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        {{-- @enderror --}}

        <div class="row">
          <div class="col-8">
            <p class="mb-0">
              <a href="{{route('login')}}" class="text-center text-login">Login</a>
            </p>
          </div>
          <!-- /.col -->
          <div class="col-4 color-primary">
            <button type="submit" class="btn bg-gray-dark btn-block">Submit</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
