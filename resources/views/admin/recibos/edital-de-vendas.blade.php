<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Recibo - Edital de Vendas</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/contracts.css">
</head>

<body>

    <div id="app" class="container mt-2 mb-4">
        <form action="{{ route('receipt.insertLog') }}" method="POST" id="form-insert-log">
            <input type="hidden" name="number_of_serie" :value="numberSerie">
            <input type="hidden" name="type" value="{{ \App\Models\ReceiptLogs::TYPE['EDITAL_DE_VENDAS'] }}">
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
                        <label for="value">Valor do contrato</label>
                        <input type="text" v-model="value" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="telephone">Telefone para contato</label>
                        <input type="text" v-model="telephone" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="operator">Operador</label>
                        <input type="text" v-model="operator" class="form-control" name="operator" :value="operator">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-12 mt-2">
                    <a href="#" class="btn btn-success float-right" id="btn-print">Imprimir</a>
                </div>
            </div>
        </form>

        <hr>

        <div id="div-print">
            <div class="row mt-3">
                <div class="col-sm-12">
                    <img src="/img/logo-solucao.svg" width="350" class="float-left no-print" id="logoSol"
                        alt="Logo Solução">
                    <img src="/img/ItiquiraPark.svg" class="float-right" id="logoIt" alt="Logo Itiquira Park">
                    <div class="float-right">
                        <h2 class="text-center"><u><b>AUTORIZAÇÃO P/ PUBLICAÇÃO DE VENDAS </b></u></h2>
                        <h5><u><b>n° serie: @{{ numberSerie }}</b></u></h5>
                    </div>
                </div>
            </div>

            <div class="ed-box">
                <div class="row">
                    <div class="col-sm-12">
                        <b>FORMOSA, @{{ date }}</b>
                        <p>
                            Declaramos para todos os fins de direito que o(a) SR(a) <b>@{{ name }}</b>,
                            proprietário(a) do título Nº <b>@{{ numberContract }}</b>, neste ato a colocar seus títulos
                            em
                            EDITAL DE VENDAS. O clube não se responsabiliza pelo valor da venda.
                        </p>
                        <h3 class="text-center font-weight-bold">PREFERENCIAL DE VENDA</h3>
                        <p class="mt-2 text-center">
                            Valor do título: <b>R$ @{{ value }}</b>
                        </p>
                        <p>
                            Telefone para contato: <b>@{{ telephone }}</b>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <p class="text-center">
                            __________________________________________
                        </p>
                        <p class="text-center">
                            <b>@{{ name }}</b><br>
                            <b>Responsável</b>
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
                value: '',
                telephone: '',
            }
        });

        $('#btn-print').on('click', function(event) {
            $.print('#div-print');
        });
    </script>
</body>

</html>