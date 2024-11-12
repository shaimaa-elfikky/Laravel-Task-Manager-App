<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('tasks', 'TaskController');
Route::resource('task-lists', 'TaskListController');

Route::get('task-lists/{id}/share', 'TaskListController@share')->name('task-list.share');
Route::get('task-lists/shared/{shareLink}', 'TaskListController@showShared')->name('task-list.show-shared');