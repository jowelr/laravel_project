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

   //  Route::get('/', function () {
      //  return view('welcome');
    //});

Route::get('/','HelloController@index');
Route::get('/about','HelloController@about');
Route::get('/service','HelloController@service');
Route::get('/contact','HelloController@contact');



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');






Route::get('/category/add', 'CategoryController@index');
Route::post('/category/new', 'CategoryController@saveCategoryInfo');
Route::get('/category/manage', 'CategoryController@manageCategoryInfo');
Route::get('/category/edit/{id}', 'CategoryController@editCategory');
Route::post('/category/update', 'CategoryController@updateCategory');
Route::get('/category/delete/{id}', 'CategoryController@deleteCategory');


Route::get('/blog/add', 'BlogController@index');
Route::post('/blog/new', 'BlogController@saveBlogInfo');
Route::get('/blog/manage', 'BlogController@manageBlogInfo');
Route::get('/blog/view/{id}', 'BlogController@viewBlogInfo');
Route::get('/blog/unpublished/{id}', 'BlogController@unpublishedBlogInfo');
Route::get('/blog/published/{id}', 'BlogController@publishedBlogInfo');
Route::get('/blog/edit/{id}', 'BlogController@editBlogInfo');
Route::post('/blog/update', 'BlogController@updateBlogInfo');

