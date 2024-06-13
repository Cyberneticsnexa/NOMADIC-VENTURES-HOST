<div class="card card-default color-palette-box">
    <div class="card-body">

        <table id="tour-schedule-table" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tour Number</th>
                    <th>Date</th>
                    <th>Date</th>
                    <th>Hotel</th>
                    <th>Booking Status</th>
                    <th>Reservation Voucher</th>
                    <th>Confirm</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $prev_hotel_id = null;
                    $last_checkout_date = null;
                @endphp

                @foreach ($tour_schedule['cancelled_booking'] as $index => $detail)
                    @if ($index === 0 || $detail->hotel !== $prev_hotel_id)
                        <tr>
                            <td>{{ $detail->id }}</td>
                            <td>{{ $detail->tour_number }}</td>
                            <td>{{ $detail->date }}</td>
                            <td>
                                @if ($index === 0 || $detail->hotel !== $prev_hotel_id)
                                    @if (!is_null($last_checkout_date))
                                        {{ $last_checkout_date }}
                                    @else
                                        {{ $tour_schedule['cancelled_booking'][$tour_schedule['cancelled_count'] - 1]->date }}
                                    @endif
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
                                @switch($detail->hotel_booking_status)
                                    @case(0)
                                        <span class="badge badge-warning">Pending</span>
                                    @break

                                    @case(1)
                                        <span class="badge badge-success">Confirmed</span>
                                    @break

                                    @case(2)
                                        <span class="badge badge-warning">Pending Cancellation</span>
                                    @break

                                    @case(3)
                                        <span class="badge badge-danger">Cancelled</span>
                                    @break
                                @endswitch
                            </td>
                            <td>
                                @if (!is_null($detail->hotel))
                                    {{ $detail->HotelDetails->hotel_name }} -
                                    {{ $detail->HotelDetails->HotelCityDetails->CityName->city }}
                                    @php $prev_hotel_id = $detail->hotel; @endphp
                                    @php $last_checkout_date = $detail->date; @endphp
                                @else
                                    <span class="badge badge-secondary">Not Assigned</span>
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
