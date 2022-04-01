<?php
/**
 * Author: Perfect Tech Lab
 * Date: 2020/02/05
 * Time: 10:51PM
 * File Name: layout.blade.php
 */
 $user = Auth::user();
?>

<!DOCTYPE html>
<html lang="fr">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="{{$setting->meta_description ?? ''}}">
    <meta name="keywords" content="{{$setting->meta_tags ?? ''}}">
    <!-- Open Graph data -->
    <meta property="og:title" content="{{$setting->website_title ?? ''}} -  Get Your dream Job" />
    <meta property="og:type" content="services" />
    <meta property="og:url" content="/" />
    <meta property="og:description" content="{{$setting->meta_description ?? ''}}" />
	<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

    <title>{{$setting->website_title ?? ''}} -  {{$data['title']}} </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Dosis:500,600,700,800&&Poppins:300,400,500,600,900" rel="stylesheet">
    
	<!-- CSS here -->            
			<link rel="stylesheet"  href="{{URL::asset('frontend/css/bootstrap.min.css')}}">
			<link rel="stylesheet"  href="{{URL::asset('frontend/css/owl.carousel.min.css')}}">
			<link rel="stylesheet"  href="{{URL::asset('frontend/css/flaticon.css')}}">
			<link rel="stylesheet"  href="{{URL::asset('frontend/css/slicknav.css')}}">
			<link rel="stylesheet"  href="{{URL::asset('frontend/css/animate.min.css')}}">
			<link rel="stylesheet"  href="{{URL::asset('frontend/css/magnific-popup.css')}}">
			<link rel="stylesheet"  href="{{URL::asset('frontend/css/fontawesome-all.min.css')}}">
			<link rel="stylesheet"  href="{{URL::asset('frontend/css/themify-icons.css')}}">
			<link rel="stylesheet"  href="{{URL::asset('frontend/css/slick.css')}}">
			<link rel="stylesheet"  href="{{URL::asset('frontend/css/nice-select.css')}}">
			<link rel="stylesheet"  href="{{URL::asset('frontend/css/style.css')}}">
	
</head>

<body>
 <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{URL::asset('frontend/img/logo/logop.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
	    <header>
        <!-- Header Start -->
       <div class="header-area header-transparrent">
           <div class="headder-top header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-2">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="{{url('/')}}"><img src="{{URL::asset('frontend/img/logo/logo.png')}}" alt="{{$setting->website_title ?? ''}}"></a>
                            </div>  
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="menu-wrapper">
                                <!-- Main-menu -->
                                <div class="main-menu">
                                    <nav class="d-none d-lg-block">
                                        <ul id="navigation">
                                            <li><a href="{{url('/')}}">Accueil</a></li>
                                            <li><a href="{{route('job_listing')}}">Offres d'emplois </a></li>											
											<li><a href="{{route('candidat')}}">Candidats</a></li>  
                                            <li><a href="{{route('about')}}">A Propos</a></li>                                       
                                            <li><a href="{{route('contact')}}">Contact</a></li>
										  </ul>
                                    </nav>
                                </div>          
                                <!-- Header-btn -->
                                <div class="header-btn d-none f-right d-lg-block">
                                    <a href="{{route('login')}}" class="btn head-btn2">Publier un Emploi</a>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
           </div>
       </div>
        <!-- Header End -->
    </header>


	<div id="fb-root"></div>





    <div id="app">
        @yield('content')
    </div>

			<footer>
					<!-- Footer Start-->
					<div class="footer-area footer-bg footer-padding">
						<div class="container">
							<div class="row d-flex justify-content-between">
								<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
								   <div class="single-footer-caption mb-50">
									 <div class="single-footer-caption mb-30">
										 <div class="footer-tittle">
											 <h4>A Propos de Nous</h4>
											 <div class="footer-pera">
												 <p>{{$setting->breve_desc ?? ''}}</p>
											</div>
										 </div>
									 </div>

								   </div>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
									<div class="single-footer-caption mb-50">
										<div class="footer-tittle">
											<h4>Contact Info</h4>
											<ul>
												<li>
												<p>Address :{{$setting->address ?? ''}}.</p>
												</li>
												{{--<li><a href="#">Phone : {{$setting->tel ?? ''}}</a></li>--}}
												<li><a href="#">Email : {{$setting->email ?? ''}}</a></li>
											</ul>
										</div>
										<h4 style="color:white;">Aimer Notre Page Facebook</h4>
										<div class="fb-page" data-href="https://www.facebook.com/azerkecom" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/azerkecom" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/azerkecom">Azerke.com</a></blockquote></div>

									</div>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
									<div class="single-footer-caption mb-50">
										<div class="footer-tittle">
											<h4>Liens Utiles</h4>
											<ul>
												
												<li><a href="{{route('job_listing')}}">Offres d'emplois </a></li>											
												<li><a href="{{route('login')}}">Publier un emploi</a></li>  
												<li><a href="{{route('about')}}">A Propos</a></li>  
												<li><a href="#"> Perfect Tech Lab</a></li>
												<li><a href="#">Nos Projets</a></li>
												<li><a href="#">Temoignages</a></li>
												<li><a href="#">FAQ</a></li>   
											</ul>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
									<div class="single-footer-caption mb-50">
										<div class="footer-tittle">
											<h4>Newsletter</h4>
											<div class="footer-pera footer-pera2">
											 <p>Abonnez-vous pour recevoir les dernières offres via email </p>
										 </div>
										 <!-- Form -->
										 <div class="footer-form" >
											 <div id="mc_embed_signup">
											 <div class="footer-form" >
                                 <div id="mc_embed_signup">
                                     <form method="POST" id="addNewletterForm" class="subscribe_form relative mail_part">
                                         <input type="email" required name="email" id="newsletter-form-email" placeholder="Email Address"
                                         class="placeholder hide-on-focus" onfocus="this.placeholder = ''"
                                         onblur="this.placeholder = ' Email Address '">
                                         <div class="form-icon">
                                             <button type="submit" name="submit" id="btn-addNewletter"
                                             class="email_icon newsletter-submit button-contactForm"><img src="{{URL::asset('frontend/img/icon/form.png')}}" alt=""></button>
                                         </div>
                                         <div class="mt-10 info"></div>
                                     </form>
                                 </div> 
                             </div>
											 </div>
										 </div>
										</div>
									</div>
								</div>
							</div>
						   <!--  -->
						   
						</div>
					</div>
					<!-- footer-bottom area -->
					<div class="footer-bottom-area footer-bg">
						<div class="container">
							<div class="footer-border">
								 <div class="row d-flex justify-content-between align-items-center">
									 <div class="col-xl-10 col-lg-10 ">
										 <div class="footer-copy-right">
											 <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			  Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tous droit reservé | <a href="#" target="_blank">Perfect Tech Lab</a>
			  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
										 </div>
									 </div>
									 <div class="col-xl-2 col-lg-2">
										 <div class="footer-social f-right">
											 <a href="https://www.facebook.com/{{$setting->facebook ?? ''}}"><i class="fab fa-facebook-f"></i></a>
											 <a href="https://twitter.com/{{$setting->twitter ?? ''}}"><i class="fab fa-twitter"></i></a>
											 <a href="https://instagram.com/{{$setting->instagram ?? ''}}"><i class="fab fa-instagram"></i></a>
											 <a href="https://linkedln.com/{{$setting->linkedln ?? ''}}"><i class="fab fa-linkedin"></i></a>
										 </div>
									 </div>
								 </div>
							</div>
						</div>
					</div>
					<!-- Footer End-->
			</footer>

			<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v10.0" nonce="GvRMYnoT"></script>
				<script src="{{URL::asset('frontend/js/vendor/modernizr-3.5.0.min.js')}}"></script>				
				<script src="{{URL::asset('frontend/js/vendor/jquery-1.12.4.min.js')}}"></script>				
				<script src="{{URL::asset('frontend/js/popper.min.js')}}"></script>
				<script src="{{URL::asset('frontend/js/bootstrap.min.js')}}"></script>
				<script src="{{URL::asset('frontend/js/jquery.slicknav.min.js')}}"></script>
				<script src="{{URL::asset('frontend/js/owl.carousel.min.js')}}"></script>

				<script src="{{URL::asset('frontend/js/slick.min.js')}}"></script>					
				<script src="{{URL::asset('frontend/js/wow.min.js')}}"></script>
				<script src="{{URL::asset('frontend/js/animated.headline.js')}}"></script>
				<script src="{{URL::asset('frontend/js/jquery.magnific-popup.js')}}"></script>
				
				<!-- Scrollup, nice-select, sticky -->
				<script src="{{URL::asset('frontend/js/jquery.scrollUp.min.js')}}"></script>		
				<script src="{{URL::asset('frontend/js/jquery.sticky.js')}}"></script>
				<script src="{{URL::asset('frontend/js/jquery.nice-select.min.js')}}"></script>
			
				<script src="{{URL::asset('frontend/js/jquery.form.js')}}"></script>
				<script src="{{URL::asset('frontend/js/plugins.js')}}"></script>			
				<script src="{{URL::asset('frontend/js/main.js')}}"></script>									
				<script src="{{URL::asset('frontend/js/toastr.min.js')}}"></script>				

				<script>
					function submitAjax(btn,btnval,  datas, url, redir, msg) {
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				btn.addClass('is-loading');
				btn.html('Processing');
				//
				$.ajax({
					url: url,
					type: "POST",
					data: datas,
					contentType: false,
					cache: false,
					processData:false,
					success: function(data){
						if(data.success){
							toastr.options.positionClass = 'toast-top-right';
							toastr.success(data.message, 'Success !');
							btn.removeClass('is-loading');
							btn.html(btnval);
							setTimeout(
								function () {
									if (redir !='') { location.href = redir; }
									else { location.reload()}
								}, 3000);
						}else{
							toastr.options.positionClass = 'toast-top-right';
							toastr.error(data.message, 'Error !');
							btn.removeClass('is-loading');
							btn.html(btnval);
						}
					},
					error : function(data){
						var response = JSON.parse(data.responseText);
						//
						printErrorMsg(response.errors);
						//
						toastr.options.positionClass = 'toast-bottom-right';
						toastr.error(response.message, 'Error !');
						btn.removeClass('is-loading').html(btnval);
					}
				});
				}


				// Add User
				$("#addNewletterForm").on('submit',(function(e) {
				e.preventDefault();
				//
				var datas = new FormData(this);
				submitAjax($("#btn-addNewletter"), "Félicitation, Vous etes abonné", datas, 'post/ajouter-un-newletter', "", $("#msg"));
				}));

			</script>

			

@if(Route::currentRouteName() == 'home')

<script type="text/javascript">

	function setCookie( c_name, value, exdays ) {
		var c_value = escape(value);
		if (exdays) {
			var exdate = new Date();
			exdate.setDate( exdate.getDate() + exdays );
			c_value += '; expires=' + exdate.toUTCString();
		}
		document.cookie = c_name + '=' + c_value;
	}

	function getCookie( c_name ) {
		var i, x, y, cookies = document.cookie.split( ';' );

		for ( i = 0; i < cookies.length; i++ ) {
			x = cookies[i].substr( 0, cookies[i].indexOf( '=') );
			y = cookies[i].substr( cookies[i].indexOf( '=') + 1 );
			x = x.replace( /^\s+|\s+$/g, '' );

			if ( x === c_name ) {
				return unescape( y );
			}
		}
	}


	window.setTimeout(function(){
	/*	// When the cookie exists, do not show the popup!
		if (getCookie('displayedPopupNewsletter')) {
		   return;
		}

		$('#myModal').modal('show');

		// The popup was displayed. Set the cookie for 1 day.
		setCookie('displayedPopupNewsletter', 'yes', 1);
	}, 3000);



	  $('#modalMessage').on('shown', function () {
		  alert('mda')
		  $("#closeModal").on("click", function () {
			  console.log("Btn clicked");
		  })
	  });*/

</script>

@endif
				
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-L886J20SZ2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-L886J20SZ2');
</script>				
<!--


Start of Tawk.to Script
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5ea7bd2169e9320caac7f0e2/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>-->
<!--End of Tawk.to Script-->


</body>
