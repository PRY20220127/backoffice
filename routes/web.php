<?php

use App\Http\Controllers\AlertController;
use App\Http\Controllers\LogsController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
	return view('welcome');
});
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
	Route::get('map', function () {
		return view('pages.maps');
	})->name('map');
	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');
	Route::get('table-list', function () {
		return view('pages.tables');
	})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

	//Ransomware
	Route::get('/alerts', [AlertController::class, 'index'])->name("alerts.list");
	Route::get('/alerts/change-status', [AlertController::class, 'change'])->name("alerts.change");
	Route::get('/alerts/delete', [AlertController::class, 'delete'])->name("alerts.delete");
	Route::get('/alerts/add', function () {
		return view('alerts.form');
	})->name("alerts.form");
	Route::post('/alerts/insert', [AlertController::class, 'insert'])->name("alerts.insert");

	Route::get('/logs', [LogsController::class, 'list'])->name("logs.list");
});
