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

<div class="job-listing-area pt-70 pb-70">
            <div class="container">
                 <!-- Search Box -->
                 <div class="row" style="margin-top:-20px;">
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
    <br/><br/>
                <div class="row">
                    
                    <!-- Right content -->
                    <div class="col-xl-9 col-lg-9 col-md-8">
                        <!-- Featured_job_start -->
                        <section class="featured-job-area">
                            <div class="container">

                            
			
<br/>


                                <!-- Count of Job list Start -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="section-tittle text-center">
                                            <span>{{number_format($emplois->count(), 0)}} / {{number_format($emploiss->count(), 0)}} emplois trouvés</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Count of Job list End -->
								
                               @forelse($emplois as $emploi)
									<!-- single-job-content -->
									<div class="single-job-items mb-30">
										<div class="job-items">
											{{--<div class="company-img">
                                            @if($emploi->user->photo)  
                                        <a href="{{route('job_detail',['slug' => $emploi->slug])}}"> <img src="{{URL::asset('dashboards/images/users/'.$emploi->user->photo)}}" style="width:40px;height:auto;" alt=""></a>   
                                    @else
                                    <a href="{{route('job_detail',['slug' => $emploi->slug])}}"> <img src="{{URL::asset('dashboards/images/users/logop.png')}}" style="width:60px;height:auto;" alt=""></a>  
                                    @endif   
											</div>--}}
											<div class="job-tittle">
												<a href="{{route('job_detail',['slug' => $emploi->slug])}}"><h6>{{$emploi->title}}</h6></a>
												<ul>
													<li> Recruteur:
														@if($emploi->company_name)  
															{{$emploi->company_name}}
														@else
															{{$emploi->user->names}}
														@endif
													</li>
													<li><i class="fas fa-map-marker-alt"></i>{{$emploi->location}}</li>
													<li><i class="fas fa-level-up-alt"></i> Niveau: {{$emploi->qualification}}</li>
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
								
								{!! $emplois->render() !!}
                            </div>
                        </section>
                        <!-- Featured_job_end -->
                        <div class="browse-btn2 text-center mt-50">
                        <a href="{{route('register-candidat')}}" class="btn head-btn" >CANDIDAT: DÉPOSEZ VOTRE CV</a>
                        </div>
                    </div>
					<!-- Left content -->
                    <div class="col-xl-3 col-lg-3 col-md-4">
                        <div class="row">
                            <div class="col-12">
                                    <div class="small-section-tittle2 mb-45">
                                    <div class="ion"> <svg 
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="20px" height="12px">
                                    <path fill-rule="evenodd"  fill="rgb(27, 207, 107)"
                                        d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z"/>
                                    </svg>
                                    </div>
                                    <h4>Trier Par</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Job Category Listing start -->
                        <div class="job-category-listing mb-50">
                            <!-- single one -->
                            <div class="single-listing">
							
                            <div class="single-listing">
                                <!-- select-Categories start -->
                                <div class="select-Categories pb-50">
                                    <div class="small-section-tittle2">
                                        <h4>Posté entre</h4>
                                    </div>
                                    <ul>
                                    <li><a href="{{route('job_listing', ['duration'=>"all"])}}" style="color:#ff4357;hover:black;">Tous</a></li>
                                    <li><a href="{{route('job_listing', ['duration'=>"daily"])}}" style="color:#ff4357;hover:black;">Aujourd'hui</a></li>
                                    <li><a href="{{route('job_listing', ['duration'=>"monthly"])}}" style="color:#ff4357;hover:black;">Ce Mois</a></li>
                                    <li><a href="{{route('job_listing', ['duration'=>"weekly"])}}" style="color:#ff4357;hover:black;">Hebdomadaire</a></li>
                                    <li><a href="{{route('job_listing', ['duration'=>"date_depot"])}}" style="color:#ff4357;hover:black;">Date de Dépot</a></li>
                                    </ul>
                                    
                                </div>
                                <!-- select-Categories End -->
                            </div>
							
								<!--  Select job items End-->
                                <div class="small-section-tittle2">
                                     <h4>Type</h4>
                               </div>
                                <!-- Select job items start -->
                                <div class="select-job-items2">
                                    <ul>
												@foreach($types as $p)
													<li><a href="{{route('job_byType',['type' => $p->id])}}" style="color:#ff4357;">{{$p->name}}</a></li>
												@endforeach
											</ul>
                                </div>
								<br/>
                                <!--  Select job items End-->
								
                               <div class="small-section-tittle2">
                                     <h4>Catégorie </h4>
                               </div>
                                <!-- Select job items start -->
                                <div class="select-job-items2">
                                    <ul>
												@foreach($categories as $p)
													<li><a href="{{route('job_byCategory',['category' => $p->id])}}" style="color:#ff4357;hover:black;">{{$p->name}}</a></li>
												@endforeach
											</ul>
                                </div>
                                <br/>

                                <div class="small-section-tittle2">
                                     <h4>Pays </h4>
                               </div>
                                <!-- Select job items start -->
                                <div class="select-job-items2">
                                <ul>
                                    <li><a href="{{route('job_byPays', ['pays'=>"Bénin"])}}" style="color:#ff4357;hover:black;">Bénin</a></li>
                                    <li><a href="{{route('job_byPays', ['pays'=>"Niger"])}}" style="color:#ff4357;hover:black;">Niger</a></li>
                                    <li><a href="{{route('job_byPays', ['pays'=>"Togo"])}}" style="color:#ff4357;hover:black;">Togo</a></li>
                                    <li><a href="{{route('job_byPays', ['pays'=>"Cote Ivoire"])}}" style="color:#ff4357;hover:black;">Côte d'Ivoire</a></li>
                                    <li><a href="{{route('job_byPays', ['pays'=>"Burkina-Faso"])}}" style="color:#ff4357;hover:black;">Burkina-Faso</a></li>
                                    <li><a href="{{route('job_byPays', ['pays'=>"Cameroun"])}}" style="color:#ff4357;hover:black;">Cameroun</a></li>
                                    <li><a href="{{route('job_byPays', ['pays'=>"Sénégal"])}}" style="color:#ff4357;hover:black;">Sénégal</a></li>
                                    <li><a href="{{route('job_byPays', ['pays'=>"France"])}}" style="color:#ff4357;hover:black;">France</a></li>
                                    <li><a href="{{route('job_byPays', ['pays'=>"Gabon"])}}" style="color:#ff4357;hover:black;">Gabon</a></li>
                                    <li><a href="{{route('job_byPays', ['pays'=>"Mali"])}}" style="color:#ff4357;hover:black;">Mali</a></li>
                                    <li><a href="{{route('job_byPays', ['pays'=>"Guinée"])}}" style="color:#ff4357;hover:black;">Guinée</a></li>
                                    <li><a href="{{route('job_byPays', ['pays'=>"Congo"])}}" style="color:#ff4357;hover:black;">Congo</a></li>
                                    <li><a href="{{route('job_byPays', ['pays'=>"République centrafricaine"])}}" style="color:#ff4357;hover:black;">République centrafricaine</a></li>
                                    <li><a href="{{route('job_byPays', ['pays'=>"Djibouti"])}}" style="color:#ff4357;hover:black;">Djibouti</a></li>
                                    <li><a href="{{route('job_byPays', ['pays'=>"Guinée équatoriale"])}}" style="color:#ff4357;hover:black;">Guinée équatoriale</a></li>
                                    <li><a href="{{route('job_byPays', ['pays'=>"La Réunion"])}}" style="color:#ff4357;hover:black;">La Réunion</a></li>
                                    <li><a href="{{route('job_byPays', ['pays'=>"Madagascar"])}}" style="color:#ff4357;hover:black;">Madagascar</a></li>
                                    <li><a href="{{route('job_byPays', ['pays'=>"Tchad"])}}" style="color:#ff4357;hover:black;">Tchad</a></li>
                                    <li><a href="{{route('job_byPays', ['pays'=>"Rwanda"])}}" style="color:#ff4357;hover:black;">Rwanda</a></li>
                                    
                                    <li><a href="{{route('job_byPays', ['pays'=>"Burundi"])}}" style="color:#ff4357;hover:black;">Burundi</a></li>
                                    <li><a href="{{route('job_byPays', ['pays'=>"Comores"])}}" style="color:#ff4357;hover:black;">Comores</a></li>
                                    <li><a href="{{route('job_byPays', ['pays'=>"Seychelles"])}}" style="color:#ff4357;hover:black;">Seychelles</a></li>
                                    <li><a href="{{route('job_byPays', ['pays'=>"Mayotte"])}}" style="color:#ff4357;hover:black;">Mayotte</a></li>

                                </ul>
                                </div>
                                <br/>

                                
                            </div>
                            <br/>
                           
                            
                            
                        </div>
                        <!-- Job Category Listing End -->
                    </div>
                </div>
            </div>
        </div>
@stop