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
	<title>Perfect Jobs | Page d'Inscription </title>
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
			<div class="main-page signup-page">
				<h2 class="title1">Inscription Reservé aux Recruteurs</h2>
				<div class="sign-up-row widget-shadow">
					
				<form id="registerAction">
					<div class="sign-u">
								<input required name="names" type="text"  id="name" placeholder="Nom complet">
											
						<div class="clearfix"> </div>
					</div>
					
					<div class="sign-u">
							<input required name="email" type="email" id="email"  placeholder="L'adresse Email">											
						<div class="clearfix"> </div>
					</div>
					
					<div class="sign-u">
								<input required name="password" type="password"  id="password"  placeholder="Le mot de passe">
											
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
								<input type="password" name="confirm_password" placeholder="Confirmer votre mot de passe" required="">
						</div>
						<div class="clearfix"> </div>
					<div class="sub_home">
							<input type="submit" id="registerBtn"value="S'inscrire">
						<div class="clearfix"> </div>
					</div>
					<div class="registration">
						Inscription déja faite?
						<a class="" href="{{route('login')}}">
							Connectez-vous Maintenant
						</a><br/>
						<a class="" href="{{route('register-candidat')}}">
									Créer un compte candidat
								</a>
					</div>
				</form>
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