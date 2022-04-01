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
				<h2 class="title1" style="margin-left:30px;">Gestion des Pays </h2>
					<div class="form-grids row widget-shadow" style="margin-left:30px;margin-right:20px;" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>{{ $data["title"] }}</h4>
							<div class="input-group-btn">              
								<a href="{{route(''.$data["user_type"].'.findpays')}}" class="btn btn-success pull-right " style="margin-left:7px;background-color: #F2B33F;"><i class="fa fa-search"> Rechercher</i></a>
								<a href="{{route(''.$data["user_type"].'.pays_index')}}" class="btn btn-success pull-right " style="margin-left:7px;background-color: #F2B33F;"><i class="fa fa-list"> Liste des Pays</i></a>
                        	</div>
						</div>
						<div class="form-body">
							<form method="POST" id="addPaysForm"> 
								<div class="row"> 
									<div class="form-group col-md-6"> 
										<label for="name">Nom</label><br/>
										<input type="text" class="form-control" name="name" id="name" required placeholder="Nom du pays">
									</div> 
								</div>
								
							    <button id="btn-addPays" type="submit" class="btn btn-success" style="background-color:#629aa9;"><i class="fa fa-plus"></i> Ajouter</button> 
							</form> 
						</div>
					</div>
			</div>
	</div>
@stop