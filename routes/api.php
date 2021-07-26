<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [ApiAuthController::class, 'logout'])->name('logout');
    Route::get('/books', [BookController::class, 'index']);
    Route::post('/books', [BookController::class, 'store']);
});

Route::post('/login', [ApiAuthController::class, 'login'])->name('login');
Route::post('/registre', [ApiAuthController::class, 'registre'])->name('registre');
// Route::get('/users', [UserController::class, 'index']);
