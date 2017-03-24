<?php

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



Route::get('/', 'EntrepriseController@index');


Route::auth();
//Route::resource('users','UserController');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', 'HomeController@index');

    Route::group(['middleware' => ['role:super_admin']], function() {

        Route::group(['prefix' => 'roles'], function() {
            Route::get('/',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
            Route::get('/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
            Route::post('/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);
            Route::get('/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
            Route::get('/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
            Route::patch('/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
            Route::delete('/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);
        });





    });

    Route::group(['prefix' => 'entreprises'], function() {
        Route::get('/',['as'=>'entreprises.index','uses'=>'EntrepriseController@index']);
        Route::get('/create',['as'=>'entreprises.create','uses'=>'EntrepriseController@create']);
        Route::post('/create',['as'=>'entreprises.store','uses'=>'EntrepriseController@store']);
        Route::get('/{id}',['as'=>'entreprises.show','uses'=>'EntrepriseController@show']);
        Route::get('/{id}/edit',['as'=>'entreprises.edit','uses'=>'EntrepriseController@edit']);
        Route::patch('/{id}',['as'=>'entreprises.update','uses'=>'EntrepriseController@update']);
        Route::delete('/{id}',['as'=>'entreprises.destroy','uses'=>'EntrepriseController@destroy']);
    });


    Route::group(['prefix' => 'filieres'], function() {
        Route::get('/',['as'=>'filieres.index','uses'=>'FiliereController@index']);
        Route::get('/create',['as'=>'filieres.create','uses'=>'FiliereController@create']);
        Route::post('/create',['as'=>'filieres.store','uses'=>'FiliereController@store']);
        Route::get('/{id}',['as'=>'filieres.show','uses'=>'FiliereController@show']);
        Route::get('/{id}/edit',['as'=>'filieres.edit','uses'=>'FiliereController@edit']);
        Route::patch('/{id}',['as'=>'filieres.update','uses'=>'FiliereController@update']);
        Route::delete('/{id}',['as'=>'filieres.destroy','uses'=>'FiliereController@destroy']);
    });


});
Route::group(['prefix' => 'annonceur'], function () {
  Route::get('/login', 'AnnonceurAuth\LoginController@showLoginForm');
  Route::post('/login', 'AnnonceurAuth\LoginController@login');
  Route::post('/logout', 'AnnonceurAuth\LoginController@logout');

  Route::get('/register', 'AnnonceurAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'AnnonceurAuth\RegisterController@register');

  Route::post('/password/email', 'AnnonceurAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'AnnonceurAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'AnnonceurAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'AnnonceurAuth\ResetPasswordController@showResetForm');
});
