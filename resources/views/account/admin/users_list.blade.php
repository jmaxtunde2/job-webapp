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
						
						<div class="panel-body widget-shadow">
						<h4>{{ $data["title"] }}</h4>
						<div class="input-group-btn">              
							<a href="{{route(''.$data["user_type"].'.finduser')}}" class="btn btn-success pull-right " style="margin-left:7px; background-color: #F2B33F;"><i class="fa fa-search"> Rechercher</i></a>
							<a href="{{route(''.$data["user_type"].'.user_create')}}" class="btn btn-success pull-right " style="margin-left:7px;background-color: #F2B33F;"><i class="fa fa-plus"> Utilisateurs</i></a>
                        </div>
						<table class="table">
							<thead>
								<tr>
									<th class="text-success">PHOTOS</th>
									<th class="text-success">NOMS</th>
                                    <th class="text-success">PHONE</th>
                                    <th class="text-success">CREATED</th>
                                    <th class="text-success">ROLE</th>
									<th class="text-success">STATUS</th>
                                    <th></th>
								</tr>
							</thead>
							<tbody>
							@forelse($users as $user)
								<tr>
									<td class="w-10"> <img src="{{URL::asset('dashboards/images/users/'.$user->photo)}}" style="width:40px;height:auto;" alt=""></td>
								    <td> {{$user->names}}</td>
								    <td> {{$user->phone}}</td>
									<td>{{$user->created_at ? $user->created_at->diffForHumans()  : '-' }} </td>
									<td><span class="r-3 badge " style="background-color:#FF5733;">{{ucwords(getLevel($user->level))}}</span></td>
									<td>
									 @if($user->status == 0)            
										<span class="label label-danger">Inactive</span>
                                        @endif

                                        @if($user->status == 1)            
										<span class="label label-success">Active</span>
                                        @endif
									</td>
								    <td>
                                        <a style="color:#629aa9;" href="{{route(''.$data["user_type"].'.user_edit', ['id' => $user->id])}}"><i class="fa fa-pencil"></i></a>
                                        <a class="confirmation"  style="color:red;" href="{{route(''.$data["user_type"].'.user_delete', ['id' => $user->id])}}"><i class="fa fa-trash"></i></a>
                                   </td>
								</tr>
							@empty
                                    <tr>
                                       <td colspan="9" style='color:red;text-align:center;vertical-align:middle'>Pas d'utilisateur</td>
                                    </tr>
                            @endforelse

							</tbody>
						</table>
						{!! $users->render() !!}
					</div>
					</div>
			</div>
	</div>
@stop