(function() {

    $("#telefones").tagsinput('items');
    // Inseri máscara no CEP
    $("#cep").inputmask({
        mask: ["99999-999"],
        keepStatic: true
    });
    $("#cpf").inputmask({
        mask: ["999.999.999-99"],
        keepStatic: true
    });

    $('input[name="cep"]').blur(function(e) {
        let cep = $('input[name="cep"]').val() || '';

        if (!cep) {
            return
        }

        let url = 'http://viacep.com.br/ws/' + cep + '/json';
        $.getJSON(url, function(data) {
            if ("error" in data) {
                return
            }
            $('input[name="endereco"]').val(data.logradouro);
            $('input[name="bairro"]').val(data.bairro);
            $('input[name="cidade"]').val(data.localidade);
            $('input[name="uf"]').val(data.uf);
            $('input[name="complemento"]').val(data.complemento);
        })
    });
    
})();