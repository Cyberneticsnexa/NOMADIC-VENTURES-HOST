$("#room-category-table")
    .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["csv"],
    })
    .buttons()
    .container()
    .appendTo("#room-category-table_wrapper .col-md-6:eq(0)");

function editRoomCategory(div) {
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
            var roomcategory = JSON.parse($(div).attr("data-roomcategory"));
            var modal = $("#edit-room-category");
            modal.find('[name="id"]').val(roomcategory.id);
            modal.find('[name="edit_room_category"]').val(roomcategory.room_category);
            modal
                .find('[name="is_active"]')
                .val(roomcategory.is_active)
                .trigger("change");
            modal.modal("show");
            validationEditRoomCatogory();
        }
    });
}

