<div class="card card-default color-palette-box">
    <div class="card-body">

        <table id="tour-schedule-table" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tour Number</th>
                    <th>Hotel</th>
                    <th>Checkin Date</th>
                    <th>Checkout Hotel</th>
                    <th>No of nights</th>
                    <th>Booking Status</th>
                    <th>Reservation Voucher</th>
                    <th>Confirm</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cancelled_schedule as $item)
                    <tr>
                        <td>{{ $item->tour_schedule_id }}</td>
                        <td>{{ $item->tour_number }}</td>
                        <td>{{ $item->HotelDetails->hotel_name }} -
                            {{ $item->HotelDetails->HotelCityDetails->CityName->city }}</td>
                        <td>{{ $item->checkin_date }}</td>
                        <td>{{ $item->checkout_date }}</td>
                        <td>{{ $item->no_of_nights }}</td>
                        <td>
                            @switch($item->booking_status)
                                @case(0)
                                    <span class="badge badge-warning">Pending</span>
                                @break

                                @case(1)
                                    <span class="badge badge-success">Confirmed</span>
                                @break

                                @case(2)
                                    <span class="badge badge-secondary">Pending Cancellation</span>
                                @break

                                @case(3)
                                    <span class="badge badge-danger">Cancelled</span>
                                @break
                            @endswitch
                        </td>
                        <td>
                            @if ($item->reservation_sended == 0)
                                <a onclick="printCancelledReservatonVoucher('{{ $item->id }}','{{ $item->tour_number }}')"
                                    class="btn btn-xs btn-primary">Genarate</a>
                            @else
                                <a target="_blank" href="/view-cancelled-hotel-reservation/{{ $item->id }}"
                                    class="btn btn-xs btn-primary">Print</a>
                            @endif
                        </td>
                        <td>
                            @if ($item->confirmation_no)
                                Confirmation No : {{ $item->confirmation_no }}
                            @elseif ($item->reservation_sended == 1)
                                <a onclick="confirmReservation('{{ $item->id }}')"
                                    class="btn btn-xs btn-primary">Confirm</a>
                            @else
                                <span class="badge badge-warning">Cancel Reservation not sended</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="hotel-reservation" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="hotelReservationModalLabel">Hotel Confirmation Details</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/create-cancelled-hotel-reservation" method="post" id="create-hotel-reservation-form"
                enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="number" name="cancel_id" hidden>
                    <div class="row">
                        <div class="col-md-12 col-xm-12">
                            <label for="rates">Rates</label>
                            <textarea class="summernote" style="display: none;" name="rates">
                                    {{-- {{ $tour_schedule->special_requirement }} --}}
                                </textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xm-12">
                            <label for="special_requirement">Special Requirement / Remarks</label>
                            <textarea class="summernote" style="display: none;" name="special_requirement">
                                    {{-- {{ $tour_schedule->special_requirement }} --}}
                                </textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="hotel-confirmation" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="hotelConfirmationModalLabel">Booking Cancellation Confirmation Details</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/cancellation-hotel-booking-accept" method="post" id="confirm-hotel-details-form"
                enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div id="confirmation_details">

                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
