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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('')->middleware('auth')->group(function(){
    Route::get('/profile', 'ProfileController@index');
    Route::get('/update', 'ProfileController@index2');
    Route::post('/update/profile/{id}', 'ProfileController@update');

    Route::prefix('post')->group(function(){
        Route::post('/store', 'PostController@store');
        Route::get('/delete/{id}', 'PostController@delete');
    });
    Route::prefix('group')->middleware('checkTeacher')->group(function() {
        Route::get('', 'GroupController@index');
        Route::post('/store', 'GroupController@store');
        Route::get('/delete/{id}', 'GroupController@delete');
    });
    Route::prefix('lesson')->middleware('checkTeacher')->group(function() {
        Route::get('', 'LessonController@index');
        Route::post('/store', 'LessonController@store');
        Route::get('/delete/{id}', 'LessonController@delete');
    });
    Route::prefix('student')->middleware('checkTeacher')->group(function() {
        Route::get('', 'StudentController@index');
        Route::post('/store', 'StudentController@store');
        Route::get('/delete/{id}', 'StudentController@delete');
        Route::get('lessons/{id}', 'StudentController@main');
    });
    Route::get('/mail','MailController@index');
    Route::post('/send/mail','MailController@send');
    Route::post('/send/comment/{id}','CommentController@store');
    Route::get('/grouplist', 'GroupController@main');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
