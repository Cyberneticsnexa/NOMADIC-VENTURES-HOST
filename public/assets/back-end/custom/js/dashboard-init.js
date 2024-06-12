var table;
$(document).ready(function () {
    loader();
    var columns = [
        { data: "tour_number" },
        { data: "guest_name" },
        { data: "country_details.country_name", orderable: false },
        // { data: "country_details.nationality", orderable: false },
        { data: "agent_details.name", orderable: false },
        { data: "no_of_visiter" },
        { data: "formated_arrivel_date" },
        { data: "formated_departure_date" },
        { data: "status_badge", orderable: false },
        { data: "amended", orderable: false },
        // { data: "confirmation_pdf", orderable: false, searchable: false },
    ];

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
                    columns: ":not(:last-child)",
                },
            },
            {
                extend: "csv",
                exportOptions: {
                    columns: ":not(:last-child)",
                },
            },
            {
                extend: "excel",
                exportOptions: {
                    columns: ":not(:last-child)",
                },
            },
            {
                extend: "pdf",
                exportOptions: {
                    columns: ":not(:last-child)",
                },
            },
            {
                extend: "print",
                exportOptions: {
                    columns: ":not(:last-child)",
                },
            },
        ],
        lengthMenu: [
            [10, 25, 50, 100],
            [10, 25, 50, 100],
        ],
        columns: columns,
        ajax: {
            url: "/get-tour",
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

$("#year").change(function() {
    loader();
    var value = $("#year").val();
    console.log(value);
    table.columns(1).search(value).draw();
});

$("#month").change(function() {
    loader();
    var value = $("#month").val();
    table.columns(2).search(value).draw();
});
