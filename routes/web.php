<?php

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


// admin login register group
// Route::get('/admin/register', 'Auth\RegisterController@showAdminRegisterForm')->name('admin.register');
// Route::post('/admin/register', 'Auth\RegisterController@createAdmin')->name('admin.register');
Route::get('/admin/login', 'Auth\LoginController@showAdminLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\LoginController@adminLogin')->name('admin.login');

// Admin route group
Route::group(['prefix' => 'admin',  'middleware' => ['auth:admin']], function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });
    Route::get('/dashboard', 'Admin\AdminController@index')->name('admin.dashboard');
});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
