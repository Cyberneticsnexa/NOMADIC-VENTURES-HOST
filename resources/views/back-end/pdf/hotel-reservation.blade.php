<div style="text-align:center;">
    <p class="title">
        HOTEL RESERVATION VOUCHER
        @if ($is_equal == 0)
            - <span class="new-details">{{ ordinal($amended_voucher_data['reservation_details']->amended_count + 1) }}
                Amendment</span>
        @endif
    </p>
</div>
<div style="text-align:center;">
    @if ($is_equal == 0)
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
                        $formattedAmendedDate = \Carbon\Carbon::parse(
                            $amended_voucher_data['reservation_details']->created_at,
                        )->format('d-M-Y');
                        $formattedVoucherDate = \Carbon\Carbon::parse(
                            $voucher_data['reservation_details']->created_at,
                        )->format('d-M-Y');
                    @endphp
                    <b>
                        {{ $formattedAmendedDate }}
                        @if ($formattedAmendedDate != $formattedVoucherDate)
                            / <span class="new-details">{{ $formattedVoucherDate }}</span>
                        @endif
                    </b>
                </td>
            </tr>
            <tr>
                <td class="td-details; textcolor">Tour Number :</td>
                <td class="td-details" colspan="3">
                    <b>
                        {{ $voucher_data['reservation_details']->tour_number }}
                    </b>
                </td>
            </tr>
            <tr>
                <td class="td-details; textcolor">Voucher Number :</td>
                <td class="td-details" colspan="3">
                    <b>
                        {{ $amended_voucher_data['voucher_no'] }}
                        / <span class="new-details">A</span>
                    </b>
                </td>
            </tr>
            <tr>
                <td class="td-details; textcolor">Hotel :</td>
                <td class="td-details" colspan="3">
                    <b>{{ $voucher_data['reservation_details']->HotelDetails->hotel_name }},
                        {{ $voucher_data['hotel_city'] }}</b>
                </td>
            </tr>
            <tr>
                @php
                    $formattedAmendedcheckin_date = \Carbon\Carbon::parse(
                        $amended_voucher_data['checkin_date'],
                    )->format('d-M-Y');
                    $formattedVouchercheckin_date = \Carbon\Carbon::parse($voucher_data['checkin_date'])->format(
                        'd-M-Y',
                    );
                    $formattedAmendedcheckout_date = \Carbon\Carbon::parse(
                        $amended_voucher_data['checkout_date'],
                    )->format('d-M-Y');
                    $formattedVouchercheckout_date = \Carbon\Carbon::parse($voucher_data['checkout_date'])->format(
                        'd-M-Y',
                    );
                @endphp
                <td class="td-details; textcolor">Check in :</td>
                <td class="td-details">
                    <b style="padding-left: 15px;">
                        @if ($formattedAmendedcheckin_date != $formattedVouchercheckin_date)
                            <span class="new-details">{{ $formattedVouchercheckin_date }}</span>
                        @else
                            {{ $formattedAmendedcheckin_date }}
                        @endif
                    </b>
                </td>
                <td class="td-details; textcolor">Check out :</td>
                <td class="td-details">
                    <b>
                        @if ($formattedAmendedcheckout_date != $formattedVouchercheckout_date)
                            <span class="new-details">{{ $formattedVouchercheckout_date }}</span>
                        @else
                            {{ $formattedAmendedcheckout_date }}
                        @endif
                    </b>
                </td>
            </tr>
            <tr>
                <td class="td-details; textcolor">Guest/s Name :</td>
                <td class="td-details"><b
                        style="padding-left: 15px;">{{ $voucher_data['tour_details']->guest_name }}</b>
                </td>
                <td class="td-details; textcolor">No. of Nights :</td>
                <td class="td-details">
                    <b>
                        @if ($voucher_data['no_of_nights'] != $amended_voucher_data['no_of_nights'])
                            <span class="new-details">{{ $voucher_data['no_of_nights'] }}</span>
                        @else
                            {{ $amended_voucher_data['no_of_nights'] }}
                        @endif
                    </b>
                </td>
            </tr>
            <tr>
                <td class="td-details; textcolor">Nationality :</td>
                <td class="td-details">
                    <b style="padding-left: 15px;">{{ $voucher_data['tour_details']->CountryDetails->nationality }}</b>
                </td>
                <td class="td-details; textcolor">No. of Guests :</td>
                <td class="td-details">
                    <b>
                        @if ($voucher_data['tour_details']->no_of_visiter != $amended_voucher_data['tour_details']->no_of_visiter)
                            <span
                                class="new-details">{{ $amended_voucher_data['tour_details']->no_of_visiter }}/{{ $voucher_data['tour_details']->no_of_visiter }}</span>
                        @else
                            {{ $amended_voucher_data['tour_details']->no_of_visiter }}
                        @endif
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
            @foreach ($voucher_data['get_hotel_rooms'] as $item)
                <tr class="room-info">
                    <td class="td-details; textcolor">{{ $item->RoomTypeDetails->room_type }}</td>
                    <td class="td-details">
                        <b>
                            @foreach ($amended_voucher_data['room_details'] as $key => $item2)
                                @if ($item2->room_type_id == $item->room_type_id)
                                    {{ $item2->no_of_room }} /
                                @endif
                            @endforeach
                            @foreach ($voucher_data['room_details'] as $key => $item2)
                                @if ($item2->room_type_id == $item->room_type_id)
                                    <span class="new-details">{{ $item2->no_of_room }}</span>
                                    <br>
                                @endif
                            @endforeach
                        </b>
                    </td>
                    <td class="td-details">
                        <b>
                            @foreach ($amended_voucher_data['room_details'] as $key => $item2)
                                @if ($item2->room_type_id == $item->room_type_id)
                                    {{ $item2->RoomBasis->code }} /
                                @endif
                            @endforeach
                            @foreach ($voucher_data['room_details'] as $key => $item2)
                                @if ($item2->room_type_id == $item->room_type_id)
                                    <span class="new-details">{{ $item2->RoomBasis->code }}</span>
                                    <br>
                                @endif
                            @endforeach
                        </b>
                    </td>
                    <td class="td-details">
                        <b>
                            @foreach ($amended_voucher_data['room_details'] as $key => $item2)
                                @if ($item2->room_type_id == $item->room_type_id)
                                    {{ $item2->RoomCategory->room_category }} /
                                @endif
                            @endforeach
                            @foreach ($voucher_data['room_details'] as $key => $item2)
                                @if ($item2->room_type_id == $item->room_type_id)
                                    <span class="new-details">{{ $item2->RoomCategory->room_category }}</span>
                                    <br>
                                @endif
                            @endforeach
                        </b>
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
                    @if ($voucher_data['voucher_details']->rate)
                        {!! $voucher_data['voucher_details']->rate !!}
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
                    @if ($voucher_data['voucher_details']->special_requirement)
                        {!! $voucher_data['voucher_details']->special_requirement !!}
                    @endif
                </td>
            </tr>

        </table>
    @else
        <table style="width:100%">
            <tr class="tr-title">
                <td colspan="4">
                    <p class="t-content-title">GENERAL INFORMATION</p>
                </td>
            </tr>
            <tr>
                <td class="td-details; textcolor" colspan="1">Booking Date :</td>
                <td class="td-details" colspan="3"><b>
                        {{ \Carbon\Carbon::parse($voucher_data['reservation_details']->created_at)->format('d-M-Y') }}
                    </b>
                </td>
            </tr>
            <tr>
                <td class="td-details; textcolor">Tour Number :</td>
                <td class="td-details" colspan="3">
                    <b>{{ $voucher_data['reservation_details']->tour_number }}</b>
                </td>
            </tr>
            <tr>
                <td class="td-details; textcolor">Voucher Number :</td>
                <td class="td-details" colspan="3"><b>{{ $voucher_data['voucher_no'] }}</b>
                </td>
            </tr>
            <tr>
                <td class="td-details; textcolor">Hotel :</td>
                <td class="td-details" colspan="3">
                    <b>{{ $voucher_data['reservation_details']->HotelDetails->hotel_name }},
                        {{ $voucher_data['hotel_city'] }}</b>
                </td>
            </tr>
            <tr>
                <td class="td-details; textcolor">Check in :</td>
                <td class="td-details"><b
                        style="padding-left: 15px;">{{ \Carbon\Carbon::parse($voucher_data['checkin_date'])->format('d-M-Y') }}</b>
                </td>
                <td class="td-details; textcolor">Check out :</td>
                <td class="td-details">
                    <b>{{ \Carbon\Carbon::parse($voucher_data['checkout_date'])->format('d-M-Y') }}</b>
                </td>
            </tr>
            <tr>
                <td class="td-details; textcolor">Guest/s Name :</td>
                <td class="td-details"><b
                        style="padding-left: 15px;">{{ $voucher_data['tour_details']->guest_name }}</b>
                </td>
                <td class="td-details; textcolor">No. of Nights :</td>
                <td class="td-details"><b>{{ $voucher_data['no_of_nights'] }}</b></td>
            </tr>
            <tr>
                <td class="td-details; textcolor">Nationality :</td>
                <td class="td-details">
                    <b
                        style="padding-left: 15px;">{{ $voucher_data['tour_details']->CountryDetails->nationality }}</b>
                </td>
                <td class="td-details; textcolor">No. of Guests :</td>
                <td class="td-details">
                    <b>{{ $voucher_data['tour_details']->no_of_visiter }}</b>
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
            @foreach ($voucher_data['get_hotel_rooms'] as $item)
                <tr class="room-info">
                    <td class="td-details; textcolor">{{ $item->RoomTypeDetails->room_type }}</td>
                    <td class="td-details">
                        @php
                            $room_details = $voucher_data['room_details']->where('room_type_id', $item->room_type_id);
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
                    @if ($voucher_data['voucher_details']->rate)
                        {!! $voucher_data['voucher_details']->rate !!}
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
                    @if ($voucher_data['voucher_details']->special_requirement)
                        {!! $voucher_data['voucher_details']->special_requirement !!}
                    @endif
                </td>
            </tr>

        </table>
    @endif
</div>
