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
				<h2 class="title1" style="margin-left:30px;">Gestion des Emplois </h2>
					<div class="form-grids row widget-shadow" style="margin-left:30px;margin-right:20px;" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>{{ $data["title"] }}</h4>
							<div class="input-group-btn">              
								<a href="{{route(''.$data["user_type"].'.emploi_index')}}" class="btn btn-success pull-right " style="margin-left:7px;background-color: #F2B33F;"><i class="fa fa-list"> Liste des Emplois</i></a>
                        	</div>
						</div>
						<div class="form-body">
							<form method="POST" id="addEmploiForm" novalidate> 
								<div class="row"> 
									<div class="form-group col-md-6"> 
										<label for="name">Titre</label><br/>
										<input type="text" class="form-control" name="title" id="title" required placeholder="Titre de l'emploi">
									</div> 
									<div class="form-group col-md-3"> 
										<label for="name">Lieu</label><br/>
										<input type="text" class="form-control" name="location" id="location" required placeholder="Indiquez le lieu">
									</div> 
									<div class="form-group col-md-3"> 
										<label for="name">Pays</label><br/>
										<select name="pays" class="form-control">
										<option value="" disabled selected>-- Choississez --</option>
												<option value="Bénin">Bénin</option>
												<option value="Niger">Niger</option>
												<option value="Togo">Togo</option>
												<option value="Cote Ivoire">Cote d'Ivoire</option>
												<option value="Burkina-Faso">Burkina-Faso</option>
												<option value="Cameroun">Cameroun</option>
												<option value="Sénégal">Senegal</option>
												<option value="France">France</option>
												<option value="Gabon">Gabon</option>
												<option value="Mali">Mali</option>
												<option value="Guinée">Guinée</option>
												<option value="Congo">Congo</option>
												<option value=" République centrafricaine"> République centrafricaine</option>
												<option value="Djibouti">Djibouti</option>
												<option value="Guinée équatoriale">Guinée équatoriale</option>
												<option value="La Réunion">La Réunion</option>
												<option value=" Madagascar"> Madagascar</option>
												<option value="Tchad">Tchad</option>
												<option value="Rwanda">Rwanda</option>
												<option value="Burundi">Burundi</option>
												<option value=" Comores"> Comores</option>
												<option value="Seychelles">Seychelles</option>
												<option value="Mayotte">Mayotte</option>
												<option value="Non Défini">Non Défini</option>
												
										</select>
									</div>
								</div>

								<div class="row"> 
								    
									<div class="form-group col-md-6"> 
										<label for="name">Niveau</label><br/>
										<select name="qualification" class="form-control">
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
												<option value="Non Défini">Non Défini</option>
												
										</select>
									</div>
									<div class="form-group col-md-6">
										<label for="categorie"> Categorie</label>
										<select name="category_id" class="form-control">
												<option value="" disabled selected>-- Choississez --</option>
												@foreach($categories as $p)
													<option value="{{$p->id}}">{{$p->name}}</option>
												@endforeach
										</select>
									</div>

								</div>

								
								<div class="row"> 
									
									<div class="form-group col-md-6">
										<label for="type_id"> Type</label>
										<select name="type_id" class="form-control">
												<option value="" disabled selected>-- Choississez --</option>
												@foreach($types as $p)
													<option value="{{$p->id}}">{{$p->name}}</option>
												@endforeach
										</select>
									</div>
									<div class="form-group col-md-6"> 
										<label for="name">La date de cloture</label><br/>
										<input type="date" class="form-control" name="end_date" id="end_date" placeholder="La date de cloture">
									</div> 
								</div>

								

								
								{{--<div class="form-row">
                                    <div class="form-group col-md-6">
                                                <label class="font-weight-semibold" for="required_knowledge">Compétence Réquise :</label>
                                                
                                                <textarea required name="required_knowledge" id="required_knowledge" class=" form-control editor" placeholder="Decrire les Competences Requises..."
                                                  rows="15"></textarea>
                                                   <div class="invalid-feedback" id="err_answer"></div>
									</div>
									<div class="form-group col-md-6">
                                                <label class="font-weight-semibold" for="education_experience">Education et Expérience Réquises :</label>
                                                
                                                <textarea required name="education_experience" id="education_experience" class=" form-control editor" placeholder="Decrire les Competences Requises..."
                                                  rows="15"></textarea>
                                                   <div class="invalid-feedback" id="err_answer"></div>
                                    </div>
								</div>--}}
								
								<div class="row"> 
									<div class="form-group col-md-6">
										<label for="pays"> Media pour Postuler</label>
										<select name="type_application" class="form-control">
												<option value="" disabled selected>-- Choississez --</option>
												<option value="email">Par notre email</option>
												<option value="web">Par notre site web</option>
												<option value="tel">Par notre telephone</option>
												<option value="manuel">Manuellement</option>
										</select>
									</div>
									<div class="form-group col-md-6"> 
										<label for="name">Le lien ou lieu pour postuler</label><br/>
										<input type="text" class="form-control" name="apply_link" id="apply_link" required placeholder="Entrez l'adresse du site web ou l'email ou lieu ">
									</div> 
								</div>

								
								<div class="row"> 
									
									<div class="form-group col-md-6">
                                                <label class="font-weight-semibold" for="description">Description :</label>
                                                
                                                <textarea name="description" id="description" class="form-control" placeholder="Decrire le job..."
                                                  rows="6"></textarea>
                                                   <div class="invalid-feedback" id="err_answer"></div>
									</div>
									
								</div>
								

								
								
								<div class="row"> 
									
									
									{{--<div class="form-group col-md-6">
										<label for="pays"> Status </label>
										<select name="status" class="form-control">
												<option value="" disabled selected>-- Choississez --</option>
												<option value=0>Inactive</option>
												<option value=1>Active</option>
										</select>
									</div>--}}
								</div>
								
								
								
							    <button id="btn-addEmploi" type="submit" class="btn btn-success" style="background-color:#629aa9;"><i class="fa fa-plus"></i> Ajouter</button> 
							</form> 
						</div>
					</div>
			</div>
	</div>
@stop