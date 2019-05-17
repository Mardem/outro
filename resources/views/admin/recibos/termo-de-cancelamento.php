<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/contracts.css">
</head>

<body>

    <div id="app" class="container mt-2 mb-4">
        <div class="row">
            <div class="col-sm-12">
                <input type="text" v-model="name" placeholder="Nome do sócio">
                <input type="text" v-model="cpf" placeholder="CPF do sócio">
                <input type="text" v-model="value" placeholder="Valor do contrato">
                <input type="text" v-model="valueTyped" placeholder="Valor por extenso">
            </div>
            <div class="col-sm-12 mt-2">
                Formas de pagamento:
                <select v-model="typePayment" multiple class="form-control">
                    <option value="" v-for="payment in typePayments" :value="payment.value">
                        {{ payment.value }}
                    </option>
                </select>

                Parcelas: <input type="text" v-model="plots" placeholder="Quantidade de parcelas">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-12 mt-2">
                <input type="text" placeholder="Telefone" v-model="telephone">
                <input type="text" placeholder="Endereço" v-model="address">
                <input type="text" placeholder="Cidade" v-model="city">
                <input type="text" placeholder="E-mail" v-model="email">
                <input type="text" placeholder="Bairro" v-model="neighborhood">
                <input type="text" placeholder="CEP" v-model="zipcode">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 mt-2">
                <input type="text" placeholder="Operador" v-model="operator">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 mt-2">
                <button class="btn btn-success float-right" id="btn-print">Imprimir</button>
            </div>
        </div>

        <hr>

        <div id="div-print">
            <div class="row mt-3">
                <div class="col-sm-12">
                    <img src="/img/logo-solucao.svg" width="350" class="float-left no-print" id="logoSol"
                        alt="Logo Solução">
                    <img src="/img/ItiquiraPark.svg" class="float-right" id="logoIt" alt="Logo Itiquira Park">
                    <h2 class="float-right"><u><b>CERTIDÃO NEGATIVA DE DÉBITOS</b></u></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    FORMOSA, <b>{{ date }}</b>
                    <p>
                        Vimos por meio desta, informar que o(a) SR(a)
                        <b style="text-transform:uppercase;">{{ name ? name : ' NOME_DO_SOCIO' }}</b><b>, Contrato Nº
                            {{ numberContract }}, e CPF:
                            {{ cpf }}</b>
                        está quitando o valor de R$ {{ value }}
                        (<b style="text-transform: uppercase;">{{ valueTyped ? valueTyped : 'VALOR_EXTENSO' }}</b>),
                        junto
                        ao
                        <b>ITIQUIRA PARK</b>. Referente ao Rateio de Ampliação Patrimonial (parque aquático 1ª ETAPA)
                    </p>

                    <p>
                        <b>
                            Forma de pagamento:
                            {{ typePayment.toString() }}
                        </b>
                    </p>

                    <p>
                        <b>
                            Quantidade de Parcelas: {{ plots }}
                        </b>
                    </p>
                    <p>
                        <b>
                            <u>
                                DECLARAMOS PARA DEVIDOS FINS DE DIREITO, QUE O SÓCIO ACIMA
                                DESCRITO ESTÁ QUITANDO O DÉBITO EM ABERTO REFERENTE AO RATEIO DE
                                AMPLIAÇÃO PATRIMONIAL E ESTÁ QUITADO COM A TAXA DE INVESTIMENTO
                                (PARQUE AQUÁTICO) E GANHA COMO BONIFICAÇÃO:
                            </u>
                        </b>
                    </p>

                    <p class="pl-4">
                        <b>
                            (&nbsp;&nbsp;&nbsp;&nbsp;) <u>CONFECÇÃO GRATUITA DOS CARTÕES DE ACESSO DO SÓCIO E
                                DEPENDENTES DECLARADOS NO PRIMEIRO ANO.</u><br>
                            (&nbsp;&nbsp;&nbsp;&nbsp;) <u>01 DIÁRIA DE CHALÉ PARA CASAL, RESERVA (61)37181502.</u> <br>
                            (&nbsp;&nbsp;&nbsp;&nbsp;) <u>10 CONVITES DAY USER.</u>
                        </b>
                    </p>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col">
                    <p v-if="telephone != ''"><b>TELEFONE:</b> {{ telephone }}</p>
                    <p v-if="address != ''"><b>ENDEREÇO:</b> {{ address }}</p>
                    <p v-if="city != ''"><b>CIDADE:</b> {{ city }}</p>
                    <p v-if="email != ''"><b>EMAIL:</b> {{ email }} </p>
                </div>
                <div class="col">
                    <p v-if="neighborhood != ''"><b>BAIRRO:</b> {{ neighborhood }} </p>
                    <p v-if="zipcode != ''"><b>CEP:</b> {{ zipcode }}</p>
                </div>
            </div>

            <div class="row" style="font-size:14px;">
                <div class="col">
                    <div class="text-center">
                        <p style="text-align: center;">
                            __________________________________________
                        </p>
                        <p style="text-align: center;text-transform: uppercase;">
                            <b>{{ operator }}</b>
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
                            <B>{{ name }}</B>
                        </p>
                    </div>
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
                numberContract: Math.random() + 1,
                cpf: '',
                value: 0,
                valueTyped: '',
                typePayment: [
                    'Selecione a forma'
                ],
                typePayments: [
                    { value: ' À vista' },
                    { value: ' Cartão' },
                    { value: ' Cheque' },
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

        $('#btn-print').on('click', function (event) {
            $.print('#div-print');
        });
    </script>
</body>

</html>