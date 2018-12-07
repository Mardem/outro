function jsonDataTables(url, token, columns = [], resourceRoute) {
    let table = $('#tableDataTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                text: 'Imprimir',
                exportOptions: {
                    columns: ':visible'
                },
                className: 'btn',
                messageTop: 'Obs.: Lembrar que, nas compras ou processos passados no cartão deve ser aplicado um cálculo para reajustar o valor baseado nos juros da máquina de cartão.'
            },
            {
                extend: 'colvis',
                text: "Mostrar ou ocultar colunas",
                className: 'btn'
            }
        ],
        columnDefs: [ {
            targets: -1,
            visible: false
        } ],
        ajax: {
            url: url,
            dataSrc: "",
            headers: {
                Authorization: "Bearer" + token
            }
        },
        responsive: true,
        fixedHeader: true,
        stateSave: true,
        columns: columns,
        drawCallback: function () {
            $('a').unbind('click');
            $('#tableDataTable>tbody>tr>td:last-child>a:first-child').click(function () {
                let tr = $(this).closest('tr');
                let row = table.row(tr).data();
                window.location = route(resourceRoute + '.show', row.id).url();
            });
            $('#tableDataTable>tbody>tr>td:last-child>a:last-child').click(function () {
                let tr = $(this).closest('tr');
                let row = table.row(tr).data();
                $('#deleteData').attr('action', route(resourceRoute + '.destroy', row.id).url()).submit();
            });
        },
        "language": {
            url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
        }
    });
}

function convertDateToBR(data){
    return moment(data).format('DD/M/YYYY');
}