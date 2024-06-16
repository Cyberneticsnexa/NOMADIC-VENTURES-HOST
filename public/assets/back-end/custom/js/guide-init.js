$("#guide-table")
    .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print"],
    })
    .buttons()
    .container()
    .appendTo("#guide-table_wrapper .col-md-6:eq(0)");

function editLanguage(div) {
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
            var language = JSON.parse($(div).attr("data-language"));
            var modal = $("#edit-languages");
            modal.find('[name="id"]').val(language.id);
            modal.find('[name="edit_language"]').val(language.language);
           
            modal
                .find('[name="is_active"]')
                .val(language.is_active)
                .trigger("change");
            modal.modal("show");
            validationEditGuide();
        }
    });
}

function validationEditGuide(){
   
    $("#edit-guide-language-form").validate({
        errorPlacement: function(error, element) {
            element.closest("div.form-group").append(error);
        },
        rules: {
            edit_language: {
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
