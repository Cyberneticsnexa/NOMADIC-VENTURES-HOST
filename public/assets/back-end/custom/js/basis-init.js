$("#basis-code-table")
    .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print"],
    })
    .buttons()
    .container()
    .appendTo("#basis-code-table_wrapper .col-md-6:eq(0)");

function editBasis(div) {
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
            var basis = JSON.parse($(div).attr("data-basis"));
            var modal = $("#edit-country");
            modal.find('[name="id"]').val(basis.id);
            modal.find('[name="edit_basis_title"]').val(basis.title);
            modal.find('[name="edit_basis_code"]').val(basis.code);

            modal
                .find('[name="is_active"]')
                .val(basis.is_active)
                .trigger("change");
            modal.modal("show");
        }
    });
}
