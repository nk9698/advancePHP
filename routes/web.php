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

Route::get('/intro', function () {
    return '“Laravel makes it easy to develop websites!” ';
});

Route::get('uid/{id}', function($id) {
    return "ID: $id";
})->where('id', '[0-9]+');

//Route::get('/users/{user?}', function($user = "batman") {
//    return "Name: $user";
//})->where('user','[A-Za-z\s]+')->name('users.show');

//Route::get('users/{user}/images/{img}', function($user , $img ) {
//    return "User: $user Images: $img";
//})->where(['user'=>'[A-Za-z\s]+','img'=>'[0-9]+'])->name('users.images.show');

Route::group(['as' => 'users.',
    'prefix' => 'users',
    'where'=>['user'=>'[A-Za-z\s]+','img'=>'[0-9]+'] ], function () {

    Route::get('{user?}', function ($user = "batman") {
        return "Name: $user";
    })->name('show');

    Route::get('{user?}/images/{img}', function ($user, $img) {
        return "Name: $user Images:$img";
    })->name('images.show');
});

Route::get('aboutme', function () {
    $name = "Nikhil";
    return view('pages/about')->with("fullName", $name);
})->name('about.show');

Route::get('thingsiknow', function () {
    $lang = ["php","html","css","javascript"];
    return view('pages/langs')->with("items", $lang);
})->name('langs.show');

Route::get('contact', function () {
    $mail = "np68@gmail.com";
    return view('pages/contact')->with("email", $mail);
})->name('contact.show');
//
//Route::get('articles','ArticleController@index')->name('articles.index');
//Route::get('articles/create', 'ArticleController@create')->name('articles.create');
//Route::post('articles', 'ArticleController@store')->name('articles.store');
//Route::get('articles/{article}', 'ArticleController@show')->name('articles.show');
//Route::delete('articles/{article}', 'ArticleController@destroy')->name('articles.destroy');


Route::resource('articles', 'ArticleController');

//Route::get('categories', 'CategoryController@index')->name('categories');
//Route::get('categories/create', 'CategoryController@create')->name('categories.create');
//Route::post('categories', 'CategoryController@store')->name('categories.store');
//
//Route::get('categories/{category}', 'CategoryController@show')->name('categories.show');
//Route::get('categories/{category}/edit','CategoryController@edit')->name('categories.edit');
//Route::patch('categories/{category}', 'CategoryController@update')->name('categories.update');
//Route::delete('categories/{category}', 'CategoryController@destroy')->name('categories.destroy');


Route::get('categories/manage', 'CategoryController@showDeleted');
Route::get('categories/{category}/forceDelete', 'CategoryController@forceDelete');
Route::get('categories/{category}/restore', 'CategoryController@restore');
Route::resource('categories', 'CategoryController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
