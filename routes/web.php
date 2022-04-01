<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Auth::routes();

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home' ]); 
Route::any('/nos-emplois/{duration?}', ['uses' => 'HomeController@jobListing', 'as' => 'job_listing' ]);
Route::get('/emplois/{slug}', ['uses' => 'HomeController@jobDetail', 'as' => 'job_detail' ]);

Route::get('/emplois-par-type/{type}', ['uses' => 'HomeController@jobByType', 'as' => 'job_byType' ]);
Route::get('/emplois-par-pays/{pays}', ['uses' => 'HomeController@jobByPays', 'as' => 'job_byPays' ]);
Route::get('/emplois-par-categorie/{category}', ['uses' => 'HomeController@jobByCategory', 'as' => 'job_byCategory' ]);
Route::get('/emplois-par-lieu/{ville}', ['uses' => 'HomeController@jobByVille', 'as' => 'job_byVille' ]);
Route::get('/rechercher-un-emploi', ['uses' => 'HomeController@search', 'as' => 'job_search' ]);


Route::get('/qui-sommes-nous', ['uses' => 'HomeController@about', 'as' => 'about' ]);
Route::get('/blog', ['uses' => 'HomeController@blog', 'as' => 'blog' ]);
Route::get('/contactez-nous', ['uses' => 'HomeController@contacts', 'as' => 'contact' ]);
Route::get('/nos-candidats', ['uses' => 'HomeController@candidat', 'as' => 'candidat' ]);


Route::get('/login', ['uses' => 'HomeController@login', 'as' => 'login' ]);
Route::get('/inscription', ['uses' => 'HomeController@registerForm', 'as' => 'register' ]);
Route::post('/post/inscription', ['uses' => 'HomeController@register', 'as' => 'registerPost' ]);

Route::get('/inscription-candidat', ['uses' => 'HomeController@registerFormCandidat', 'as' => 'register-candidat' ]);
Route::post('/post/inscription-candidat', ['uses' => 'HomeController@registerCandidat', 'as' => 'registerPost-candidat' ]);


Route::get('login/logout', ['uses' => 'HomeController@doLogout', 'as' => 'account.logout' ]);
Route::post('login/doLogin',['as' => 'loginAction', 'uses' =>'HomeController@doLogin']);
Route::get('access',['as' => 'access', 'uses' =>'HomeController@access']);

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'login', 'middleware' => 'auth'],function() {
    Route::post('getNotifications',['as' => 'getNotifications', 'uses' => 'accounts\\NotificationController@getNotifications']);

});
//Account Settings
Route::get('user-profile', ['uses' => 'HomeController@userProfile', 'as' => 'account.profile']);
Route::post('post/profile_settings', ['uses' => 'HomeController@profileSettings', 'as' => 'user.profile_settings']);
Route::post('post/change_password', ['uses' => 'HomeController@changePassword', 'as' => 'user.change_password']);

// Newletter

Route::any('liste-des-abonnes', ['uses' => 'NewletterController@index', 'as' => 'newletter_index']);
Route::post('post/ajouter-un-newletter',['uses' => 'NewletterController@store', 'as' => 'newletter_store']);
Route::get('supprimer-un-newletter/{id}', ['uses' => 'NewletterController@delete', 'as' => 'newletter_delete']);

Route::get('sitemap.xml','HomeController@sitemap');