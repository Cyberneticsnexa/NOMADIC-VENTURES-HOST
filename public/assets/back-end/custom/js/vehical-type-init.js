$("#vehical-type-table")
    .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["csv"],
    })
    .buttons()
    .container()
    .appendTo("#vehical-type-table_wrapper .col-md-6:eq(0)");

function editVehicalType(div) {
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
            var vehicaltype = JSON.parse($(div).attr("data-vehicaltype"));
            var modal = $("#edit-vehical-type");
            modal.find('[name="id"]').val(vehicaltype.id);
            modal.find('[name="edit_vehical_type"]').val(vehicaltype.vehical_type);
            modal
                .find('[name="is_active"]')
                .val(vehicaltype.is_active)
                .trigger("change");
            modal.modal("show");
            validationVehicalType();
        }
    });
}


function validationVehicalType(){
   
    $("#edit-vehical-type-form").validate({
        errorPlacement: function(error, element) {
            element.closest("div.form-group").append(error);
        },
        rules: {
            edit_vehical_type: {
                required: true,
                maxlength:255

            },
            is_active: {
                required: true
            },
        },
        errorClass: "text-danger",
    });
}


