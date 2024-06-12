<div class="card">
    <div class="card-header">
        <b>{{ $amended_schedule['schedule_details'][0]->tour_number }} ( Old Hotel Booking Details )</b>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach ($amended_schedule['reservation_details'] as $key => $item)
                <div class="col-md-6 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <strong>{{ $amended_schedule['schedule_details'][$key]->HotelDetails->hotel_name }}
                                        -
                                        {{ $amended_schedule['schedule_details'][$key]->HotelDetails->HotelCityDetails->CityName->city }}
                                    </strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <strong>Check In: </strong>{{ $item->checkin_date }}
                                </div>
                                <div class="col-6">
                                    <strong>Check Out: </strong>{{ $item->checkout_date }}
                                </div>
                            </div>
                            <strong>No of Nights: </strong>{{ $item->no_of_nights }}
                            <br>
                            <strong>Special Requirement: </strong>{{ $item->special_requirement }}
                            <br>
                            <strong>Rooms Details:</strong>
                            <table class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Room Category</th>
                                        <th>Room Type</th>
                                        <th>Room Basis</th>
                                        <th>No of Rooms</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($amended_schedule['schedule_details'][$key]->RoomDetails as $item2)
                                        <tr>
                                            <td>{{ $item2->RoomCategory->room_category }}</td>
                                            <td>{{ $item2->RoomType->room_type }}</td>
                                            <td>{{ $item2->RoomBasis->title }}</td>
                                            <td>{{ $item2->no_of_room }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- Close col-md-6 col-xs-12 div here -->
            @endforeach
        </div>
    </div>
</div>


<div class="card card-default color-palette-box">
    <div class="card-header">
        <b>{{ $amended_schedule['schedule_details'][0]->tour_number }} ( New Schedule )</b>
    </div>
    <div class="card-body">
        <table id="tour-schedule-table" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>

                    <th></th>
                    <th>ID</th>
                    <th>Tour Number</th>
                    <th>Guest Name</th>
                    <th>Country</th>
                    <th>No of Packs</th>
                    <th>Date</th>
                    <th>Guide</th>
                    <th>Hotel</th>
                    <th>Booking Status</th>
                    <th>Amended</th>
                    {{-- <th>Reservation Voucher</th>
                    <th>Confirm</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($tour_schedule->tourScheduleDetails as $index => $detail)
                    @if ($index == count($tour_schedule->tourScheduleDetails) - 1)
                        @continue
                    @endif
                    <tr>
                        <td>
                            @if (is_null($detail->hotel))
                                <input type="checkbox" id="select-all">
                            @endif
                        </td>
                        <td>{{ $detail->id }}</td>
                        <td>{{ $tour_schedule->tour_number }}</td>
                        <td>{{ $tour_schedule->guest_name }}</td>
                        <td>{{ $tour_schedule->CountryDetails->country_name }}</td>
                        <td>{{ $tour_schedule->no_of_visiter }}</td>
                        <td>{{ $detail->date }}</td>
                        <td>
                            @if (is_null($detail->guide))
                                <span class="badge badge-secondary">Not Assigned</span>
                            @else
                                {{ $detail->GuideDetails->full_name }}
                            @endif
                        </td>
                        <td>
                            @if (is_null($detail->hotel))
                                <span class="badge badge-secondary">Not Assigned</span>
                            @else
                                {{ $detail->HotelDetails->hotel_name }} -
                                {{ $detail->HotelDetails->HotelCityDetails->CityName->city }}
                            @endif
                        </td>
                        <td>
                            @if (is_null($detail->hotel))
                                <span class="badge badge-secondary">Not Assigned</span>
                            @else
                                @switch($detail->hotel_booking_status)
                                    @case(0)
                                        <span class="badge badge-warning">Pending</span>
                                    @break

                                    @case(1)
                                        <span class="badge badge-success">Confirmed</span>
                                    @break

                                    @case(2)
                                        <span class="badge badge-secondary">Pending Cancellation</span>
                                    @break

                                    @case(4)
                                        <span class="badge badge-danger">Cancelled</span>
                                    @break
                                @endswitch
                            @endif
                        </td>
                        @if ($detail->amended_count > 0)
                            <td>
                                <span class="badge badge-danger">{{ $detail->amended_count }} Time Amended</span>
                            </td>
                        @endif
                        {{-- <td>
                            @if (!is_null($detail->hotel))
                                @php
                                    $is_same_hotel = false;
                                @endphp
                                @if ($index > 0)
                                    @if ($tour_schedule->tourScheduleDetails[$index - 1]->hotel == $detail->hotel)
                                        @php
                                            $is_same_hotel = true;
                                        @endphp
                                    @endif
                                @endif
                                @if (!$is_same_hotel)
                                    @if ($tour_schedule->ReservationDetails->contains('tour_schedule_id', $detail->id))
                                        <a target="_blank"
                                            href="/view-hotel-reservation/{{ $detail->id }}/{{ $detail->date }}"
                                            class="btn btn-xs btn-primary">Print</a>
                                    @else
                                        <a onclick="printReservatonVoucher('{{ $detail->id }}','{{ $tour_schedule->tour_number }}','{{ $detail->date }}')"
                                            class="btn btn-xs btn-primary">Genarate</a>
                                    @endif
                                @endif
                            @else
                                <span class="badge badge-secondary">Not Assigned</span>
                            @endif
                        </td>
                        <td>
                            @if (!is_null($detail->hotel))
                                @php
                                    $is_same_hotel = false;
                                @endphp
                                @if ($index > 0)
                                    @if ($tour_schedule->tourScheduleDetails[$index - 1]->hotel == $detail->hotel)
                                        @php
                                            $is_same_hotel = true;
                                        @endphp
                                    @endif
                                @endif
                                @if (!$is_same_hotel)
                                    @if ($detail->hotel_booking_status == 0)
                                        @if ($tour_schedule->ReservationDetails->contains('tour_schedule_id', $detail->id))
                                            <a onclick="confirmReservation('{{ $detail->id }}','{{ $tour_schedule->id }}','{{ $tour_schedule->tour_number }}','{{ $detail->HotelDetails->hotel_name }}','{{ $detail->HotelDetails->id }}','{{ $detail->date }}')"
                                                class="btn btn-xs btn-primary">Confirm</a>
                                        @else
                                            <span class="badge badge-warning">Reservation voucher not sended</span>
                                        @endif
                                    @else
                                        <p>Confirmation No : {{ $detail->ConfirmationDetails->confirmation_no }}</p>
                                    @endif
                                @endif
                            @else
                                <span class="badge badge-secondary">Not Assigned</span>
                            @endif
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="card card-info" id="hotel-assign-card">
    <div class="card-header">
        <h5 class="mt-2">Hotel</h5>
    </div>
    <form action="/re-assign-hotel-for-tour" method="post" id="re-assign-hotel-for-tour">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-xm-12">
                    <div class="form-group" data-select2-id="6">
                        <label for="hotel">City</label>
                        <select class="form-control select2" onchange="getHotels(this)" style="width: 100%;"
                            data-select2-id="6" aria-hidden="true">
                            <option value="">No Select</option>
                            @foreach ($hotel_city as $item)
                                <option value="{{ $item->id }}">{{ $item->city }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-xm-12">
                    <div class="form-group" data-select2-id="7">
                        <label for="hotel">Hotel</label>
                        <select class="form-control select2" onchange="getRooms(this)" name="hotel"
                            style="width: 100%;" data-select2-id="7" aria-hidden="true">
                            <option value="">No Select</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card card-secondary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="card-title">Rooms Info</div>
                        </div>
                        <div class="col-md-1">
                            <div class="float-right">
                                <span class="btn btn-warning btn-xs" onclick="addRoomInfo()"
                                    id="add_room-info-button"><i class="fa fa-plus"></i></span>
                                <span class="btn btn-warning btn-xs ml-1" id="remove_room-info"
                                    onclick="removeRoomInfo()"><i class="fa fa-minus"></i></span>
                            </div>
                        </div>
                        <input hidden type="number" value="0" id="room-info-attempt">
                    </div>
                </div>
                <div class="card-body">
                    <div id="additional-room-info">

                    </div>
                    <div class="row">
                        <div class="col-md-4 col-xs-12 d-none" id="basis_selection">

                            <label for="">Basis</label>
                            <select class="form-control select2 " name="basis" style="width: 100%;"
                                data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option value="">No Select</option>
                                @foreach ($basis as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" class="btn btn-primary float-right" value="Submit">
        </div>
    </form>
</div>
<div class="modal fade" id="hotel-confirmation" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="hotelConfirmationModalLabel">Hotel Confirmation Details</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/confirm-hotel-booking" method="post" id="confirm-hotel-details-form"
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
<div class="modal fade" id="hotel-reservation" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="hotelReservationModalLabel">Hotel Confirmation Details</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/create-hotel-reservation" method="post" id="create-hotel-reservation-form"
                enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="number" name="tour_schedule_id" hidden>
                    <input type="date" name="tour_schedule_start_date" hidden>
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
<script>
    var is_printed = @json($tour_schedule->ReservationDetails != null);
</script>
