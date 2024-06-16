$("#guide-register-table")
    .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print"],
    })
    .buttons()
    .container()
    .appendTo("#guide-register-table_wrapper .col-md-6:eq(0)");

function updateGuideReg(div) {
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
            var guideReg = JSON.parse($(div).attr("data-guideReg"));
            var modal = $("#edit-gideReg");
            modal.find('[name="id"]').val(guideReg.id);
            modal.find('[name="edit_full_name"]').val(guideReg.full_name);
            modal.find('[name="edit_nic"]').val(guideReg.nic);
            modal.find('[name="edit_address"]').val(guideReg.address);
            modal.find('[name="edit_contact_no"]').val(guideReg.contact_no);
            var selectedLanguages = guideReg.guide_language.map(function (gl) {
                return gl.guide_language_name.id;
            });
            $.each($(".edit_form_language_selection"), function () {
                $(this).val(selectedLanguages).trigger("change");
            });
            modal
                .find('[name="is_active"]')
                .val(guideReg.is_active)
                .trigger("change");
            modal.modal("show");
            validationEditGuide();
        }
    });
}

function validationEditGuide(){

    $("#edit-guide-register-form").validate({
        errorPlacement: function(error, element) {
            element.closest("div.form-group").append(error);
        },
        rules: {
            edit_full_name: {
                required: true,
            },
            edit_short_name: {
                required: true,
                maxlength:100
            },
            edit_nic: {
                required: true,
                maxlength:12
            },
            edit_address: {
                required: true,
            },
            edit_contact_no: {
                required: true,
            },
            'edit_language[]': {
                required: true,
            },
            is_active: {
                required: true
            },
        },
        errorClass: "text-danger",
    });
}
