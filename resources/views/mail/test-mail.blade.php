@include('stack.script')
<!DOCTYPE html>
<html>

<head>
    <title></title>
    @stack('stylesheet')
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-4">
                <h4>Resultado da conversão
                </h4>
                <div class="resStyle">
                    <ul id="showRes">
                        <li class="liPropriets"> Moeda de origem: BRL: <strong class="text-secondary" id="coverOrigem">-</strong></li>
                        <li class="liPropriets"> Moeda de destino: USD: <strong class="text-secondary" id="coverDestiny">-</strong></li>
                        <li class="liPropriets"> Valor para conversão: <strong class="text-secondary" id="coverValor">-</strong></li>
                        <li class="liPropriets"> Forma de pagamento: <strong class="text-secondary" id="methodPayment">-</strong></li>
                        <li class="liPropriets"> Valor da "Moeda de destino" usado para conversão: <strong class="text-secondary" id="valCurrencyDestiny">-</strong></li>
                        <li class="liPropriets"> Valor comprado em "Moeda de destino": <strong class="text-secondary" id="valBuyedDestiny">-</strong></li>
                        <li class="liPropriets"> Taxa de pagamento: <strong class="text-secondary" id="ratePaymentMethod">-</strong></li>
                        <li class="liPropriets"> Taxa Conversão maior menor: <strong class="text-secondary" id="rateConversion">-</strong></li>
                        <li class="liPropriets"> Valor utilizado para conversão descontando as taxas: <strong class="text-secondary" id="valDiscontOfTypePay">-</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

</html>