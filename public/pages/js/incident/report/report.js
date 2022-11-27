
$(document).ready(function () {

    $('input[type=datetime]').datetimepicker({
        ignoreReadonly: true
    });

    var form = $('form#incident_report');

    var date_from = form.find('input[name=date_from]').data('value');
    if (date_from) {
        $("input[name='date_from']").val(date_from);
    } else {
        $("input[name='date_from']").val(moment().subtract(1, 'week').format('YYYY-MM-DD HH:mm:ss'));
    }

    var date_to = form.find('input[name=date_to]').data('value');
    if (date_to) {
        $("input[name='date_to']").val(date_to);
    } else {
        $("input[name='date_to']").val(moment().format('YYYY-MM-DD HH:mm:ss'));
    }

    var tbl_incidents = $('#incidents_table').dataTable({
        language: {
            emptyTable: "No incidents available",
            info: "Showing _START_ to _END_ of _TOTAL_ incidents",
            infoEmpty: "Showing 0 to 0 of 0 incidents",
            infoFiltered: "(filtered from _MAX_ total incidents)",
            infoPostFix: "",
            thousands: ",",
            lengthMenu: "Show _MENU_ incidents",
            loadingRecords: "<div class='loader slim'></div>",
            processing: "<div class='loader slim'></div>",
            search: "Search incidents:",
            zeroRecords: "No incidents match search criteria"
        },
        order: [
            [9, 'desc']
        ],
    });

    if ($.fn.DataTable.isDataTable(tbl_incidents)) {
        new $.fn.DataTable.Buttons(tbl_incidents, {
            buttons: [
                {
                    extend: 'excel',
                    className: 'btn btn-success btn-circle btn-sm',
                    text: '<i class="fa fa-file-excel-o"></i> Excel',
                    exportOptions: {
                        columns: [1,2,4,5,6,7,9,10,11,13,14,15,16,17]
                    }
                }
            ]
        }).container().appendTo($('div.excel-button'));
    }

});
