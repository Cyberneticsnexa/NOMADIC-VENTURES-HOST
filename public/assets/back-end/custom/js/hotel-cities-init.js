$("#hotel-cities-table")
    .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["csv"],
    })
    .buttons()
    .container()
    .appendTo("#hotel-cities-table_wrapper .col-md-6:eq(0)");

function editHotelCity(div) {
    Swal.fire({
        title: "Are you sure?",
        text: "Do you want edit this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, edit it!",
    }).then((result) => {
        if (result.isConfirmed) {
            var hotelcity = JSON.parse($(div).attr("data-hotelcity"));
            var modal = $("#edit-hotel-city");
            modal.find('[name="id"]').val(hotelcity.id);
            modal.find('[name="edit_hotel_city"]').val(hotelcity.city);
            modal
                .find('[name="is_active"]')
                .val(hotelcity.is_active)
                .trigger("change");
            modal.modal("show");
            validationEditHotelCity();
        }
    });
}

function validationEditHotelCity(){
   
    $("#edit-hotel-city-form").validate({
        errorPlacement: function(error, element) {
            element.closest("div.form-group").append(error);
        },
        rules: {
            edit_hotel_city: {
                required: true,
                maxlength:50

            },
            is_active: {
                required: true
            },
        },
        errorClass: "text-danger",
    });
}
