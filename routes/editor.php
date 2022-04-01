<?php

/**
 * Author: Perfect Tech Lab
 * Date: 2020/02/05
 * Time: 10:51PM
 * File Name: editor.php
 */


Route::group(['prefix' => 'compte/editeur', 'middleware' => ['auth', 'App\Http\Middleware\Editor']], function () {

    //For Dashboard
    Route::get('tableau-de-bord', ['uses' => 'accounts\\editor\\DashboardController@index', 'as' => 'editor.dashboard']);

    //For Category
    Route::any('categories-list/{field?}', ['uses' => 'accounts\\editor\\CategoryController@index', 'as' => 'editor.category_index']);
    Route::get('rechercher-une-categorie', ['uses' => 'accounts\\editor\\CategoryController@findCategorie', 'as' => 'editor.findcategory']);
    Route::get('ajouter-une-categorie',['uses' => 'accounts\\editor\\CategoryController@create', 'as' => 'editor.category_create']);
    Route::post('post/ajouter-une-categorie',['uses' => 'accounts\\editor\\CategoryController@store', 'as' => 'editor.category_store']);
    Route::get('editer-une-categorie/{id}', ['uses' => 'accounts\\editor\\CategoryController@edit', 'as' => 'editor.category_edit']);
    Route::post('post/editer-une-categorie/{id}', ['uses' => 'accounts\\editor\\CategoryController@update', 'as' => 'editor.category_update']);
    Route::get('supprimer-une-categorie/{id}', ['uses' => 'accounts\\editor\\CategoryController@delete', 'as' => 'editor.category_delete']);

    //For ville
    Route::any('liste-des-villes/{field?}', ['uses' => 'accounts\\editor\\VilleController@index', 'as' => 'editor.ville_index']);
    Route::get('rechercher-une-ville', ['uses' => 'accounts\\editor\\VilleController@findVille', 'as' => 'editor.findville']);
    Route::get('ajouter-une-ville',['uses' => 'accounts\\editor\\VilleController@create', 'as' => 'editor.ville_create']);
    Route::post('post/ajouter-une-ville',['uses' => 'accounts\\editor\\VilleController@store', 'as' => 'editor.ville_store']);
    Route::get('editer-une-ville/{id}', ['uses' => 'accounts\\editor\\VilleController@edit', 'as' => 'editor.ville_edit']);
    Route::post('post/editer-une-ville/{id}', ['uses' => 'accounts\\editor\\VilleController@update', 'as' => 'editor.ville_update']);
    Route::get('supprimer-une-ville/{id}', ['uses' => 'accounts\\editor\\VilleController@delete', 'as' => 'editor.ville_delete']);

    //For type
    Route::any('liste-des-types/{field?}', ['uses' => 'accounts\\editor\\TypeController@index', 'as' => 'editor.type_index']);
    Route::get('rechercher-un-type-de-job', ['uses' => 'accounts\\editor\\TypeController@findtype', 'as' => 'editor.findtype']);
    Route::get('ajouter-un-type-de-job',['uses' => 'accounts\\editor\\TypeController@create', 'as' => 'editor.type_create']);
    Route::post('post/ajouter-un-type-de-job',['uses' => 'accounts\\editor\\TypeController@store', 'as' => 'editor.type_store']);
    Route::get('editer-un-type-de-job/{id}', ['uses' => 'accounts\\editor\\TypeController@edit', 'as' => 'editor.type_edit']);
    Route::post('post/editer-un-type-de-job/{id}', ['uses' => 'accounts\\editor\\TypeController@update', 'as' => 'editor.type_update']);
    Route::get('supprimer-un-type-job/{id}', ['uses' => 'accounts\\editor\\TypeController@delete', 'as' => 'editor.type_delete']);

    //For pays
    Route::any('liste-des-pays/{field?}', ['uses' => 'accounts\\editor\\PaysController@index', 'as' => 'editor.pays_index']);
    Route::get('rechercher-un-pays', ['uses' => 'accounts\\editor\\PaysController@findpays', 'as' => 'editor.findpays']);
    Route::get('ajouter-un-pays',['uses' => 'accounts\\editor\\PaysController@create', 'as' => 'editor.pays_create']);
    Route::post('post/ajouter-un-pays',['uses' => 'accounts\\editor\\PaysController@store', 'as' => 'editor.pays_store']);
    Route::get('editer-un-pays/{id}', ['uses' => 'accounts\\editor\\PaysController@edit', 'as' => 'editor.pays_edit']);
    Route::post('post/editer-un-pays/{id}', ['uses' => 'accounts\\editor\\PaysController@update', 'as' => 'editor.pays_update']);
    Route::get('supprimer-un-pays/{id}', ['uses' => 'accounts\\editor\\PaysController@delete', 'as' => 'editor.pays_delete']);

    //For emploi
    Route::any('liste-des-emplois/{duration?}', ['uses' => 'accounts\\editor\\EmploieController@index', 'as' => 'editor.emploi_index']);
    Route::get('rechercher-un-emploi', ['uses' => 'accounts\\editor\\EmploieController@findemploi', 'as' => 'editor.findemploi']);
    Route::get('ajouter-un-emploi',['uses' => 'accounts\\editor\\EmploieController@create', 'as' => 'editor.emploi_create']);
    Route::post('post/ajouter-un-emploi',['uses' => 'accounts\\editor\\EmploieController@store', 'as' => 'editor.emploi_store']);
    Route::get('editer-un-emploi/{id}', ['uses' => 'accounts\\editor\\EmploieController@edit', 'as' => 'editor.emploi_edit']);
    Route::post('post/editer-un-emploi/{id}', ['uses' => 'accounts\\editor\\EmploieController@update', 'as' => 'editor.emploi_update']);
    Route::get('supprimer-un-emploi/{id}', ['uses' => 'accounts\\editor\\EmploieController@delete', 'as' => 'editor.emploi_delete']);

    // website settings
    Route::get('modifier-le-parametre', ['uses' => 'accounts\\editor\\SettingController@edit', 'as' => 'editor.setting_edit']);
    Route::post('post/modifier-le-parametre', ['uses' => 'accounts\\editor\\SettingController@update', 'as' => 'editor.setting_update']);
    

    // For Users
    Route::any('users-list/{duration?}/{sort?}/{field?}', ['uses' => 'accounts\\editor\\UserController@index', 'as' => 'editor.users_index']);
    Route::get('find-user', ['uses' => 'accounts\\editor\\UserController@finduser', 'as' => 'editor.finduser']);
    Route::get('add-user', ['uses' => 'accounts\\editor\\UserController@create', 'as' => 'editor.user_create']);
    Route::post('post/adduser', ['uses' => 'accounts\\editor\\UserController@store', 'as' => 'editor.user_store']);
    Route::get('edit-user/{id}', ['uses' => 'accounts\\editor\\UserController@edit', 'as' => 'editor.user_edit']);
    Route::post('post/edit-user/{id}', ['uses' => 'accounts\\editor\\UserController@update', 'as' => 'editor.user_update']);
    Route::get('delete-user/{id}', ['uses' => 'accounts\\editor\\UserController@delete', 'as' => 'editor.user_delete']);

    //For publicite
    Route::any('liste-des-publicites/{duration?}', ['uses' => 'accounts\\editor\\PubliciteController@index', 'as' => 'editor.publicite_index']);
    Route::get('rechercher-une-publicite', ['uses' => 'accounts\\editor\\PubliciteController@findpublicite', 'as' => 'editor.findpublicite']);
    Route::get('ajouter-une-publicite',['uses' => 'accounts\\editor\\PubliciteController@create', 'as' => 'editor.publicite_create']);
    Route::post('post/ajouter-une-publicite',['uses' => 'accounts\\editor\\PubliciteController@store', 'as' => 'editor.publicite_store']);
    Route::get('editer-une-publicite/{id}', ['uses' => 'accounts\\editor\\PubliciteController@edit', 'as' => 'editor.publicite_edit']);
    Route::post('post/editer-une-publicite/{id}', ['uses' => 'accounts\\editor\\PubliciteController@update', 'as' => 'editor.publicite_update']);
    Route::get('supprimer-une-publicite/{id}', ['uses' => 'accounts\\editor\\PubliciteController@delete', 'as' => 'editor.publicite_delete']);



});
?>
