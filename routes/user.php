<?php

/**
 * Author: Perfect Tech Lab
 * Date: 2020/02/05
 * Time: 10:51PM
 * File Name: recrutor.php
 */


    Route::group(['prefix' => 'compte/user', 'middleware' => ['auth', 'App\Http\Middleware\User']], function () {

    //For Dashboard
    Route::get('tableau-de-bord', ['uses' => 'accounts\\user\\DashboardController@index', 'as' => 'user.dashboard']);
    //For Dashboard
    Route::get('votre-cv', ['uses' => 'accounts\\user\\CandidatController@index', 'as' => 'user.cv']);
    Route::get('update-cv', ['uses' => 'accounts\\user\\CandidatController@edit', 'as' => 'user.updatecv']);
    Route::post('post/profil', ['uses' => 'accounts\\user\\CandidatController@store', 'as' => 'user.storeprofil']);
    Route::post('post/cursus', ['uses' => 'accounts\\user\\CandidatController@storeFormation', 'as' => 'user.storecursus']);
    Route::post('post/reference', ['uses' => 'accounts\\user\\CandidatController@storeReference', 'as' => 'user.storereference']);
    Route::get('supprimer-un-cursus/{id}', ['uses' => 'accounts\\user\\CandidatController@deleteCursus', 'as' => 'user.deleteCursus']);
    Route::get('supprimer-une-experience/{id}', ['uses' => 'accounts\\user\\CandidatController@deleteExperience', 'as' => 'user.deleteExperience']);
    Route::get('supprimer-une-reference/{id}', ['uses' => 'accounts\\user\\CandidatController@deleteReference', 'as' => 'user.deleteReference']);
    Route::get('suivre/{id}', ['uses' => 'accounts\\user\\CandidatController@saveSuivre', 'as' => 'user.suivre']);


    });
?>
