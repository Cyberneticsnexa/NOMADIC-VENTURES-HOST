var selectedRowsData = [];
var dates = [];
var ids = [];

$(document).ready(function () {
    $("#hotel-assign-card").addClass("d-none");
    $('select[name="hotel"]').prop("disabled", true);
    // $('select[name="room_category[]"]').prop("disabled", true);
    $("#add_room-info-button").addClass("d-none");
    $("#remove_room-info").addClass("d-none");

    var table = $("#tour-schedule-table").DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        order: [[1, 'asc']],
        dom: 'Bfrtip',
        buttons: ["copy", "csv", "excel", "pdf", "print"],
        columnDefs: [
            {
                targets: 0,
                orderable: false,
                searchable: false,
            },
        ],
    });


    // table
    //     .buttons()
    //     .container()
    //     .appendTo("#tour-schedule-table_wrapper .col-md-6:eq(0)");

    $("#tour-schedule-table tbody").on(
        "change",
        'input[type="checkbox"]',
        function () {
            var $row = $(this).closest("tr");
            var data = table.row($row).data();
            var index = selectedRowsData.findIndex(
                (item) => JSON.stringify(item) === JSON.stringify(data)
            );

            if (this.checked) {
                if (index === -1) {
                    selectedRowsData.push(data);
                    dates.push(data[7]);
                    ids.push(parseInt(data[1], 10));
                    $row.addClass("selected");
                }
            } else {
                if (index !== -1) {
                    selectedRowsData.splice(index, 1);
                    dates.splice(index, 1);
                    ids.splice(index, 1);
                    $row.removeClass("selected");
                }
            }

            if (selectedRowsData.length > 0) {
                $("#hotel-assign-card").removeClass("d-none");
            } else {
                $("#hotel-assign-card").addClass("d-none");
            }
        }
    );


});

function getHotels(city) {
    console.log(dates);
    console.log(ids);
    var city_id = $(city).val();
    getHotelForCity(city_id);
}

function getHotelForCity(city_id) {
    $.ajax({
        type: "POST",
        url: "/get-hotel-for-city",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            _token: token,
            city_id: city_id,
        },
        success: function (response) {
            if (response.success == true) {
                setHotel(response.data);
            }
        },
    });
}

function setHotel(hotel_details) {
    if (hotel_details.length > 0) {
        ajaxTempMsg("success", "Hotel is available !");
        $('select[name="hotel"]').prop("disabled", false);
    } else {
        ajaxTempMsg("error", "Hotel not available !");
        $('select[name="hotel"]').prop("disabled", true);
    }

    var html = '<option value="">No Select</option>';
    $.each(hotel_details, function (index, element) {
        html +=
            '<option value="' +
            element.id +
            '">' +
            element.hotel_name +
        ("</option>");
    });
    $('select[name="hotel"]').html(html);
}

var hotel_id;
var rooms_detail;
let index = 0;
function getRooms(hotel) {
    $("#additional-room-info").html("");
    $("#add_room-info-button").addClass("d-none");
    $("#remove_room-info").addClass("d-none");
    hotel_id = $(hotel).val();
    getRoomsForHotel(hotel_id);
}

function getRoomsForHotel(hotel_id) {
    $.ajax({
        type: "POST",
        url: "/get-rooms-for-hotel",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            _token: token,
            hotel_id: hotel_id,
        },
        success: function (response) {
            if (response.success == true) {
                rooms_detail = response.data;
                if (rooms_detail["room_category"].length > 0) {
                    ajaxTempMsg("success", "Room Category is available !");
                    $("#add_room-info-button").removeClass("d-none");
                    $("#basis_selection").removeClass("d-none");
                    addRoomInfo();
                } else {
                    ajaxTempMsg("error", "Room Category not available !");
                    $("#add_room-info-button").addClass("d-none");
                }
            }
        },
    });
}

function addRoomInfo() {
    let html =
        '<div class="row mt-2">' +
        // '<input type="text" name="date" value="' +
        // dates +
        // '" hidden>' +
        '<input type="text" name="ids" value="' +
        ids +
        '" hidden>' +
        '<div class="col-md-4 col-xm-12">' +
        '<div class="form-group">' +
        '<label for="room_category_' +
        index +
        '">Room Category</label>' +
        '<select class="form-control select2 room-category" id="room_category_' +
        index +
        '" onchange="getRoomType(this, ' +
        index +
        ')" name="room_category[]" style="width: 100%;">' +
        '<option value="">No Select</option>';

    html +=
        "</select>" +
        "</div>" +
        "</div>" +
        '<div class="col-md-4 col-xm-12">' +
        '<div class="form-group">' +
        '<label for="room_type_' +
        index +
        '">Room Type</label>' +
        '<select class="form-control select2 room-type" id="room_type_' +
        index +
        '" name="room_type[]" style="width: 100%;">' +
        '<option value="">No Select</option>';

    html += "</select>" + "</div>" + "</div>";

    html +=
        '<div class="col-md-4 col-xm-12">' +
        '<div class="form-group">' +
        '<label for="rooms_count_' +
        index +
        '">Rooms Count</label>' +
        '<input type="number" class="form-control rooms-count" id="rooms_count_' +
        index +
        '" name="rooms_count[]" style="width: 100%;">' +
        "</div>" +
        "</div>" +
        "</div>";
    $("#additional-room-info").append(html);

    $(".select2").select2();

    $('select[name="room_type[]"]').prop("disabled", true);

    setRoomsCategory();

    index = index + 1;
    $("#room-info-attempt").val(index);

    if (index > 1) {
        $("#remove_room-info").removeClass("d-none");
        $("#basis_selection").removeClass("d-none");
    } else {
        $("#remove_room-info").addClass("d-none");
    }
}

function removeRoomInfo() {
    let attempt = parseInt($("#room-info-attempt").val());
    if (attempt > 1) {
        $("#additional-room-info").find(".row:last").remove();
        $("#room-info-attempt").val(attempt - 1);
        index = index - 1;
    }
    if (index > 1) {
        $("#remove_room-info").removeClass("d-none");
    } else {
        $("#remove_room-info").addClass("d-none");
    }
    // if (index != room_category.length) {
    //     $("#add_room-info-button").removeClass("d-none");
    // }
}

function setRoomsCategory() {
    var html = '<option value="">No Select</option>';
    $.each(rooms_detail["room_category"], function (index, element) {
        html +=
            '<option value="' +
            element.id +
            '">' +
            element.room_category +
            "</option>";
    });
    $('select[name="room_category[]"]').html(html);
}

function getRoomType(category, index) {
    $('select[name="room_type[]"]').prop("disabled", false);
    var category_id = $(category).val();
    var html = '<option value="">No Select</option>';
    $.each(rooms_detail["room_type"], function (index, element) {
        $.each(element, function (index2, element2) {
            if (category_id == element2.room_category_id) {
                html +=
                    '<option value="' +
                    element2.room_type_details.id +
                    '">' +
                    element2.room_type_details.room_type +
                    "</option>";
            }
        });
    });
    $("#room_type_" + index).html(html);
}
function confirmReservation(tour_schedule_id,tour_id, tour_number, hotel_name, hotel_id,start_date) {
    $("#confirmation_details").empty();
    $("#hotelConfirmationModalLabel").text(
        "Hotel Confirmation Details: " + tour_number
    );
    var modal = $("#hotel-confirmation");

    var html =
        `<input type="text" class="form-control" name="tour_schedule_id" value="` +
        tour_schedule_id +
        `" hidden>`;

    html +=
        `<input type="text" class="form-control" name="tour_id" value="` +
        tour_id +
        `" hidden>`;

    html +=
        `<input type="date" class="form-control" name="start_date" value="` +
        start_date +
        `" hidden>`;

    html +=
        `<div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label id="tour_id">` +
        hotel_name +
        `</label>
                    <input type="text" class="form-control" name="hotel_id" value="` +
        hotel_id +
        `" hidden>
                    <input type="text" class="form-control" id="confirmation_number"
                        name="confirmation_number" placeholder="Confirmation Number">
                </div>
            </div>
        </div>`;
    $("#confirmation_details").append(html);
    modal.modal("show");
}


function printReservatonVoucher(tour_schedule_id,tour_number,date) {
    $("#hotelReservationModalLabel").text(
        "Hotel Reservation Details : " + tour_number
    );
    var modal = $("#hotel-reservation");
    modal.find('[name="tour_schedule_id"]').val(tour_schedule_id);
    modal.find('[name="tour_schedule_start_date"]').val(date);
    modal.modal("show");
}
