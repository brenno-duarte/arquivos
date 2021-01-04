<?php
#7d4fd7cf-d87c-4d2d-a199-c2bce77fe4e6f184b8e748a7805838a6752e1172c34398e4-ca28-4391-b061-fb6e1c2a23dc
$url = "https://ws.sandbox.pagseguro.uol.com.br/v2/sessions?email=brennoduarte2015@outlook.com&token=D7A8BD0D525742F885BA3EEB77ECFD04";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
$response = curl_exec($ch);
// echo curl_getinfo($ch) . '<br/>';
// echo curl_errno($ch) . '<br/>';
// echo curl_error($ch) . '<br/>';
curl_close($curl);

$session = simplexml_load_string($response);

#var_dump($session->id);
?>

<html>
<meta charset="utf-8">

<head>
    <title>Checkout Transparente PagSeguro</title>
    <script type="text/javascript"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="text-center">
        <h1 class="text-center">CHECKOUT TRANSPARENTE DEMO - PAGSEGURO [SANDBOX]</h1>
        <hr>
    </div>

    <form action="dados.php" method="POST" id="checkoutForm">
        <!-- <fieldset>
        <div class="row mx-md-n5">
            <div class="col px-md-5">
                <div class="p-3 border bg-light">
                    <legend class="text-center">GERAR SENDERHASH</legend>
                    <div>
                        <input class="form-control" type="text" id="senderHash" class="creditcard" name="senderHash">
                        <button class="btn btn-info" id="generateSenderHash">Gerar</button>
                    </div>
                </div>
            </div>
    </fieldset> -->
        <fieldset>
            <legend class="text-center">DADOS DA COMPRA</legend>
            <div class="row mx-md-n5">
                <div class="col px-md-5">
                    <div class="p-3 border bg-light">
                        <div class="row">
                            <div class="col-sm-4">
                                <div>
                                    <label for="paymentMethod" <b>Método de pagamento</b></label>
                                    <input type="text" class="form-control" id="paymentMethod" name="paymentMethod" value="creditCard">
                                </div>
                                <div>
                                    <label for="receiverEmail" <b>E-mail da loja</b></label>
                                    <input type="text" class="form-control" id="receiverEmail" name="receiverEmail" value="brennoduarte2015@outlook.com">
                                </div>
                                <div>
                                    <label for="currency" <b>Moeda de pagamento</b></label>
                                    <input type="text" class="form-control" id="currency" name="currency" value="BRL">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div>
                                    <label for="extraAmount" <b>Desconto ou taxa</b></label>
                                    <input type="text" class="form-control" id="extraAmount" name="extraAmount" value="0.00">
                                </div>
                                <div>
                                    <label for="itemId1" <b>ID do item</b></label>
                                    <input type="text" class="form-control" id="itemId1" name="itemId1" value="1">
                                </div>
                                <div>
                                    <label for="itemDescription1" <b>Descrição do item</b></label>
                                    <input type="text" id="itemDescription1" class="form-control" name="itemDescription1" value="Notebook prata">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div>
                                    <label for="itemAmount1" <b>Preço do item</b></label>
                                    <input type="text" class="form-control" id="itemAmount1" name="itemAmount1" value="4300.00">
                                </div>
                                <div>
                                    <label for="itemQuantity1" <b>Quantidade do item</b></label>
                                    <input type="text" id="itemQuantity1" class="form-control" name="itemQuantity1" value="1">
                                </div>
                                <div>
                                    <label for="notificationURL" <b>URL de notificação</b></label>
                                    <input type="text" id="notificationURL" class="form-control" name="notificationURL" value="https://sualoja.com.br/notifica.html">
                                </div>
                                <div>
                                    <label for="reference" <b>Reference do item</b></label>
                                    <input type="text" id="reference" class="form-control" name="reference" value="REF1234">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </fieldset>
        <br>
        <fieldset>
            <legend class="text-center">DADOS DO COMPRADOR</legend>
            <div class="row mx-md-n5">
                <div class="col px-md-5">
                    <div class="p-3 border bg-light">
                        <div class="row">
                            <div class="col-sm-6">
                                <div>
                                    <label for="senderName" <b>Nome</b></label>
                                    <input type="text" class="form-control" id="senderName" name="senderName" value="Jose Comprador">
                                </div>
                                <div>
                                    <label for="birthDate" <b>Data de nascimento</b></label>
                                    <input type="text" class="form-control" id="birthDate" name="birthDate" value="04/01/1999">
                                </div>
                                <div>
                                    <label for="senderCPF" <b>CPF</b></label>
                                    <input type="text" class="form-control" id="senderCPF" name="senderCPF" value="22111944785">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <label <b>Telefone</b></label>

                                    <div class="form-inline">
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="senderAreaCode" name="senderAreaCode" value="88">
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="senderPhone" name="senderPhone" value="56273440">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label for="senderEmail" <b>E-mail</b></label>
                                    <input type="text" class="form-control" id="senderEmail" name="senderEmail" value="suporte@sandbox.pagseguro.com.br">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </fieldset>
        <br>
        <fieldset>
            <legend class="text-center">ENDEREÇO DE ENTREGA</legend>
            <div class="row mx-md-n5">
                <div class="col px-md-5">
                    <div class="p-3 border bg-light">
                        <div class="row">
                            <div class="col-sm-4">
                                <div>
                                    <label for="shippingAddressRequired" <b>Entrega</b></label>
                                    <input type="text" class="form-control" id="shippingAddressRequired" name="shippingAddressRequired" value="true">
                                </div>
                                <div>
                                    <label for="shippingAddressStreet" <b>Logradouro</b></label>
                                    <input type="text" class="form-control" id="shippingAddressStreet" name="shippingAddressStreet" value="Av. Brig. Faria Lima">
                                </div>
                                <div>
                                    <label for="shippingAddressNumber" <b>Número</b></label>
                                    <input type="text" class="form-control" id="shippingAddressNumber" name="shippingAddressNumber" value="1384">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div>
                                    <label for="shippingAddressComplement" <b>Complemento</b></label>
                                    <input type="text" class="form-control" id="shippingAddressComplement" name="shippingAddressComplement" value="5o andar">
                                </div>
                                <div>
                                    <label for="shippingAddressDistrict" <b>Bairro</b></label>
                                    <input type="text" class="form-control" id="shippingAddressDistrict" name="shippingAddressDistrict" value="Jardim Paulistano">
                                </div>
                                <div>
                                    <label for="shippingAddressPostalCode" <b>CEP</b></label>
                                    <input type="text" id="shippingAddressPostalCode" class="form-control" name="shippingAddressPostalCode" value="01452002">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div>
                                    <label for="shippingAddressCity" <b>Cidade</b></label>
                                    <input type="text" class="form-control" id="shippingAddressCity" name="shippingAddressCity" value="Sao Paulo">
                                </div>
                                <div>
                                    <label for="shippingAddressState" <b>Estado</b></label>
                                    <input type="text" id="shippingAddressState" class="form-control" name="shippingAddressState" value="SP">
                                </div>
                                <div>
                                    <label for="shippingAddressCountry" <b>País</b></label>
                                    <input type="text" id="shippingAddressCountry" class="form-control" name="shippingAddressCountry" value="BRA">
                                </div>
                                <div>
                                    <label for="shippingType" <b>Frete</b></label>
                                    <input type="radio" id="shippingType" name="shippingType" value="1"> PAC
                                    <input type="radio" id="shippingType" name="shippingType" value="2"> SEDEX
                                    <input type="radio" id="shippingType" name="shippingType" value="3" checked> SEM FRETE
                                </div>
                                <div>
                                    <label for="shippingCost" <b>Valor do frete</b></label>
                                    <input type="text" id="shippingCost" class="form-control" name="shippingCost" value="0.00">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </fieldset>
        <br>
        <fieldset>
            <legend class="text-center">ENDEREÇO DO CARTÃO</legend>
            <div class="row mx-md-n5">
                <div class="col px-md-5">
                    <div class="p-3 border bg-light">
                        <div class="row">
                            <div class="col-sm-4">
                                <div>
                                    <label for="billingAddressStreet" <b>Logradouro</b></label>
                                    <input type="text" class="form-control" id="billingAddressStreet" name="billingAddressStreet" value="Av. Brig. Faria Lima">
                                </div>
                                <div>
                                    <label for="billingAddressNumber" <b>Número</b></label>
                                    <input type="text" class="form-control" id="billingAddressNumber" name="billingAddressNumber" value="1384">
                                </div>
                                <div>
                                    <label for="billingAddressComplement" <b>Complemento</b></label>
                                    <input type="text" class="form-control" id="billingAddressComplement" name="billingAddressComplement" value="5o andar">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div>
                                    <label for="billingAddressDistrict" <b>Bairro</b></label>
                                    <input type="text" class="form-control" id="billingAddressDistrict" name="billingAddressDistrict" value="Jardim Paulistano">
                                </div>
                                <div>
                                    <label for="billingAddressPostalCode" <b>CEP</b></label>
                                    <input type="text" id="billingAddressPostalCode" class="form-control" name="billingAddressPostalCode" value="01452002">
                                </div>
                                <div>
                                    <label for="billingAddressCity" <b>Cidade</b></label>
                                    <input type="text" class="form-control" id="billingAddressCity" name="billingAddressCity" value="Sao Paulo">
                                </div>
                            </div>
                            <div class="col-sm-4">

                                <div>
                                    <label for="billingAddressState" <b>Estado</b></label>
                                    <input type="text" id="billingAddressState" class="form-control" name="billingAddressState" value="SP">
                                </div>
                                <div>
                                    <label for="billingAddressCountry" <b>País</b></label>
                                    <input type="text" id="billingAddressCountry" class="form-control" name="billingAddressCountry" value="BRA">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </fieldset>
        <br>
        <fieldset>
            <legend class="text-center">DADOS DO CARTÃO DE CRÉDITO</legend>
            <div class="row mx-md-n5">
                <div class="col px-md-5">
                    <div class="p-3 border bg-light">
                        <div class="row">
                            <div class="col-sm-4">
                                <div>
                                    <label for="creditCardHolderName" <b>Nome do cartão:</b></label>
                                    <input type="text" class="form-control" id="creditCardHolderName" class="creditcard" name="creditCardHolderName" value="Jose Comprador">
                                </div>
                                <div>
                                    <label for="creditCardHolderBirthDate" <b>Data de nascimento:</b></label>
                                    <input type="text" class="form-control" id="creditCardHolderBirthDate" class="creditcard" name="creditCardHolderBirthDate" value="27/10/1987">
                                </div>
                                <div>
                                    <label for="creditCardNumber" <b>Número do cartão:</b></label>
                                    <input type="text" class="form-control" id="creditCardNumber" class="creditcard" name="creditCardNumber" value="5217384012386393">
                                </div>
                                <div>
                                    <label for="creditCardBrand" <b>Bandeira:</b></label>
                                    <input type="text" class="form-control" id="creditCardBrand" class="creditcard" name="creditCardBrand" readonly>
                                    <span id="imgBrand"></span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div>
                                    <label for="creditCardExpMonth" <b>Validade Mês (mm):</b></label>
                                    <input type="text" class="form-control" id="creditCardExpMonth" class="creditcard" name="creditCardExpMonth" size="2" value="12"> &nbsp;
                                </div>
                                <div>
                                    <label for="creditCardExpYear" <b>Ano (yyyy):</b></label>
                                    <input type="text" class="form-control" id="creditCardExpYear" class="creditcard" name="creditCardExpYear" size="4" value="2022">
                                </div>
                                <div>
                                    <label for="creditCardHolderCPF" <b>CPF do cartão:</b></label>
                                    <input type="text" class="form-control" id="creditCardHolderCPF" class="creditcard" name="creditCardHolderCPF" value="22111944785">
                                </div>

                                <label <b>Telefone:</b></label>

                                <div class="form-inline">
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="creditCardHolderAreaCode" class="creditcard" name="creditCardHolderAreaCode" value="11">
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="creditCardHolderPhone" class="creditcard" name="creditCardHolderPhone" value="56273440">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div>
                                    <label for="creditCardCvv" <b>CVV:</b></label>
                                    <input type="text" class="form-control" id="creditCardCvv" class="creditcard" name="creditCardCvv" value="698">
                                </div>
                                <label <b>Token:</b></label>
                                <input type="text" id="creditCardToken" class="form-control" name="creditCardToken" readonly>
                                <button type="button" class="btn btn-info" id="generateCreditCardToken">Gerar Token</button>
                            </div>
                        </div>
                    </div>
                </div>
        </fieldset>
        <br>
        <fieldset>
            <legend class="text-center">PARCELAMENTO</legend>
            <div class="row mx-md-n5">
                <div class="col px-md-5">
                    <div class="p-3 border bg-light">
                        Valor do Checkout: <input class="form-control" type="text" id="checkoutValue" name="checkoutValue" value="4300.00">
                        <button type="button" class="btn btn-info" id="installmentCheck">Ver Parcelamento</button>
                        </p>
                        <p>
                            <select id="InstallmentCombo" name="installmentAmount">
                                <option value="" disabled selected>Selecione</option>
                            </select>
                        </p>

                        <p>
                            <input class="form-control" type="text" id="parcelValue" name="parcelValue" readonly>
                        </p>
                    </div>
                </div>
        </fieldset>
        <br>
        <fieldset>
            <legend class="text-center">BANDEIRAS</legend>
            <div class="row mx-md-n5">
                <div class="col px-md-5">
                    <div class="p-3 border bg-light">
                        <button class="btn btn-info" onclick="getPaymentMethods();">Métodos de pagamento</button>
                        <div>
                            <span id="brand"></span>
                        </div>
                    </div>
                </div>
        </fieldset>
        <br>
        <fieldset>
            <div class="row mx-md-n5 mb-5">
                <div class="col px-md-5">
                    <div class="p-3 border bg-light">
                        <label>Senderhash</label>
                        <input class="form-control" type="text" id="senderHash" class="creditcard" name="senderHash" readonly>
                        <button type="submit" class="btn btn-success" id="generateSenderHash">Finalizar</button>
                    </div>
                </div>
        </fieldset>
    </form>
</body>

<script src="jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<script>
    $(document).ready(function() {
        /*$("#checkoutForm").on("submit", function(e) {
            e.preventDefault;

            /*var creditCardBrand = $("#creditCardBrand").val()
            var cardNumber = $("#creditCardNumber").val()
            var cvv = $("#creditCardCvv").val()
            var expirationMonth = $("#creditCardExpMonth").val()
            var expirationYear = $("#creditCardExpYear").val()
            var checkoutValue = $("#checkoutValue").val()
            var parcelValue = $("#parcelValue").val()

            console.log(creditCardBrand)
            console.log(cardNumber)
            console.log(cvv)
            console.log(expirationMonth)
            console.log(expirationYear)
            console.log(checkoutValue)
            console.log(parcelValue)
            
            //console.log(checkoutForm)

            var checkoutForm = $("#checkoutForm").serialize()

            $.ajax({
                'url': 'http://localhost/testePHP/pagamento/dados.php',
                'method': 'POST',
                'data': checkoutForm,
                'dataType': 'json',
                success: function (data) {
                    console.log(data)
                },
                error: function (error) {
                    console.log(error)
                }
            })
        })*/

        $('#InstallmentCombo').on('change', function() {
            var installmentAmount = $(this).val();
            $('#parcelValue').val(installmentAmount);
        });
    })

    //Session ID
    PagSeguroDirectPayment.setSessionId('<?= $session->id ?>');
    console.log('<?= $session->id ?>');

    //Get SenderHash
    $("#generateSenderHash").click(function() {
        PagSeguroDirectPayment.onSenderHashReady(function(response) {
            if (response.status == 'error') {
                console.log(response.message);
                return false;
            }
            //Hash estará disponível nesta variável.
            $("#senderHash").val(response.senderHash);
        });

    })

    //Get CreditCard Brand and check if is Internationl
    $("#creditCardNumber").keyup(function() {
        if ($("#creditCardNumber").val().length >= 6) {
            PagSeguroDirectPayment.getBrand({
                cardBin: $("#creditCardNumber").val().substring(0, 6),
                success: function(response) {
                    console.log(response);
                    $("#creditCardBrand").val(response['brand']['name']);
                    $("#creditCardCvv").attr('size', response['brand']['cvvSize']);
                    $("#imgBrand").html("<img src='https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/42x20/" + response['brand']['name'] + ".png'>")
                },
                error: function(response) {
                    console.log(response);
                }
            })
        };
    })

    function printError(error) {
        $.each(error['errors'], (function(key, value) {
            console.log("Foi retornado o código " + key + " com a mensagem: " + value);
        }));
    }

    function getPaymentMethods() {
        PagSeguroDirectPayment.getPaymentMethods({
            amount: 500.00,
            success: function(response) {
                //console.log(JSON.stringify(response));
                console.log(response);
                $("#brand").append("<p>Cartão de crédito</p>")
                $.each(response.paymentMethods.CREDIT_CARD.options, function(i, obj) {
                    $("#brand").append("<img src='https://stc.pagseguro.uol.com.br" + obj.images.SMALL.path + "'>")
                })

                $("#brand").append("<p>Boleto</p>")
                $("#brand").append("<img src='https://stc.pagseguro.uol.com.br" + response.paymentMethods.BOLETO.options.BOLETO.images.SMALL.path + "'>")

                $("#brand").append("<p>Débito online</p>")
                $.each(response.paymentMethods.ONLINE_DEBIT.options, function(i, obj) {
                    $("#brand").append("<img src='https://stc.pagseguro.uol.com.br" + obj.images.SMALL.path + "'>")
                })

                $("#brand").append("<p>Deposito</p>")
                $.each(response.paymentMethods.DEPOSIT.options, function(i, obj) {
                    $("#brand").append("<img src='https://stc.pagseguro.uol.com.br" + obj.images.SMALL.path + "'>")
                })
            },
            error: function(response) {
                console.log(JSON.stringify(response));
            }
        })
    }

    //Generates the creditCardToken
    $("#generateCreditCardToken").click(function() {
        var param = {
            cardNumber: $("#creditCardNumber").val(),
            cvv: $("#creditCardCvv").val(),
            expirationMonth: $("#creditCardExpMonth").val(),
            expirationYear: $("#creditCardExpYear").val(),
            success: function(response) {
                console.log(response);
                $("#creditCardToken").val(response['card']['token']);
            },
            error: function(response) {
                console.log(response);
                printError(response);
            }
        }

        //parâmetro opcional para qualquer chamada
        if ($("#creditCardBrand").val() != '') {
            param.brand = $("#creditCardBrand").val();
        }

        PagSeguroDirectPayment.createCardToken(param);
    })

    //Check installment
    $("#installmentCheck").click(function() {
        if ($("#creditCardBrand").val() != '') {
            getInstallments();
        } else {
            alert("Uma bandeira deve estar selecionada");
        }
    })

    function getInstallments() {
        var brand = $("#creditCardBrand").val();
        PagSeguroDirectPayment.getInstallments({
            amount: $("#checkoutValue").val().replace(",", "."),
            brand: brand,
            maxInstallmentNoInterest: 12, //calculo de parcelas sem juros
            success: function(response) {
                var installments = response['installments'][brand];
                buildInstallmentSelect(installments);
            },
            error: function(response) {
                console.log(response);
            }
        })
    }

    function buildInstallmentSelect(installments) {
        $.each(installments, (function(key, value) {
            //$("#InstallmentCombo").append("<option value = " + value['quantity'] + ">" + value['quantity'] + "x de " + value['installmentAmount'].toFixed(2) + " - Total de <span class='totalAmount'>" + value['totalAmount'].toFixed(2) + "</span></option>");
            $("#InstallmentCombo").append("<option value = " + value['installmentAmount'].toFixed(2) + ">" + value['quantity'] + "x de " + value['installmentAmount'].toFixed(2) + " - Total de " + value['totalAmount'].toFixed(2) + "</option>");
        }))
    }
</script>

</html>