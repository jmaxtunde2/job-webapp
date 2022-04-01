<?php

/**
 * Author: Perfect Tech Lab
 * Date: 2020/02/05
 * Time: 10:51PM
 * File Name: add_category.blade.php
 */

?>
@extends('website.layout')

@section('content')
<!-- Hero Area Start-->
<div class="slider-area " style="background-size: cover;background-image: url('frontend/img/hero/about.jpg');">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>DERNIERS PROFILS SUR LA CVTHÈQUE</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Job List Area Start -->
<section class="contact-section">
            <div class="container">
                
    
                <div class="row">
                <table class="table ">
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
                                        <a style="color:#629aa9;" href="{{route('register')}}" ><i class="fa fa-eye"> Voir CV</i></a>
                                  </td>
							</tr>
							@endforeach	
					</table>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="browse-btn2 text-center mt-50">
                           <a href="{{route('register')}}" class="border-btn2">Voir tous les candidats</a>
                        </div>
                        <center>
                        <a href="{{route('register-candidat')}}" class="btn head-btn" >CANDIDAT: DÉPOSEZ VOTRE CV</a>
                        <br/></center>
                    </div>
                    
            </div>
        </section>
    <!-- ================ contact section end ================= -->
@stop