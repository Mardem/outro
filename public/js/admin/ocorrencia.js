$(document).ready(function () {

    $.fn.fdatepicker.dates['pt-br'] = {
        days: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado", "Domingo"],
        daysShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb", "Dom"],
        daysMin: ["Do", "Se", "Te", "Qu", "Qu", "Se", "Sa", "Do"],
        months: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
        monthsShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
        today: "Hoje"
    };

    $('#dpn').fdatepicker({
        format: 'dd/mm/yyyy hh:ii:ss',
        disableDblClickSelection: true,
        language: 'pt-br',
        pickTime: true,
        leftArrow:'<<',
        rightArrow:'>>',
        closeIcon:'X'
    });

    $('#data_ocorrencia').fdatepicker({
        format: 'dd/mm/yyyy',
        disableDblClickSelection: true,
        language: 'pt-br',
        pickTime: true,
        leftArrow:'<<',
        rightArrow:'>>'
    });

    $('#situacao').on('change', function () {
        let situacao = $(this).find('option:selected').text().trim();
        if (situacao == 'Agendado') {
            $('#data_hora').show();
        }
        else if (situacao != 'Agendado') {
            $('#data_hora').hide();
        }
    });
});