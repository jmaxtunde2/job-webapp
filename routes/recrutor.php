<?php

/**
 * Author: Perfect Tech Lab
 * Date: 2020/02/05
 * Time: 10:51PM
 * File Name: recrutor.php
 */


Route::group(['prefix' => 'compte/recrutor', 'middleware' => ['auth', 'App\Http\Middleware\Recrutor']], function () {

    //For Dashboard
    Route::get('tableau-de-bord', ['uses' => 'accounts\\recrutor\\DashboardController@index', 'as' => 'recrutor.dashboard']);

    //For emploi
    Route::any('liste-des-emplois/{duration?}', ['uses' => 'accounts\\recrutor\\EmploieController@index', 'as' => 'recrutor.emploi_index']);
    Route::get('rechercher-un-emploi', ['uses' => 'accounts\\recrutor\\EmploieController@findemploi', 'as' => 'recrutor.findemploi']);
    Route::get('ajouter-un-emploi',['uses' => 'accounts\\recrutor\\EmploieController@create', 'as' => 'recrutor.emploi_create']);
    Route::post('post/ajouter-un-emploi',['uses' => 'accounts\\recrutor\\EmploieController@store', 'as' => 'recrutor.emploi_store']);
    Route::get('editer-un-emploi/{id}', ['uses' => 'accounts\\recrutor\\EmploieController@edit', 'as' => 'recrutor.emploi_edit']);
    Route::post('post/editer-un-emploi/{id}', ['uses' => 'accounts\\recrutor\\EmploieController@update', 'as' => 'recrutor.emploi_update']);
    
    //For publicite
    Route::any('liste-des-publicites/{duration?}', ['uses' => 'accounts\\recrutor\\PubliciteController@index', 'as' => 'recrutor.publicite_index']);
    Route::get('rechercher-une-publicite', ['uses' => 'accounts\\recrutor\\PubliciteController@findpublicite', 'as' => 'recrutor.findpublicite']);
    Route::get('ajouter-une-publicite',['uses' => 'accounts\\recrutor\\PubliciteController@create', 'as' => 'recrutor.publicite_create']);
    Route::post('post/ajouter-une-publicite',['uses' => 'accounts\\recrutor\\PubliciteController@store', 'as' => 'recrutor.publicite_store']);
    Route::get('editer-une-publicite/{id}', ['uses' => 'accounts\\recrutor\\PubliciteController@edit', 'as' => 'recrutor.publicite_edit']);
    Route::post('post/editer-une-publicite/{id}', ['uses' => 'accounts\\recrutor\\PubliciteController@update', 'as' => 'recrutor.publicite_update']);
    
    //candidat
    Route::get('cv-candidat/{id}', ['uses' => 'accounts\\recrutor\\CandidatController@show', 'as' => 'candidat.cv']);
    Route::any('profil-candidats/{field?}', ['uses' => 'accounts\\recrutor\\CandidatController@index', 'as' => 'candidat.profil']);
    Route::get('chercher-candidat', ['uses' => 'accounts\\recrutor\\CandidatController@find', 'as' => 'candidat.search']);

});
?>
