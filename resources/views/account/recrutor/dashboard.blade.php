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
				<h2 class="title1" style="margin-left:30px;">Tableau de Bord </h2>
					<div class="col_3" style="margin-left:30px;margin-right:20px;">
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-dollar icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>{{$publicites->count()}}</strong></h5>
                      <span>Publicités</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-laptop user1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>{{$emplois->count()}}</strong></h5>
                      <span>Emplois Publiés </span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-money user2 icon-rounded"></i>
                    <div class="stats">
                      <p>Emploi</p>
                      <span> <span><a href="{{route(''.$data["user_type"].'.emploi_create')}}"> Ajouter </a></span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-pie-chart dollar1 icon-rounded"></i>
                    <div class="stats">
                      <p>Publicité</p>
                      <span><a href="{{route(''.$data["user_type"].'.publicite_create')}}"> Créer </a></span>
                    </div>
                </div>
        	 </div>
        	<div class="col-md-3 widget">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-users dollar2 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>0</strong></h5>
                      <span>Formations</span>
                    </div>
                </div>
        	 </div>
        	<div class="clearfix"> </div>
		</div>
		<br/>
		<div class="charts" style="margin-left:30px;margin-right:20px;">		
			<div class="mid-content-top charts-grids">
				<div class="middle-content">
						<h4 class="title">Publicités</h4>
						<small>Donnez plus de visibilité à votre entreprise. <a href="mailto:info-job@azerke.com">En Savoir Plus</a></small>
					<!-- start content_slider -->
					<div id="owl-demo" class="owl-carousel text-center">
                    <div class="item">
							<a href="https://accounts.binance.me/en/register?ref=102869569"><img class="lazyOwl img-responsive" data-src="{{URL::asset('dashboards/images/slider1.jpg' )}}" alt="name"></a>
						</div>
                        <div class="item">
							<img class="lazyOwl img-responsive" data-src="{{URL::asset('dashboards/images/slider2.jpg' )}}" alt="name">
						</div>
                        <div class="item">
							<img class="lazyOwl img-responsive" data-src="{{URL::asset('dashboards/images/slider3.jpg' )}}" alt="name">
						</div>

                        <div class="item">
							<img class="lazyOwl img-responsive" data-src="{{URL::asset('dashboards/images/slider4.jpg' )}}" alt="name">
						</div>
                        {{--<div class="item">
							<img class="lazyOwl img-responsive" data-src="{{URL::asset('dashboards/images/slider5.jpg' )}}" alt="name">
						</div>
                        <div class="item">
							<img class="lazyOwl img-responsive" data-src="{{URL::asset('dashboards/images/slider6.jpg' )}}" alt="name">
						</div>
                        <div class="item">
							<img class="lazyOwl img-responsive" data-src="{{URL::asset('dashboards/images/slider7.jpg' )}}" alt="name">
						</div>--}}
						
					</div>
				</div>
					
					<!--//sreen-gallery-cursual---->
			</div>
		</div>

		<div class="container">
			<h3> Profils de Candidats </h3>
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
                                        <a style="color:#629aa9;" href="{{route('candidat.cv', ['id' => $comp->candidat_id])}}"><i class="fa fa-eye"></i></a>
                                  </td>
							</tr>
							@endforeach	
					</table>
					{!! $candidat->render() !!}<br/><br/>
				</div>

			</div>
	</div>
@stop