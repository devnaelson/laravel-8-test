<?php

use App\Http\Controllers\API\PeoplesController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AllExchange;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use PeterPetrus\Auth\PassportToken;
use Illuminate\Support\Facades\DB;

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

Route::get('test', [TestController::class, 'index']);

Route::get('list', [AllExchange::class, 'TODO']);
Route::get('/exchange', function () {
    return view('trade');
});

Route::get('/showProviders', function () {
    dd(app());
});

Route::get('/guzzle', function (Request $request) {
    $res = Http::get('https://economia.awesomeapi.com.br/json/all');
    return $res->json();
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/testEmail', function () {

    $token = new PassportToken(
        'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5NTg0ZWMyNy05OTUxLTQ0YWItYTcyZC0xOTYxYzNmZmYyMWUiLCJqdGkiOiI4YTkwM2JjM2Y2MGI0YTczNmE1NTFiMTkyMDcwYjY4ZjBkNmQ4NTc2ZmFkY2NkNjc1NDE2YjA4MjZhMjMzMTQxNTY4OTI0MWJjOThjMWQ4NyIsImlhdCI6MTY0Mzk4MTMyMi43OTAwNzcsIm5iZiI6MTY0Mzk4MTMyMi43OTAwODIsImV4cCI6MTY3NTUxNzMyMi43ODM5NjMsInN1YiI6IjIiLCJzY29wZXMiOltdfQ.mlO3Xh-TiJJFNtI2pCObZKT9eNjJZQZgsBxF67FvDyUnbPuTSXL0WUyyCUw4Rp28a77_V2qwJNQsjmPZbCR-LrISDUsdNzjC_tANNGrLJD7fULPHWCXfCBIWAyd0DdwzjUUZpvUd54ZLaMwEGXAOZ0AYWkpWoyteloVSJWRkv1FrM573SDB6o_kHCv_kMkdWRkn2gLbepy61VOeuCZS8ahRAvnN7mRG_nBfhRx-mkHeVcZJoof8hCmTTdgx0pqTBTcJA4rpuiHDX5QidMhS0jcSox8Z-ewH3jrIsq4-NCJW2NgMcSNpQjCzGKRn6sdr-56Dxubj4ZhMcwH2QqOIywFDzC3oey6IdFl1onVUhINUxtXyFfp8uT93o4RJY_3R-zIu87CCk-uv5-P_P5pNVAFHMSIPk8RPUc2fRkT46RnydbeQfxtACDWLQB2CiWHMk2o8iai2YV8UXrm-Ci5ZA-_jFCEmWSo_BBFtA6PKbJCoR-HT54Rl1ILycbK9rF-X7A6jrqf9cyR-yTCo7K5-EWPQyIzdT3WOCR91I0i6z_q6Phn9bhCtav2xk0x0R7a7k9ZkXwENdLoAWYVN6cji5FxR63t93da8HdT_H6eaoT9ymR8bLGyxHCZaNyPqBboktxHDo3BgVv7azAF1_b8NW8eILQ_F1r6QX7cDOJMOQV3s'
    );
    echo $token->email;

    $hexchange = DB::select('SELECT * FROM hexchange limit 1');
    //return view('mail.test-mail');
});

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/send-mail', [MailController::class, 'sendEmail']);
