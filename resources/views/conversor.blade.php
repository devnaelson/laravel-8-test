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

    </div>

    <script type="module">
        import request from "{{asset('js/axios.js')}}";
        import config from "{{asset('js/axios.js')}}";

        const getCongig = config("{{ url('api/v1/')}}"); //Base Url api/v1/ after use only endpoints

        // send request
        getCongig({
            method: 'GET',
            url: "/sAllCurrency",
            // url: "{{ url('/test/request/validation')}}",
            data: {
                email: 'naelson.g.saraiva@gmail.com',
                password: 'admin123'
            }
        }).then(function(response) {
            console.log(response.data);
        }).catch(err => console.log(err));

        /*
        path direct without config
        request(axios, "{{ url('FullUrl')}}").then(data => {
            console.log(data);
        }).catch(err => console.log(err));
         */
    </script>

</body>

</html>