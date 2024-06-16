$("#vehical-table")
    .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["csv"],
    })
    .buttons()
    .container()
    .appendTo("#vehical-table_wrapper .col-md-6:eq(0)");

function editVehical(div) {
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
            var vehical = JSON.parse($(div).attr("data-vehical"));
            var modal = $("#edit-vehical");
            modal.find('[name="id"]').val(vehical.id);
            modal.find('[name="edit_vehical_model"]').val(vehical.vehical_model);
            modal.find('[name="edit_vehical_no"]').val(vehical.vehical_no);
            modal
                .find('[name="edit_vehical_type"]')
                .val(vehical.vehical_type)
                .trigger("change");
            modal.modal("show");
            modal
                .find('[name="is_active"]')
                .val(vehical.is_active)
                .trigger("change");
            modal.modal("show");
            validationEditVehical();
        }
    });
}

function validationEditVehical(){
   
    $("#edit-vehical-form").validate({
        errorPlacement: function(error, element) {
            element.closest("div.form-group").append(error);
        },
        rules: {
            edit_vehical_model: {
                required: true,
                maxlength:255

            },
            edit_vehical_no: {
                required: true,
                maxlength:20

            },
            edit_vehical_type: {
                required: true,
                

            },
            is_active: {
                required: true
            },
        },
        errorClass: "text-danger",
    });
}


