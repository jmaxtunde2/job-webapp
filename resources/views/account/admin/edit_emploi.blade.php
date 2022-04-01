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
								<a href="{{route(''.$data["user_type"].'.findemploi')}}" class="btn btn-success pull-right " style="margin-left:7px;background-color: #F2B33F;"><i class="fa fa-search"> Rechercher</i></a>
								<a href="{{route(''.$data["user_type"].'.emploi_index')}}" class="btn btn-success pull-right " style="margin-left:7px;background-color: #F2B33F;"><i class="fa fa-list"> Liste des Emplois</i></a>
                        	</div>
						</div>
						<div class="form-body">
						<form id="editEmploi" data-id="{{$job->id}}"> 
								<div class="row"> 
									<div class="form-group col-md-6"> 
										<label for="name">Titre</label><br/>
										<input type="text" class="form-control" name="title" id="title" required placeholder="Titre de l'emploi" value="{{$job->title}}">
									</div> 
									<div class="form-group col-md-6"> 
										<label for="name">Lieu</label><br/>
										<input type="text" class="form-control" name="location" id="location" required placeholder="Indiquez le lieu" value="{{$job->location}}">
									</div>
								</div>

								
								<div class="row"> 
									<div class="form-group col-md-6"> 
										<label for="company_name">Nom du Recruteur</label><br/>
										<input type="text" class="form-control" name="company_name" id="company_name"  placeholder="Le nom de l'entreprise" value="{{$job->company_name}}">
									</div> 
									<div class="form-group col-md-6"> 
										<label for="name">Niveau</label><br/>
										<select name="qualification" class="form-control">
												<option value="" disabled selected>-- Choississez --</option>
												<option value="PhD" @if($job->qualification == "Doctorat") selected @endif>Doctorat</option>
												<option value="Master" @if($job->qualification == "BAC+5/Master") selected @endif >BAC+5/Master</option>
												<option value="BAC+4/Maitrise" @if($job->qualification == "BAC+4/Maitrise") selected @endif>BAC+4/Maitrise</option>
												<option value="BAC+3/Licence" @if($job->qualification == "BAC+3/Licence") selected @endif>BAC+3/Licence</option>
												<option value="BTS" @if($job->qualification == "BAC+2/BTS") selected @endif>BAC+2/BTS</option>
												<option value="BAC" @if($job->qualification == "BAC") selected @endif>BAC</option>
												<option value="BEPC" @if($job->qualification == "BEPC") selected @endif>BEPC</option>
												<option value="DEAT" @if($job->qualification == "DEAT") selected @endif>DEAT</option>
												<option value="CAP" @if($job->qualification == "CAP") selected @endif>CAP</option>
												<option value="CEP" @if($job->qualification == "CEP") selected @endif>CEP</option>
												<option value="Non Défini" @if($job->qualification == "Non Défini") selected @endif>Non Défini</option>
												
												
										</select>
									</div> 
								</div>

								
								<div class="row"> 
									<div class="form-group col-md-6">
										<label for="categorie"> Categorie</label>
										<select name="category_id" class="form-control">
												<option value="" disabled selected>-- Choississez --</option>
												@foreach($categories as $p)
													<option value="{{$p->id}}" @if($job->category_id == $p->id) selected @endif>{{$p->name}}</option>
												@endforeach
										</select>
									</div>
									<div class="form-group col-md-6">
										<label for="type_id"> Type</label>
										<select name="type_id" class="form-control">
												<option value="" disabled selected>-- Choississez --</option>
												@foreach($types as $p)
													<option value="{{$p->id}}" @if($job->type_id == $p->id) selected @endif>{{$p->name}}</option>
												@endforeach
										</select>
									</div>
								</div>

								

								
								<div class="form-row">
                                    <div class="form-group col-md-6">
                                                <label class="font-weight-semibold" for="description">Description :</label>
                                                
                                                <textarea  name="description" id="description" class=" form-control editor"  placeholder="Decrire le job..."
                                                  rows="15">{{$job->description}}</textarea>
                                                   <div class="invalid-feedback" id="err_answer"></div>
									</div>
									<div class="form-group col-md-6">
										<label for="pays"> Status </label>
										<select name="status" class="form-control">
												<option value="" disabled selected>-- Choississez --</option>
												<option value=0 @if($job->status == 0) selected @endif>Inactive</option>
												<option value=1 @if($job->status == 1) selected @endif>Active</option>
										</select>
									</div>
								</div>
								
								<div class="form-row">
                                    <div class="form-group col-md-6">
                                                <label class="font-weight-semibold" for="required_knowledge">Compétence Réquise :</label>
                                                
                                                <textarea  name="required_knowledge" id="required_knowledge" class=" form-control editor" placeholder="Decrire les Competences Requises..."
                                                  rows="15">{{$job->required_knowledge}}</textarea>
                                                   <div class="invalid-feedback" id="err_answer"></div>
									</div>
									<div class="form-group col-md-6">
                                                <label class="font-weight-semibold" for="education_experience">Education et Expérience Réquises :</label>
                                                
                                                <textarea  name="education_experience" id="education_experience" class=" form-control editor" placeholder="Decrire les Competences Requises..."
                                                  rows="15">{{$job->education_experience}}</textarea>
                                                   <div class="invalid-feedback" id="err_answer"></div>
                                    </div>
								</div>
								
																
								<div class="row"> 
									<div class="form-group col-md-6">
										<label for="pays"> Media pour Postuler</label>
										<select name="type_application" class="form-control">
												<option value="" disabled selected>-- Choississez --</option>
												<option value="email" @if($job->type_application == "email") selected @endif>Par notre email</option>
												<option value="web" @if($job->type_application == "web") selected @endif>Par notre site web</option>
										</select>
									</div>
									<div class="form-group col-md-6"> 
										<label for="name">Le lien pour postuler</label><br/>
										<input type="text" class="form-control" name="apply_link" id="apply_link" value="{{$job->apply_link}}" required placeholder="Entrez l'adresse du site web ou l'email">
									</div> 
								</div>

								
								<div class="row"> 
									<div class="form-group col-md-6"> 
										<label for="name">La date de cloture</label><br/>
										<input type="date" class="form-control" name="end_date" id="end_date" placeholder="La date de cloture" value="{{$job->end_date}}">
									</div> 
									<div class="form-group col-md-6">
										<label for="pays"> Type </label>
										<select name="level" class="form-control">
												<option value="" disabled selected>-- Choississez --</option>
												<option value="Standard" @if($job->level == "Standard") selected @endif>Standard</option>
												<option value="VIP" @if($job->level == "VIP") selected @endif>VIP</option>
										</select>
									</div>
								</div>
							
								
							    <button id="btn-editEmploi" type="submit" class="btn btn-success" style="background-color:#629aa9;"><i class="fa fa-plus"></i> Ajouter</button> 
							</form> 
						</div>
					</div>
			</div>
	</div>
@stop