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
				<h2 class="title1" style="margin-left:30px;">Gestion des Publicités </h2>
					<div class="form-grids row widget-shadow" style="margin-left:30px;margin-right:20px;" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>{{ $data["title"] }}</h4>
							<div class="input-group-btn">              
								<a href="{{route(''.$data["user_type"].'.findpublicite')}}" class="btn btn-success pull-right " style="margin-left:7px;background-color: #F2B33F;"><i class="fa fa-search"> Rechercher</i></a>
								<a href="{{route(''.$data["user_type"].'.publicite_index')}}" class="btn btn-success pull-right " style="margin-left:7px;background-color: #F2B33F;"><i class="fa fa-list"> Liste des Publicités</i></a>
                        	</div>
						</div>
						<div class="form-body">
                        <form id="editPublicite" data-id="{{$publicite->id}}"> 
								<div class="row"> 
									<div class="form-group col-md-6"> 
										<label for="name">Titre</label><br/>
										<input type="text" class="form-control" name="title" id="title" required placeholder="Titre de la Publicité" value="{{$publicite->title}}">
									</div> 
									<div class="form-group col-md-6"> 
										<label for="name">Lien</label><br/>
										<input type="text" class="form-control" name="lien" id="lien"  value="{{$publicite->url}}" required placeholder="Indiquez le lien de votre Publicité">
									</div> 
								</div>

								<div class="row"> 
								    <div class="form-group col-md-6"> 
										<label for="company_name">Activate Date</label><br/>
										<input type="date" class="form-control" name="activate_date" id="activate_date" value="{{$publicite->activate_date}}" required placeholder="Activate date">
									</div> 
									<div class="form-group col-md-6"> 
										<label for="company_name">Date de Fin</label><br/>
										<input type="date" class="form-control" name="end_date" id="end_date" value="{{$publicite->end_date}}" required placeholder="Date de Fin">
									</div> 
									
								</div>

								
								<div class="row"> 
                                    {{--<div class="form-group col-md-6">
										<label for="pays"> Status </label>
										<select name="status" class="form-control">
												<option value="" disabled selected>-- Choississez --</option>
												<option value=0 @if($publicite->status == 0) selected @endif>Inactive</option>
												<option value=1 @if($publicite->status == 1) selected @endif>Active</option>
										</select>
									</div>--}}

									<div class="form-group col-md-6">
											<label class="font-weight-semibold" for="image">Image :</label>
											<input type="file" class="form-control-file" name="image" id="image" aria-describedby="fileHelp">
											<small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
											<div style="width: 50%">
												<img src="{{URL::asset('/dashboards/images/publicites/'.$publicite->image)}}" style="display:block; width:100%; height:auto;" width="83px" height="83px" class="img-responsive" />
											</div>
											
											</input>
											<div class="invalid-feedback" id="err_product_image"></div>
										</div>  
								</div>
							    <button id="btn-editPublicite" type="submit" class="btn btn-success" style="background-color:#629aa9;"><i class="fa fa-plus"></i> Ajouter</button> 
							</form> 
						</div>
					</div>
			</div>
	</div>
@stop