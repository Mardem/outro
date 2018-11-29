function jsonDataTables(url, token, columns = [], resourceRoute) {
    let table = $('#tableDataTable').DataTable({
        ajax: {
            url: url,
            dataSrc: "",
            headers: {
                Authorization: token
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