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


Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{
    Route::group(['middleware'=>'preventBackHistory'],function(){
        Auth::routes();
    });



    Route::group(['middleware'=>['auth','preventBackHistory']],function()
    {
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('grades','Dashboard\GradeController');
        Route::get('/empty', function () {
            return view('empty');
        });
    });


});


