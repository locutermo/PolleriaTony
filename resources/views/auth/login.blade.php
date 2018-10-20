<!DOCTYPE html>
<html lang="en">
<head>
	<title>Polleria Tony - Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('img/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
  <link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<!--===============================================================================================-->
<link href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
  <link href="{{ asset('css/animate.css') }}" rel="stylesheet">

<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link href="{{ asset('bower_components/select2/dis/css/select2.min.css') }}" rel="stylesheet">
<!--===============================================================================================-->	
  <link href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

<!--===============================================================================================-->

  <link href="{{ asset('css/login/util.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/login/main.css') }}" rel="stylesheet" type="text/css">

<!--===============================================================================================-->
</head>
<body>
  
	<div class="limiter">
		<div class="container-login100" style="background-image: url('img/bg-01.jpg');">
			<div action="#" class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
        <form method="POST" action="{{ url('/login') }}" id="loginform" class="login100-form validate-form flex-sb flex-w">
          @csrf
					<span class="login100-form-title p-b-53">
						Inicio de Sesión
					</span>

					{{-- <a href="#" class="btn-face m-b-20">
						<i class="fa fa-facebook-official"></i>
						Facebook
					</a>

					<a href="#" class="btn-google m-b-20">
						<img src="{{ asset('img/icons/icon-google.png')}}" alt="GOOGLE">
						Google
					</a> --}}
					
					<div class="p-t-31 p-b-9">
						<span class="txt1">
							Usuario
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="username" >
						<span class="focus-input100"></span>
					</div>
					
					<div class="p-t-13 p-b-9">
						<span class="txt1">
							Contraseña
						</span>

						<a href="#" class="txt2 bo1 m-l-5">
							¿Olvidaste tu contraseña?
						</a>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" >
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button type="submit" class="login100-form-btn">
							Ingresar
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
  <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="{{ asset('bower_components/bootstrap/dist/js/popper.js') }}"></script>

  <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!--===============================================================================================-->
  <script src="{{ asset('bower_components/select2/dist/js/select2.min.js') }}"></script>

<!--===============================================================================================-->
  <script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
  <script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
  <script src="{{ asset('bower_components/countdowntime/countdowntime.js') }}"></script>

<!--===============================================================================================-->
  <script src="{{ asset('js/login/main.js') }}"></script>


</body>
</html>


{{-- 
<!DOCTYPE html>  
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
<title>PolleriaTony - Login</title>
</head>
<body>
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register">
  <div class="login-box login-sidebar">
    <div class="white-box">
      <form class="form-horizontal form-material" method="POST" action="{{ url('/login') }}" id="loginform">
        
        
        <div class="form-group m-t-40">
          <div class="col-xs-12">
            <input class="form-control" type="text" name="code" required="" placeholder="codigo">
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input class="form-control" type="password" name="password" required="" placeholder="Contraseña">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <div class="checkbox checkbox-primary pull-left p-t-0">
              <input id="checkbox-signup" type="checkbox">
              <label for="checkbox-signup"> Recuérdame </label>
            </div>
            <a href="javascript:void(0)" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Seguro</a> </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Iniciar Sesión</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section> --}}