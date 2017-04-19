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
use App\Projects; 

Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminsController@index')->name('admin.dashboard');
});

Route::get('/', 'ProjectsController@index');
Route::get('/projects', 'ProjectsController@index');
Route::post('/projects', 'ProjectsController@store');
Route::get('/projects/create', 'HomeController@index');
Route::get('/projects/{project}', 'ProjectsController@show');
Route::post('/projects/{project}/comments','CommentsController@store');
Route::get('/projects/tags/{tag}', 'TagsController@index');



Auth::routes();

Route::get('/home', 'HomeController@index');





