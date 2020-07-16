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


Route::group(['middleware'=>['web']], function(){




    Route::get('/dashboard', [
        'uses'=> 'UserController@getDashboard',
        'as'=> 'dashboard',
        'middleware'=>'auth'
         ]);

    });

    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::post('/signup',[
        'uses'=> 'UserController@postSignup',
        'as'=>'signup'
    ]);

    Route::post('/signin',[
        'uses'=> 'UserController@postSignin',
        'as'=>'signin'
    ]);
 
    Auth::routes();

    Route::get('/', function (){
        return view('welcome');
    })->name('home');

