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
						
						<div class="panel-body widget-shadow">
						<h4>{{ $data["title"] }}</h4>
						<div class="input-group-btn">              
							<a href="{{route(''.$data["user_type"].'.findpublicite')}}" class="btn btn-success pull-right " style="margin-left:7px; background-color: #F2B33F;"><i class="fa fa-search"> Rechercher</i></a>
							<a href="{{route(''.$data["user_type"].'.publicite_create')}}" class="btn btn-success pull-right " style="margin-left:7px;background-color: #F2B33F;"><i class="fa fa-plus"> Publicité</i></a>
                        </div>
						<table class="table">
							<thead>
								<tr>
								  <th>#</th>
								  <th>Titre</th>
								  <th>url</th>
								  <th>Activation Date</th>
								  <th>End Date</th>
								  <th>Status</th>
								  <th></th>
								</tr>
							</thead>
							<tbody>
							@forelse($publicites as $publicite)
								<tr>
								  <th scope="row">{{ $publicite->title}}</th>
								  <td> {{ $publicite->title}}</td>
								  <td> {{ $publicite->url}}</td>
								  <td> {{ $publicite->activate_date}}</td>
								  <td> {{ $publicite->end_date}}</td>
								  <td>
									 @if($publicite->status == 0)            
										<span class="label label-danger">Inactive</span>
                                        @endif

                                        @if($publicite->status == 1)            
										<span class="label label-success">Active</span>
                                        @endif
									</td>
								  <td>
                                        <a style="color:#629aa9;" href="{{route(''.$data["user_type"].'.publicite_edit', ['id' => $publicite->id])}}"><i class="fa fa-pencil"></i></a>
                                        <a class="confirmation"  style="color:red;" href="{{route(''.$data["user_type"].'.publicite_delete', ['id' => $publicite->id])}}"><i class="fa fa-trash"></i></a>
                                   </td>
								</tr>
							@empty
                                    <tr>
                                       <td colspan="9" style='color:red;text-align:center;vertical-align:middle'>Pas de Publicité</td>
                                    </tr>
                            @endforelse

							</tbody>
						</table>
						{!! $publicites->render() !!}
					</div>
					</div>
			</div>
	</div>
@stop