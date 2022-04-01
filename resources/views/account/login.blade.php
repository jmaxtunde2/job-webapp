<?php
/**
 * Author: Perfect Tech Lab
 * Date: 2020/02/05
 * Time: 10:51PM
 * File Name: login.blade.php
 */

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Perfect Jobs | Page de Connexion</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

	<!-- Core CSS -->
		<link rel="stylesheet"  type='text/css' href="{{URL::asset('dashboards/css/bootstrap.css' )}}">
	    <link rel="stylesheet" type='text/css' href="{{URL::asset('dashboards/css/style.css' )}}">
	    <link rel="stylesheet"  href="{{URL::asset('dashboards/css/font-awesome.css' )}}">
    	<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
	    <link rel="stylesheet"  href="{{URL::asset('dashboards/css/custom.css' )}}">
		<link rel="stylesheet"  href="{{URL::asset('dashboards/css/toastr.min.css' )}}">

    <!-- Core CSS -->
 
</head> 
<body>
<div class="main-content">
		
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page login-page ">
				<h2 class="title1">Bienvenue Boss, Heureux de vous revoir. Connectez-vous.</h2>
				<div class="widget-shadow">
					<div class="login-body">
						<form id="loginAction">
							<input type="email" class="user" name="email" placeholder="Votre Email" required>
							<input type="password" name="password" class="lock" placeholder="Mot de Passe" required>
							<div class="forgot-grid">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Se Souvenir</label>
								<div class="forgot">
									<a href="#">Mot oublié ?</a>
								</div>
								<div class="clearfix"> </div>
							</div>
							<input type="submit" id="loginBtn" name="Sign In" value="Connexion">
							<div class="registration">
								N'aviez vous pas un compte ?
								<a class="" href="{{route('register-candidat')}}">
									Créer un compte candidat
								</a><br/>
								<a class="" href="{{route('register')}}">
									Créer un compte recruteur
								</a>
							</div>
						</form>
					</div>
				</div>
				
			</div>
		</div>
		<!--footer-->
		<div class="footer">
		   <p>&copy; 2021 Perfect Tech Lab. Tout droit reservé | Concu par <a href="" target="_blank">Perfect Tech Lab</a></p>
		</div>
        <!--//footer-->
	</div>
	

	<!--  Core JavaScript -->
   <script src="{{URL::asset('dashboards/js/jquery.min.js')}}"></script>
   <script src="{{URL::asset('dashboards/js/bootstrap.min.js')}}"></script>
   <script src="{{URL::asset('dashboards/js/modernizr.custom.js')}}"></script>
   <script src="{{URL::asset('dashboards/js/custom.js')}}"></script>
   <script src="{{URL::asset('dashboards/js/toastr.min.js')}}"></script>
	<!-- Core JavaScript -->
   
</body>
</html>