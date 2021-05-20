<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
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

/**
 * Local Routes
 */

Route::get('/', function () {
    return view('welcome');
});

Route::namespace('App\Http\Controllers\Auth')->middleware('guest')->group(function(){
    Route::view('login','auth.login')->name('login');
    Route::post('login','LoginController@login');

    Route::view('register','auth.register')->name('register');
    Route::post('register','RegisterController@register');
});

Route::post('logout',function(){
    Auth::logout();
    return redirect()->route('login');
})->middleware('auth')->name('logout');

/**
 * Admin Routes
 */

// Livewire Routes

Route::namespace('\App\Http\Livewire\Admin')->prefix('admin')->as('admin.')->middleware('auth')->group(function(){

    Route::get('roles', Roles\Index::class)->name('roles.index');

    Route::get('users', Users\Index::class)->name('users.index');

});

// Controller Routes

Route::namespace('\App\Http\Controllers\Admin')->prefix('admin')->as('admin.')->middleware('auth')->group(function(){

    Route::get('/', 'HomeController@index')->name('dashboard');

    Route::resource('roles', \RoleController::class)->except(['index','show'])->where(['user' => '[0-9]+']);
    Route::resource('permissions', \PermissionController::class);

    Route::get('users/export', 'UserController@export')->name('users.export');
    Route::get('users/{user}/update/approval/status', 'UserController@updateApprovalStatus')->name('users.update.approval.status')->where(['user' => '[0-9]+']);
    Route::resource('users', \UserController::class)->except(['index'])->where(['user' => '[0-9]+']);


    Route::get('profile','ProfileController@index')->name('profile');
});

