$("#room-type-table")
    .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["csv"],
    })
    .buttons()
    .container()
    .appendTo("#room-type-table_wrapper .col-md-6:eq(0)");

function editRoomType(div) {
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
            var roomtype = JSON.parse($(div).attr("data-roomtype"));
            var modal = $("#edit-room-type");
            modal.find('[name="id"]').val(roomtype.id);
            modal.find('[name="edit_room_type"]').val(roomtype.room_type);
            modal.find('[name="edit_short_code"]').val(roomtype.short_code);
            modal
                .find('[name="is_active"]')
                .val(roomtype.is_active)
                .trigger("change");
            modal.modal("show");
        }
    });
}
