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
				<h2 class="title1" style="margin-left:30px;">Parametre du site web</h2>
					<div class="form-grids row widget-shadow" style="margin-left:30px;margin-right:20px;" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>{{ $data["title"] }}</h4>
							
						</div>
						<div class="form-body">
						<form id="editSetting"> 
								<div class="row"> 
									<div class="form-group col-md-6"> 
										<label for="name">Nom du Site Web</label><br/>
										<input type="text" class="form-control" name="website_title" id="website_title" required placeholder="Nom du Site Web" value="{{$setting->website_title}}" >
									</div> 
									<div class="form-group col-md-6"> 
										<label for="name">Adresse du Site Web</label><br/>
										<input type="text" class="form-control" name="website_url" id="website_url" required placeholder="Adresse du Site Web" value="{{$setting->website_url}}">
									</div>
								</div>

								
								<div class="row"> 
									<div class="form-group col-md-6"> 
										<label for="company_name">Lien de facebook</label><br/>
										<input type="text" class="form-control" name="facebook" id="facebook" required placeholder="Lien de facebook" value="{{$setting->facebook}}">
									</div> 
									<div class="form-group col-md-6"> 
										<label for="instagram">Lien de Instragram</label><br/>
										<input type="text" class="form-control" name="instagram" id="instagram" required placeholder="Lien de instagram" value="{{$setting->instagram}}">
									</div> 
									 
								</div>

								
								<div class="row"> 
									<div class="form-group col-md-6"> 
										<label for="linkedIn">Lien de linkedIn</label><br/>
										<input type="text" class="form-control" name="linkedIn" id="linkedIn" required placeholder="Lien de linkedIn" value="{{$setting->linkedIn}}">
									</div> 
									
									<div class="form-group col-md-6"> 
										<label for="twitter">Lien de Twitter</label><br/>
										<input type="text" class="form-control" name="twitter" id="twitter" required placeholder="Lien de twitter" value="{{$setting->twitter}}">
									</div> 
									
								</div>

								

								
								<div class="form-row">
                                    <div class="form-group col-md-6">
                                                <label class="font-weight-semibold" for="description">Vision :</label>
                                                
                                                <textarea required name="vision" id="vision" class=" form-control editor"  placeholder="Decrire la vision..."
                                                  rows="5"> {{$setting->vision}}</textarea>
                                                   <div class="invalid-feedback" id="err_answer"></div>
									</div>
									<div class="form-group col-md-6">
                                                <label class="font-weight-semibold" for="description">Mission :</label>                                                
                                                <textarea required name="mission" id="editor"  class=" form-control editor"  placeholder="Decrire la mission..."
                                                  rows="5"> {{$setting->mission}}</textarea>
                                                <div class="invalid-feedback" id="err_answer"></div>
									</div>
								</div>
								
								<div class="form-row">
                                    <div class="form-group col-md-6">
                                                <label class="font-weight-semibold" for="description">Principle :</label>                                                
                                                <textarea required name="principle" id="editor"  class=" form-control editor" placeholder="Decrire le principle..."
                                                  rows="5"> {{$setting->principle}}</textarea>
                                                <div class="invalid-feedback" id="err_answer"></div>
									</div>
									
									<div class="form-group col-md-6">
                                                <label class="font-weight-semibold" for="description">Introduction :</label>                                                
                                                <textarea required name="introduction" id="editor"  class=" form-control editor" placeholder="Decrire le introduction..."
                                                  rows="5"> {{$setting->introduction}}</textarea>
                                                <div class="invalid-feedback" id="err_answer"></div>
									</div>
								</div>
								
																
								<div class="row"> 
									<div class="form-group col-md-6">
                                                <label class="font-weight-semibold" for="description">Conclusion :</label>                                                
                                                <textarea required name="conclusion" id="editor"  class=" form-control editor" placeholder="Decrire la conclusion..."
                                                  rows="5">{{$setting->conclusion}} </textarea>
                                                <div class="invalid-feedback" id="err_answer"></div>
									</div>
									
									<div class="form-group col-md-6">
                                                <label class="font-weight-semibold" for="description">Meta Description :</label>                                                
                                                <textarea required name="meta_description" id="editor"  class=" form-control editor"  placeholder="Decrire le meta description..."
                                                  rows="5"> {{$setting->meta_description}}</textarea>
                                                <div class="invalid-feedback" id="err_answer"></div>
									</div>
								</div>

								
								<div class="row"> 
									<div class="form-group col-md-6">
                                                <label class="font-weight-semibold" for="description">Meta Tags :</label>                                                
                                                <textarea required name="meta_tags" id="editor"  class=" form-control editor"  placeholder="Decrire Le meta Tags..."
                                                  rows="5">{{$setting->meta_tags}}</textarea>
                                                <div class="invalid-feedback" id="err_answer"></div>
									</div>
									<div class="form-group col-md-6">
										<label for="pays"> Status </label>
										<select name="status" class="form-control">
												<option value="" disabled selected>-- Choississez --</option>
												<option value=0 @if($setting->status == 0) selected @endif>Inactive</option>
												<option value=1 @if($setting->status == 1) selected @endif>Active</option>
										</select>
									</div>
								</div>
								

								
								<div class="row"> 
									<div class="form-group col-md-6"> 
										<label for="address">Votre Adresse</label><br/>
										<input type="text" class="form-control" name="address" id="address" required placeholder="Adresse de l entreprise" value="{{$setting->address}}">
									</div> 
									<div class="form-group col-md-6"> 
										<label for="tel">Telephone</label><br/>
										<input type="text" class="form-control" name="tel" id="tel" required placeholder="Votre Telephone" value="{{$setting->tel}}">
									</div> 
									 
								</div>

								<div class="row"> 
									<div class="form-group col-md-6"> 
										<label for="email">Votre Email</label><br/>
										<input type="text" class="form-control" name="email" id="email" required placeholder="Email de l entreprise" value="{{$setting->email}}">
									</div> 
									<div class="form-group col-md-6"> 
										<label for="whatsApp">WhatsApp</label><br/>
										<input type="text" class="form-control" name="whatsApp" id="whatsApp" required placeholder="Votre whatsApp" value="{{$setting->whatsApp}}">
									</div> 
									 
								</div>

								<div class="row"> 
									<div class="form-group col-md-6">
                                                <label class="font-weight-semibold" for="description">Breve Description :</label>                                                
                                                <textarea required name="breve_desc" id="editor"  class=" form-control editor"  placeholder="Breve Description..."
                                                  rows="5">{{$setting->breve_desc}}</textarea>
                                                <div class="invalid-feedback" id="err_answer"></div>
									</div>
										<div class="form-group col-md-6">
											<label class="font-weight-semibold" for="product_image">Logo :</label>
											<input type="file" class="form-control-file" name="logo" id="logo" aria-describedby="fileHelp">
											<small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>

											<div style="width: 50%">
												<img src="{{URL::asset('/dashboards/images/'.$setting->logo)}}" style="display:block; width:100%; height:auto;" width="83px" height="83px" class="img-responsive" />
											</div>
											</input>
											<div class="invalid-feedback" id="err_product_image"></div>
										</div>
								</div>
							
								
							    <button id="btn-editSetting" type="submit" class="btn btn-success" style="background-color:#629aa9;"><i class="fa fa-plus"></i> Modifier</button> 
							</form> 
						</div>
					</div>
			</div>
	</div>
@stop