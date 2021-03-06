<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\PeoplesController;
use App\Models\People;

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


Route::prefix('v1')->group(function () {

  Route::post('register', [RegisterController::class, 'register']);
  Route::post('login', [RegisterController::class, 'login']);

  #Route::resource('peoples', People::class);
  Route::middleware('token_auth')->group(function () {
    Route::post('test', [TestController::class, 'index']);
    Route::post('create', [PeoplesController::class, 'store']);
    Route::get('selectAll', [PeoplesController::class, 'all']);
    Route::post('selectBy', [PeoplesController::class, 'one']);
    Route::post('deleteAll', [PeoplesController::class, 'deleteAll']);
    Route::post('update', [PeoplesController::class, 'update']);
  });
});
