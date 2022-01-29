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

        <header class="currentHeader" id="transform">
            <div class="row">
                <div class="col-2 text-center p-0 m-0">
                    <label for="dataCota">Data da cotação</label>
                    <input type="text" class="form-control inputDataCota text-center" aria-label="dataCota" id="dataCota">
                </div>
            </div>
        </header>

        <hr />

        <div class="row">
            <div class="col-2"></div>
            <div class="col-4">
                <h3>Conversor de Moedas</h3>
            </div>
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
                    <input type="text" class="form-control  text-center" id="target_value">
                </div>
                <div class="col-3">
                    <label for="paymentMethod" class="p-3 m-1">Formas de pagamento...</label>
                    <select class="form-select  text-center" id="paymentMethod">
                        <option value="0"></option>
                        <option value='{"val": "1.45","type":"boleto"}'>Boleto, taxa de 1,45%</option>
                        <option value='{"val":"7.63","type":"card"}'>Cartão de crédito, taxa de <strong>1,45</strong>%</option>
                    </select>
                </div>
                <div class="col-1">
                    <div class="wIcon">
                        <i class="fas fa-exchange"></i>
                    </div>
                </div>
                <div class="col-2">
                    <label for="label" class="p-3 m-1">Moeda de compra </label>
                    <select class="form-select text-center" id="targetSelect">
                        <option value="0"></option>
                    </select>
                </div>
        </article>

        <div class="resultOne">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-4">
                    <h4>Resultado da conversão</h4>
                    <div class="resStyle">
                        <ul id="showRes">
                            <li class="liPropriets"> Conversão origim: <strong class="text-secondary" id="coverOrigem">-</strong></li>
                            <li class="liPropriets"> Conversão destino: <strong class="text-secondary" id="coverDestiny">-</strong></li>
                            <li class="liPropriets"> Conversão valor: <strong class="text-secondary" id="coverValor">-</strong></li>
                            <li class="liPropriets"> Valor Moeda destino: <strong class="text-secondary" id="valCurrencyDestiny">-</strong></li>
                            <li class="liPropriets"> Valor Comprado: <strong class="text-secondary" id="valBuyedDestiny">-</strong></li>
                            <li class="liPropriets"> Taxa metodo pagamento: <strong class="text-secondary" id="ratePaymentMethod">-</strong></li>
                            <li class="liPropriets"> Taxa Conversão maior menor: <strong class="text-secondary" id="rateConversion">-</strong></li>
                            <li class="liPropriets"> Taxa Valor disconto metodo pagamento: <strong class="text-secondary" id="valDiscontOfTypePay">-</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script type="module">
        $(function() {
            $('#target_value').maskMoney();
        })

        import request from "{{asset('js/axios.js')}}";
        import config from "{{asset('js/axios.js')}}";

        //Base Url api/v1/ after use only endpoints
        const getCongig = config("{{ url('api/v1/')}}");

        // send request
        getCongig({
            method: 'GET',
            url: (1) ? "/sAllCurrency" : "{{ url('api/v1/sAllCurrency')}}",
        }).then(function(response) {

            Object.keys(response.data).forEach(function(key, offset) {

                let volate = {
                    'type': response.data[key].code,
                    'ask': response.data[key].ask,
                    'bid': response.data[key].bid,
                    'high': response.data[key].high,
                    'low': response.data[key].low
                };

                let elementCurrency = document.getElementById('targetSelect');
                const createSelect = document.createElement("option");

                createSelect.innerText = response.data[key].code;
                createSelect.value = JSON.stringify(volate);
                elementCurrency.appendChild(createSelect);

            });

        }).catch(err => console.log(err));

        //payment-method
        var value_pay = 0;
        let elpaymentMethod = document.getElementById('paymentMethod');
        elpaymentMethod.addEventListener('change', function() {
            var inter_pay = this.options[this.selectedIndex].value;
            value_pay = JSON.parse(inter_pay);
            console.log(value_pay);
        });

        //currency
        var value_currency = 0;
        let elementCurrency = document.getElementById('targetSelect');
        elementCurrency.addEventListener('change', function() {
            var inter_currency = this.options[this.selectedIndex].value;
            value_currency = JSON.parse(inter_currency);
            console.log(value_currency);
        });

        setInterval(function() {

            //value
            var input = document.getElementById('target_value');
            let formatedVAl = input.value;
            let unformated = formatedVAl.replaceAll(",", "");

            let dataToConvert = {
                inputValue: undefined,
                methodPayment: undefined,
                currency: undefined,
            };

            dataToConvert.inputValue = unformated;
            dataToConvert.methodPayment = value_pay;
            dataToConvert.currency = value_currency;

            AlertConditional(formatedVAl, unformated, function(action) {
                if (action.active() == true) {
                    input.style.backgroundColor = "#CC0000";
                    input.style.color = "white";
                } else {

                    input.style.backgroundColor = "green";
                    input.style.color = "white";

                    if (!dataToConvert.methodPayment == 0 && !dataToConvert.currency == 0) {

                        // send request
                        getCongig({
                            method: 'POST',
                            url: (1) ? "/convert" : "{{ url('api/v1/convert')}}",
                            data: {
                                price: dataToConvert.inputValue,
                                md_payment: dataToConvert.methodPayment,
                                product_cur: dataToConvert.currency
                            }
                        }).then(function(response) {

                            console.log(response);
                            Object.keys(response.data).forEach(function(key, offset) {

                                if (key == 'cur_origim') document.getElementById('coverOrigem').innerHTML = response.data[key];
                                if (key == 'cur_destiny') document.getElementById('coverDestiny').innerHTML = response.data[key];
                                if (key == 'val_input') document.getElementById('coverValor').innerHTML = response.data[key];
                                if (key == 'mhd_payment') document.getElementById('valCurrencyDestiny').innerHTML = response.data[key];
                                if (key == 'val_cur_destiny') document.getElementById('valBuyedDestiny').innerHTML = response.data[key];
                                if (key == 'val_buy') document.getElementById('ratePaymentMethod').innerHTML = response.data[key];
                                if (key == 'rate_payment') document.getElementById('rateConversion').innerHTML = response.data[key];
                                if (key == 'rate_conversion') document.getElementById('valDiscontOfTypePay').innerHTML = response.data[key];

                            });

                        }).catch(err => console.log(err));

                    }
                }
            });

            console.log(dataToConvert);

        }, 1000)

        function AlertConditional(formatedVAl, valCalculater, callback) {
            if (formatedVAl.length > 0) {
                let info_module = {
                    msg: undefined,
                    active() {
                        if (this.msg != undefined)
                            return true;
                        else return false;
                    },
                };
                if (valCalculater < 1000.00) {
                    info_module.msg = "Valor menor que" + formatedVAl + " not allowed";
                    callback(info_module);
                } else {
                    if (valCalculater > 100000.00) {
                        info_module.msg = "Valor maior que " + formatedVAl + " not allowed";
                        callback(info_module);
                    } else if (valCalculater <= 100000.00 && valCalculater >= 1000.00) {
                        info_module.msg = undefined;
                        callback(info_module);
                    }
                }
            }
        }

        var currentdate = new Date();
        var datetime = currentdate.getDate() + "/" + (currentdate.getMonth() + 1) + "/" + currentdate.getFullYear();
        document.getElementById('dataCota').value = datetime;
    </script>

</body>

</html>