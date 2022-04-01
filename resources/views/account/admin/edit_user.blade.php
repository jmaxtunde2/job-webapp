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
				<h2 class="title1" style="margin-left:30px;">Gestion des Utilisateurs </h2>
					<div class="form-grids row widget-shadow" style="margin-left:30px;margin-right:20px;" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>{{ $data["title"] }}</h4>
							<div class="input-group-btn">              
								<a href="{{route(''.$data["user_type"].'.finduser')}}" class="btn btn-success pull-right " style="margin-left:7px;background-color: #F2B33F;"><i class="fa fa-search"> Rechercher</i></a>
								<a href="{{route(''.$data["user_type"].'.users_index')}}" class="btn btn-success pull-right " style="margin-left:7px;background-color: #F2B33F;"><i class="fa fa-list"> Liste Utilisateurs</i></a>
                        	</div>
						</div>
						<div class="form-body">
                        <form id="editUser" data-id="{{$userSelected->id}}"> 
								  <div class="box-body">
								  <div class="form-row">
								   <div class="form-group col-md-6">
											<label for="names">Nom </label>

											<input required name="names" type="text" class="form-control" id="name"  value="{{$userSelected->names}}" placeholder="Nom complet">
											<div class="invalid-feedback" id="err_names"></div>
									</div>
									<div class="form-group col-md-6">
										<label for="pays"> Status </label>
										<select name="status" class="form-control">
												<option value="" disabled selected>-- Choississez --</option>
												<option value=0 @if($userSelected->status == 0) selected @endif>Inactive</option>
												<option value=1 @if($userSelected->status == 1) selected @endif>Active</option>
										</select>
									</div>
									</div>

									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="email">Email</label>
											<input required name="email" type="email" class="form-control" id="email"  value="{{$userSelected->email}}" placeholder="L'adresse Email">
											<div class="invalid-feedback" id="err_email"></div>
										</div>
										<div class="form-group col-md-6">
											<label for="phone">Numero Telephone</label>
											<input required name="phone" type="number" class="form-control" id="phone"  value="{{$userSelected->phone}}" placeholder="Numero de Telephone">
											<div class="invalid-feedback" id="err_phone"></div>
										</div>
									</div>  
									
									<div class="form-row">
										
                                        <div class="form-group col-md-6">
											<label for="return_percent">User Type</label>
											<select name="level" class="form-control">
													<option value="" disabled selected>-- Choississez --</option>
													<option value="6035" @if($userSelected->level == 6035) selected @endif>Editeur</option>
													<option value="6034" @if($userSelected->level == 6034) selected @endif>Recruteur</option>
													<option value="6031" @if($userSelected->level == 6031) selected @endif>Utilisateurs </option>
											</select>
										</div> 
										 

										<div class="form-group col-md-6">
											<label class="font-weight-semibold" for="product_image">Logo :</label>
											<input type="file" class="form-control-file" name="photo" id="photo" aria-describedby="fileHelp">
											<small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>

											<div style="width: 50%">
												<img src="{{URL::asset('/dashboards/images/users/'.$user->photo)}}" style="display:block; width:100%; height:auto;" width="83px" height="83px" class="img-responsive" />
											</div>
											</input>
											<div class="invalid-feedback" id="err_product_image"></div>
										</div>            
									</div>

									<div class="form-row">
														<div class="col-sm-6">
															<button id="btn-addUser" type="submit" class="btn btn-success" style="background-color:#629aa9;"><i class="fa fa-plus"></i> Ajouter </button>
														</div>
													</div>

								 </form>
						</div>
					</div>
			</div>
	</div>
@stop