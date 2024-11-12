<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('tasks', 'TaskController@index');
Route::post('tasks', 'TaskController@store');
Route::get('tasks/{id}', 'TaskController@show');
Route::get('tasks/{id}/edit', 'TaskController@edit');
Route::put('tasks/{id}', 'TaskController@update');
Route::delete('tasks/{id}', 'TaskController@destroy');

Route::resource('task-lists', 'TaskListController');

Route::get('task-lists/{id}/share', 'TaskListController@share')->name('task-list.share');
Route::get('task-lists/shared/{shareLink}', 'TaskListController@showShared')->name('task-list.show-shared');