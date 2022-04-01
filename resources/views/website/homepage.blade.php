<?php

/**
 * Author: Perfect Tech Lab
 * Date: 2020/02/05
 * Time: 10:51PM
 * File Name: add_category.blade.php
 */

?>
@extends('website.layout')

@section('content')

 <!-- slider Area Start-->
 <div class="slider-area" style="background-size: cover;background-image: url('frontend/img/hero/h1_hero.jpg');">
            <!-- Mobile Menu -->
            <div class="slider-active">
                <div class="single-slider slider-height d-flex align-items-center"  >
                    <div class="container">
                    <div class="row">
                            <div class="col-lg-6 col-md-6 "style="margin-bottom:10px;">
                            <div class="">
                                    <a href="{{route('register-candidat')}}" class="btn head-btn2" >CANDIDAT: DÉPOSEZ VOTRE CV</a>
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-6 ">
                            <div class="f-right d-lg-block desktop">
                                    <a href="{{route('register')}}" class="btn head-btn2">RECRUTEUR: PUBLIEZ UN EMPLOI</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 ">
                            <div class="mobile">
                                    <a href="{{route('register')}}" class="btn head-btn2">RECRUTEUR: PUBLIEZ UN JOB</a>
                                </div>
                            </div>
                        </div><br/>
                        <div class="row">
                            <div class="col-xl-8 col-lg-9 col-md-10">
                                <div class="hero__caption">
                                    <h1>Trouver votre futur emploi</h1>
                                </div>
                            </div>
                        </div>
                        <!-- Search Box -->
                        <div class="row" style="margin-top:-10px;">
                            <div class="col-xl-12">
                                <!-- form -->
                                <form action="{{route('job_search')}}" class="search-box">
                                    <div class="input-form">
                                        <input type="text" name="search" placeholder="Titre de l'emploi ou mot clé">
                                    </div>
                                    <div class="select-form">
                                        <div class="select-itms">
                                            <select name="select" id="select">
                                            <option value="" disabled selected>-- Choississez une categorie --</option>
                                            @foreach($categories as $categ)
                                                <option value="{{$categ->id}}">{{$categ->name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="search-form">
                                        <button  type="submit">Rechercher</button>
                                    </div>	
                                </form>	
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br/>

         <!-- Our Services Start -->
         <div class="our-services section-pad-t5">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                        <span>Recherche avancée des offres emplois</span>
                        </div>
                    </div>
                </div>
                <table class="table table-responsive mobile">
								<tr>
									<td>
                                        <a href="{{route('job_byPays',['pays' => 'Bénin'])}}"><img src="{{URL::asset('frontend/img/hero/benin.png')}}" style="width:50px;height: 50px;" alt=""></a>
                                        <span>Bénin</span>
                                    </td>
									<td>
                                        <a href="{{route('job_byPays',['pays' => 'Togo'])}}"><img src="{{URL::asset('frontend/img/hero/togo.png')}}" style="width:50px;height: 50px;" alt=""></a>
                                        <span>Togo</span>
                                    </td>
                                    <td><h5><a href="{{route('job_byPays',['pays' => 'Niger'])}}"><img src="{{URL::asset('frontend/img/hero/niger.png')}}" style="width:50px;height: 50px;" alt=""></a></h5>
                                        <span>Niger</span>
                                    </td>
                                    <td>
                                    <h5><a href="{{route('job_byPays',['pays' => 'Cote Ivoire'])}}"><img src="{{URL::asset('frontend/img/hero/cote.png')}}" style="width:50px;height: 50px;" alt=""></a></h5>
                               <span>Côte d'Ivoire</span>
                                    </td>
								</tr>
                                <tr>
									<td>
                                    <h5><a href="{{route('job_byPays',['pays' => 'Burkina-Faso'])}}"><img src="{{URL::asset('frontend/img/hero/burkina.png')}}" style="width:50px;height: 50px;" alt=""></a></h5>
                               <span>Burkina Faso</span>
                                    </td>
                                    <td>
                                    <h5><a href="{{route('job_byPays',['pays' => 'Cameroun'])}}"><img src="{{URL::asset('frontend/img/hero/Cameroun.png')}}" style="width:50px;height: 50px;" alt=""></a></h5>
                               <span>Cameroun</span>
                                    </td>
                                    <td>
                                    <h5><a href="{{route('job_byPays',['pays' => 'Sénégal'])}}"><img src="{{URL::asset('frontend/img/hero/senegal.png')}}" style="width:50px;height: 50px;" alt=""></a></h5>
                               <span>Sénégal</span>
                                    </td>
                                    <td>
                                    <h5><a href="{{route('job_byPays',['pays' => 'France'])}}"><img src="{{URL::asset('frontend/img/hero/france.png')}}" style="width:50px;height: 50px;" alt=""></a></h5>
                               <span>France</span>
                                    </td>
								</tr>
                                <tr>
									<td>
                                    <h5><a href="{{route('job_byPays',['pays' => 'Gabon'])}}"><img src="{{URL::asset('frontend/img/hero/gabon.png')}}" style="width:50px;height: 50px;" alt=""></a></h5>
                               <span>Gabon</span>
                                    </td>
                                    <td>
                                    <h5><a href="{{route('job_byPays',['pays' => 'Mali'])}}"><img src="{{URL::asset('frontend/img/hero/mali.png')}}" style="width:50px;height: 50px;" alt=""></a></h5>
                               <span>Mali</span>
                                    </td>
                                    <td>
                                    <h5><a href="{{route('job_byPays',['pays' => 'Congo'])}}"><img src="{{URL::asset('frontend/img/hero/congo.png')}}" style="width:50px;height: 50px;" alt=""></a></h5>
                               <span>Congo</span>
                                    </td>
                                    <td>
                                    <h5><a href="{{route('job_byPays',['pays' => 'Guinée'])}}"><img src="{{URL::asset('frontend/img/hero/guinee.png')}}" style="width:50px;height: 50px;" alt=""></a></h5>
                               <span>Guinée</span>
                                    </td>
								</tr>
</table>
                <div class="row justify-content-center desktop">
                    
                    <div class="col-md-1">
                            <div class="">
                               <a href="{{route('job_byPays',['pays' => 'Bénin'])}}"><img src="{{URL::asset('frontend/img/hero/benin.png')}}" style="width:50px;height: 50px;" alt=""></a>
                               <span>Bénin</span>
                            </div>
                    </div>
                    <div class="col-md-1">
                            <div class="">
                               <a href="{{route('job_byPays',['pays' => 'Togo'])}}"><img src="{{URL::asset('frontend/img/hero/togo.png')}}" style="width:50px;height: 50px;" alt=""></a>
                               <span>Togo</span>
                            </div>
                    </div>
                    <div class="col-md-1">
                            <div class="">
                               <h5><a href="{{route('job_byPays',['pays' => 'Niger'])}}"><img src="{{URL::asset('frontend/img/hero/niger.png')}}" style="width:50px;height: 50px;" alt=""></a></h5>
                               <span>Niger</span>
                            </div>
                    </div>
                    <div class="col-md-1">
                            <div class="">
                               <h5><a href="{{route('job_byPays',['pays' => 'Cote Ivoire'])}}"><img src="{{URL::asset('frontend/img/hero/cote.png')}}" style="width:50px;height: 50px;" alt=""></a></h5>
                               <span>Côte d'Ivoire</span>
                            </div>
                    </div>
                    <div class="col-md-1">
                            <div class="">
                               <h5><a href="{{route('job_byPays',['pays' => 'Burkina-Faso'])}}"><img src="{{URL::asset('frontend/img/hero/burkina.png')}}" style="width:50px;height: 50px;" alt=""></a></h5>
                               <span>Burkina Faso</span>
                            </div>
                    </div>
                    <div class="col-md-1">
                            <div class="">
                               <h5><a href="{{route('job_byPays',['pays' => 'Cameroun'])}}"><img src="{{URL::asset('frontend/img/hero/Cameroun.png')}}" style="width:50px;height: 50px;" alt=""></a></h5>
                               <span>Cameroun</span>
                            </div>
                    </div>
                    <div class="col-md-1">
                            <div class="">
                               <h5><a href="{{route('job_byPays',['pays' => 'Sénégal'])}}"><img src="{{URL::asset('frontend/img/hero/senegal.png')}}" style="width:50px;height: 50px;" alt=""></a></h5>
                               <span>Sénégal</span>
                            </div>
                    </div>
                    <div class="col-md-1">
                            <div class="">
                               <h5><a href="{{route('job_byPays',['pays' => 'France'])}}"><img src="{{URL::asset('frontend/img/hero/france.png')}}" style="width:50px;height: 50px;" alt=""></a></h5>
                               <span>France</span>
                            </div>
                    </div>
                    <div class="col-md-1">
                            <div class="">
                               <h5><a href="{{route('job_byPays',['pays' => 'Gabon'])}}"><img src="{{URL::asset('frontend/img/hero/gabon.png')}}" style="width:50px;height: 50px;" alt=""></a></h5>
                               <span>Gabon</span>
                            </div>
                    </div>
                    <div class="col-md-1">
                            <div class="">
                               <h5><a href="{{route('job_byPays',['pays' => 'Mali'])}}"><img src="{{URL::asset('frontend/img/hero/mali.png')}}" style="width:50px;height: 50px;" alt=""></a></h5>
                               <span>Mali</span>
                            </div>
                    </div>
                    <div class="col-md-1">
                            <div class="">
                               <h5><a href="{{route('job_byPays',['pays' => 'Congo'])}}"><img src="{{URL::asset('frontend/img/hero/congo.png')}}" style="width:50px;height: 50px;" alt=""></a></h5>
                               <span>Congo</span>
                            </div>
                    </div>
                    <div class="col-md-1">
                            <div class="">
                               <h5><a href="{{route('job_byPays',['pays' => 'Guinée'])}}"><img src="{{URL::asset('frontend/img/hero/guinee.png')}}" style="width:50px;height: 50px;" alt=""></a></h5>
                               <span>Guinée</span>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                        <span>Les Entreprises qui recrutent </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-lg-12">
               
					<table class="table ">
							<thead>
								<tr>
								  <th></th>
								  <th>Nom</th>
								  <th>Email</th>
								  <th>Site web</th>
								</tr>
							</thead>
							<tbody>
							
							@foreach($companies as $comp)
                            <tr>	
								<td>
									<img src="{{URL::asset('dashboards/images/users/'.$comp->photo)}}" alt="" style="width:80px;height:auto;" class="img-fluid d-block mx-auto mb-3">
								</td>
								<td>{{$comp->names}}</td>
								<td>{{$comp->email}}</td>
								<td><a href="{{$comp->siteweb}}" style="color:black;">{{$comp->site_web}}</a></td>
                                <td><a href="{{route('register-candidat')}}" style="color:black;"><b>Suivre</b></a></td>
                                </tr>
							@endforeach	
                            
                            </tbody>
					</table>
                   <center> <a href="{{route('register')}}" class="btn head-btn">Enregistrer votre entreprise en une min</a></center><br/>
                </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <h2>Parcourez les secteurs les plus visités  </h2>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-contnet-center">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                            <a href="{{route('job_byCategory',['category' => 1])}}"><span class="flaticon-tour"></span></a>
                            </div>
                            <div class="services-cap">
                               <h5><a href="{{route('job_byCategory',['category' => 1])}}">Comptablité & Finance</a></h5>
                               <span>@if($count['categorie1']>0)({{$count['categorie1'] }})@endif</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                            <a href="{{route('job_byCategory',['category' => 2])}}"><span class="flaticon-high-tech"></span></a>
                            </div>
                            <div class="services-cap">
                               <h5><a href="{{route('job_byCategory',['category' => 2])}}">Industrie & Production</a></h5>
                               <span>@if($count['categorie2']>0)({{$count['categorie2'] }})@endif</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                            <a href="{{route('job_byCategory',['category' => 26])}}"><span class="flaticon-cms"></span></a>
                            </div>
                            <div class="services-cap">
                               <h5><a href="{{route('job_byCategory',['category' => 26])}}">Informatique & Technologie</a></h5>
                               <span>@if($count['categorie3']>0)({{$count['categorie3'] }})@endif</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                            <a href="{{route('job_byCategory',['category' => 8])}}"><span class="flaticon-content"></span></a>
                            </div>
                            <div class="services-cap">
                               <h5><a href="{{route('job_byCategory',['category' => 4])}}">Bourses d'études</a></h5>
                               <span>@if($count['categorie4']>0)({{$count['categorie4'] }})@endif</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                            <a href="{{route('job_byCategory',['category' => 5])}}"><span class="flaticon-report"></span></a>
                            </div>
                            <div class="services-cap">
                               <h5><a href="{{route('job_byCategory',['category' => 5])}}">Marketing & Communication</a></h5>
                               <span>@if($count['categorie5']>0)({{$count['categorie5'] }})@endif</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                            <a href="{{route('job_byCategory',['category' => 9])}}"><span class="flaticon-real-estate"></span></a>
                            </div>
                            <div class="services-cap">
                               <h5><a href="{{route('job_byCategory',['category' => 9])}}">Metier de Santé</a></h5>
                               <span>@if($count['categorie6']>0)({{$count['categorie6'] }})@endif</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                            <a href="{{route('job_byCategory',['category' => 7])}}"><span class="flaticon-app"></span></a>
                            </div>
                            <div class="services-cap">
                               <h5><a href="{{route('job_byCategory',['category' => 7])}}">RH & Formation </a></h5>
                               <span>@if($count['categorie7']>0)({{$count['categorie7'] }})@endif</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                            <a href="{{route('job_byCategory',['category' => 25])}}"><span class="flaticon-helmet"></span></a>
                            </div>
                            <div class="services-cap">
                               <h5><a href="{{route('job_byCategory',['category' => 25])}}">Agent de Terrain</a></h5>
                               <span>@if($count['categorie8']>0)({{$count['categorie8'] }})@endif</span>
                            </div>
                        </div>
                    </div>
                   
                   
                </div>
                <!-- More Btn -->
                <!-- Section Button -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="browse-btn2 text-center mt-50">
                           <a href="{{route('job_listing')}}" class="border-btn2">Parcourer tous les secteurs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Our Services End -->

         <!-- Featured_job_start -->
         <section class="featured-job-area feature-padding" style="margin-top:-50px;">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <span>DERNIÈRES OFFRES D´EMPLOI</span>
                            <h2>Parcourez nos dernières offres d'emploi  </h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="margin-top:-50px;">
                    <div class="col-xl-12">
					@forelse($emplois as $emploi)
                        <!-- single-job-content -->
                        <div class="single-job-items mb-0">
                            <div class="job-items">
                                {{--<div class="company-img">
                                    @if($emploi->user->photo)  
                                        <a href="{{route('job_detail',['slug' => $emploi->slug])}}"> <img src="{{URL::asset('dashboards/images/users/'.$emploi->user->photo)}}" style="width:40px;height:auto; float:left;" alt=""></a>   
                                    @else
                                    <a href="{{route('job_detail',['slug' => $emploi->slug])}}"> <img src="{{URL::asset('dashboards/images/users/logop.png')}}" style="width:60px;height:auto;float:left;" alt=""></a>  
                                    @endif                                     
                                </div>--}}
                                <div class="job-tittle">
                                    <a href="{{route('job_detail',['slug' => $emploi->slug])}}"><h6>{{$emploi->title}}</h6></a>
                                    <ul>
                                        <li>
                                            Recruteur: 
                                            @if($emploi->company_name)  
                                                {{$emploi->company_name}}
                                            @else
                                                {{$emploi->user->names}}
                                            @endif
                                        </li>
                                        <li><i class="fas fa-map-marker-alt"></i>{{$emploi->location}}</li>
                                        <li><i class="fas fa-level-up-alt"></i>  Niveau: {{$emploi->qualification}}</li>
                                        <li> Type: 
                                            @if($emploi->type->name == "Freelance")  
                                            <span class="badge badge-warning"> Freelance</span>
                                            @endif

                                            @if($emploi->type->name == "Remote")  
                                            <span class="badge badge-primary"> Remote</span>
                                            @endif

                                            @if($emploi->type->name == "Plein Temps")  
                                            <span class="badge badge-success">Plein Temps</span>
                                            @endif

                                            @if($emploi->type->name == "Contrat")  
                                                        <span class="badge badge-danger">Contrat</span>
                                                        @endif
                                            @if($emploi->type->name == "Bourse d'étude")  
                                            <span class="badge badge-success">Bourse d'étude</span>
                                            @endif
                                            @if($emploi->type->name == "Stage")  
                                            <span class="badge badge-primary">Stage</span>
                                            @endif
                                        </li>
                                        <?php  \Carbon\Carbon::setLocale('fr');?>    
                                        <li>Posté : <span>{{$emploi->created_at ? $emploi->created_at->diffForHumans()  : '-' }}</span></li>
                                                                              
                                        <li><i class="fa fa-calendar" aria-hidden="true"></i> Clôture : 
                                   @php($end_date = \Carbon\Carbon::parse($emploi->end_date))
                                    @if ($end_date->isPast())
                                        <span style="color:red">Expiré </span>
                                    @else
                                    <span>{{ $end_date->format('d/m/Y') }}</span>
                                    @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            {{--<div class="items-link f-right">
                                <a href="{{route('job_detail',['slug' => $emploi->slug])}}">Postuler</a>
                            </div>--}}
                        </div>
                        <!-- single-job-content -->
					@empty
                    <div class="section-tittle text-center">
                            <span>Aucun emploi n'est publié</span>
                        </div>				
					@endforelse
                             
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="browse-btn2 text-center mt-50">
                           <a href="{{route('job_listing')}}" class="border-btn2">Voir toutes les annonces</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Featured_job_end -->
        <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                        <span>DERNIERS PROFILS SUR LA CVTHÈQUE</span>
                        </div>
                    </div>
                </div>
        <div class="container">
					<table class="table ">
							<thead>
								<tr>
								  <th>Titre</th>
								  <th>Competence</th>
								  <th>Langue</th>
								  <th></th>
								</tr>
							</thead>
							<tbody>
							<tr>
							@foreach($candidat as $comp)	
								
								<td>{{$comp->title}}</td>
								<td>{{$comp->competence}}</td>
								<td>{{$comp->langue}}</td>
								<td>
                                        <a style="color:#629aa9;" href="{{route('register')}}" ><i class="fa fa-eye"> Voir CV</i></a>
                                  </td>
							</tr>
							@endforeach	
					</table>

                    <div class="row">
                    <div class="col-lg-12">
                        <div class="browse-btn2 text-center mt-50">
                           <a href="{{route('register')}}" class="border-btn2">Voir tous les candidats</a>
                        </div>
                        <div class="browse-btn2 text-center mt-50">
                        <a href="{{route('register-candidat')}}" class="btn head-btn" >CANDIDAT: DÉPOSEZ VOTRE CV</a>
                        <br/></div></div> 
                </div>
		</div>


       <style>
body {
	font-family: 'Varela Round', sans-serif;
}	
.modal-newsletter {	
	color: #999;
	font-size: 15px;
}
.modal-newsletter .modal-content {
	padding: 40px;
	border-radius: 0;		
	border: none;
}
.modal-newsletter .modal-header {
	border-bottom: none;   
	position: relative;
	text-align: center;
	border-radius: 5px 5px 0 0;
}
.modal-newsletter h4 {
	color: #000;
	text-align: center;
	font-size: 30px;
	margin: 0 0 25px;
	font-weight: bold;
	text-transform: capitalize;
}
.modal-newsletter .close {
	background: #c0c3c8;
    position: absolute;
    top: 0;
    right: 0;
    color: #fff;
    text-shadow: none;
    opacity: 0.5;
    width: 30px;
    height: 30px;
    border-radius: 20px;
    font-size: 19px;
    text-align: center;
    padding: 0;
}
.modal-newsletter .close span {
	position: relative;
	top: -1px;
}
.modal-newsletter .close:hover {
	opacity: 0.8;
}
.modal-newsletter .icon-box {
	color: #7265ea;		
	display: inline-block;
	z-index: 9;
	text-align: center;
	position: relative;
	margin-bottom: 10px;
}
.modal-newsletter .icon-box i {
	font-size: 110px;
}
.modal-newsletter .form-control, .modal-newsletter .btn {
	min-height: 46px;
	border-radius: 3px; 
}
.modal-newsletter .form-control {
	box-shadow: none;
	border-color: #dbdbdb;
}
.modal-newsletter .form-control:focus {
	border-color: #7265ea;
	box-shadow: 0 0 8px rgba(114, 101, 234, 0.5);
}
.modal-newsletter .btn {
	color: #fff;
	border-radius: 4px;
	background: #fb246a;
	text-decoration: none;
	transition: all 0.4s;
	line-height: normal;
	padding: 6px 20px;
	min-width: 150px;
	border: none;
}
.modal-newsletter .btn:hover, .modal-newsletter .btn:focus {
	background: #4e3de4;
	outline: none;
}
.modal-newsletter .input-group {
	margin: 30px 0 15px;
}
.hint-text {
	margin: 100px auto;
	text-align: center;
}
@media only screen and (max-width : 600px) {
                .modal-newsletter{
                   width:100%;
                }
                .modal-loading{
                    display: none;
                }
            }

</style>
</head>
<body>
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-newsletter">
		<div class="modal-content">
			<form method="POST" id="addNewletterForm" >
				<div class="modal-header">
					<div class="icon-box mx-auto">						
						<i class="fa fa-envelope-open-o"></i>
					</div>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span>&times;</span></button>
				</div>
				<div class="modal-body text-center">
					<h4>Informez vous en temps réel.</h4>	
					<p>Abonnez-vous pour recevoir les dernières offres d'emploi</p>
					<div class="">
						<input type="email" class="form-control" required name="email" id="newsletter-form-email"
                            placeholder="Votre Email" required><br/>
						<div class="">
							<button type="submit" class="btn btn-primary" value="S'abonner" id="btn-addNewletter"
                                            ><img src="{{URL::asset('frontend/img/icon/form.png')}}" alt=""></button>
						</div>
					</div>
				</div>
			</form>			
		</div>
	</div>
</div>

        
@stop
