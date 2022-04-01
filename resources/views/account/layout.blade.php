<?php
/**
 * Author: Perfect Tech Lab
 * Date: 2020/02/05
 * Time: 10:51PM
 * File Name: layout.blade.php
 */
?>

    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $data['title'] }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Core CSS -->
		<link rel="stylesheet"  type='text/css' href="{{URL::asset('dashboards/css/bootstrap.css' )}}">
	    <link rel="stylesheet" type='text/css' href="{{URL::asset('dashboards/css/style.css' )}}">
	    <link rel="stylesheet"  href="{{URL::asset('dashboards/css/font-awesome.css')}}">
    	<link rel="stylesheet"  href="{{URL::asset('dashboards/css/SidebarNav.min.css')}}">
		<link rel="stylesheet"  href="{{URL::asset('dashboards/css/toastr.min.css' )}}">
		<link rel="stylesheet"  href="{{URL::asset('dashboards/css/owl.carousel.css' )}}">		
		<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
	   
    <!-- Core CSS -->

</head>

<body class="cbp-spmenu-push">

	<div class="main-content">

        @yield('sidebar')

        <div class="sticky-header header-section ">
			<div class="header-left">
				
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				
				<!--notification menu end -->
				<div class="clearfix"> </div>
			</div>
			<div class="header-right">
				
				
				<!--search-box-->
				<div class="search-box">
					<form class="input">
						<input class="sb-search-input input__field--madoka" placeholder="Search..." type="search" id="input-31" />
						<label class="input__label" for="input-31">
							<svg class="graphic" width="100%" height="100%" viewBox="0 0 404 77" preserveAspectRatio="none">
								<path d="m0,0l404,0l0,77l-404,0l0,-77z"/>
							</svg>
						</label>
					</form>
				</div><!--//end-search-box-->
				
				<div class="profile_details">		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
									<span class="prfil-img"><img src="images/2.jpg" alt=""> </span> 
									<div class="user-name">
										<p>{{$user->names}}</p>
										<span>{{getLevel($user->level)}}</span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">
								<li> <a href="{{route('account.profile')}}"><i class="fa fa-user"></i>Mon Compte</a> </li>
								<li>
										<a href="{{route('account.logout')}}">
											<i class="fa fa-sign-out"></i> <span> Déconnexion</span>

										</a>

									</li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>

        @yield('content')

        <!--footer-->
            <div class="footer">
            <p>&copy; <script>document.write(new Date().getFullYear());</script> Perfect Tech Lab. Tout droit reservé | Concu par <a href="" target="_blank">Perfect Tech Lab</a></p>
            </div>
        <!--//footer-->

    </div>
    <!--  Core JavaScript -->
        <script src="{{URL::asset('dashboards/js/jquery.min.js')}}"></script>
        <script src="{{URL::asset('dashboards/js/modernizr.custom.js')}}"></script>
        <script src="{{URL::asset('dashboards/js/metisMenu.min.js')}}"></script>
		<script src="{{URL::asset('dashboards/js/custom.js')}}"></script>
		<script src="{{URL::asset('dashboards/js/SidebarNav.min.js')}}"> </script>
		<script src="{{URL::asset('dashboards/js/classie.js')}}"> </script>
		<script>$('.sidebar-menu').SidebarNav()</script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
		<script src="{{URL::asset('dashboards/js/jquery.nicescroll.js')}}"> </script>
		<script src="{{URL::asset('dashboards/js/scripts.js')}}"> </script>
		<script src="{{URL::asset('dashboards/js/bootstrap.min.js')}}"></script>
        <script src="{{URL::asset('dashboards/js/toastr.min.js')}}"></script>		
		<script>var user_type = '{{getLevel($user->level)}}';</script>
		<script src="{{URL::asset('dashboards/js/'.getLevel($user->level).'.js')}}?time={{time()}}"></script>
		<script src="{{URL::asset('dashboards/js/tinymce.js')}}"> </script>
		<script src="{{URL::asset('dashboards/js/owl.carousel.js')}}"></script>
						<script>
							$(document).ready(function() {
								$("#owl-demo").owlCarousel({
									items : 3,
									lazyLoad : true,
									autoPlay : true,
									pagination : true,
									nav:true,
								});
							});
						</script>
	     <script src="https://cdn.tiny.cloud/1/kpijwc3e8y1b98ijgbpwlvkriuigux7vj5njkbja23zrr164/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		
		<script>
			tinymce.init({
				selector: '#description',
				height: 300,
				menubar: false,
				plugins: [
					'advlist autolink lists link image charmap print preview anchor',
					'searchreplace visualblocks code fullscreen',
					'insertdatetime media table paste code help wordcount'
				],
				toolbar: 'undo redo | ' +
				'bold italic backcolor | alignleft aligncenter ' +
				'alignright alignjustify | bullist numlist outdent indent | ' +
				'removeformat | help',
				content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
				});
		</script>
	<!-- //side nav js -->

	<!-- Core JavaScript -->


</body>
</html>
