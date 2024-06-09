$(document).ready(function () {
    $('select[name="guide"]').prop("disabled", true);
    $('select[name="vehical"]').prop("disabled", true);
    $('select[name="hotel"]').prop("disabled", true);
    // $('select[name="room_category[]"]').prop("disabled", true);
    $('#add_room-info-button').addClass('d-none');
    $('#remove_room-info').addClass('d-none');
});

function getGuide(language) {
    var language_id = $(language).val();
    getGuideForLanguage(language_id);
}

function getGuideForLanguage(language_id) {
    $.ajax({
        type: "POST",
        url: "/get-guide-for-language",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            _token: token,
            language_id: language_id,
        },
        success: function (response) {
            if (response.success == true) {
                setGuide(response.data);
            }
        },
    });
}

function setGuide(guide_details) {
    if (guide_details.length > 0) {
        $('select[name="guide"]').prop("disabled", false);
        ajaxTempMsg("success", "Guide is available !");
    } else {
        $('select[name="guide"]').prop("disabled", true);
        ajaxTempMsg("error", "Guide not available !");
    }
    var html = '<option value="">No Select</option>';
    $.each(guide_details, function (index, element) {
        html +=
            '<option value="' +
            element.id +
            '">' +
            element.short_name +
            "</option>";
    });
    $('select[name="guide"]').html(html);
}

function getVehical(vehical_type) {
    var type_id = $(vehical_type).val();
    getVehicalForType(type_id);
}

function getVehicalForType(type_id) {
    $.ajax({
        type: "POST",
        url: "/get-vehical-for-type",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            _token: token,
            type_id: type_id,
        },
        success: function (response) {
            if (response.success == true) {
                setVehical(response.data);
            }
        },
    });
}

function setVehical(vehical_details) {
    if (vehical_details.length > 0) {
        ajaxTempMsg("success", "Vehical is available !");
        $('select[name="vehical"]').prop("disabled", false);
    } else {
        ajaxTempMsg("error", "Vehical not available !");
        $('select[name="vehical"]').prop("disabled", true);
    }

    var html = '<option value="">No Select</option>';
    $.each(vehical_details, function (index, element) {
        html +=
            '<option value="' +
            element.id +
            '">' +
            element.vehical_model +
            " - " +
            element.vehical_no +
            "</option>";
    });
    $('select[name="vehical"]').html(html);
}

function getHotels(city) {
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
            " - " +
            element.rate +
            " Star";
        ("</option>");
    });
    $('select[name="hotel"]').html(html);
}

var hotel_id;
var rooms_detail;
let index = 0;
function getRooms(hotel) {
    $("#additional-room-info").html('');
    $('#add_room-info-button').addClass('d-none');
    $('#remove_room-info').addClass('d-none');
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
                if (rooms_detail['room_category'].length > 0) {
                    ajaxTempMsg("success", "Room Category is available !");
                    $('#add_room-info-button').removeClass('d-none');
                    addRoomInfo();
                } else {
                    ajaxTempMsg("error", "Room Category not available !");
                    $('#add_room-info-button').addClass('d-none');
                }
            }
        },
    });
}


function addRoomInfo() {
    let html =
        '<div class="row mt-2">' +
            '<div class="col-md-3 col-xm-12">' +
                '<div class="form-group">' +
                    '<label for="room_category_' + index + '">Room Category</label>' +
                    '<select class="form-control select2 room-category" id="room_category_' + index + '" onchange="getRoomType(this, ' + index + ')" name="room_category[]" style="width: 100%;">' +
                        '<option value="">No Select</option>';

    html +=
                    '</select>' +
                '</div>' +
            '</div>' +
            '<div class="col-md-3 col-xm-12">' +
                '<div class="form-group">' +
                    '<label for="room_type_' + index + '">Room Type</label>' +
                    '<select class="form-control select2 room-type" id="room_type_' + index + '" name="room_type[]" style="width: 100%;">' +
                        '<option value="">No Select</option>';

    html +=
                    '</select>' +
                '</div>' +
            '</div>' +
            '<div class="col-md-3 col-xm-12">' +
                '<div class="form-group">' +
                    '<label for="basis_' + index + '">Basis</label>' +
                    '<select class="form-control select2 room-type" id="basis_' + index + '" name="basis[]" style="width: 100%;">' +
                        '<option value="">No Select</option>';
    basis.forEach(element => {
        html +=  '<option value="'+element.id+'">'+element.title+'</option>';

    });

    html +=
                    '</select>' +
                '</div>' +
            '</div>' +
            '<div class="col-md-3 col-xm-12">' +
                '<div class="form-group">' +
                    '<label for="rooms_count_' + index + '">Rooms Count</label>' +
                        '<input type="number" class="form-control rooms-count" id="rooms_count_' + index + '" name="rooms_count[]" style="width: 100%;">' +
                '</div>' +
            '</div>' +
        '</div>';
    $("#additional-room-info").append(html);

    $(".select2").select2();

    $('select[name="room_type[]"]').prop("disabled", true);

    setRoomsCategory();

    index = index + 1;
    $("#room-info-attempt").val(index);

    if (index > 1) {
        $("#remove_room-info").removeClass("d-none");
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
    if (index != room_category.length) {
        $("#add_room-info-button").removeClass("d-none");
    }
}

function setRoomsCategory() {
    var html = '<option value="">No Select</option>';
    $.each(rooms_detail['room_category'], function (index, element) {
        html +=
            '<option value="' +
            element.id +
            '">' +
            element.room_category +
            "</option>";
    });
    $('select[name="room_category[]"]').html(html);
}


function getRoomType(category,index){
    $('select[name="room_type[]"]').prop("disabled", false);
    var category_id = $(category).val();
    var html = '<option value="">No Select</option>';
    $.each(rooms_detail['room_type'], function (index, element) {
        $.each(element, function (index2, element2) {
            if(category_id == element2.room_category_id){
                html +=
                        '<option value="' +
                        element2.room_type_details.id +
                        '">' +
                        element2.room_type_details.room_type +
                        "</option>";
            }
        });
    });
    $('#room_type_' + index).html(html);
}
