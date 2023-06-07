<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomFieldController;
use App\Http\Controllers\OptionsController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CategoryController;
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

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::group(['prefix' => 'auth'], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::post('sss', [AuthController::class, 'sss']);
});

Route::group(['prefix' => 'blog'], function ($router) {
    // Route::post('create', [CustomFieldController::class, 'create']);
    Route::post('create', [BlogsController::class, 'createBlog']);
});
Route::group(['prefix' => 'category'], function ($router) {
    Route::post('create', [CategoryController::class, 'create']);
    Route::post('delete', [CategoryController::class, 'destroy']);
    Route::post('update', [CategoryController::class, 'update']);
});
Route::group(['prefix' => 'options'], function ($router) {
    Route::post('homepage', [OptionsController::class, 'updateHomeOptions']);
});
