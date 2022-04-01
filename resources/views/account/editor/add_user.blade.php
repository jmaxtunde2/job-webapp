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
							<form method="POST" id="addUserForm">
								  <div class="box-body">
								  <div class="form-row">
								   <div class="form-group col-md-6">
											<label for="names">Nom </label>
											<input required name="names" type="text" class="form-control" id="name" placeholder="Nom complet">
											<div class="invalid-feedback" id="err_names"></div>
									</div>
									<div class="form-group col-md-6">
											<label for="status">Status</label>
											<select name="status" class="form-control">
													<option value="" disabled selected>-- Choississez --</option>
													<option value="1">Active</option>
													<option value="0">Inactive</option>
											</select>
									</div>  
									</div>

									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="email">Email</label>
											<input required name="email" type="email" class="form-control" id="email"  placeholder="L'adresse Email">
											<div class="invalid-feedback" id="err_email"></div>
										</div>
										<div class="form-group col-md-6">
											<label for="phone">Numero Telephone</label>
											<input required name="phone" type="number" class="form-control" id="phone"  placeholder="Numero de Telephone">
											<div class="invalid-feedback" id="err_phone"></div>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="password">Mot de Passe</label>
											<input required name="password" type="password" class="form-control" id="password"  placeholder="Le mot de passe">
											<div class="invalid-feedback" id="err_password"></div>
										</div>
										
										<div class="form-group col-md-6">
											<label for="confirm_password">Confirmer le mot de passe</label>
											<input required name="confirm_password" type="password"  class="form-control" id="confirm_password" placeholder="Confirmer Le mot de passe">
											<div class="invalid-feedback" id="err_confirm_password"></div>
										</div>
									</div>    
									
									<div class="form-row">
										
										
										<div class="form-group col-md-6">
											<label for="return_percent">User Type</label>
											<select name="level" class="form-control">
													<option value="" disabled selected>-- Choississez --</option>
													<option value="6034">Recruteur</option>
											</select>
										</div> 
										 

										<div class="form-group col-md-6">
											<label class="font-weight-semibold" for="product_image">Logo :</label>
											<input type="file" class="form-control-file" name="photo" id="photo" aria-describedby="fileHelp">
											<small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>

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