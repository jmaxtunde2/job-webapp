<?php

/**
 * Author: Perfect Tech Lab
 * Date: 2020/02/05
 * Time: 10:51PM
 * File Name: add_category.blade.php
 */

?>
@extends('website.layout_detail')

@section('content')

<!-- job post company Start -->
        <div class="job-post-company pt-50 pb-50">
            <div class="container">
                <div class="row justify-content-between">
                    
					 <!-- Right Content -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="post-details3  mb-50">
                            <!-- Small Section Tittle -->
                           <div class="small-section-tittle">
                               <h4>Résumé de l'emploi</h4>
                           </div>
                          <ul>
                                <?php  \Carbon\Carbon::setLocale('fr');?>    
                              <li> <span> <b>{{$emploi->title}}</b></span></li>
                              <li>Posté : <span>{{$emploi->created_at ? $emploi->created_at->diffForHumans()  : '-' }}</span></li>
                              <li>Lieu : <span>{{$emploi->location}}</span></li>
                              <li>Niveau : <span>{{$emploi->qualification}}</span></li>
                              <li>Nature : <span>{{$emploi->type->name}}</span></li>
                              <li>Catégorie :  <span>{{$emploi->category->name}}</span></li>
                              <li>Date de Cloture : 
                                   @php($end_date = \Carbon\Carbon::parse($emploi->end_date))
                                    @if ($end_date->isPast())
                                        <span style="color:red">Expiré </span>
                                    @else
                                    <span>{{ $end_date->format('d/m/Y') }}</span>
                                    @endif
                                    
                                       
                                </li>
                          </ul>
                          @if (!$end_date->isPast())
                         <div class="apply-btn2">
                            @if($emploi->type_application == "email")
                                <a href="mailto:{{$emploi->apply_link}}" class="btn">Postuler Maintenant</a>
                            @endif

                            @if($emploi->type_application == "telephone")
                                <a href="tel:{{$emploi->apply_link}}" class="btn">Postuler Maintenant</a>
                            @endif

                            @if($emploi->type_application == "web")
                                <a href="{{$emploi->apply_link}}" class="btn">Postuler Maintenant</a>
                            @endif
                            @if($emploi->type_application == "manuel")
                                Depôt de dossier: <br/>
                                {{$emploi->apply_link}}
                            @endif

                         </div>
                         @endif
                       </div>
                        <div class="post-details4  mb-50">
                            <!-- Small Section Tittle -->
                           <div class="small-section-tittle">
                               <h4>Information sur le recruteur</h4>
                           </div>
                           @if($emploi->company_name)
                           <span>Nom:  
                             
                                {{$emploi->company_name}}
                              @else
                                {{$emploi->user->names}}
                             @endif
                                </span>
                              <p>
                              {!! $emploi->user->description !!}
                             </p>
                           
                       </div>
                    </div>
					<!-- Left Content -->
                    <div class="col-lg-8">
                        <!-- job single -->
                        <div class="single-job-items">
                            <div class="job-items">
                            <div class="company-img">
												<a href="{{route('job_detail',['slug' => $emploi->slug])}}"> <img src="{{URL::asset('dashboards/images/users/'.$emploi->user->photo)}}" style="width:60px;height:auto;" alt=""></a>
											</div>
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
													<li><i class="fa fa-eye"></i>{{$emploi->nbView}}</li>
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
                        </div>
                        
                          <!-- job single End -->
                       
                        <div class="job-post-details">
                            <div class="post-details1 mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Description de l'emploi</h4>
                                </div>
                                <p>{!! $emploi->description !!}</p>
                            </div>
                            @if (!$end_date->isPast())
                            <div class="apply-btn2">
                            @if($emploi->type_application == "email")
                                <a href="mailto:{{$emploi->apply_link}}" class="btn">Postuler Maintenant</a>
                            @endif

                            @if($emploi->type_application == "telephone")
                                <a href="tel:{{$emploi->apply_link}}" class="btn">Postuler Maintenant</a>
                            @endif

                            @if($emploi->type_application == "web")
                                <a href="{{$emploi->apply_link}}" class="btn">Postuler Maintenant</a>
                            @endif
                         </div>  @endif
                    </div>

                    <br/>
                    <div class="social">
						<br/>
                        <p>Un ami pourrait être interessé? </p>
						<h4> Partager sur: </h4>
						<br/>
							<a href="https://api.whatsapp.com/send?text= Salut, Cet emploi pourrait vous interessé.  {{$emploi->title}}  disponible sur ce lien:  {{route('job_detail',['slug' => $emploi->slug])}}" data-action="share/whatsapp/share" target ="_blank"> <img src="{{URL::asset('frontend/img/social/whatsap.png')}}" class="img-responsive" style="width:40px;  height:40px;float:left;margin:5px;" alt=""> </a>
							
                            <a href="https://www.facebook.com/sharer/sharer.php?u=" target ="_blank"> <img src="{{URL::asset('frontend/img/social/facebook.png')}}" class="img-responsive" style="width:40px;  height:40px;float:left;margin:5px;" alt=""></a>
							
                            <a href="https://twitter.com//intent/tweet?text= Salut, Cet emploi pourrait vous interessé.  {{$emploi->title}}  disponible sur ce lien:  {{route('job_detail',['slug' => $emploi->slug])}}" target ="_blank"> <img src="{{URL::asset('frontend/img/social/twitter.png')}}" class="img-responsive" style="width:40px;  height:40px;float:left;margin:5px;" alt=""> </a>
							
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{route('job_detail',['slug' => $emploi->slug])}}&title=Salut, Cet emploi pourrait vous interessé.  {{$emploi->title}} &summary=&source=" target ="_blank"> <img src="{{URL::asset('frontend/img/social/linkin.png')}}" class="img-responsive" style="width:40px;  height:40px;float:left;margin:5px;" alt=""></a>
							
                            <a href="tg://share?text= Salut, Cet emploi pourrait vous interessé.  {{$emploi->title}}   disponible sur ce lien:  {{route('job_detail',['slug' => $emploi->slug])}}" target ="_blank"> <img src="{{URL::asset('frontend/img/social/telegram.png')}}" class="img-responsive" style="width:40px;  height:40px;float:left;margin:5px;" alt=""> </a>
							
				</div><br/>

                <div class="browse-btn2 text-center mt-50">
                        <a href="{{route('register-candidat')}}" class="btn head-btn" >CANDIDAT: DÉPOSEZ VOTRE CV</a>
                        </div>

                    <br/><br/>
                    @if($emplois->count() >1)
                    <div class="section-tittle text-center">
                               <h4 style="color:#ff4357;">Emploi similaires</h4>
                           </div>
                    @else
                    <div class="section-tittle">
                               <h4 style="color:#ff4357;"><a href="{{route('job_listing')}}"> Visiter tous les Offres d'emplois </a></h4>
                           </div>
                    @endif

                        @forelse($emplois as $emplo)

                            @if($emplo->id != $emploi->id)  
									<!-- single-job-content -->
									<div class="single-job-items mb-3">
										<div class="job-items">
											{{--<div class="company-img">
                                            @if($emplo->user->photo)  
                                        <a href="{{route('job_detail',['slug' => $emplo->slug])}}"> <img src="{{URL::asset('dashboards/images/users/'.$emplo->user->photo)}}" style="width:40px;height:auto;" alt=""></a>   
                                    @else
                                    <a href="{{route('job_detail',['slug' => $emplo->slug])}}"> <img src="{{URL::asset('dashboards/images/users/logop.png')}}" style="width:60px;height:auto;" alt=""></a>  
                                    @endif   
											</div>--}}
											<div class="job-tittle">
												<a href="{{route('job_detail',['slug' => $emplo->slug])}}"><h6>{{$emplo->title}}</h6></a>
												<ul>
													<li>Recruteur:
														@if($emplo->company_name)  
															{{$emplo->company_name}}
														@else
															{{$emplo->user->names}}
														@endif
													</li>
													<li><i class="fas fa-map-marker-alt"></i>{{$emplo->location}}</li>
													<li><i class="fas fa-level-up-alt"></i> Niveau: {{$emplo->qualification}}</li>
													<li> Type:
                                                    @if($emplo->type->name == "Freelance")  
                                                        <span class="badge badge-warning"> Freelance</span>
                                                        @endif

                                                        @if($emplo->type->name == "Remote")  
                                                        <span class="badge badge-primary"> Remote</span>
                                                        @endif

                                                        @if($emplo->type->name == "Plein Temps")  
                                                        <span class="badge badge-success">Plein Temps</span>
                                                        @endif

                                                        @if($emplo->type->name == "Saisonnier")  
                                                        <span class="badge badge-danger">Saisonnier</span>
                                                        @endif
                                                        @if($emplo->type->name == "Bourse d'étude")  
                                                        <span class="badge badge-success">Bourse d'étude</span>
                                                        @endif
                                                        @if($emplo->type->name == "Stage")  
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
										
									</div>
									<!-- single-job-content -->
                                    
                                    @endif
								@empty
								<div class="section-tittle text-center">
										<span style="color:#ff4357;">Aucun emploi n'est publié</span>
									</div>				
								@endforelse
                                
								
								{!! $emplois->render() !!}

                            </div>
                   
                </div>
            </div>
        </div>
        <!-- job post company End -->
		<script type="application/ld+json">
			{
			  "@context" : "https://schema.org/",
			  "@type" : "JobPosting",
			  "title" : "{{$emploi->title}}",
			  "description" : "{{$emploi->description}}",
			  "datePosted": "{{$emploi->created_at}}",
			  "hiringOrganization" : {
					"@type" : "Organization",
					"name" : "Azerke.Job",
					"sameAs" : "https://www.azerke.com",
					"logo" : "https://www.azerke.com/logop.png"
				  },
                  "applicantLocationRequirements": {
                    "@type": "Country",
                    "name": "{{$emploi->pays}}"
                },
			  "educationRequirements": "{{$emploi->qualification}}",
			  "employmentType": "{{$emploi->type->name}}",
			  "industry": "{{$emploi->category->name}}",
			  "jobLocation": {
				"@type": "Place",
				"address": {
				  "@type": "PostalAddress",
				  "addressLocality": "{{$emploi->location}}"
				}
			  },
			  "occupationalCategory": "{{$emploi->category->name}}"			  
			}
		</script>
		
@stop

