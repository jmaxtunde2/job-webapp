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
				<h2 class="title1" style="margin-left:30px;">Chercher un Candidat </h2>
					

						 <form  method="POST"  action="{{route('candidat.profil')}}">
							@csrf
						  <div class="form-group col-md-6">
										<label for="field">Saississez le profil </label>
									<input required  name="field" type="text" class="form-control " id="field" placeholder="Ex: Comptable">
										<div class="invalid-feedback" id="err_names"></div>
							</div>
							<br/>
							<div class="form-group">
								<div class="col-sm-6">
									<button id="btn-find" type="submit" class="btn btn-success" style="background-color:#629aa9;"><i class="fa fa-search"></i> Rechercher </button>
								</div>
							</div>

						 </form>
						</div>
			</div></div>
@stop