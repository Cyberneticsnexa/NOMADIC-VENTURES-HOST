let index = 0;
$(document).ready(function () {
    Object.keys(room_info).forEach(categoryId => {
        addRoomInfo(room_info,categoryId);
    });
});

function addRoomInfo(room_info,categoryId) {
    let html =
        '<div class="row mt-2" id="div_' +
        index +
        '">' +
        '<div class="col-md-6 col-xm-12">' +
        '<div class="form-group">' +
        '<label for="room_category_' +
        index +
        '">Room Category</label>' +
        '<select class="form-control select2 room-category" id="room_category_' + index + '" name="room_category[]" style="width: 100%;"' +
        'data-select2-id="1_' +
        index +
        '" aria-hidden="true">' +
        '<option value="">No Select</option>';

        room_category.forEach(element => {
            var is_selected = '';
            if (element.id == categoryId) {
                is_selected = 'selected';
            }
            html += '<option value="' + element.id + '" ' + is_selected + '>' + element.room_category + '</option>';
        });


    html +=
        "</select>" +
        "</div>" +
        "</div>" +
        '<div class="col-md-6 col-xm-12">' +
        '<div class="form-group">' +
        '<label for="room_category_' +
        index +
        '">Room Type</label>' +
        '<select class="form-control select2 room-type" id="room_type_' + index + '" multiple="multiple" name="room_type['+index+'][]" style="width: 100%;"' +
        'data-select2-id="2_' +
        index +
        '" aria-hidden="true">';

        room_type.forEach(element => {
            let is_selected2 = '';
            if(room_info){
                room_info[categoryId].forEach(room => {
                    if (room.room_type_id == element.id) {
                        is_selected2 = 'selected';
                    }
                });
            }
            html += '<option value="' + element.id + '" ' + is_selected2 + '>' + element.room_type + '</option>';
        });


    html += "</select>" + "</div>" + "</div>" + "</div>";

    $("#additional-room-info").append(html);
    index = index + 1;
    $("#room-info-attempt").val(index);
    if (index == 1) {
        $("#remove_room-info").addClass("d-none");
    } else {
        $("#remove_room-info").removeClass("d-none");
    }
    $(".select2").select2();

    $("#update-hotel-form").validate().settings.rules['room_category[]'] = {
        required: true
    };

    for (let i = 0; i < index; i++) {
        $("#update-hotel-form").validate().settings.rules['room_type[' + i + '][]'] = {
            required: true
        };
    }

    if(index == room_category.length ){
        $('#add_room-info-button').addClass('d-none');
    }

}


function removeRoomInfo() {
    let attempt = parseInt($("#room-info-attempt").val());
    if (attempt > 1) {
        $("#additional-room-info").find(".row:last").remove();
        $("#room-info-attempt").val(attempt - 1);
        index = index - 1;
    }
    if(index > 1){
        $("#remove_room-info").removeClass("d-none");
    }
    else{
        $("#remove_room-info").addClass("d-none");
    }
    if(index != room_category.length ){
        $('#add_room-info-button').removeClass('d-none');
    }
}
