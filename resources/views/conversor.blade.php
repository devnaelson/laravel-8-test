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
                        <option value='{"val":"7.63","type":"card"}'>Cartão de crédito, taxa de 7,63%</option>
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
        $(function() {
            $('#target_value').maskMoney();
        })
        //Valor da Compra em BRL (deve ser maior que R$ 1.000,00 e menor que R$ 100.000,00) alert se > x ou < x

        localStorage.setItem('token_gio', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5NTc1NWYzZS0xN2Q2LTQ3YTctYTg3OS02ZmEzZDI5YTA0ZjQiLCJqdGkiOiIzMjk4Zjk3NTgzMzcwZWM5YTZkMzY4Y2QwY2FlYmY3Yzk0ZTBkMDk0NzRjNDFkOTBhMGY3YmM3NzJlMmZjM2M5N2E0OTQ2ZDU4MGE2OTBmYSIsImlhdCI6MTY0MzMxMzQ5My41MDM0MjcsIm5iZiI6MTY0MzMxMzQ5My41MDM0MjksImV4cCI6MTY3NDg0OTQ5My40OTYzNDcsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.dADAF8f2cBIodG2uq2ELhvgEm8eONGBCfTQNeCeQk6LbwpNgD1kTwuQmQL1Z8S_OZQRp1dCvshzj5gZJMCWxZk7BNk9Ycv9z6TVTrcBYtNsfjRU_L4WgRORH5dKAH6Zbz5MHg3hI3Jl22WQCKb0WHAvNDvQEFhygdD5dPb_RRUMjvFelElgb6MmqqUzX6pKWgfdIb85fYgQiDyNJn-89fw1JvBu6e8cnC5CEjzXVw_pWrb93j_uj7zAiKwkWyfylarTUYXECMLyupqf2JYe57878zBsKOrqKl0cvdQlyQOHysd5wk0i33bKhgmlhuP7B2qqfWtNftCba7ETrn-2qzsX5agjnWVm-fm5s-g1Gh51iapqRQt7KqN07PiNLnRRIF-F3nl1OHq8TQy9YNc8dlY15TIsY7Fs0Fa-6wjg4DHKNgdKbkqpW7wJFhDdnVrBiC2QeoiAJGsJeB8CB4pdSxox2ORUE8LheYnxq0IXWda6hI-O9hNx-AjqBflJNWggislTHahqfXH1RaomOl-Y7JkxVB2idXnOWPNPka3XyzpVxiVX4PpWRgelwEzdvxpiU110IN4W_3Li-iUZSETehh3gJ3qqQ_bGDnkBTHnPMcfqwFrO6_L-35WczFK5E1MLkycZSP_8_KZ_IssFMX9hKbzxy11i1Sjjl5eEC6MFWx_k')

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
                            // Object.keys(response.data).forEach(function(key, offset) {});

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