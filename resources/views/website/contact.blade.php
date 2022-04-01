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
                                <h2>Contactez-Nous</h2>
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
                    <div class="col-12">
                        <h2 class="contact-title">Nous Contacter</h2>
                    </div>
                    <div class="col-lg-8">
                        <form class="form-contact contact_form" action="" method="" id="contactForm" novalidate="novalidate">
                            <div class="row">
                            <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" required name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Le sujet ...'" placeholder="Le sujet ...">
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" required name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre nom'" placeholder="Votre nom">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" required name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre email'" placeholder="Votre email">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" required name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre Message'" placeholder=" Votre Message"></textarea>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm boxed-btn">Envoyer</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>Gbira, Parakou.</h3>
                                <p>Benin, Afrique de l'ouest</p>
                            </div>
                        </div>
                        {{--<div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3>+1 253 565 2365</h3>
                                <p>Lundi au Vendredi de 9h - 17h</p>
                            </div>
                        </div>--}}
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3><a href="mailto:info@perfectjob.com">info@perfectjob.com</a></h3><br/>
                                <p>Nous envoyer vos suggestions ou plaintes</p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- ================ contact section end ================= -->
@stop