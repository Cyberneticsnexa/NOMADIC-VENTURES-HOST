<div style="text-align:center;">
<table style="width:100%; border: 1px solid black; border-collapse: collapse;">
    <tr class="tr-title" style="border: 1px solid black;">
        <td colspan="4" style="border: 1px solid black;">
            <p class="t-content-title">CONFIRMATION VOUCHER</p>
        </td>
    </tr>
    <tr style="border: 1px solid black;">
        <td class="td-details" style="border: 1px solid black;">Tour Number :</td>
        <td class="td-details" style="border: 1px solid black;">
            <b>{{ $voucher_data['tour_details']->tour_number }}</b>
        </td>
        <td class="td-details" style="border: 1px solid black;">Guest/s Name :</td>
        <td class="td-details" style="border: 1px solid black;">
            <b>{{ $voucher_data['tour_details']->guest_name }}</b>
        </td>
    </tr>
    <tr style="border: 1px solid black;">
        <td class="td-details" style="border: 1px solid black;">Agent :</td>
        <td class="td-details" style="border: 1px solid black;">
            <b>{{ $voucher_data['tour_details']->AgentDetails->name }}</b>
        </td>
        <td class="td-details" style="border: 1px solid black;">Nationality :</td>
        <td class="td-details" style="border: 1px solid black;">
            <b>{{ $voucher_data['tour_details']->CountryDetails->nationality }}</b>
        </td>
    </tr>
    <tr style="border: 1px solid black;">
        <td class="td-details" style="border: 1px solid black;">Arrival Date :</td>
        <td class="td-details" style="border: 1px solid black;">
            <b>{{ \Carbon\Carbon::parse($voucher_data['tour_details']->arrivel_date)->format('d-M-Y') }}</b>
        </td>
        <td class="td-details" style="border: 1px solid black;">Departure Date :</td>
        <td class="td-details" style="border: 1px solid black;">
            <b>{{ \Carbon\Carbon::parse($voucher_data['tour_details']->departure_date)->format('d-M-Y') }}</b>
        </td>
    </tr>
</table>

<table style="width:100%; margin-top:20px; border: 1px solid black; border-collapse: collapse;">
    <tr class="tr-title" style="border: 1px solid black;">
        <td style="border: 1px solid black;">
            <p class="t-content-title">Hotel</p>
        </td>
        <td style="border: 1px solid black;">
            <p class="t-content-title">Voucher No</p>
        </td>
        <td style="border: 1px solid black;">
            <p class="t-content-title">Check In</p>
        </td>
        <td style="border: 1px solid black;">
            <p class="t-content-title">Check Out</p>
        </td>
        <td style="border: 1px solid black;">
            <p class="t-content-title">Room Type</p>
        </td>
        <td style="border: 1px solid black;">
            <p class="t-content-title">No. of Rooms</p>
        </td>
        <td style="border: 1px solid black;">
            <p class="t-content-title">Confirmation No</p>
        </td>
    </tr>
    @foreach ($voucher_data['confirmation_voucher'] as $key => $item)
        <tr class="room-info" style="border: 1px solid black;">
            <td class="td-details" style="border: 1px solid black;"><b>{{ $item->HotelDetails->hotel_name }}</b></td>
            <td class="td-details" style="border: 1px solid black;"><b>{{ str_pad( $item->TourScheduleDetails->ReservationDetails->id, 5, '0', STR_PAD_LEFT ) }}</b></td>
            <td class="td-details" style="border: 1px solid black;"><b>{{ $item->TourScheduleDetails->ReservationDetails->checkin_date }}</b></td>
            <td class="td-details" style="border: 1px solid black;"><b>{{ $item->TourScheduleDetails->ReservationDetails->checkout_date }}</b></td>
            <td class="td-details" style="border: 1px solid black;">
                <b>
                    @foreach ($item->TourScheduleDetails->RoomDetails as $key2 => $item2)
                        <span style="margin-top: 3px;">{{ $item2->RoomCategory->room_category }} -
                             {{ $item2->RoomBasis->code }}</span><br>
                    @endforeach
                </b>
            </td>
            <td class="td-details" style="border: 1px solid black;">
                <b>
                    @foreach ($item->TourScheduleDetails->RoomDetails as $key3 => $item3)
                        <span style="margin-top: 3px;">{{ $item3->RoomType->short_code }} - {{ $item3->no_of_room }}</span><br>
                    @endforeach
                </b>
            </td>
            <td class="td-details" style="border: 1px solid black;"><b>{{ $item->confirmation_no }}</b></td>
        </tr>
        <!-- <ul></ul> -->
    @endforeach
</table>

    <table style="width:100%;margin-top:20px; border: 1px solid black; border-collapse: collapse;">
        <tr class="tr-title" style="border: 1px solid black;">
            <td colspan="4" style="border: 1px solid black;">
                <p class="t-content-title">GUIDE DETAILS & OTHER CONTACTS</p>
            </td>
        </tr>
        <tr style="border: 1px solid black;">
            <td  colspan="4" class="td-details-additional" style="border: 1px solid black;">Chauffeur Guide :
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
        <tr style="border: 1px solid black;">
            <td colspan="4" class="td-details-additional" style="border: 1px solid black;">
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
        <tr style="border: 1px solid black;">
            <td  colspan="4" class="td-details-additional" style="border: 1px solid black;">Emergency Contact : Sanoj Wijemanne - 0094 77 17 66134 (Mobile/WhatsApp) 24 x 7</td>
        </tr>
    </table>
</div>
