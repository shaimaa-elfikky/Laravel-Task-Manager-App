<?php

use App\Http\Controllers\TaskController;
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

    Route::get('tasks', 'TaskController@index');
    Route::post('tasks', 'TaskController@store');
    Route::get('tasks/{id}', 'TaskController@show');
    Route::get('tasks/{id}/edit', 'TaskController@edit');
    Route::put('tasks/{id}', 'TaskController@update');
    Route::delete('tasks/{id}', 'TaskController@destroy');
    // Share a task list with another user by username
    Route::post('/task-list-shares', 'TaskListShareController@shareTaskList');

    // Get all task lists shared with the authenticated user
    Route::get('/task-list-shares', 'TaskListShareController@sharedWithUser');

    // Return the authenticated user's details
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});