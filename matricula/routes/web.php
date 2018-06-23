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

Route::resource('students', 'StudentsController');
Route::get('/students/{id}/delete', 'StudentsController@delete');

Route::resource('courses', 'CoursesController');
Route::get('/courses/{id}/delete', 'CoursesController@delete');