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
			<div class="row" style="margin-left:30px;margin-right:20px;">
    <div class="btn-group">

        <a @if($data['duration'] == "all") style="background: #008000; color: #fff;border: 1px solid #008000; box-shadow: none;" @endif href="{{route(''.$data["user_type"].'.emploi_index', ['duration'=>"all"])}}" class="btn btn-default  active ">
            <span>All @if($data['duration'] == "all") ({{$data['count']}}) @endif</span>
        </a>

        <a @if($data['duration'] == "daily") style="background: #008000; color: #fff;border: 1px solid #008000; box-shadow: none;" @endif href="{{route(''.$data["user_type"].'.emploi_index', ['duration'=>"daily"])}}" class="btn btn-default ">
            <span>Daily @if($data['duration'] == "daily") ({{$data['count']}}) @endif</span>
        </a>

        <a @if($data['duration'] == "weekly") style="background: #008000; color: #fff;border: 1px solid #008000; box-shadow: none;" @endif href="{{route(''.$data["user_type"].'.emploi_index', ['duration'=>"weekly"])}}" class="btn btn-default ">
            <span>Weekly @if($data['duration'] == "weekly") ({{$data['count']}}) @endif</span>
        </a>
        <a @if($data['duration'] == "monthly") style="background: #008000; color: #fff;border: 1px solid #008000; box-shadow: none;" @endif href="{{route(''.$data["user_type"].'.emploi_index', ['duration'=>"monthly"])}}" class="btn btn-default ">
            <span>This Month @if($data['duration'] == "monthly") ({{$data['count']}}) @endif</span>
        </a>

        <a @if($data['duration'] == "last_month") style="background: #008000; color: #fff;border: 1px solid #008000; box-shadow: none;" @endif href="{{route(''.$data["user_type"].'.emploi_index', ['duration'=> "last_month"])}}" class="btn btn-default ">
            <span>Last Month @if($data['duration'] == "last_month") ({{$data['count']}}) @endif</span>
        </a>

        <a @if($data['duration'] == "yearly") style="background: #008000; color: #fff;border: 1px solid #008000; box-shadow: none;" @endif href="{{route(''.$data["user_type"].'.emploi_index', ['duration'=>"yearly"])}}" class="btn btn-default ">
            <span>Yearly @if($data['duration'] == "yearly") ({{$data['count']}}) @endif</span>
        </a>


       
    </div>
</div>
<br/>
				<h2 class="title1" style="margin-left:30px;">Gestion des Emplois </h2>
					<div class="form-grids row widget-shadow" style="margin-left:30px;margin-right:20px;" data-example-id="basic-forms"> 
						
						<div class="panel-body widget-shadow">
						<h4>{{ $data["title"] }}</h4>
						<div class="input-group-btn">              
							<a href="{{route(''.$data["user_type"].'.findemploi')}}" class="btn btn-success pull-right " style="margin-left:7px; background-color: #F2B33F;"><i class="fa fa-search"> Rechercher</i></a>
							<a href="{{route(''.$data["user_type"].'.emploi_create')}}" class="btn btn-success pull-right " style="margin-left:7px;background-color: #F2B33F;"><i class="fa fa-plus"> Emploi</i></a>
                        </div>
						<table class="table">
							<thead>
								<tr>
								  <th>#</th>
								  <th>Titre</th>
								  <th>location</th>
								  <th>Niveau</th>
								  <th>Status</th>
								</tr>
							</thead>
							<tbody>
							@forelse($emplois as $p)
								<tr>
								  <th scope="row">#{{ $p->id}}</th>
								  <td> {{$p->title}}</td>
								  <td> {{$p->location}}</td>
								  <td> {{$p->qualification}}</td>
								  <td> 
								        @if($p->status == 0)            
										<span class="label label-danger">Inactive</span>
                                        @endif

                                        @if($p->status == 1)            
										<span class="label label-success">Active</span>
                                        @endif
								  </td>
								  <td>
                                        <a style="color:#629aa9;" href="{{route(''.$data["user_type"].'.emploi_edit', ['id' => $p->id])}}"><i class="fa fa-pencil"></i></a>
                                        <a class="confirmation"  style="color:red;" href="{{route(''.$data["user_type"].'.emploi_delete', ['id' => $p->id])}}"><i class="fa fa-trash"></i></a>
                                   </td>
								</tr>
							@empty
                                    <tr>
                                       <td colspan="9" style='color:red;text-align:center;vertical-align:middle'>Pas d'emploi</td>
                                    </tr>
                            @endforelse

							</tbody>
						</table>
						{!! $emplois->render() !!}
					</div>
					</div>
			</div>
	</div>
@stop