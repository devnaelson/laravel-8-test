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
                <div class="col-12">
                    <label for="dataCota">Data da cotação</label>
                    <input type="text" class="form-control w-25" aria-label="dataCota">
                </div>
            </div>
        </header>
        <hr />

        <article class="op">
            <div class="row">
                <div class="col-2">
                    <label for="specificSizeSelect">Moeda</label>
                    <select class="form-select" id="specificSizeSelect">
                        <option value="1">BRL</option>
                    </select>
                </div>
                <div class="col-2">
                    <label for="target_value">Valor da Compra em BRL</label>
                    <input type="text" class="form-control" placeholder="XXXXXX" id="target_value">
                </div>
                <div class="col-1">
                    <div class="wIcon">
                        <i class="fas fa-exchange"></i>
                    </div>
                </div>
                <div class="col-2">
                    <label for="ChooseCurrencyDestiny">Moeda de compra </label>
                    <select class="form-select" id="ChooseCurrencyDestiny" id="targetSelect targetInsertElement">
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-3">
                    <label for="paymentMethod">Formas de pagamento...</label>
                    <select class="form-select" id="paymentMethod">
                        <option value="1.45">Boleto, taxa de 1,45%</option>
                        <option value="7.63">Cartão de crédito, taxa de 7,63%</option>
                    </select>
                </div>
        </article>

    </div>

    <script type="module">
        import {
            request
        } from "{{asset('js/axios.js')}}";
        import {
            config
        } from "{{asset('js/axios.js')}}";


        const instance = config("{{ url('api/v1/sAllCurrency')}}");

        //request(axios,"{{ url('test/request')}}").then(data => { console.log(data); }).catch(err => console.log(err));

        /*
        // Send a POST request OK
        instance({
            method: 'post',
            url: "/login",
            data: {
              email: 'naelson.g.saraiva@gmail.com',
              password: 'admin123'
            }
          }).then(function(response){
            console.log(response.data);
          }).catch(err => console.log(err));
        */

        /*
        // Send a POST request OK
          axios({
            method: 'post',
            url: "{{ url('/test/request/validation')}}",
            data: {
              email: 'naelson.g.saraiva@gmail.com',
              password: 'admin123'
            }
          }).then(function(response){
            console.log(response.data);
          }).catch(err => console.log(err));
          */
    </script>

</body>

</html>