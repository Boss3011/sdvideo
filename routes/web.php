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
Route::namespace('BackEnd')->prefix('admin')->middleware('admin')->group(function (){
    Route::get('home','Home@index')->name('admin.home');
    Route::resource('users', 'Users')->except(['show']);
    Route::resource('categories', 'Categories')->except(['show']);
    Route::resource('myvideos', 'Myvideos')->except(['show']);
    Route::resource('tags', 'Tags')->except(['show']);
    Route::resource('pages', 'Pages')->except(['show']);
    Route::resource('videos', 'Videos')->except(['show']);
    Route::resource('messages', 'Messages')->only(['index','destroy','edit']);
    Route::post('messages/reply/{id}', 'Messages@reply')->name('message.reply');
    Route::post('comments', 'Videos@commentStore')->name('comment.store');
    Route::get('comments/{id}', 'Videos@commentDelete')->name('comment.delete');
    Route::post('comments/{id}', 'Videos@commentUpdate')->name('comment.update');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('category/{id}', 'HomeController@category')->name('frontend.category');
Route::get('myvideo/{id}', 'HomeController@myvideos')->name('frontend.myvideo');
Route::get('tag/{id}', 'HomeController@tags')->name('frontend.tags');
Route::get('video/{id}', 'HomeController@video')->name('frontend.video');
Route::get('contect-us', 'HomeController@messageStore')->name('contect.store');
Route::get('/', 'HomeController@welcome')->name('frontend.landing');
Route::get('profile/{id}/{slug?}', 'HomeController@profile')->name('frontend.profile');



Route::middleware('auth')->group(function (){
Route::post('comments/{id}', 'HomeController@commentUpdate')->name('frontend.commentUpdate');
Route::post('comments/{id}/create', 'HomeController@commentStore')->name('frontend.commentStore');
Route::post('profile', 'HomeController@profileUpdate')->name('profile.update');

});