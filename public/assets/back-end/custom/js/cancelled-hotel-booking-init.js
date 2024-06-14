$(document).ready(function () {

    var table = $("#tour-schedule-table").DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        order: [[0, 'asc']],
        dom: 'Bfrtip',
        buttons: ["copy", "csv", "excel", "pdf", "print"],
    });
});

function confirmReservation(id) {
    $("#confirmation_details").empty();
    var modal = $("#hotel-confirmation");

    var html =
        `<input type="text" class="form-control" name="id" value="` + id + `" hidden>
        <div class="row">
            <div class="col-12">
                <label for="confirmation_number">Confirmation Number</label>
                <input type="text" class="form-control" id="confirmation_number" name="confirmation_number" placeholder="Confirmation Number">
            </div>
        </div>`;

    $("#confirmation_details").append(html);
    modal.modal("show");
}


function printCancelledReservatonVoucher(id,tour_number) {
    $("#hotelReservationModalLabel").text(
        "Hotel Reservation Details : " + tour_number
    );
    var modal = $("#hotel-reservation");
    modal.find('[name="cancel_id"]').val(id);
    modal.modal("show");
}
