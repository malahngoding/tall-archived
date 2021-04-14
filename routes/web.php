<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;

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

/*
|--------------------------------------------------------------------------
| Web supmental routes
|--------------------------------------------------------------------------
| Mandatory Pages for every digital products
|
 */
// Landing Page Group
Route::view('/', 'pages.home')->name('home');
// Services Group
Route::view('/tutors', 'pages.tutors')->name('tutors');
Route::view('/workshop', 'pages.workshop')->name('workshop');
Route::view('/development', 'pages.development')->name('development');
// About Us Group
Route::view('/about-us', 'pages.about-us')->name('about-us');
Route::view('/frequently-asked-questions', 'pages.frequently-asked-questions')->name('frequently-asked-questions');
Route::view('/terms-and-condition', 'pages.terms-and-condition')->name('terms-and-condition');
Route::view('/privacy-policy', 'pages.privacy-policy')->name('privacy-policy');
/*
|--------------------------------------------------------------------------
 */

/*
|--------------------------------------------------------------------------
| Web generated
|--------------------------------------------------------------------------
| System Generated
|
 */



Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});
