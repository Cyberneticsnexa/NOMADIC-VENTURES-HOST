var table;
$(document).ready(function () {
    loader();
    var columns = [
        { data: "tour_number" },
        { data: "guest_name" },
        { data: "country_details.country_name", orderable: false },
        { data: "country_details.nationality", orderable: false},
        { data: "agent_details.name", orderable: false },
        { data: "no_of_visiter" },
        { data: "arrivel_date" },
        { data: "departure_date" },
        { data: "status_badge", orderable: false },
        { data: "amended", orderable: false },
        { data: "is_assign", orderable: false },
    ];

    if (is_permission == true) {
        columns.push({ data: "action", orderable: false, searchable: false });
    }

    table = $("#tour-table").DataTable({
        paging: true,
        info: true,
        ordering: true,
        searching: true,
        serverSide: true,
        destroy: true,
        responsive: true,
        order: [[0, "desc"]],
        dom: "lBfrtip",
        buttons: [
            {
                extend: "copy",
                exportOptions: {
                    columns: ":not(:last-child)"
                }
            },
            {
                extend: "csv",
                exportOptions: {
                    columns: ":not(:last-child)"
                }
            },
            {
                extend: "excel",
                exportOptions: {
                    columns: ":not(:last-child)"
                }
            },
            {
                extend: "pdf",
                exportOptions: {
                    columns: ":not(:last-child)"
                }
            },
            {
                extend: "print",
                exportOptions: {
                    columns: ":not(:last-child)"
                }
            }
        ],
        lengthMenu: [
            [10, 25, 50, 100],
            [10, 25, 50, 100],
        ],
        columns: columns,
        ajax: {
            url: "/get-tour-for-transport",
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                _token: token,
            },
            complete: function() {
                removeLoader();
            }
        },
    });
});

$("#project_id").change(function() {
    var value = $("#project_id").val();
    table.columns(1).search(value).draw();
});

$("#status").change(function() {
    var value = $("#status").val();
    table.columns(2).search(value).draw();
});

$("#task_category_id").change(function() {
    var value = $("#task_category_id").val();
    table.columns(3).search(value).draw();
});

$("#developer").change(function() {
    var value = $("#developer").val();
    table.columns(4).search(value).draw();
});

$("#qa").change(function() {
    var value = $("#qa").val();
    table.columns(5).search(value).draw();
});

$("#live").change(function() {
    var value = $("#live").val();
    table.columns(6).search(value).draw();
});
