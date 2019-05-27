<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="<?php echo (csrf_token()) ?>">
    <title>Recibo - Termo de Cancelamento</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/contracts.css">
</head>

<body>

    <div id="app" class="container mt-2 mb-4">
        <form action="{{ route('receipt.insertLog') }}" method="POST" id="form-insert-log">
            <input type="hidden" name="number_of_serie" :value="numberSerie">
            <input type="hidden" name="type" value="{{ \App\Models\ReceiptLogs::TYPE['TERMO_DE_CANCELAMENTO'] }}">
            @csrf
            <div class="row mb-4">
                <div class="col"><a href="../recibos" class="btn btn-info">Voltar para Recibos</a></div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="name">Nome do Sócio</label>
                        <input type="text" v-model="name" name="name" class="form-control" :value="name">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="cpf">CPF do Sócio</label>
                        <input type="text" v-model="cpf" name="cpf" class="form-control" :value="cpf">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="number_of_contract">N° do Contrato</label>
                        <input type="text" v-model="numberContract" class="form-control" name="number_of_contract"
                            :value="numberContract">
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
                        <input type="text" v-model="operator" name="operator" class="form-control" :value="operator">
                    </div>
                </div>
                <div class="col">
                    <a href="#" class="btn btn-success float-right" id="btn-print">Imprimir</a>
                </div>
            </div>
        </form>

        <div id="div-print">
            <div class="row mt-3">
                <div class="col-sm-12">
                    <img src="/img/logo-solucao.svg" width="350" class="float-left no-print" id="logoSol"
                        alt="Logo Solução">
                    <img src="/img/ItiquiraPark.svg" class="float-right" id="logoIt" alt="Logo Itiquira Park">
                </div>
                <div class="col">
                    <h2 class="text-center font-normal"><u><b>TERMO DE CANCELAMENTO</b></u></h2>
                    <h5><u><b>n° serie: @{{ numberSerie }}</b></u></h5>
                </div>
            </div>
            <div class="mb-5">
                <div class="col-sm-12">
                    FORMOSA-GO, <b>@{{ date }}</b>
                    <div class="row border mb-4">
                        <div class="col-8">
                            Nome: <b style="text-transform:uppercase;">@{{ name ? name : ' NOME_DO_SOCIO' }}</b>
                        </div>
                        <div class="col-4 border-left">
                            CPF: <b style="text-transform:uppercase;">@{{ cpf }}</b>
                        </div>
                    </div>

                    <div class="row border mb-4">
                        <div class="col-7">
                            <b>End.</b><b style="text-transform:uppercase;"> @{{ address }}</b>
                        </div>
                        <div class="col-1 border-left"></div>
                        <div class="col-3 border-left">
                            <b style="text-transform:uppercase;">@{{ neighborhood }}</b>
                        </div>
                    </div>

                    <div class="row border mb-4">
                        <div class="col-4">
                            @{{ city }}</b>
                        </div>
                        <div class="col-4 border-left">
                            <b style="text-transform:uppercase;">cep: @{{ zipcode }}</b>
                        </div>
                        <div class="col-4 border-left">
                            <b style="text-transform:uppercase;">fone: @{{ telephone }}</b>
                        </div>
                    </div>

                    <div class="row border mb-5">
                        <div class="col">
                            Declaramos para todos os fins que o sócio acima descrito compareceu a nossa sede,
                            para efetuar o cancelamento do contrato N° <b>@{{ numberContract }}</b> e que a partir desta
                            data as partes
                            nada têm a reclamar em tempo algum. O mesmo declara neste ato que está cancelando o Título,
                            por livre
                            e espontânea vontade, que não quer mais pertencer ao quadro de associados.
                        </div>
                    </div>
                    <div class="row border">
                        <div class="col text-center font-normal">
                            <b style="text-transform:uppercase;">sem onus</b>
                        </div>
                    </div>
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
                telephone: '',
                address: '',
                city: '',
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