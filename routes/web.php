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

Route::get('/vacancies', 'VacancyController@index')->name('vacancies');
Route::get('/vacancies/export', 'VacancyController@export')->name('vacancies.export');
Route::get('/vacancies/import', 'VacancyController@import')->name('vacancies.import')->middleware('auth');
Route::post('/vacancies/parse', 'VacancyController@parse')->name('vacancies.parse')->middleware('auth');
Route::get('/vacancies/edit/{id}', 'VacancyController@edit')->name('vacancies.edit')->middleware('auth');
Route::put('/vacancies/update/{id}', 'VacancyController@update')->name('vacancies.update')->middleware('auth');;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
