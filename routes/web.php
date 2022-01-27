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

Route::get('test', [TestController::class, 'index']);

Route::get('/guzzle', function () {


    //Informar uma moeda de compra que não seja BRL (exibir no mínimo 2 opções);
    //Valor da Compra em BRL (deve ser maior que R$ 1.000,00 e menor que R$ 100.000,00)
    //Formas de pagamento (taxas aplicadas no valor da compra e aceitar apenas as opções abaixo)
    /* 
        [-] Para pagamentos em boleto, taxa de 1,45%
        [-] Para pagamentos em cartão de crédito, taxa de 7,63%
    */
    //Aplicar taxa de 2% pela conversão para valores abaixo de R$ 3.000,00 e 1% para valores maiores que R$ 3.000,00, essa taxa deve ser aplicada apenas no valor da compra e não sobre o valor já com a taxa de forma de pagamento.


    $res = Http::get('https://economia.awesomeapi.com.br/json/last/USD-BRL,EUR-BRL,BTC-BRL');
    $bought_value = "1.000.00";

?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>Covnersão</title>
    </head>

    <body>


        <div class="container">
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="First name" aria-label="First name">
                </div>
                <div class="col">
                    <label class="visually-hidden" for="specificSizeSelect">Preference</label>
                    <select class="form-select" id="specificSizeSelect">
                        <option value="1">BRL</option>
                    </select>
                </div>
                <div class="col">
                    <i class="fas fa-exchange"></i>
                </div>
                <div class="col">
                    <label class="visually-hidden" for="specificSizeSelect">Preference</label>
                    <select class="form-select" id="specificSizeSelect">
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
        </div>
        <br>
        <script>

        </script>
    </body>

    </html>


<?php


    echo "<pre>";
    dd($res->json());
    echo "</pre>";
});

Route::get('/', function () {
    return view('welcome');
});
