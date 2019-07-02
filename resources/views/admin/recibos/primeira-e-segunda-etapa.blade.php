<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Recibo - 1ª e 2ª Etapa</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/contracts.css">
</head>

<body>

    <div id="app" class="container mt-2 mb-4">
        <form action="{{ route('receipt.insertLog') }}" method="POST" id="form-insert-log">
            <input type="hidden" name="number_of_serie" :value="numberSerie">
            <input type="hidden" name="type" value="{{ \App\Models\ReceiptLogs::TYPE['PRIMEIRA_E_SEGUNDA_ETAPA'] }}">
            @csrf
            <div class="row mb-4">
                <div class="col"><a href="../recibos" class="btn btn-info">Voltar para Recibos</a></div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="name">Nome do Sócio</label>
                        <input type="text" v-model="name" class="form-control" name="name" :value="name">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="cpf">CPF do Sócio</label>
                        <input type="text" v-model="cpf" class="form-control" name="cpf" :value="cpf">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="number_of_contract">N° do Contrato</label>
                        <input type="text" v-model="numberContract" class="form-control" name="number_of_contract"
                            :value="numberContract">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="value">Valor do Contrato</label>
                        <input type="text" v-model="value" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="valueTyped">Valor por Extenso</label>
                        <input type="text" v-model="valueTyped" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="typePayment">Formas de pagamento:</label>
                        <select v-model="typePayment" multiple class="form-control">
                            <option value="" v-for="payment in typePayments" :value="payment.value">
                                @{{ payment.value }}
                            </option>
                        </select>


                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="plots">Quantidade de Parcelas</label>
                        <input type="text" v-model="plots" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="telephone">Telefone</label>
                        <input type="text" v-model="telephone" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="address">Endereço</label>
                        <input type="text" v-model="address" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="city">Cidade</label>
                        <input type="text" v-model="city" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" v-model="email" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="neighborhood">Bairro</label>
                        <input type="text" v-model="neighborhood" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="zipcode">CEP</label>
                        <input type="text" v-model="zipcode" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="operator">Operador</label>
                        <input type="text" v-model="operator" class="form-control" name="operator" :value="operator">
                    </div>
                </div>
                <div class="col">
                    <a href="#" class="btn btn-success float-right" id="btn-print">Imprimir</a>
                </div>
            </div>


            <div id="div-print">
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <img src="/img/logo-solucao.svg" width="350" class="float-left no-print" id="logoSol"
                            alt="Logo Solução">
                        <img src="/img/ItiquiraPark.svg" class="float-right" id="logoIt" alt="Logo Itiquira Park">
                        <div class="float-right">
                            <h2><u><b>CERTIDÃO NEGATIVA DE DÉBITOS</b></u></h2>
                            <h5><u><b>n° serie: @{{ numberSerie }}</b></u></h5>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <b>FORMOSA, @{{ date }}</b>
                        <p>
                            Vimos por meio desta, informar que o(a) SR(a)
                            <b style="text-transform:uppercase;">@{{ name ? name : ' NOME_DO_SOCIO' }}</b><b>, Contrato
                                Nº
                                @{{ numberContract }} e CPF,
                                @{{ cpf }}</b>
                            está quitando o valor de R$ @{{ value }} (<b
                                style="text-transform: uppercase;">@{{ valueTyped ? valueTyped : 'VALOR_EXTENSO' }}</b>),
                            junto
                            ao
                            <b>ITIQUIRA PARK</b>. Referente ao Rateio de Ampliação Patrimonial (parque aquático
                            “1ª ETAPA” e piscina de ondas “2ª ETAPA”).
                        </p>

                        <p>
                            <b>
                                Forma de pagamento:
                                @{{ typePayment.toString() }}
                            </b>
                        </p>

                        <p>
                            <b>
                                Quantidade de Parcelas: @{{ plots }}
                            </b>
                        </p>
                        <p>
                            <b>
                                <u>
                                    DECLARAMOS PARA DEVIDOS FINS DE DIREITO, QUE O SÓCIO ACIMA
                                    DESCRITO ESTÁ QUITANDO O DÉBITO EM ABERTO REFERENTE AO RATEIO DE
                                    AMPLIAÇÃO PATRIMONIAL E ESTÁ QUITADO COM A TAXA DE INVESTIMENTO
                                    (PARQUE AQUÁTICO E PISCINA DE ONDAS) E GANHA COMO BONIFICAÇÃO:
                                </u>
                            </b>
                        </p>

                        <p class="pl-4">
                            <b>
                                (&nbsp;&nbsp;&nbsp;&nbsp;) <u>CONFECÇÃO GRATUITA DOS CARTÕES DE ACESSO DO SÓCIO E
                                    DEPENDENTES
                                    DECLARADOS NO PRIMEIRO ANO.</u><br>
                                (&nbsp;&nbsp;&nbsp;&nbsp;) <u>01 DIÁRIA DE CHALÉ PARA CASAL, RESERVA (61)37181502.</u>
                                <br>
                                (&nbsp;&nbsp;&nbsp;&nbsp;) <u>10 CONVITES DAY USER.</u>
                            </b>
                        </p>
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col">
                        <p v-if="telephone != ''" style="margin-bottom:0;"><b>TELEFONE:</b> @{{ telephone }}</p>
                        <p v-if="address != ''" style="margin-bottom:0;"><b>ENDEREÇO:</b> @{{ address }}</p>
                        <p v-if="city != ''" style="margin-bottom:0;"><b>CIDADE:</b> @{{ city }}</p>
                        <p v-if="email != ''" style="margin-bottom:0;"><b>EMAIL:</b> @{{ email }} </p>
                    </div>
                    <div class="col">
                        <p v-if="neighborhood != ''" style="margin-bottom:0;"><b>BAIRRO:</b> @{{ neighborhood }} </p>
                        <p v-if="zipcode != ''" style="margin-bottom:0;"><b>CEP:</b> @{{ zipcode }}</p>
                    </div>
                </div>

                <div class="row" style="font-size:14px;">
                    <div class="col">
                        <div class="text-center">
                            <p style="text-align: center;">
                                __________________________________________
                            </p>
                            <p style="text-align: center;text-transform: uppercase;">
                                <b>@{{ operator }}</b>
                            </p>
                            <p style="text-align: center;">
                                <b><u>
                                        SOLUÇÃO ÚTIL ASSESSORIA <span class="ml-3">CNPJ: 15.798.326/0001-83</span>
                                    </u></b>
                            </p>
                            <p style="text-align: center;">
                                <b><u>
                                        ESTÂNCIA ÁGUAS DO ITIQUIRA <span class="ml-3">CNPJ: 02.551.257/0001-67</span>
                                    </u></b>
                            </p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center">
                            <p style="text-align: center;">
                                __________________________________________
                            </p>
                            <p style="text-align: center;text-transform: uppercase;">
                                <B>@{{ name }}</B>
                            </p>
                            <p style="text-align: center;">
                                <b><u>
                                        RESPONSÁVEL
                                    </u></b>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col mt-3">
                        Este recibo só terá validade a partir do pagamento das parcelas, sejam elas cheque, cartão ou outros.
                    </div>
                </div>
            </div>
    </div>

    <script src="/js/vue.js"></script>
    <script src="/js/moment.js"></script>
    <script src="/js/pt-br.js"></script>
    <script src="/js/jQuery.min.js"></script>
    <script src="/js/jQuery.print.min.js"></script>
    <script>
        let date = moment().locale('pt-br');

        new Vue({
            el: '#app',
            data: {
                name: '',
                date: date.format('LL'),
                numberSerie: Math.random() + 1,
                numberContract: '',
                cpf: '',
                value: 0,
                valueTyped: '',
                typePayment: [
                    'Selecione a forma'
                ],
                typePayments: [{
                        value: ' À vista'
                    },
                    {
                        value: ' Cartão'
                    },
                    {
                        value: ' Cheque'
                    },
                ],
                plots: 0,
                telephone: '',
                address: '',
                city: '',
                email: '',
                neighborhood: '',
                zipcode: '',
                operator: ''
            }
        });

        insertLogCallBack = function() {
            $('#form-insert-log').submit();
        };

        $('#btn-print').on('click', function(event) {
            $('#div-print').print({
                deferred: $.Deferred().done(insertLogCallBack)
            })
        });
    </script>
</body>

</html>
