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
        'uses'=> 'PostController@getDashboard',
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

    Route::get('/logout',[
        'uses'=> 'UserController@getLogout',
        'as'=>'logout'
    ]);

    Route::get('/account',[
            'uses'=> 'UserController@getAccount',
            'as'=> 'account'
    ]);

    Route::post('/updateaccount',[
        'uses'=> 'UserController@postSave',
        'as'=>'account.save'
    ]);
 
    Auth::routes();

    Route::get('/', function (){
        return view('welcome');
    })->name('home');

    Route::post('/createpost',[
        'uses'=>'PostController@postCreatePost',
        'as'=>'post.create'
    ]);

    Route::get('/delete-post/{post_id}',[
        'uses' =>'PostController@getDeletePost',
        'as'=>'post.delete',
        'middleware'=>'auth'

    ]);


    Route::post('/edit', [
        'uses'=> 'PostController@postEditPost',
        'as'=>'edit'
    ]);

  
          
    


