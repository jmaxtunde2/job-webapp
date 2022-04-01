
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
				<h2 class="title1" style="margin-left:30px;">{{ $data["title"] }}</h2>
					<div class="form-grids row widget-shadow" style="margin-left:30px;margin-right:20px;" data-example-id="basic-forms"> 
						
						<div class="panel-body widget-shadow">
						 <div class="row my-3">
            <div class="col-md-12">
                <div class="box-body r-0 shadow">
                    <div class="card no-b">
                        <div class="box-header white pb-0">
                            <div class="d-flex justify-content-between">
                                <div class="align-self-center">
                                    
									
									<ul class="nav nav-tabs">
									  <li class="active" ><a data-toggle="tab" href="#user-info" class="text-success">Information Personelle</a></li>
									  <li><a data-toggle="tab" href="#change-password" class="text-success">Mot de Passe</a></li>
									</ul>

                                    
                                </div>
                               
                            </div>
                        </div>
						<div class="tab-content">
						  <div id="user-info" class="tab-pane fade in active">
                              <br/><br/>
							<h3 class="box-title">Parametre de compte</h3><br/>
							<div class="box-body">

                                            <form id="editUserSetting" data-id="{{$user->id}}">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="font-weight-semibold" for="userName">Noms :</label>
                                                        <input type="text" class="form-control" id="names" name="names" placeholder="Fullname" value="{{$user->names}}">
                                                        <div class="invalid-feedback" id="err_names"></div>
                                                    </div>


                                                    <div class="form-group col-md-6">
                                                        <label class="font-weight-semibold" for="email">Email:</label>
                                                        <input readonly type="email" class="form-control" id="email" placeholder="email" value="{{$user->email}}">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="font-weight-semibold" for="phoneNumber">Telehone:</label>
                                                        <input type="text" class="form-control" id="phone" id="phone"  value="{{$user->phone}}">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label class="font-weight-semibold" for="join">Membre depuis :</label>
                                                        <input readonly type="text" class="form-control" id="join" value="{{$user->created_at}}">
                                                    </div>

                                                </div>
                                                
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="font-weight-semibold" for="phoneNumber">Adresse:</label>
                                                        <input type="text" class="form-control" name="address" id="address"  value="{{$user->address}}">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label class="font-weight-semibold" for="join">Description :</label>
                                                        <textarea required name="description" id="editoro" class="form-control" placeholder="Decrire votre entreprise..."
                                                  rows="6"></textarea>
                                             </div>
                                             
                                                </div>
                                                <div class="form-group col-md-6">
											<label class="font-weight-semibold" for="image">Image :</label>
											<input type="file" class="form-control-file" name="photo" id="photo" aria-describedby="fileHelp">
											<small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>

											
											</input>
											<div class="invalid-feedback" id="err_product_image"></div>
										</div>  


                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <button id="btn-editUserSettting" type="submit" class="btn btn-success"><i class="anticon anticon-edit"></i> Modifier </button>
                                                    </div>
                                                </div>


                                            </form>
                                        </div>
						  </div>
						  <div id="change-password" class="tab-pane fade">
                          <br/><br/>
							<h3 class="box-title">Change Password</h3> <br/>
							<div class="box-body">

                                            <form id="editUserPassword" data-id="{{$user->id}}">

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="font-weight-semibold" for="old_pass">Mot de Passe Actuel :</label>
                                                        <input type="password" class="form-control" id="password" name="password" placeholder="Current Password">
                                                        <div class="invalid-feedback" id="err_password"></div>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="font-weight-semibold" for="old_pass">Nouveau Mot de Passe :</label>
                                                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password">
                                                        <div class="invalid-feedback" id="err_new_password"></div>
                                                    </div>
                                                </div>


                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="font-weight-semibold" for="old_pass">Ancien Mot de Passe :</label>
                                                        <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" placeholder="Confirm New Password">
                                                        <div class="invalid-feedback" id="err_new_password_confirmation"></div>
                                                    </div>
                                                </div>





                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <button id="btn-editUserPassword" type="submit" class="btn btn-success"><i class="anticon anticon-edit"></i> Modifier </button>
                                                    </div>
                                                </div>


                                            </form>

                                        </div>
						  </div>						  
						</div>
						
                       
                    </div>
                </div>
            </div>
        </div>

						
					</div>
					</div>
			</div>
	</div>
@stop