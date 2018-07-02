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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@updateAvatar');
Route::get('/home/upperfl', 'HomeController@upperfl');


Route::resource('courses', 'CoursesController');
Route::get('/courses/{id}/delete', 'CoursesController@delete');
Route::get('/users/all/{name}', 'UsersController@all');

Route::resource('users', 'UsersController');
Route::get('/users/admin/{id}/edit', 'UsersController@edit');
Route::get('/users/admin/{id}/delete', 'UsersController@delete');
Route::get('/users/admin/{id}/updateAdmin', 'UsersController@updateAdmin');
Route::get('/users/{id}/perfil', 'UsersController@perfil');

Route::get('/courses/user/list', 'RegistrationsController@index');
Route::get('courses/registration/allcourses', 'RegistrationsController@allcourses');
Route::get('courses/registration/{idCourse}/{idUser}/authtorizeStudent', 'RegistrationsController@authtorizeStudent');
Route::get('courses/registration/adminre', 'RegistrationsController@adminre');
Route::get('courses/registration/{id}/userre', 'RegistrationsController@userre');
Route::get('courses/registration/userde', 'RegistrationsController@userde');
Route::get('courses/registration/mycurses', 'RegistrationsController@mycurses');
