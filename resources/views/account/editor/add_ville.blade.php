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
				<h2 class="title1" style="margin-left:30px;">Gestion des Villes </h2>
					<div class="form-grids row widget-shadow" style="margin-left:30px;margin-right:20px;" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>{{ $data["title"] }}</h4>
							<div class="input-group-btn">              
								<a href="{{route(''.$data["user_type"].'.findville')}}" class="btn btn-success pull-right " style="margin-left:7px;background-color: #F2B33F;"><i class="fa fa-search"> Rechercher</i></a>
								<a href="{{route(''.$data["user_type"].'.ville_index')}}" class="btn btn-success pull-right " style="margin-left:7px;background-color: #F2B33F;"><i class="fa fa-list"> Liste des Villes</i></a>
                        	</div>
						</div>
						<div class="form-body">
							<form method="POST" id="addVilleForm"> 
								<div class="row"> 
									<div class="form-group col-md-6"> 
										<label for="name">Nom</label><br/>
										<input type="text" class="form-control" name="name" id="name" required placeholder="Nom de la ville">
									</div> 
								</div>
								<div class="row"> 
									<div class="form-group col-md-6">
										<label for="pays"> Pays</label>
										<select name="pays_id" class="form-control">
												<option value="" disabled selected>-- Choississez --</option>
												@foreach($pays as $p)
													<option value="{{$p->id}}">{{$p->name}}</option>
												@endforeach
										</select>
									</div>
								</div>
								
							    <button id="btn-addVille" type="submit" class="btn btn-success" style="background-color:#629aa9;"><i class="fa fa-plus"></i> Ajouter</button> 
							</form> 
						</div>
					</div>
			</div>
	</div>
@stop