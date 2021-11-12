<?php

use App\Http\Controllers\API\PeoplesController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

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

Route::get('/test', [TestController::class, 'index']);


Route::get('/guzzle', function () {

    $res = Http::get('https://api.github.com/user', ['auth' =>  ['NaelsonBrasil', 'Repo123+']]);
    echo $res->getStatusCode(); // 200
    echo $res->getBody(); // { "type": "User", ....
});


Route::get('', function () {
    echo "asas";
       return view('welcome');
});
