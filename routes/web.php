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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// Categories
Route::get('/categories', 'CategoriesController@index');
Route::get('/categories/create',"CategoriesController@create");
Route::get('/categories/{id}/edit', "CategoriesController@edit");
Route::post('/categories', 'CategoriesController@store');
Route::patch('/categories/{id}','CategoriesController@update');
Route::delete('/categories/{id}', 'CategoriesController@destroy');


//SubCategories
Route::get('/subcategories', 'SubcategoriesController@index');
Route::get('/subcategories/create',"SubcategoriesController@create");
Route::get('/subcategories/{id}/edit', "SubcategoriesController@edit");
Route::post('/subcategories', 'SubcategoriesController@store');
Route::patch('/subcategories/{id}','SubcategoriesController@update');
Route::delete('/subcategories/{id}', 'SubcategoriesController@destroy');


Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');