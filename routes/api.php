<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// login and logout root
Route::post('login', [AuthController::class, 'login']);// public root
Route::middleware('auth:sanctum')->get('logout', [AuthController::class, 'logout']);//private root

// api private root
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1','middleware' => 'auth:sanctum'], function() {
        Route::apiResource('players', PlayerController::class);
        Route::apiResource('matches', MatcheController::class);
        Route::apiResource('teams', TeamController::class);
        Route::apiResource('staffs', StaffController::class);
        Route::apiResource('contracts', ContractController::class);
        Route::apiResource('users', UsersController::class);


       

});