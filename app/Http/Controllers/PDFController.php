<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Auth;
use Carbon\Carbon;

class PDFController extends DataController {

    public function defaultPDF( $data, $pdf_name ) {
        $pdf = PDF::loadView( 'back-end.pdf.pdf-template', $data );
        return $pdf->stream( $pdf_name );
    }
    public function defaultPDF2( $data, $pdf_name ) {
        $pdf = PDF::loadView( 'back-end.pdf.pdf-template2', $data );
        return $pdf->stream( $pdf_name );
    }


    public function viewHotelReservatonPDF( Request $request ) {

        $voucher_data = $this->getHotelReservationVoucherData( $request->tour_schedule_id, $request->tour_schedule_start_date, $request->rates, $request->special_requirement );

        $title = $voucher_data[ 'reservation_details' ]->tour_number . '-';

        if ( $voucher_data['reservation_details']->amended_count > 0 ) {
            $title .= Carbon::parse( $voucher_data[ 'reservation_details' ]->updated_at )->format( 'd-M-Y' );
        } else {
            $title .= Carbon::parse( $voucher_data[ 'reservation_details' ]->created_at )->format( 'd-M-Y' );
        }
        $title .= ' HOTEL RESERVATION VOUCHER';

        $data =
        [
            'title'        => $title,
            'body_content' => 'back-end.pdf.hotel-reservation',
            'footer_content' => 'back-end.pdf.hotel-reservation-footer',
            'voucher_data' => $voucher_data,
            'printed_by' => Auth::user()->name,
            'site_settings' => $this->getSiteSettings()
        ];
        if ( $voucher_data['reservation_details']->amended_count > 0 ) {
            $booking_date = Carbon::parse( $voucher_data[ 'reservation_details' ]->updated_at )->format( 'd-M-Y' );
        } else {
            $booking_date = Carbon::parse( $voucher_data[ 'reservation_details' ]->created_at )->format( 'd-M-Y' );
        }
        $pdf_name = $voucher_data[ 'reservation_details' ]->tour_number .' - ' .$booking_date .' hotel reservation voucher.pdf';
        return $this->defaultPDF( $data, $pdf_name );
    }

    public function viewPrintedHotelReservatonPDF( $id, $date ) {

        $voucher_data = $this->getHotelReservationVoucherData( $id, $date );

        $title = $voucher_data[ 'reservation_details' ]->tour_number . '-';

        if ( $voucher_data['reservation_details']->amended_count > 0 ) {
            $title .= Carbon::parse( $voucher_data[ 'reservation_details' ]->updated_at )->format( 'd-M-Y' );
        } else {
            $title .= Carbon::parse( $voucher_data[ 'reservation_details' ]->created_at )->format( 'd-M-Y' );
        }
        $title .= ' HOTEL RESERVATION VOUCHER';

        $data =
        [
            'title'        => $title,
            'body_content' => 'back-end.pdf.hotel-reservation',
            'footer_content' => 'back-end.pdf.hotel-reservation-footer',
            'voucher_data' => $voucher_data,
            'printed_by' => Auth::user()->name,
            'site_settings' => $this->getSiteSettings()
        ];
        if ( $voucher_data['reservation_details']->amended_count > 0 ) {
            $booking_date = Carbon::parse( $voucher_data[ 'reservation_details' ]->updated_at )->format( 'd-M-Y' );
        } else {
            $booking_date = Carbon::parse( $voucher_data[ 'reservation_details' ]->created_at )->format( 'd-M-Y' );
        }
        $pdf_name = $voucher_data[ 'reservation_details' ]->tour_number .' - ' .$booking_date .' hotel reservation voucher.pdf';
        return $this->defaultPDF2( $data, $pdf_name );
    }

    public function viewConfirmationPDF( $id ) {
        $voucher_data = $this->getConfirmationVoucherData( $id );
        $title = $title = $voucher_data[ 'tour_details' ]->tour_number . '- CONFIRMATION VOUCHER';
        $data =
        [
            'title'        => $title,
            'body_content' => 'back-end.pdf.confirmation-voucher',
            'voucher_data' => $voucher_data,
            'printed_by' => Auth::user()->name,
            'site_settings' => $this->getSiteSettings()
        ];

        if ( $voucher_data['tour_details']->amended_count > 0 ) {
            $booking_date = Carbon::parse( $voucher_data[ 'tour_details' ]->updated_at )->format( 'd-M-Y' );
        } else {
            $booking_date = Carbon::parse( $voucher_data[ 'tour_details' ]->created_at )->format( 'd-M-Y' );
        }

        $pdf_name = $voucher_data[ 'tour_details' ]->tour_number .' - ' .$booking_date .' confirmation voucher.pdf';
        return $this->defaultPDF2( $data, $pdf_name );
    }
}
