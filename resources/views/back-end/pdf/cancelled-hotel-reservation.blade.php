<div style="text-align:center;">
    <p class="title">
        CANCELLED HOTEL RESERVATION VOUCHER
    </p>
</div>
<div style="text-align:center;">
    <table style="width:100%">
        <tr class="tr-title">
            <td colspan="4">
                <p class="t-content-title">GENERAL INFORMATION</p>
            </td>
        </tr>
        <tr>
            <td class="td-details; textcolor" colspan="1">Booking Date :</td>
            <td class="td-details" colspan="3">
                @php
                    $booking_date = \Carbon\Carbon::parse($voucher_data['cancelled_booking']->created_at)->format(
                        'd-M-Y',
                    );
                    $voucher_no = str_pad(
                        $voucher_data['cancelled_booking']->reservation_voucher_no,
                        5,
                        '0',
                        STR_PAD_LEFT,
                    );
                @endphp
                <b>
                    {{ $booking_date }}
                </b>
            </td>
        </tr>
        <tr>
            <td class="td-details; textcolor">Tour Number :</td>
            <td class="td-details" colspan="3">
                <b>
                    {{ $voucher_data['cancelled_booking']->tour_number }}
                </b>
            </td>
        </tr>
        <tr>
            <td class="td-details; textcolor">Voucher Number :</td>
            <td class="td-details" colspan="3">
                <b>
                    {{ $voucher_no }}
                </b>
            </td>
        </tr>
        <tr>
            <td class="td-details; textcolor">Hotel :</td>
            <td class="td-details" colspan="3">
                <b>{{ $voucher_data['cancelled_booking']->HotelDetails->hotel_name }},
                    {{ $voucher_data['cancelled_booking']->HotelDetails->HotelCityDetails->CityName->city }}</b>
            </td>
        </tr>
        <tr>
            @php
                $checkin_date = \Carbon\Carbon::parse($voucher_data['cancelled_booking']->checkin_date)->format(
                    'd-M-Y',
                );

                $checkout_date = \Carbon\Carbon::parse($voucher_data['cancelled_booking']->checkout_date)->format(
                    'd-M-Y',
                );

            @endphp
            <td class="td-details; textcolor">Check in :</td>
            <td class="td-details">
                <b style="padding-left: 15px;">
                    {{ $checkin_date }}
                </b>
            </td>
            <td class="td-details; textcolor">Check out :</td>
            <td class="td-details">
                <b>
                    {{ $checkout_date }}
                </b>
            </td>
        </tr>
        <tr>
            <td class="td-details; textcolor">Guest/s Name :</td>
            <td class="td-details"><b
                    style="padding-left: 15px;">{{ $voucher_data['cancelled_booking']->TourDetails->guest_name }}</b>
            </td>
            <td class="td-details; textcolor">No. of Nights :</td>
            <td class="td-details">
                <b>
                    {{ $voucher_data['cancelled_booking']->no_of_nights }}
                </b>
            </td>
        </tr>
        <tr>
            <td class="td-details; textcolor">Nationality :</td>
            <td class="td-details">
                <b style="padding-left: 15px;">{{ $voucher_data['cancelled_booking']->TourDetails->CountryDetails->nationality }}
                </b>
            </td>
            <td class="td-details; textcolor">No. of Guests :</td>
            <td class="td-details">
                <b>
                    {{ $voucher_data['cancelled_booking']->TourDetails->no_of_visiter }}
                </b>
            </td>
        </tr>
    </table>
    <table style="width:100%;margin-top:20px">
        <tr class="tr-title">
            <td>
                <p class="t-content-title">ROOM TYPE</p>
            </td>
            <td>
                <p class="t-content-title">NO. OF ROOMS</p>
            </td>
            <td>
                <p class="t-content-title">BASIS</p>
            </td>
            <td>
                <p class="t-content-title">ROOM CATEGORY</p>
            </td>
        </tr>
        @foreach ($voucher_data['hotel_room_details'] as $item)
            <tr class="room-info">
                <td class="td-details; textcolor">{{ $item->RoomTypeDetails->room_type }}</td>
                <td class="td-details">
                    @php
                        $room_details = $voucher_data['tour_room_details']->where('room_type_id', $item->room_type_id);
                    @endphp
                    @foreach ($room_details as $item2)
                        <b>{{ $item2->no_of_room }}</b><br>
                    @endforeach
                </td>
                <td class="td-details">
                    @foreach ($room_details as $item2)
                        <b>{{ $item2->RoomBasis->title }}</b><br>
                    @endforeach
                </td>
                <td class="td-details">
                    @foreach ($room_details as $item2)
                        <b>{{ $item2->RoomCategory->room_category }}</b><br>
                    @endforeach
                </td>
            </tr>
        @endforeach
    </table>
    <table style="width:100%;height:20%">
        <tr class="tr-title">
            <td colspan="4">
                <p class="t-content-title">RATES</p>
            </td>
        </tr>
        <tr>
            <td class="td-details" colspan="4">
                @if ($voucher_data['cancelled_booking']->rate)
                    {!! $voucher_data['cancelled_booking']->rate !!}
                @endif

            </td>
        </tr>
    </table>
    <table style="width:100%;height:20%">
        <tr class="tr-title">
            <td colspan="4">
                <p class="t-content-title">SPECAIL REQUIREMENTS / REMARKS</p>
            </td>
        </tr>
        <tr>
            <td class="td-details" colspan="4">
                @if ($voucher_data['cancelled_booking']->special_requirement)
                    {!! $voucher_data['cancelled_booking']->special_requirement !!}
                @endif
            </td>
        </tr>

    </table>
</div>
