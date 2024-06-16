$("#country-code-table")
    .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print"],
    })
    .buttons()
    .container()
    .appendTo("#country-code-table_wrapper .col-md-6:eq(0)");

function editCountry(div) {
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
            var country = JSON.parse($(div).attr("data-country"));
            var modal = $("#edit-country");
            modal.find('[name="id"]').val(country.id);
            modal.find('[name="edit_country_name"]').val(country.country_name);
            modal.find('[name="edit_country_code"]').val(country.code);
            modal.find('[name="edit_nationality"]').val(country.nationality);

            modal
                .find('[name="is_active"]')
                .val(country.is_active)
                .trigger("change");
            modal.modal("show");
        }
    });
}

