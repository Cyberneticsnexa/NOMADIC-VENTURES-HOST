<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class PDFController extends DataController {

    function arraysAreEqual($array1, $array2) {
        // Check if both arrays are associative arrays
        if (Arr::isAssoc($array1) && Arr::isAssoc($array2)) {
            return $array1 == $array2;
        }

        // If arrays are not associative, compare their values
        return count($array1) === count($array2) && empty(array_diff($array1, $array2));
    }

    public function defaultPDF($data, $pdf_name) {
        $pdf = PDF::loadView('back-end.pdf.pdf-template', $data);
        return $pdf->stream($pdf_name);
    }

    public function defaultPDF2($data, $pdf_name) {
        $pdf = PDF::loadView('back-end.pdf.pdf-template2', $data);
        return $pdf->stream($pdf_name);
    }

    public function viewHotelReservationPDF(Request $request) {
        $voucher_data = $this->getHotelReservationVoucherData($request->tour_schedule_id, $request->tour_schedule_start_date, $request->rates, $request->special_requirement);
        $amended_voucher_data = $this->getAmendedHotelReservationVoucherData($request->tour_schedule_id);
        $array1 = json_decode(json_encode($voucher_data), true);
        $array2 = json_decode(json_encode($amended_voucher_data), true);
        if ($this->arraysAreEqual($array1, $array2)) {
            $is_equal = 1;
        } else {
            $is_equal = 0;
        }
        $title = $voucher_data['reservation_details']->tour_number . ' ';

        if ($amended_voucher_data != 0) {
            $title .= 'AMENDED';
        }
        $title .= ' HOTEL RESERVATION VOUCHER ';
        if ($amended_voucher_data != 0) {
            $title .= Carbon::parse($amended_voucher_data['reservation_details']->created_at)->format('d-M-Y') . ' AMENDED';
        } else {
            $title .= Carbon::parse($voucher_data['reservation_details']->created_at)->format('d-M-Y');
        }

        $data = [
            'title' => $title,
            'body_content' => 'back-end.pdf.hotel-reservation',
            'footer_content' => 'back-end.pdf.hotel-reservation-footer',
            'voucher_data' => $voucher_data,
            'amended_voucher_data' => $amended_voucher_data,
            'is_equal' => $is_equal,
            'printed_by' => Auth::user()->name,
            'site_settings' => $this->getSiteSettings()
        ];

        if ($voucher_data['reservation_details']->amended_count > 0) {
            $booking_date = Carbon::parse($voucher_data['reservation_details']->updated_at)->format('d-M-Y');
        } else {
            $booking_date = Carbon::parse($voucher_data['reservation_details']->created_at)->format('d-M-Y');
        }

        $pdf_name = $voucher_data['reservation_details']->tour_number . ' - ' . $booking_date . ' hotel reservation voucher.pdf';
        return $this->defaultPDF2($data, $pdf_name);
    }

    public function viewPrintedHotelReservatonPDF($id, $date) {
        $voucher_data = $this->getHotelReservationVoucherData($id, $date);
        $amended_voucher_data = $this->getAmendedHotelReservationVoucherData($id);

        $array1 = json_decode(json_encode($voucher_data), true);
        $array2 = json_decode(json_encode($amended_voucher_data), true);
        if ($this->arraysAreEqual($array1, $array2)) {
            $is_equal = 1;
        } else {
            $is_equal = 0;
        }

        $title = $voucher_data['reservation_details']->tour_number . ' ';
        if ($amended_voucher_data != 0) {
            $title .= 'AMENDED';
        }
        $title .= ' HOTEL RESERVATION VOUCHER ';
        if ($amended_voucher_data != 0) {
            $title .= Carbon::parse($amended_voucher_data['reservation_details']->created_at)->format('d-M-Y') . ' AMENDED';
        } else {
            $title .= Carbon::parse($voucher_data['reservation_details']->created_at)->format('d-M-Y');
        }

        $data = [
            'title' => $title,
            'body_content' => 'back-end.pdf.hotel-reservation',
            'footer_content' => 'back-end.pdf.hotel-reservation-footer',
            'voucher_data' => $voucher_data,
            'amended_voucher_data' => $amended_voucher_data,
            'is_equal' => $is_equal,
            'printed_by' => Auth::user()->name,
            'site_settings' => $this->getSiteSettings()
        ];

        if ($voucher_data['reservation_details']->amended_count > 0) {
            $booking_date = Carbon::parse($voucher_data['reservation_details']->updated_at)->format('d-M-Y');
        } else {
            $booking_date = Carbon::parse($voucher_data['reservation_details']->created_at)->format('d-M-Y');
        }

        $pdf_name = $voucher_data['reservation_details']->tour_number . ' - ' . $booking_date . ' hotel reservation voucher.pdf';
        return $this->defaultPDF2($data, $pdf_name);
    }

    public function viewConfirmationPDF($id) {
        $voucher_data = $this->getConfirmationVoucherData($id);
        $title = $voucher_data['tour_details']->tour_number . '- CONFIRMATION VOUCHER';

        $data = [
            'title' => $title,
            'body_content' => 'back-end.pdf.confirmation-voucher',
            'voucher_data' => $voucher_data,
            'printed_by' => Auth::user()->name,
            'site_settings' => $this->getSiteSettings()
        ];

        if ($voucher_data['tour_details']->amended_count > 0) {
            $booking_date = Carbon::parse($voucher_data['tour_details']->updated_at)->format('d-M-Y');
        } else {
            $booking_date = Carbon::parse($voucher_data['tour_details']->created_at)->format('d-M-Y');
        }

        $pdf_name = $voucher_data['tour_details']->tour_number . ' - ' . $booking_date . ' confirmation voucher.pdf';
        return $this->defaultPDF2($data, $pdf_name);
    }
}
