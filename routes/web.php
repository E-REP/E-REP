<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('landing.index');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/profile/{user}', 'DashboardController@profile');

    Route::prefix('api')->group(function () {
        Route::get('me', 'UserController@getAuthUser');
        Route::get('users/{user}', 'UserController@getProfile');
        Route::patch('users/{user}', 'UserController@patchUser');

        Route::get('users/{user}/received-votes', 'UserController@getReceivedVotes');
        Route::post('users/{user}/received-votes', 'UserController@postUserVote');

        Route::post('users/{user}/image', 'UserController@postProfileImage');
        Route::delete('users/{user}/image', 'UserController@deleteProfileImage');
    });
});
