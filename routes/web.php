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
        //########### landing ##################
        Route::get('/', 'HomeController@index')->name('home');

        //########### mainData ##################
        Route::group(['namespace'=>'MainData'],function(){
            //stages
            Route::resource('stages','StageController');

            //grades
            Route::resource('grades','GradeController');

            //classroom
            Route::resource('classrooms','ClassroomController');
            Route::post('classrooms/delete_selected','ClassroomController@delete_selected')->name('classrooms.delete_selected');

        });

        //########### HrData ##################
        Route::group(['namespace'=>'HrData'],function(){
            //parents
            Route::get('parents','StudentparentsController@index')->name('parents.index');
        });
        /*
        Route::group(['namespace'=>''],function(){

        });
        */
        Route::get('/empty', function () {
            return view('empty');
        });
    });


});


