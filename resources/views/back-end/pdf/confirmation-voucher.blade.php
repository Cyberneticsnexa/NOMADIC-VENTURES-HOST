<div style="text-align:center;">
    <table style="width:100%">
        <tr class="tr-title">
            <td colspan="4">
                <p class="t-content-title">CONFIRMATION VOUCHER</p>
            </td>
        </tr>
        <tr>
            <td class="td-details">Tour Number :</td>
            <td class="td-details">
                <b>{{ $voucher_data['tour_details']->tour_number }}</b>
            </td>
            <<td class="td-details">Guest/s Name :</td>
                <td class="td-details">
                    <b>{{ $voucher_data['tour_details']->guest_name }}</b>
                </td>
        </tr>
        <tr>
            <td class="td-details">Agent :</td>
            <td class="td-details">
                <b>{{ $voucher_data['tour_details']->AgentDetails->name }}</b>
            </td>
            <td class="td-details">Nationality :</td>
            <td class="td-details">
                <b>{{ $voucher_data['tour_details']->CountryDetails->nationality }}</b>
            </td>
        </tr>
        <tr>
            <td class="td-details">Arrival Date :</td>
            <td class="td-details">
                <b>{{ \Carbon\Carbon::parse($voucher_data['tour_details']->arrivel_date)->format('d-M-Y') }}</b>
            </td>
            <td class="td-details">Departure Date :</td>
            <td class="td-details">
                <b>{{ \Carbon\Carbon::parse($voucher_data['tour_details']->departure_date)->format('d-M-Y') }}</b>
            </td>
        </tr>
    </table>
    <table style="width:100%;margin-top:20px">
        <tr class="tr-title">
            <td>
                <p class="t-content-title">Hotel</p>
            </td>
            <td>
                <p class="t-content-title">Voucher No</p>
            </td>
            <td>
                <p class="t-content-title">Check In</p>
            </td>
            <td>
                <p class="t-content-title">Check Out</p>
            </td>
            <td>
                <p class="t-content-title">Room Type</p>
            </td>
            <td>
                <p class="t-content-title">No. of Rooms</p>
            </td>
            <td>
                <p class="t-content-title">Confirmation No</p>
            </td>

        </tr>
        @foreach ($voucher_data['confirmation_voucher'] as $key => $item)
            <tr class="room-info">
                <td class="td-details"><b>{{ $item->HotelDetails->hotel_name }}</b></td>
                <td class="td-details"><b>{{ str_pad( $item->TourScheduleDetails->ReservationDetails->id, 5, '0', STR_PAD_LEFT ) }}</b></td>
                <td class="td-details"><b>{{ $item->TourScheduleDetails->ReservationDetails->checkin_date }}</b></td>
                <td class="td-details"><b>{{ $item->TourScheduleDetails->ReservationDetails->checkout_date }}</b></td>
                <td class="td-details">
                    <b>
                        @foreach ($item->TourScheduleDetails->RoomDetails as $key2 => $item2)
                                <span style="margin-top: 3px;">{{ $item2->RoomCategory->room_category }} -
                                     {{ $item2->RoomBasis->code }}</span><br>
                        @endforeach
                    </b>
                </td>
                <td class="td-details">
                    <b>
                        @foreach ($item->TourScheduleDetails->RoomDetails as $key3 => $item3)
                                <span style="margin-top: 3px;">{{ $item3->RoomType->short_code }} - {{ $item3->no_of_room }}</span><br>
                        @endforeach
                    </b>
                </td>
                <td class="td-details"><b>{{ $item->confirmation_no }}</b></td>

            </tr>
            <ul></ul>
        @endforeach
    </table>
    <table style="width:100%;margin-top:20px">
        <tr class="tr-title">
            <td colspan="4">
                <p class="t-content-title">GUIDE DETAILS & OTHER CONTACTS</p>
            </td>
        </tr>
        <tr>
            <td class="td-details-additional">Chauffeur Guide :
                @if (!empty($voucher_data['guide']))
                    @foreach ($voucher_data['guide'] as $key => $value)
                        <span>{{ $value }}</span>
                        @if (!$loop->last)
                            |
                        @endif
                    @endforeach
                @else
                    N/A
                @endif
            </td>
        </tr>
        <tr>
            <td class="td-details-additional">
                Accompanying Guide :
                @if (!empty($voucher_data['guide']))
                    @foreach ($voucher_data['guide'] as $key => $value)
                        <span>{{ $value }}</span>
                        @if (!$loop->last)
                            |
                        @endif
                    @endforeach
                @else
                    N/A
                @endif
            </td>
        </tr>
        <tr>
            <td class="td-details-additional">Emergency Contact : Sanoj Wijemanne - 0094 77 17 66134 (Mobile/WhatsApp) 24 x 7</td>
        </tr>
    </table>
</div>
