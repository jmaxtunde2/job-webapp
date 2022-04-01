<?php

/**
 * Author: Perfect Tech Lab
 * Date: 2020/02/05
 * Time: 10:51PM
 * File Name: admin.php
 */


Route::group(['prefix' => 'compte/admin', 'middleware' => ['auth', 'App\Http\Middleware\Admin']], function () {

    //For Dashboard
    Route::get('tableau-de-bord', ['uses' => 'accounts\\admin\\DashboardController@index', 'as' => 'admin.dashboard']);

    //For Category
    Route::any('categories-list/{field?}', ['uses' => 'accounts\\admin\\CategoryController@index', 'as' => 'admin.category_index']);
    Route::get('rechercher-une-categorie', ['uses' => 'accounts\\admin\\CategoryController@findCategorie', 'as' => 'admin.findcategory']);
    Route::get('ajouter-une-categorie',['uses' => 'accounts\\admin\\CategoryController@create', 'as' => 'admin.category_create']);
    Route::post('post/ajouter-une-categorie',['uses' => 'accounts\\admin\\CategoryController@store', 'as' => 'admin.category_store']);
    Route::get('editer-une-categorie/{id}', ['uses' => 'accounts\\admin\\CategoryController@edit', 'as' => 'admin.category_edit']);
    Route::post('post/editer-une-categorie/{id}', ['uses' => 'accounts\\admin\\CategoryController@update', 'as' => 'admin.category_update']);
    Route::get('supprimer-une-categorie/{id}', ['uses' => 'accounts\\admin\\CategoryController@delete', 'as' => 'admin.category_delete']);

    //For ville
    Route::any('liste-des-villes/{field?}', ['uses' => 'accounts\\admin\\VilleController@index', 'as' => 'admin.ville_index']);
    Route::get('rechercher-une-ville', ['uses' => 'accounts\\admin\\VilleController@findVille', 'as' => 'admin.findville']);
    Route::get('ajouter-une-ville',['uses' => 'accounts\\admin\\VilleController@create', 'as' => 'admin.ville_create']);
    Route::post('post/ajouter-une-ville',['uses' => 'accounts\\admin\\VilleController@store', 'as' => 'admin.ville_store']);
    Route::get('editer-une-ville/{id}', ['uses' => 'accounts\\admin\\VilleController@edit', 'as' => 'admin.ville_edit']);
    Route::post('post/editer-une-ville/{id}', ['uses' => 'accounts\\admin\\VilleController@update', 'as' => 'admin.ville_update']);
    Route::get('supprimer-une-ville/{id}', ['uses' => 'accounts\\admin\\VilleController@delete', 'as' => 'admin.ville_delete']);

    //For type
    Route::any('liste-des-types/{field?}', ['uses' => 'accounts\\admin\\TypeController@index', 'as' => 'admin.type_index']);
    Route::get('rechercher-un-type-de-job', ['uses' => 'accounts\\admin\\TypeController@findtype', 'as' => 'admin.findtype']);
    Route::get('ajouter-un-type-de-job',['uses' => 'accounts\\admin\\TypeController@create', 'as' => 'admin.type_create']);
    Route::post('post/ajouter-un-type-de-job',['uses' => 'accounts\\admin\\TypeController@store', 'as' => 'admin.type_store']);
    Route::get('editer-un-type-de-job/{id}', ['uses' => 'accounts\\admin\\TypeController@edit', 'as' => 'admin.type_edit']);
    Route::post('post/editer-un-type-de-job/{id}', ['uses' => 'accounts\\admin\\TypeController@update', 'as' => 'admin.type_update']);
    Route::get('supprimer-un-type-job/{id}', ['uses' => 'accounts\\admin\\TypeController@delete', 'as' => 'admin.type_delete']);

    //For pays
    Route::any('liste-des-pays/{field?}', ['uses' => 'accounts\\admin\\PaysController@index', 'as' => 'admin.pays_index']);
    Route::get('rechercher-un-pays', ['uses' => 'accounts\\admin\\PaysController@findpays', 'as' => 'admin.findpays']);
    Route::get('ajouter-un-pays',['uses' => 'accounts\\admin\\PaysController@create', 'as' => 'admin.pays_create']);
    Route::post('post/ajouter-un-pays',['uses' => 'accounts\\admin\\PaysController@store', 'as' => 'admin.pays_store']);
    Route::get('editer-un-pays/{id}', ['uses' => 'accounts\\admin\\PaysController@edit', 'as' => 'admin.pays_edit']);
    Route::post('post/editer-un-pays/{id}', ['uses' => 'accounts\\admin\\PaysController@update', 'as' => 'admin.pays_update']);
    Route::get('supprimer-un-pays/{id}', ['uses' => 'accounts\\admin\\PaysController@delete', 'as' => 'admin.pays_delete']);

    //For emploi
    Route::any('liste-des-emplois/{duration?}', ['uses' => 'accounts\\admin\\EmploieController@index', 'as' => 'admin.emploi_index']);
    Route::get('rechercher-un-emploi', ['uses' => 'accounts\\admin\\EmploieController@findemploi', 'as' => 'admin.findemploi']);
    Route::get('ajouter-un-emploi',['uses' => 'accounts\\admin\\EmploieController@create', 'as' => 'admin.emploi_create']);
    Route::post('post/ajouter-un-emploi',['uses' => 'accounts\\admin\\EmploieController@store', 'as' => 'admin.emploi_store']);
    Route::get('editer-un-emploi/{id}', ['uses' => 'accounts\\admin\\EmploieController@edit', 'as' => 'admin.emploi_edit']);
    Route::post('post/editer-un-emploi/{id}', ['uses' => 'accounts\\admin\\EmploieController@update', 'as' => 'admin.emploi_update']);
    Route::get('supprimer-un-emploi/{id}', ['uses' => 'accounts\\admin\\EmploieController@delete', 'as' => 'admin.emploi_delete']);

    // website settings
    Route::get('modifier-le-parametre', ['uses' => 'accounts\\admin\\SettingController@edit', 'as' => 'admin.setting_edit']);
    Route::post('post/modifier-le-parametre', ['uses' => 'accounts\\admin\\SettingController@update', 'as' => 'admin.setting_update']);
    

    // For Users
    Route::any('users-list/{duration?}/{sort?}/{field?}', ['uses' => 'accounts\\admin\\UserController@index', 'as' => 'admin.users_index']);
    Route::get('find-user', ['uses' => 'accounts\\admin\\UserController@finduser', 'as' => 'admin.finduser']);
    Route::get('add-user', ['uses' => 'accounts\\admin\\UserController@create', 'as' => 'admin.user_create']);
    Route::post('post/adduser', ['uses' => 'accounts\\admin\\UserController@store', 'as' => 'admin.user_store']);
    Route::get('edit-user/{id}', ['uses' => 'accounts\\admin\\UserController@edit', 'as' => 'admin.user_edit']);
    Route::post('post/edit-user/{id}', ['uses' => 'accounts\\admin\\UserController@update', 'as' => 'admin.user_update']);
    Route::get('delete-user/{id}', ['uses' => 'accounts\\admin\\UserController@delete', 'as' => 'admin.user_delete']);

    //For publicite
    Route::any('liste-des-publicites/{duration?}', ['uses' => 'accounts\\admin\\PubliciteController@index', 'as' => 'admin.publicite_index']);
    Route::get('rechercher-une-publicite', ['uses' => 'accounts\\admin\\PubliciteController@findpublicite', 'as' => 'admin.findpublicite']);
    Route::get('ajouter-une-publicite',['uses' => 'accounts\\admin\\PubliciteController@create', 'as' => 'admin.publicite_create']);
    Route::post('post/ajouter-une-publicite',['uses' => 'accounts\\admin\\PubliciteController@store', 'as' => 'admin.publicite_store']);
    Route::get('editer-une-publicite/{id}', ['uses' => 'accounts\\admin\\PubliciteController@edit', 'as' => 'admin.publicite_edit']);
    Route::post('post/editer-une-publicite/{id}', ['uses' => 'accounts\\admin\\PubliciteController@update', 'as' => 'admin.publicite_update']);
    Route::get('supprimer-une-publicite/{id}', ['uses' => 'accounts\\admin\\PubliciteController@delete', 'as' => 'admin.publicite_delete']);

    //candidat
    Route::get('cv-candidat/{id}', ['uses' => 'accounts\\admin\\CandidatController@show', 'as' => 'candidat.cv_admin']);
    Route::any('profil-candidats/{field?}', ['uses' => 'accounts\\admin\\CandidatController@index', 'as' => 'candidat.profil_admin']);
    Route::get('chercher-candidat', ['uses' => 'accounts\\admin\\CandidatController@find', 'as' => 'candidat.search_admin']);
    

});
?>
