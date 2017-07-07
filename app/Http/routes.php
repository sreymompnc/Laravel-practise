<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\studentModel;

Route::get('/', function () {
    $objStudent = new \App\Http\Controllers\studentController();
    $students =studentModel::OrderBy('id','asc')->paginate(4);
    return view('students/index', compact('students'));
})->middleware(['checkauth']);

Route::get('/logins', function () {
    return view('auth.login');
})->name('loginpage');



Route::resource('students','studentController');// students is name of route to access url

//
//Route::resource('students', 'studentController', ['names' => [
//    'create' => 'students.create',
//]])->middleware(['requests']);

Route::resource('/data','QueryEloController@index');


Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('/search','studentController@search');
