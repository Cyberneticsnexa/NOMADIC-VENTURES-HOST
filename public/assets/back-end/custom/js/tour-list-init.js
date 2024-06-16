var table;
$(document).ready(function () {
    loader();
    var columns = [
        { data: "tour_number" },
        { data: "guest_name" },
        { data: "country_details.country_name", orderable: false },
        { data: "country_details.nationality", orderable: false },
        { data: "agent_details.name", orderable: false },
        { data: "no_of_visiter" },
        { data: "arrivel_date" },
        { data: "departure_date" },
        { data: "status_badge", orderable: false },
        // { data: "confirmation_pdf", orderable: false, searchable: false },
    ];

    if (is_permission_change_action == true || is_permission_view_tour_schedule == true || is_permission_edit == true || is_permission_cancel == true) {
        columns.push({ data: "action", orderable: false, searchable: false });
    }
    columns.push();

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

function completeTour(id, tour_number, status) {
    getHotelsDetails(id, tour_number, status);
}

function getHotelsDetails(tour_id, tour_number, status) {
    $.ajax({
        type: "POST",
        url: "/get-hotels-for-tour",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            _token: token,
            tour_id: tour_id,
        },
        success: function (response) {
            if (response.success == true) {
                console.log(response);
                setConfirmationFields(response.data, tour_number,status,tour_id);
            }
        },
    });
}

