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
			<h3> {{ $data["title"] }} </h3>
					<table class="table table-responsive mobile">
							<thead>
								<tr>
								  <th>Titre</th>
								  <th>Competence</th>
								  <th>Langue</th>
								  <th></th>
								</tr>
							</thead>
							<tbody>
							<tr>
							@foreach($candidat as $comp)	
								
								<td>{{$comp->title}}</td>
								<td>{{$comp->competence}}</td>
								<td>{{$comp->langue}}</td>
								<td>
                                        <a style="color:#629aa9;" href="{{route('candidat.cv_admin', ['id' => $comp->candidat_id])}}"><i class="fa fa-eye"></i></a>
                                  </td>
							</tr>
							@endforeach	
					</table>
					{!! $candidat->render() !!}<br/><br/>
				</div>

			</div>
	</div>
@stop