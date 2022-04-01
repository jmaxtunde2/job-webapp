<?php

/**
 * Author: Perfect Tech Lab
 * Date: 2020/02/05
 * Time: 10:51PM
 * File Name: add_category.blade.php
 */

?>

@extends('account.layout')

@section('sidebar')
    @include('account.'.getLevel($user->level).'.sidebar')
@stop


@section('content')
    <div id="page-wrapper">
			<div class="main-page">
            <br/><br/><br/><br/>
			
			@if($candidat->count()>0)
			<div class="container">
			<h3> Les Entreprises qui recrutent </h3>
					<table class="table table-responsive">
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
								<td><a href="{{$comp->siteweb}}">{{$comp->siteweb}}</a></td>
							</tr>
							@endforeach	
							</tbody>
					</table>
					{!! $companies->render() !!}<br/><br/>

					<div class="charts" style="margin-left:30px;margin-right:20px;">		
			<div class="mid-content-top charts-grids">
				<div class="middle-content">
						<h4 class="title">Publicités</h4>
					<!-- start content_slider -->
					<div id="owl-demo" class="owl-carousel text-center">
                    <div class="item">
							<a href="https://accounts.binance.me/en/register?ref=102869569"><img class="lazyOwl img-responsive" data-src="{{URL::asset('dashboards/images/slider1.jpg' )}}" alt="name"></a>
						</div>
                        <div class="item">
							<img class="lazyOwl img-responsive" data-src="{{URL::asset('dashboards/images/slider2.jpg' )}}" alt="name">
						</div>
                        <div class="item">
							<img class="lazyOwl img-responsive" data-src="{{URL::asset('dashboards/images/slider3.jpg' )}}" alt="name">
						</div>

                        <div class="item">
							<img class="lazyOwl img-responsive" data-src="{{URL::asset('dashboards/images/slider4.jpg' )}}" alt="name">
						</div>
                        {{--<div class="item">
							<img class="lazyOwl img-responsive" data-src="{{URL::asset('dashboards/images/slider5.jpg' )}}" alt="name">
						</div>
                        <div class="item">
							<img class="lazyOwl img-responsive" data-src="{{URL::asset('dashboards/images/slider6.jpg' )}}" alt="name">
						</div>
                        <div class="item">
							<img class="lazyOwl img-responsive" data-src="{{URL::asset('dashboards/images/slider7.jpg' )}}" alt="name">
						</div>--}}
						
					</div>
				</div>
					<!--//sreen-gallery-cursual---->
			</div>
		</div>
		
			</div>	
			@else
					<div class="form-grids row widget-shadow" style="margin-left:30px;margin-right:20px;" data-example-id="basic-forms"> 
						<div class="form-title">
						<center><h3 style="color:red;">Bienvenue {{$user->names}} !</h3></center>
                        {{--<p>Votre compte est actuellement en mode test, Remplissez ces informations pour que votre profil soit visible aux recruteurs. 
                        <br/>NB: Seul vos compétences, formations, expériences professionnelles, titre, langue seront visibles aux recruteurs et au public.
						Si un recruteur est interessé par votre profile, il devra faire une demande à l'administrateur du site. Ainsi, L'administrateur vous contactera et vous proposera les 
						conditions d'accès à l'emploi.<br/>
						</p>--}}
						<p>Votre compte est actuellement en mode test, Remplissez ces informations pour que votre profil soit visible aux recruteurs. 
                        </p>
						</center> <br/>
							
						</div>
						
						<div class="form-body">
						<h3>Profil du Candidat</h3><br/>
							<form method="POST" id="addCandidatForm"> 
								<div class="row"> 
									<div class="form-group col-md-6"> 
										<label for="name">Titre</label><br/>
										<input type="text" class="form-control" name="title" id="title" required Value="{{$candidat->title ?? ''}}" placeholder="Ex: Comptable ayant plus de 2ans d'expérience">
									</div> 
									<div class="form-group col-md-6"> 
										<label for="name">Langues</label><br/>
										<input type="text" class="form-control" name="langue" id="langue" Value="{{$candidat->langue ?? ''}}" required placeholder="Ex: Francais, anglais, Fon, Bariba.">
									</div> 
									
								</div>

								<div class="row"> 
								    <div class="form-group col-md-6"> 
										<label for="company_name">Date de Naissance</label><br/>
										<input type="date" class="form-control" name="dob" id="dob" Value="{{$candidat->dob ?? ''}}" placeholder="Choissisez">
									</div> 
									<div class="form-group col-md-3"> 
										<label for="name">LinkedIn</label><br/>
										<input type="text" class="form-control" name="linkedIn" id="linkedIn"  Value="{{$candidat->linkedIn ?? ''}}" placeholder="Votre lien LinkedIn (optionel)">
									</div> 
									<div class="form-group col-md-3"> 
										<label for="name">Github</label><br/>
										<input type="text" class="form-control" name="github" id="github"  Value="{{$candidat->github ?? ''}}" placeholder="Votre lien Github (optionel)">
									</div> 
								</div>

								
								<div class="row"> 
								<div class="form-group col-md-12">
                                                <label class="font-weight-semibold" for="required_knowledge">Compétences :</label>
                                                
                                                <textarea required name="competence" id="competence" class=" form-control" placeholder="Mentionnez vos compétences..."
                                                  rows="3">{{$candidat->competence ?? ''}}</textarea>
                                                   <div class="invalid-feedback" id="err_answer"></div>
									</div>
								</div>								
								
							    <button id="btn-addCandidat" type="submit" class="btn btn-success" style="background-color:#629aa9;"> Enregistrer</button> 
							</form> 
						

								

								
								
								<br/>
								<h3>Cursus Scholaire</h3><br/>
								<form method="POST" id="addCandidatFormationForm"> 
								
								<div class="row"> 
								    <div class="form-group col-md-6"> 
										<label for="company_name">Ecole de Formation</label><br/>
										<input type="text" class="form-control" name="school" id="school" placeholder="Ex: CEG H.C.Maga">
									</div> 
									<div class="form-group col-md-3"> 
										<label for="name">Date de Debut</label><br/>
										<input type="date" class="form-control" name="debut" id="debut"  placeholder="Choississez">
									</div> 
									<div class="form-group col-md-3"> 
										<label for="name">Date de Fin</label><br/>
										<input type="date" class="form-control" name="fin" id="fin"  placeholder="Choississez">
									</div> 
								</div>

								
								<div class="row"> 
									
									<div class="form-group col-md-6">
										<label for="pays"> Diplome Obtenue </label>
										<select name="diplome_obtenue" class="form-control">
												<option value="" disabled selected>-- Choississez --</option>
												<option value="Doctorat">Doctorat</option>
												<option value="BAC+5/Master">BAC+5/Master</option>
												<option value="BAC+4/Maitrise">BAC+4/Maitrise</option>
												<option value="BAC+3/Licence">BAC+3/Licence</option>
												<option value="BAC+2/BTS">BAC+2/BTS</option>
												<option value="BAC">BAC</option>
												<option value="BEPC">BEPC</option>
												<option value="DEAT">DEAT</option>
												<option value="CAP">CAP</option>
												<option value="CEP">CEP</option>
												<option value="Diplome Professionel">Diplome Professionel</option>
										</select>
									</div>
									<div class="form-group col-md-6"> 
										<label for="name">Mention</label><br/>
										<select name="mention" class="form-control">
												<option value="" disabled selected>-- Choississez --</option>
												<option value="Passable">Passable</option>
												<option value="Assez-Bien">Assez-Bien</option>
												<option value="Bien">Bien</option>
												<option value="Tres-Bien">Tres-Bien</option>
												<option value="Excellent">Excellent</option>
										</select>
									</div> 
								</div>

							    <button id="btn-addCandidatFormation" type="submit" class="btn btn-success" style="background-color:#629aa9;"><i class="fa fa-plus"></i> Ajouter</button> 
							</form> 

							<br/>
							<table class="table">
							<thead>
								<tr>
								  <th>Ecole de Formation</th>
								  <th>Debut</th>
								  <th>Fin</th>
								  <th>Diplome</th>
								  <th>Mention</th>
								  <th></th>
								</tr>
							</thead>
							<tbody>
							@forelse($candidatform as $category)
								<tr>
								  <th scope="row">{{ $category->school}}</th>
								  <td> {{$category->debut}}</td>
								  <td> {{$category->fin}}</td>
								  <td> {{$category->diplome_obtenue}}</td>
								  <td> {{$category->mention}}</td>
								  <td>
                                        <a class="confirmation"  style="color:red;" href="{{route(''.$data["user_type"].'.deleteCursus', ['id' => $category->id])}}"><i class="fa fa-trash"></i></a>
                                   </td>
								</tr>
							@empty
                                    <tr>
                                       <td colspan="9" style='color:red;text-align:center;vertical-align:middle'>Pas de Cursus</td>
                                    </tr>
                            @endforelse

							</tbody>
						</table>
							<br/>
								<h3>Experience professionnelles </h3><br/>
								<form method="POST" id="addCandidatExperience"> 
								
								<div class="row"> 
								    <div class="form-group col-md-6"> 
										<label for="company_name">Entreprise</label><br/>
										<input type="text" class="form-control" name="school" id="school" placeholder="Ex: Perfect Tech Lab">
									</div> 
									<div class="form-group col-md-3"> 
										<label for="name">Date de Debut</label><br/>
										<input type="date" class="form-control" name="debut" id="debut"  placeholder="Choississez">
									</div> 
									<div class="form-group col-md-3"> 
										<label for="name">Date de Fin</label><br/>
										<input type="date" class="form-control" name="fin" id="fin"  placeholder="Choississez">
									</div> 
								</div>								
								<div class="row"> 									
									<div class="form-group col-md-6">
										<label for="pays"> Type </label>
										<select name="diplome_obtenue" class="form-control">
												<option value="" disabled selected>-- Choississez --</option>
												<option value="Stage">Stage</option>
												<option value="Contrat">Contrat</option>
												<option value="Emploi">Emploi</option>
										</select>
									</div>
									<div class="form-group col-md-6"> 
										<label for="name">Mention</label><br/>
										<select name="mention" class="form-control">
												<option value="experience_professionel">Experience Professionel</option>
												
										</select>
									</div> 
								</div>

							    <button id="btn-addCandidatExperience" type="submit" class="btn btn-success" style="background-color:#629aa9;"><i class="fa fa-plus"></i> Ajouter</button> 
							</form> 
							<br/>
							<table class="table">
							<thead>
								<tr>
								  <th>Entreprise</th>
								  <th>Debut</th>
								  <th>Fin</th>
								  <th>Type</th>
								  <th>Mention</th>
								  <th></th>
								</tr>
							</thead>
							<tbody>
							@forelse($candidatexp as $category)
								<tr>
								  <th scope="row">{{ $category->school}}</th>
								  <td> {{$category->debut}}</td>
								  <td> {{$category->fin}}</td>
								  <td> {{$category->diplome_obtenue}}</td>
								  <td> {{$category->mention}}</td>
								  <td>
                                        <a class="confirmation"  style="color:red;" href="{{route(''.$data["user_type"].'.deleteCursus', ['id' => $category->id])}}"><i class="fa fa-trash"></i></a>
                                   </td>
								</tr>
							@empty
                                    <tr>
                                       <td colspan="9" style='color:red;text-align:center;vertical-align:middle'>Pas de Cursus</td>
                                    </tr>
                            @endforelse

							</tbody>
						</table>
							

							<br/>
								<h3>Vos References</h3><br/>
								<form method="POST" id="addReferenceFormationForm"> 
								
								<div class="row"> 
								    <div class="form-group col-md-6"> 
										<label for="company_name">Noms et Prenom</label><br/>
										<input type="text" class="form-control" name="names" id="names" placeholder="Noms et Prenom">
									</div> 
									<div class="form-group col-md-6"> 
										<label for="name">Relation</label><br/>
										<select name="relation" class="form-control">
												<option value="" disabled selected>-- Choississez --</option>
												<option value="Ami">Ami</option>
												<option value="Parent">Parent</option>
												<option value="Enseignant">Enseignant</option>
												<option value="Employeur">Employeur</option>
												<option value="Mentor">Mentor</option>
										</select>
									</div> 
									
								</div>

								
								<div class="row"> 
									
								<div class="form-group col-md-6"> 
										<label for="company_name">Email</label><br/>
										<input type="text" class="form-control" name="email" id="email" placeholder="Email">
									</div> 
									<div class="form-group col-md-6"> 
										<label for="company_name">Phone</label><br/>
										<input type="text" class="form-control" name="phone" id="phone" placeholder="Telehone">
									</div> 
								</div>

							    <button id="btn-addReferenceFormation" type="submit" class="btn btn-success" style="background-color:#629aa9;"><i class="fa fa-plus"></i> Ajouter</button> 
							</form>

							<br/>
							<table class="table">
							<thead>
								<tr>
								  <th>Nom & Prenom</th>
								  <th>Relation</th>
								  <th>Email</th>
								  <th>Phone</th>
								  <th></th>
								</tr>
							</thead>
							<tbody>
							@forelse($candidatref as $category)
								<tr>
								  <th scope="row">{{ $category->names}}</th>
								  <td> {{$category->relation}}</td>
								  <td> {{$category->email}}</td>
								  <td> {{$category->phone}}</td>
								  <td>
                                        <a class="confirmation"  style="color:red;" href="{{route(''.$data["user_type"].'.deleteReference', ['id' => $category->id])}}"><i class="fa fa-trash"></i></a>
                                   </td>
								</tr>
							@empty
                                    <tr>
                                       <td colspan="9" style='color:red;text-align:center;vertical-align:middle'>Pas de Reference</td>
                                    </tr>
                            @endforelse

							</tbody>
						</table>
							<br/>
						</div>
					</div>
					@endif
	
			</div>
	</div>
@stop