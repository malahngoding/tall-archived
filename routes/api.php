<?php

use App\Http\Controllers\AddProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ListProfileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SignUpController;
use App\Models\SignUpModel;
use Symfony\Component\HttpKernel\Profiler\Profile;

use App\Http\Controllers\UserController;
use App\Http\Controllers\WallOfMessageController;
use App\Models\User;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware -> auth:sanctum'], function () {
});
