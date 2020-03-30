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

use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('marketing_page');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/delete', 'ProfileController@userDelete');
Route::post('/user/edit', 'ProfileController@userEdit');

Route::get('/profile/view/{id}', 'ProfileController@showTweetProfile');
Route::get('/profile/setup', 'ProfileController@show');
Route::post('/profile/setup', 'ProfileController@createProfile');
Route::post('/profile/edit', 'ProfileController@editProfile');
Route::get('/profile/edit', 'ProfileController@showEditProfile');

Route::get('/follows', 'FollowController@show');
Route::get('/follows/followUser', 'FollowController@follow');
Route::get('/follows/unfollowUser', 'FollowController@unfollow');

Route::get('/tweet/view/{id}', 'TweetController@viewProfileTweet');

Route::post('/tweet/create', 'TweetController@createTweet');
Route::get('/tweet/edit', 'TweetController@editTweetView');
Route::post('/tweet/edit', 'TweetController@editTweet');
Route::get('/tweet/delete', 'TweetController@deleteTweet');

Route::get('/tweet/like', 'TweetController@likeTweet');
Route::get('/tweet/unlike', 'TweetController@unlikeTweet');

Route::post('/tweet/comment', 'TweetController@commentOnTweet');
Route::get('/tweet/comment/delete', 'TweetController@commentDelete');
Route::post('/tweet/comment/edit', 'TweetController@commentEdit');
Route::get('/tweet/comment/edit', 'TweetController@commentEditView');
