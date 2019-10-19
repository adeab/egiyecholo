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


Route::get('/testing123', function () {
    return view('layouts.app');
});
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'backend','middleware'=>'auth','namespace'=>'admin'],function (){

    Route::get('/dashboard', 'AdminPagesController@dashboard')->name('admin.dashboard');
    Route::get('/userlist', 'AdminPagesController@user_list')->name('admin.userlist');
    Route::get('/useradd', 'AdminPagesController@user_add')->name('admin.useradd');
    Route::get('/posts', 'AdminPagesController@post_list')->name('admin.allposts');
    Route::get('/pendings', 'AdminPagesController@pending_post_list')->name('admin.pendingposts');
    Route::get('/myposts', 'AdminPagesController@my_post_list')->name('admin.myposts');
    Route::get('/posts/{id}', 'AdminPagesController@single_view')->name('admin.postview');
    Route::get('/makecontributor/{post_id}', 'AdminPagesController@makecontributor')->name('admin.makecontributor');
    Route::get('/publishpost/{postid}', 'AdminPagesController@publishpost')->name('admin.publishpost');
    Route::post('/users/contributor', 'UserController@storecontributor')->name('admin.storecontributor');
    Route::get('/change_password', 'AdminPagesController@changepassword')->name('admin.change_password');
    Route::post('/update_password', 'AdminPagesController@updatepassword')->name('admin.update_password');
    Route::get('/publishia/{post_id}', 'AdminPagesController@publish_ia')->name('publishia');
    Route::resource('users', 'UserController'); 
});
Route::resource('/posts', 'PostController');
Route::post('ckeditor/upload', 'CkeditorController@upload')->name('ckeditor.upload');
Route::get('/', 'PageController@dashboard');
Route::get('বিভাগ/{param}', 'PageController@categorypage');
Route::get('বিভাগ/{param}/{param2}', 'PageController@subcategorypage');
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/calback/{provider}', 'SocialController@callback');
Route::get('/search', 'PostController@searchkeyword')->name('searchkeyword');
Route::get('/searchtag/{tag}', 'PostController@searchtag');
