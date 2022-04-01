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
			
			<div class="container">
			<h3> Curriculum Vitae </h3><br/>
			{{--<small>NB: Nous mettions en relations les candidats et les recruteurs. Tous recruteur interese par le profil d'un candidat devra faire une demande</small>--}}
				<div class="row">
                                            
                                        <div class="col-md-8">
                                                <div class="card table-card">
                                                   
                                                    <div class="card-block">
                                                    <center><h3 >{{ $candidat->title }}</h3></center><br/>
                                                    <ul class="list-group">
														<li class="list-group-item"><strong>Nom et Prenom:  </strong><span>{{ $candidat->user->names }}</span></li>
                                                        <li class="list-group-item"><strong>Email: </strong><span>{{ $candidat->user->email }}</span></li>
                                                        <li class="list-group-item"><strong>Phone: </strong><span>{{ $candidat->user->phone }}</span></li>
                                                        <li class="list-group-item"><strong>Sexe: </strong><span>{{ $candidat->user->sexe }}</span></li>
                                                        
                                                        <li class="list-group-item"><strong>Github: </strong><span>{{ $candidat->github }}</span></li>
                                                        <li class="list-group-item"><strong>Langue: </strong><span>{{ $candidat->langue }}</span></li>
                                                    </ul>
                                                    <h3 >Competences</h3><br/>
                                                    <ul class="list-group">
                                                        <li class="list-group-item"><span>{{ $candidat->competence }}</span></li>                                                        
                                                    </ul>
                                                    <h3>Experiences Professionnelles</h3><br/>
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
								 
								</tr>
							@empty
                                    <tr>
                                       <td colspan="9" style='color:red;text-align:center;vertical-align:middle'>Pas de Cursus</td>
                                    </tr>
                            @endforelse

							</tbody>
						</table>

                        <h3>Cursus Scolaire</h3><br/>
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
								  
								</tr>
							@empty
                                    <tr>
                                       <td colspan="9" style='color:red;text-align:center;vertical-align:middle'>Pas de Cursus</td>
                                    </tr>
                            @endforelse

							</tbody>
							</table><br/>
							<h3>Persone à Contacter </h3><br/>
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
								  
								</tr>
							@empty
                                    <tr>
                                       <td colspan="9" style='color:red;text-align:center;vertical-align:middle'>Pas de Reference</td>
                                    </tr>
                            @endforelse

							</tbody>
						</table>
                                                    
                        
							<br/>
                                                    <a href="mailto:{{$candidat->user->email}}" class="btn btn-primary">Envoyer un email au Candidat</a> 
                                                    
						                            
                                                       
                                                   </div>
                                                </div>
                                        </div>

			</div>		</div>	
			
	
			</div></div>
	</div>
@stop