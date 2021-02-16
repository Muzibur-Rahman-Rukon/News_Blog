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

Route::get('/','App\Http\Controllers\FrontEndController@index');
Route::get('/page_by_category/{id}','App\Http\Controllers\FrontEndController@page_by_category');
Route::get('/page_by_newsId/{id}','App\Http\Controllers\FrontEndController@page_by_newsId');
Route::get('/userRegister','App\Http\Controllers\FrontEndController@userRegister');
Route::get('/userLogin','App\Http\Controllers\FrontEndController@userLogin');
Route::post('/save_user','App\Http\Controllers\FrontEndController@save_user');
Route::post('/user_loginAttempt','App\Http\Controllers\FrontEndController@user_loginAttempt');
Route::get('/logoutUser','App\Http\Controllers\FrontEndController@logoutUser');
Route::post('/postComment','App\Http\Controllers\FrontEndController@postComment');








/*
-------------------------------------------------------------------------
Admin
-------------------------------------------------------------------------
*/
Route::get('/admin','App\Http\Controllers\AdminController@login');
Route::post('/admin_login_check','App\Http\Controllers\AdminController@admin_login_check');

Route::get('/index','App\Http\Controllers\AdminController@index');
Route::get('/addJob','App\Http\Controllers\AdminController@addJob');
Route::get('/manageJob','App\Http\Controllers\AdminController@manageJob');
Route::get('/addJobCategory','App\Http\Controllers\AdminController@addJobCategory');
Route::get('/viewCategory','App\Http\Controllers\AdminController@viewCategory');
Route::get('/addCompany','App\Http\Controllers\AdminController@addCompany');
Route::get('/viewAllNews','App\Http\Controllers\AdminController@viewAllNews');
Route::get('/viewallUser','App\Http\Controllers\AdminController@viewallUser');
Route::get('/logout','App\Http\Controllers\AdminController@logout');


Route::post('/save_category','App\Http\Controllers\AdminController@save_category');
Route::post('/save_news','App\Http\Controllers\AdminController@save_news');
Route::post('/update_news','App\Http\Controllers\AdminController@update_news');
Route::post('/update_ad','App\Http\Controllers\AdminController@update_ad');
Route::post('/save_advertisement','App\Http\Controllers\AdminController@save_advertisement');

Route::post('/update_category','App\Http\Controllers\AdminController@update_category');

Route::get('/addNews','App\Http\Controllers\AdminController@addNews');
Route::get('/edit_news/{id}','App\Http\Controllers\AdminController@edit_news');
Route::get('/edit_advertisement/{id}','App\Http\Controllers\AdminController@edit_advertisement');
Route::get('/delete_news/{id}','App\Http\Controllers\AdminController@delete_news');
Route::get('/delete_category/{id}','App\Http\Controllers\AdminController@delete_category');
Route::get('/delete_advertisement/{id}','App\Http\Controllers\AdminController@delete_advertisement');
Route::get('/make_cat_active/{id}','App\Http\Controllers\AdminController@make_cat_active');
Route::get('/make_ad_active/{id}','App\Http\Controllers\AdminController@make_ad_active');
Route::get('/make_cat_deactive/{id}','App\Http\Controllers\AdminController@make_cat_deactive');
Route::get('/make_ad_deactive/{id}','App\Http\Controllers\AdminController@make_ad_deactive');
Route::get('/addAdvertisement','App\Http\Controllers\AdminController@addAdvertisement');
Route::get('/viewAllAdvertisement','App\Http\Controllers\AdminController@viewAllAdvertisement');
Route::get('/delete_user/{id}','App\Http\Controllers\AdminController@delete_user');
Route::get('/delete_comment/{id}','App\Http\Controllers\AdminController@delete_comment');
Route::get('/viewallComment','App\Http\Controllers\AdminController@viewallComment');




