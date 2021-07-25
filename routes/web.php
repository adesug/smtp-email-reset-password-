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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('role:superadmin')->get('/dashboard', function() {
    return 'Dashboard';
})->name('dashboard');

//forgot

Route::post('/postforgot','Auth\ForgotPasswordController@postforgot')->name('postforgot');

//verification

Route::get('/veriftoken','Auth\VerificationTokenController@veriftoken')->name('veriftoken');
Route::post('/postveriftoken','Auth\VerificationTokenController@postveriftoken')->name('postveriftoken');

//reset pass
Route::resource('/resetpassword','Auth\ResetPasswordController');

