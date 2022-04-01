<?php

/**
 * Author: Perfect Tech Lab
 * Date: 2020/02/05
 * Time: 10:51PM
 * File Name: add_category.blade.php
 */

?>
@extends('website.layout_other')

@section('content')
<!-- Hero Area Start-->
<div class="slider-area " style="background-size: cover;background-image: url('frontend/img/hero/about.jpg');">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Qui Sommes-Nous</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Job List Area Start -->
<!-- Support Company Start-->
        <div class="support-company-area fix section-padding2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="right-caption">
                            <!-- Section Tittle -->
                            <div class="section-tittle section-tittle2">
                                <span>Mot d'accueil</span>
                            </div>
                            <div class="support-caption">
                                <p class="pera-top justify-content">{!! $setting->introduction !!}</p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="support-location-img">
                            <img src="{{URL::asset('frontend/img/hero/about-us.jpg')}}" alt="">
                           
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12">
                    <div class="support-caption">
                               <p class=" justify-content">{!! $setting->principle !!}</p>
                                  </div>
                </div>
                <div class="col-xl-12 col-lg-12">
                    <div class="support-caption">
                               <p class=" justify-content">{!! $setting->conclusion !!}</p>
                                <a href="{{route('login')}}" class="btn post-btn">Publier Un Emploi</a>
                            </div>
                </div>
            
            </div>
            </div>
        </div>
        <!-- Support Company End-->


		
@stop