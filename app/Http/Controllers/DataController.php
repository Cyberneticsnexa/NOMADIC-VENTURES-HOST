<?php

namespace App\Http\Controllers;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Models\SiteSettings;

use App\Models\UserRoll;
use App\Models\UserRollPermission;
use App\Models\User;

use App\Models\VehicalType;
use App\Models\Vehical;
use App\Models\Country;
use App\Models\Driver;

use App\Models\RoomType;
use App\Models\RoomCategory;
use App\Models\HotelCity;
use App\Models\Hotel;
use App\Models\HotelRoomTypeMap;
use App\Models\Basis;

use App\Models\Guide;
use App\Models\GuideLanguage;
use App\Models\Agent;

use App\Models\Tour;
use App\Models\TourSchedule;
use App\Models\ReservationVoucher;
use App\Models\TourRoomMap;
use App\Models\TourRoomModificationHistory;
use App\Models\HotelCityMap;
use App\Models\ConfirmatonVoucher;
use App\Models\TempAmendmentTourSchedule;
use App\Models\TempReservationVoucher;
use App\Models\TempReservationVoucherNumber;

class DataController extends Controller {
    //                                  FUNCTIONS FOR GET DEVELOPER TOOLS DETAILS

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET SITE SETTINGS
    ----------------------------------------------------------------------------------------------------------
    */

    public function getSiteSettings() {
        $data = SiteSettings::first();
        return $data;
    }

    //                                  FUNCTIONS FOR GET ADMIN TOOLS DETAILS

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET USER ROLL
    ----------------------------------------------------------------------------------------------------------
    */

    public function getUserRoll( $is_active = null ) {
        $data = UserRoll::query();
        if ( $is_active ) {
            $data->where( 'is_active', $is_active );
        }
        if ( Auth::user()->user_roll != 1 ) {
            $data->whereNot( 'id',  1 );
        }
        $data = $data->get();
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET USER ROLL FOR EDIT USER ROLL
    ----------------------------------------------------------------------------------------------------------
    */

    public function getUserRollForEdit( $id ) {
        $data = UserRoll::find( $id );
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET USER ROLL PERMISSION FOR EDIT USER ROLL
    ----------------------------------------------------------------------------------------------------------
    */

    public function getSelectedUserRollPermission( $id ) {
        $data = UserRollPermission::where( 'user_roll_id', $id )->get()->pluck( 'permission' );
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET USER
    ----------------------------------------------------------------------------------------------------------
    */

    public function getUser( $is_active = null ) {
        $data = User::with( 'userRollDetails' );
        if ( $is_active ) {
            $data->where( 'is_active', $is_active );
        }
        if ( Auth::user()->user_roll != 1 ) {
            $data->whereNot( 'user_roll',  1 );
        }
        $data = $data->get();
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET VEHICAL TYPE
    ----------------------------------------------------------------------------------------------------------
    */

    public function getVehicalType( $is_active = null ) {
        $data = VehicalType::query();
        if ( $is_active ) {
            $data->where( 'is_active', $is_active );
        }
        $data = $data->get();
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET VEHICAL
    ----------------------------------------------------------------------------------------------------------
    */

    public function getVehical( $is_active = null ) {
        $data = Vehical::with( 'vehicalTypeDetails' );
        if ( $is_active ) {
            $data->where( 'is_active', $is_active );
        }
        $data = $data->get();
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET COUNTRY CODE
    ----------------------------------------------------------------------------------------------------------
    */

    public function getContryCode( $is_active = null ) {
        $data = Country::query();
        if ( $is_active ) {
            $data->where( 'is_active', $is_active );
        }
        $data = $data->get();
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET DRIVER
    ----------------------------------------------------------------------------------------------------------
    */

    public function getDriver( $is_active = null ) {
        $data = Driver::with( 'licenceImages' );
        if ( $is_active ) {
            $data->where( 'is_active', $is_active );
        }
        $data = $data->get();
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET DRIVER
    ----------------------------------------------------------------------------------------------------------
    */

    public function getDriverForEdit( $id ) {
        $data = Driver::with( 'licenceImages' )->where( 'id', $id );
        $data = $data->first();
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET ROOM TYPE
    ----------------------------------------------------------------------------------------------------------
    */

    public function getRoomType( $is_active = null ) {
        $data = RoomType::query();
        if ( $is_active ) {
            $data->where( 'is_active', $is_active );
        }
        $data = $data->get();
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET ROOM CATEGORY
    ----------------------------------------------------------------------------------------------------------
    */

    public function getRoomCategory( $is_active = null ) {
        $data = RoomCategory::query();
        if ( $is_active ) {
            $data->where( 'is_active', $is_active );
        }
        $data = $data->get();
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET BASIS
    ----------------------------------------------------------------------------------------------------------
    */

    public function getBasis( $is_active = null ) {
        $data = Basis::query();
        if ( $is_active ) {
            $data->where( 'is_active', $is_active );
        }
        $data = $data->get();
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET HOTEL CITIES
    ----------------------------------------------------------------------------------------------------------
    */

    public function getHotelCity( $is_active = null ) {
        $data = HotelCity::query();
        if ( $is_active ) {
            $data->where( 'is_active', $is_active );
        }
        $data = $data->get();
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET HOTELs
    ----------------------------------------------------------------------------------------------------------
    */

    public function getHotels( $is_active = null ) {
        $data = Hotel::with( 'hotelCityDetails.cityName' );
        if ( $is_active ) {
            $data->where( 'is_active', $is_active );
        }
        $data = $data->get();
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET HOTEL
    ----------------------------------------------------------------------------------------------------------
    */

    public function getHotel( $id ) {
        $data[ 'hotel_data' ] = Hotel::with( 'hotelCityDetails.cityName' )->where( 'id', $id )->first();
        $data[ 'room_data' ] = HotelRoomTypeMap::with( 'categoryDetails', 'roomTypeDetails' )->where( 'hotel_id', $data[ 'hotel_data' ]->id )->get()->groupBy( 'room_category_id' );
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET GUIDE LANGUAGE
    ----------------------------------------------------------------------------------------------------------
    */

    public function getGuideLanguage( $is_active = null ) {
        $data = GuideLanguage::query();
        if ( $is_active ) {
            $data->where( 'is_active', $is_active );
        }
        $data = $data->get();
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET GUIDE DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function getGuide( $is_active = null ) {
        $data = Guide::with( 'guideLanguage.guideLanguageName' );
        if ( $is_active ) {
            $data->where( 'is_active', $is_active );
        }
        $data = $data->get();
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET AGENT DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function getAgent( $is_active = null ) {
        $data = Agent::query();
        if ( $is_active ) {
            $data->where( 'is_active', $is_active );
        }
        $data = $data->get();
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET TOUR SCHEDULE
    ----------------------------------------------------------------------------------------------------------
    */

    public function getTour( $id ) {
        $data = Tour::find( $id );
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET TOUR SCHEDULE
    ----------------------------------------------------------------------------------------------------------
    */

    public function getTourScheduleDetails( $id ) {
        $data = Tour::where( 'id', $id )->with( 'countryDetails', 'tourScheduleDetails', 'tourScheduleDetails.guideDetails', 'tourScheduleDetails.vehicalDetails', 'tourScheduleDetails.driverDetails', 'tourScheduleDetails.hotelDetails', 'tourScheduleDetails.hotelDetails.hotelCityDetails.cityName', 'tourScheduleDetails.confirmationDetails', 'reservationDetails' );
        $data = $data->first();
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET TOUR SCHEDULE
    ----------------------------------------------------------------------------------------------------------
    */

    public function getTourSchedule( $id ) {
        $data = TourSchedule::find( $id );
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET HOTEL RESERVATION VOUCHER DATA
    ----------------------------------------------------------------------------------------------------------
    */

    public function getHotelReservationVoucherData( $id, $start_date, $rates = null, $special_requirements = null ) {
        $reservation_details = TourSchedule::with( 'hotelDetails' )->find( $id );

        $voucher = ReservationVoucher::where( 'tour_schedule_id', $id )->first();
        if ( !$voucher ) {
            $voucher = ReservationVoucher::create( [
                'tour_schedule_id' => $id,
                'tour_id' => $reservation_details->tour_id,
                'hotel_id' => $reservation_details->hotel,
                'rate' => $rates,
                'special_requirement' => $special_requirements,
                'is_generated' => 1,
            ] );
        }

        $voucher_no = str_pad( $voucher->id, 5, '0', STR_PAD_LEFT );

        $tour_details = Tour::with( 'countryDetails' )->find( $reservation_details->tour_id );

        $hotel_city = null;
        $hotel_city_map = HotelCityMap::with( 'cityName' )->where( 'hotel_id', $reservation_details->hotel )->first();
        if ( $hotel_city_map ) {
            $hotel_city = $hotel_city_map->cityName->city;
        }

        $checkin_date = $start_date;
        $checkout_date = null;

        $checkout = TourSchedule::where( 'tour_id', $reservation_details->tour_id )
        ->where( 'hotel', $reservation_details->hotel )
        ->where( 'date', '>=', $start_date )
        ->orderBy( 'date' )
        ->get();

        if ( count( $checkout ) == 1 ) {
            $checkout_date =  Carbon::parse( $checkout[ 0 ]->date )->addDays( 1 );
            $no_of_nights = 1;
        } else {
            for ( $key = 1; $key < count( $checkout );
            $key++ ) {
                $prev_date = Carbon::parse( $checkout[ $key - 1 ]->date );
                $current_date = Carbon::parse( $checkout[ $key ]->date );
                $different = $prev_date->diffInDays( $current_date );
                if ( $different != 1 ) {
                    $checkout_date = Carbon::parse( $checkout[ $key - 1 ]->date )->addDays( 1 );
                    break;
                } elseif ( $key + 1 == count( $checkout ) ) {
                    $checkout_date = Carbon::parse( $checkout[ $key - 1 ]->date )->addDays( 2 );
                    break;
                }
            }

            $no_of_nights = $this->dayDiff( $checkin_date, $checkout_date );
        }

        $voucher->checkin_date = $checkin_date;
        $voucher->checkout_date = $checkout_date;
        $voucher->no_of_nights = $no_of_nights;
        $voucher->save();

        // Retrieve room details for the given tour schedule
        $room_details = TourRoomMap::with( 'roomCategory', 'roomType', 'roomBasis' )
        ->where( 'tour_schedule_id', $id )
        ->where( 'hotel_id', $reservation_details->hotel )
        ->get();

        $get_hotel_rooms = HotelRoomTypeMap::with( 'roomTypeDetails' )
        ->select( 'room_type_id', DB::raw( 'MAX(id) as max_id' ) )
        ->where( 'hotel_id', $reservation_details->hotel )
        ->groupBy( 'room_type_id' )
        ->get();

        // Prepare data array to return
        $data = [
            'voucher_details' => $voucher,
            'voucher_no' => $voucher_no,
            'reservation_details' => $reservation_details,
            'tour_details' => $tour_details,
            'no_of_nights' => $no_of_nights,
            'hotel_city' => $hotel_city,
            'checkin_date' => $checkin_date,
            'checkout_date' => $checkout_date,
            'room_details' => $room_details,
            'get_hotel_rooms' => $get_hotel_rooms,
        ];

        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION AMENDED GET HOTEL RESERVATION VOUCHER DATA
    ----------------------------------------------------------------------------------------------------------
    */

    public function getAmendedHotelReservationVoucherData( $id ) {
        $old_reservation_details = TourSchedule::with( 'hotelDetails' )->find( $id );
        $reservation_details = TempAmendmentTourSchedule::where( 'tour_id', $old_reservation_details->tour_id )->where( 'hotel', $old_reservation_details->hotel )->first();
        if($reservation_details == null){
            return 0;
        }
        $voucher = TempReservationVoucherNumber::where( 'tour_id', $reservation_details->tour_id )->where( 'hotel_id', $reservation_details->hotel )->first();

        $voucher_no = str_pad( $voucher->voucher_number, 5, '0', STR_PAD_LEFT );

        $tour_details = Tour::with( 'countryDetails' )->find( $reservation_details->tour_id );

        $hotel_city = null;
        $hotel_city_map = HotelCityMap::with( 'cityName' )->where( 'hotel_id', $reservation_details->hotel )->first();
        if ( $hotel_city_map ) {
            $hotel_city = $hotel_city_map->cityName->city;
        }

        $checkin_date = $reservation_details->date;
        $checkout_date = null;

        $checkout = TempAmendmentTourSchedule::where( 'tour_id', $reservation_details->tour_id )
        ->where( 'hotel', $reservation_details->hotel )
        ->where( 'date', '>=', $reservation_details->date )
        ->orderBy( 'date' )
        ->get();

        if ( count( $checkout ) == 1 ) {
            $checkout_date =  Carbon::parse( $checkout[ 0 ]->date )->addDays( 1 );
            $no_of_nights = 1;
        } else {
            for ( $key = 1; $key < count( $checkout );
            $key++ ) {
                $prev_date = Carbon::parse( $checkout[ $key - 1 ]->date );
                $current_date = Carbon::parse( $checkout[ $key ]->date );
                $different = $prev_date->diffInDays( $current_date );
                if ( $different != 1 ) {
                    $checkout_date = Carbon::parse( $checkout[ $key - 1 ]->date )->addDays( 1 );
                    break;
                } elseif ( $key + 1 == count( $checkout ) ) {
                    $checkout_date = Carbon::parse( $checkout[ $key - 1 ]->date )->addDays( 2 );
                    break;
                }
            }

            $no_of_nights = $this->dayDiff( $checkin_date, $checkout_date );
        }

        // Retrieve room details for the given tour schedule
        $room_details = TourRoomMap::with( 'roomCategory', 'roomType', 'roomBasis' )
        ->where( 'tour_schedule_id', $reservation_details->id )
        ->where( 'hotel_id', $reservation_details->hotel )
        ->get();

        $get_hotel_rooms = HotelRoomTypeMap::with( 'roomTypeDetails' )
        ->select( 'room_type_id', DB::raw( 'MAX(id) as max_id' ) )
        ->where( 'hotel_id', $reservation_details->hotel )
        ->groupBy( 'room_type_id' )
        ->get();

        // Prepare data array to return
        $data = [
            'voucher_details' => $voucher,
            'voucher_no' => $voucher_no,
            'reservation_details' => $reservation_details,
            'tour_details' => $tour_details,
            'no_of_nights' => $no_of_nights,
            'hotel_city' => $hotel_city,
            'checkin_date' => $checkin_date,
            'checkout_date' => $checkout_date,
            'room_details' => $room_details,
            'get_hotel_rooms' => $get_hotel_rooms,
        ];

        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET CONFIRMATION VOUCHER DATA
    ----------------------------------------------------------------------------------------------------------
    */

    public function getConfirmationVoucherData( $id ) {

        $tour_details = Tour::with( 'agentDetails', 'countryDetails', 'tourScheduleDetails.guideDetails' )->find( $id );
        $guide = [];
        foreach ( $tour_details->tourScheduleDetails as $key => $value ) {
            if ( $value->guideDetails ) {
                if ( !in_array( $value->guideDetails->full_name, $guide ) ) {
                    $guide[] = $value->guideDetails->full_name;
                }
            }
        }

        $confirmation_voucher = ConfirmatonVoucher::with( 'hotelDetails', 'tourScheduleDetails.reservationDetails', 'tourScheduleDetails.roomDetails', 'tourScheduleDetails.roomDetails.roomType', 'tourScheduleDetails.roomDetails.roomCategory', 'tourScheduleDetails.roomDetails.roomBasis' )->where( 'tour_id', $id )->orderBy( 'tour_schedule_id', 'asc' )->get();
        $data = [
            'tour_details' => $tour_details,
            'guide' => $guide,
            'confirmation_voucher' => $confirmation_voucher,
        ];
        return $data;
    }

    private function dayDiff( $start_date, $end_date ) {
        return Carbon::parse( $start_date )->diffInDays( Carbon::parse( $end_date ) );
    }

    public function getDashboardData() {
        $tour_ids = Tour::select( 'id' );
        $confirm_count = ( clone $tour_ids )->where( 'status', 2 )->count();
        $cancelled_count = ( clone $tour_ids )->where( 'status', 3 )->count();
        $complete_count = ( clone $tour_ids )->where( 'status', 4 )->count();
        $years = [];
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;

        for ( $i = 0; $i <= 5; $i++ ) {
            $years[] = $currentYear - $i;
        }
        for ( $month = 1; $month <= 12; $month++ ) {
            $date = Carbon::createFromDate( $currentYear, $month, 1 );
            $months[] = $date->format( 'F' );
        }
        $data = [
            'current_year' => $currentYear,
            'current_month' => $currentMonth,
            'years' => $years,
            'months' => $months,
            'confirm_count' => $confirm_count,
            'cancelled_count' => $cancelled_count,
            'complete_count' => $complete_count,
        ];

        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET AMMENDED TOUR SCHEDULE
    ----------------------------------------------------------------------------------------------------------
    */

    public function getAmmendedTourSchedule( $tour_number ) {
        $data = [];
        $tour = Tour::where( 'tour_number', $tour_number )->select( 'id' )->first();
        $reservation_details = TempReservationVoucher::where( 'tour_id', $tour->id )->get();
        foreach ( $reservation_details as $key => $value ) {
            $data[ 'schedule_details' ][] = TempAmendmentTourSchedule::with( 'hotelDetails.hotelCityDetails.cityName', 'roomDetails.roomCategory', 'roomDetails.roomType', 'roomDetails.roomBasis' )->where( 'id', $value->tour_schedule_id )->whereNot( 'hotel', null )->first();
        }
        $data [ 'reservation_details' ] = $reservation_details;
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET CANCELLED BOOKING
    ----------------------------------------------------------------------------------------------------------
    */

    public function getCancelledBooking( $tour_number ) {
        $data = [];
        $cancelled_booking = TempAmendmentTourSchedule::with('hotelDetails','confirmationDetails')->where('tour_number',$tour_number)->whereIn('hotel_booking_status',[2,3])->get();
        $cancelled_count = count($cancelled_booking);
        $data['cancelled_booking'] = $cancelled_booking ;
        $data['cancelled_count'] = $cancelled_count ;
        return $data;
    }

}
