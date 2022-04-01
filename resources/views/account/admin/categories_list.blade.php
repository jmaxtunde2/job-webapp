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
				<h2 class="title1" style="margin-left:30px;">Gestion des Catégories </h2>
					<div class="form-grids row widget-shadow" style="margin-left:30px;margin-right:20px;" data-example-id="basic-forms"> 
						
						<div class="panel-body widget-shadow">
						<h4>{{ $data["title"] }}</h4>
						<div class="input-group-btn">              
							<a href="{{route(''.$data["user_type"].'.findcategory')}}" class="btn btn-success pull-right " style="margin-left:7px; background-color: #F2B33F;"><i class="fa fa-search"> Rechercher</i></a>
							<a href="{{route(''.$data["user_type"].'.category_create')}}" class="btn btn-success pull-right " style="margin-left:7px;background-color: #F2B33F;"><i class="fa fa-plus"> Categorie</i></a>
                        </div>
						<table class="table">
							<thead>
								<tr>
								  <th>#</th>
								  <th>Nom</th>
								  <th>Ajouté Par</th>
								  <th></th>
								</tr>
							</thead>
							<tbody>
							@forelse($categories as $category)
								<tr>
								  <th scope="row">#{{ $category->id}}</th>
								  <td> {{$category->name}}</td>
								  <td> {{$category->user->names}}</td>
								  <td>
                                        <a style="color:#629aa9;" href="{{route(''.$data["user_type"].'.category_edit', ['id' => $category->id])}}"><i class="fa fa-pencil"></i></a>
                                        <a class="confirmation"  style="color:red;" href="{{route(''.$data["user_type"].'.category_delete', ['id' => $category->id])}}"><i class="fa fa-trash"></i></a>
                                   </td>
								</tr>
							@empty
                                    <tr>
                                       <td colspan="9" style='color:red;text-align:center;vertical-align:middle'>Pas de Categorie</td>
                                    </tr>
                            @endforelse

							</tbody>
						</table>
						{!! $categories->render() !!}
					</div>
					</div>
			</div>
	</div>
@stop