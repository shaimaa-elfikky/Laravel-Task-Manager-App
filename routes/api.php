<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function () {
    // Share a task list with another user by username
    Route::post('/task-list-shares', 'TaskListShareController@shareTaskList');

    // Get all task lists shared with the authenticated user
    Route::get('/task-list-shares', 'TaskListShareController@sharedWithUser');

    // Return the authenticated user's details
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});