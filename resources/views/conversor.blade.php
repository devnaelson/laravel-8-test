@include('stack.script')
@stack('scripts-axios')

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @stack('stylesheet')

</head>

<body>

    <div class="container-fluid">

        <header class="currentHeader">
            <div class="row">
                <div class="col-2 text-center p-0 m-0">
                    <label for="dataCota">Data da cotação</label>
                    <input type="text" class="form-control inputDataCota" aria-label="dataCota">
                </div>
            </div>
        </header>

        <hr />

        <div class="row">
            <div class="col-2"></div>
            <div class="col-4"><h3>Conversor de Moedas</h3></div>
        </div>
        
        <article class="op">
            <div class="row">
                <div class="col-2">
                    <label for="myCurrency" class="p-3 m-1">Moeda</label>
                    <select class="form-select  text-center" disabled id="myCurrency">
                        <option value="1">BRL</option>
                    </select>
                </div>
                <div class="col-2">
                    <label for="target_value" class="p-3 m-1">Valor da Compra em BRL</label>
                    <input type="text" class="form-control  text-center" placeholder="XXXXXX" id="target_value">
                </div>
                <div class="col-3">
                    <label for="paymentMethod" class="p-3 m-1">Formas de pagamento...</label>
                    <select class="form-select  text-center" id="paymentMethod">
                        <option value="1.45">Boleto, taxa de 1,45%</option>
                        <option value="7.63">Cartão de crédito, taxa de 7,63%</option>
                    </select>
                </div>
                <div class="col-1">
                    <div class="wIcon">
                        <i class="fas fa-exchange"></i>
                    </div>
                </div>
                <div class="col-2">
                    <label for="label" class="p-3 m-1">Moeda de compra </label>
                    <select class="form-select text-center" id="label targetSelect targetInsertElement">
                        <option value="1">-</option>
                    </select>
                </div>
        </article>

        <div class="resultOne">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-4">
                    <h4>Resultado da conversão</h4>
                    <div class="resStyle">
                        <ul>
                            <li class="liPropriets"> Conversão de: <strong class="text-secondary">Real/BRL (790)</strong></li>
                            <li class="liPropriets"> Valor a converter: <strong class="text-secondary">1,00</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script type="module">
        localStorage.setItem('token_gio', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5NTc1NWYzZS0xN2Q2LTQ3YTctYTg3OS02ZmEzZDI5YTA0ZjQiLCJqdGkiOiIzMjk4Zjk3NTgzMzcwZWM5YTZkMzY4Y2QwY2FlYmY3Yzk0ZTBkMDk0NzRjNDFkOTBhMGY3YmM3NzJlMmZjM2M5N2E0OTQ2ZDU4MGE2OTBmYSIsImlhdCI6MTY0MzMxMzQ5My41MDM0MjcsIm5iZiI6MTY0MzMxMzQ5My41MDM0MjksImV4cCI6MTY3NDg0OTQ5My40OTYzNDcsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.dADAF8f2cBIodG2uq2ELhvgEm8eONGBCfTQNeCeQk6LbwpNgD1kTwuQmQL1Z8S_OZQRp1dCvshzj5gZJMCWxZk7BNk9Ycv9z6TVTrcBYtNsfjRU_L4WgRORH5dKAH6Zbz5MHg3hI3Jl22WQCKb0WHAvNDvQEFhygdD5dPb_RRUMjvFelElgb6MmqqUzX6pKWgfdIb85fYgQiDyNJn-89fw1JvBu6e8cnC5CEjzXVw_pWrb93j_uj7zAiKwkWyfylarTUYXECMLyupqf2JYe57878zBsKOrqKl0cvdQlyQOHysd5wk0i33bKhgmlhuP7B2qqfWtNftCba7ETrn-2qzsX5agjnWVm-fm5s-g1Gh51iapqRQt7KqN07PiNLnRRIF-F3nl1OHq8TQy9YNc8dlY15TIsY7Fs0Fa-6wjg4DHKNgdKbkqpW7wJFhDdnVrBiC2QeoiAJGsJeB8CB4pdSxox2ORUE8LheYnxq0IXWda6hI-O9hNx-AjqBflJNWggislTHahqfXH1RaomOl-Y7JkxVB2idXnOWPNPka3XyzpVxiVX4PpWRgelwEzdvxpiU110IN4W_3Li-iUZSETehh3gJ3qqQ_bGDnkBTHnPMcfqwFrO6_L-35WczFK5E1MLkycZSP_8_KZ_IssFMX9hKbzxy11i1Sjjl5eEC6MFWx_k')

        import request from "{{asset('js/axios.js')}}";
        import config from "{{asset('js/axios.js')}}";

        //Base Url api/v1/ after use only endpoints
        const getCongig = config("{{ url('api/v1/')}}");

        // send request
        getCongig({
            method: 'GET',
            url: "/sAllCurrency", // url: "{{ url('/test/request/validation')}}",
        }).then(function(response) {
            console.log(response.data);
        }).catch(err => console.log(err));

        // getCongig({
        //     method: 'POST',
        //     url: "/None",
        //     data: {
        //         email: 'naelson.x.x@gmail.com',
        //         password: 'xxxxxx'
        //     }
        // }).then(function(response) {
        //     console.log(response.data);
        // }).catch(err => console.log(err));


        // path direct without config
        // request(axios, "{{ url('FullUrl')}}").then(data => {
        //     console.log(data);
        // }).catch(err => console.log(err));
    </script>

</body>

</html>