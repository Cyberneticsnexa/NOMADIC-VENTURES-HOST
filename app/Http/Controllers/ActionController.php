<?php

namespace App\Http\Controllers;
use App\Http\Controllers\AuthController;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;

use App\Models\SiteSettings;

use App\Models\UserRoll;
use App\Models\UserRollPermission;
use App\Models\User;
use App\Models\UserImage;

use App\Models\VehicalType;
use App\Models\Vehical;
use App\Models\Driver;
use App\Models\LicenceImage;

use App\Models\RoomType;
use App\Models\RoomCategory;
use App\Models\HotelCity;
use App\Models\Hotel;
use App\Models\HotelCityMap;
use App\Models\HotelRoomTypeMap;
use App\Models\Basis;

use App\Models\GuideLanguage;
use App\Models\Guide;
use App\Models\GuideLanguageMap;

use App\Models\Country;
use App\Models\Agent;
use App\Models\Tour;
use App\Models\TourSchedule;
use App\Models\TourRoomMap;
use App\Models\TourRoomModificationHistory;
use App\Models\ConfirmatonVoucher;
use App\Models\ReservationVoucher;
use App\Models\TempAmendmentTourSchedule;
use App\Models\TempReservationVoucher;
use App\Models\TempReservationVoucherNumber;
use App\Models\CancelledReservation;

class ActionController extends Controller {

    //                                      FUNCTIONS FOR DEVELOPER TOOLS

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE USER ROLL
    ----------------------------------------------------------------------------------------------------------
    */

    public function createSiteSettings( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'site_name'     => 'required',
                'image'         => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'meta_icon'     => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'login_bg_image'=> 'required|image|mimes:jpeg,png,jpg',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            SiteSettings::truncate();
            DB::beginTransaction();

            $logo = uploadImage( $request->image, 'logo' );

            $meta_icon = uploadImage( $request->meta_icon, 'logo' );

            $login_bg_image = uploadImage( $request->login_bg_image, 'logo' );

            SiteSettings::create( [
                'site_name'     => $request->site_name,
                'logo'          => $logo,
                'meta_icon'     => $meta_icon,
                'login_bg_image'=> $login_bg_image,
            ] );

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'Site Settings Updated Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    //                                      FUNCTIONS FOR ADMIN TOOLS

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE USER ROLL
    ----------------------------------------------------------------------------------------------------------
    */

    public function createUserRoll( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'user_roll'     => 'required',
                // 'permission.*'     => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();
            $permissions = $request->permission;
            array_push( $permissions, 'dashboard' );
            $user_roll = UserRoll::create( [
                'title'         => $request->user_roll,
                'is_active'     => 1,
            ] );

            foreach ( $permissions as $key => $value ) {
                UserRollPermission::create( [
                    'user_roll_id'       => $user_roll->id,
                    'permission'    => $value,
                ] );
            }
            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'User Roll Created Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION UPDATE USER ROLL
    ----------------------------------------------------------------------------------------------------------
    */

    public function updateUserRoll( Request $request, $id ) {
        try {
            // return $request;
            $validator = Validator::make( $request->all(), [
                'user_roll'         => 'required',
                'is_active'         => 'required',
                // 'permission.*'        => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();
            $user_roll              = UserRoll::find( $id );
            $user_roll->title       = $request->user_roll;
            $user_roll->is_active   = $request->is_active;
            $user_roll->save();

            UserRollPermission::where( 'user_roll_id', $id )->delete();

            $permissions = $request->permission;
            array_push( $permissions, 'dashboard' );
            foreach ( $permissions as $key => $value ) {
                UserRollPermission::create( [
                    'user_roll_id'       => $id,
                    'permission'    => $value,
                ] );
            }

            DB::commit();
            if ( $id == Auth::user()->user_roll ) {
                $authController = new AuthController();
                return $authController->dologout();
            }
            return redirect()->route( 'user-roll' )->with( [ 'temp-success' => true, 'message' => 'User Roll Updated Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE USER
    ----------------------------------------------------------------------------------------------------------
    */

    public function createUser( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'name'      => 'required',
                'email'     => 'required',
                'user_roll'     => 'required',
                // 'image'         => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'password'      => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();

            $user = User::create( [
                'name'          => $request->name,
                'email'         => $request->email,
                'user_roll'     => $request->user_roll,
                'password'      => $request->password,
            ] );

            if ( $request->image ) {
                $user_image = uploadImage( $request->image, 'user_image' );

                UserImage::create( [
                    'user_id'       => $user->id,
                    'image_name'    => $user_image,
                ] );
            }

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'User Created Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION UPDATE USER
    ----------------------------------------------------------------------------------------------------------
    */

    public function updateUser( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'id'            => 'required',
                'name'          => 'required',
                'email'         => 'required',
                'user_roll'     => 'required',
                'is_active'     => 'required',
                'password'      => 'required_if:password-change,"on"',
            ],
            [
                'password.required_if' => 'The Password field is required when Password Change Check box Checked.',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();
            $user                     = User::find( $request->id );
            $user->name       = $request->name;
            $user->email   = $request->email;
            $user->user_roll   = $request->user_roll;
            $user->is_active   = $request->is_active;
            if ( $request->password ) {
                $user->password = $request->password;
            }
            $user->save();
            if ( $request->hasFile( 'image' ) ) {
                $user_image = uploadImage( $request->image, 'user_image' );
                $user_image_table = UserImage::where( 'user_id', $request->id )->first();
                $user_image_table->image_name = $user_image;
                $user_image_table->save();
            }

            DB::commit();
            if ( $request->id == Auth::id() && $request->password ) {
                $authController = new AuthController();
                return $authController->dologout();
            }
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'User Updated Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    //                                      FUNCTIONS FOR TRANSPOTATION TOOLS

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE VEHICAL TYPE
    ----------------------------------------------------------------------------------------------------------
    */

    public function createVehicalType( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'add_vehical_type'          => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();

            VehicalType::create( [
                'vehical_type'          => $request->add_vehical_type,
            ] );

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'Vehicle Type Created Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION UPDATE VEHICAL TYPE
    ----------------------------------------------------------------------------------------------------------
    */

    public function updateVehicalType( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'id'                        => 'required',
                'edit_vehical_type'         => 'required',
                'is_active'                 => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();

            $vehical_type = VehicalType::find( $request->id );
            $vehical_type->vehical_type = $request->edit_vehical_type;
            $vehical_type->is_active = $request->is_active;
            $vehical_type->save();

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'Vehicle Type Updated Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE VEHICAL
    ----------------------------------------------------------------------------------------------------------
    */

    public function createVehical( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'add_vehical_model'         => 'required',
                'add_vehical_no'            => 'required',
                'vehical_type'              => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();

            Vehical::create( [
                'vehical_model'         => $request->add_vehical_model,
                'vehical_no'            => $request->add_vehical_no,
                'vehical_type'          => $request->vehical_type,
            ] );

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'Vehical Created Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION UPDATE VEHICAL
    ----------------------------------------------------------------------------------------------------------
    */

    public function updateVehical( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'id'                        => 'required',
                'edit_vehical_model'        => 'required',
                'edit_vehical_no'           => 'required',
                'edit_vehical_type'         => 'required',
                'is_active'                 => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();

            $vehical = Vehical::find( $request->id );
            $vehical->vehical_model = $request->edit_vehical_model;
            $vehical->vehical_no = $request->edit_vehical_no;
            $vehical->vehical_type = $request->edit_vehical_type;
            $vehical->is_active = $request->is_active;
            $vehical->save();

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'Vehical Updated Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE DRIVER
    ----------------------------------------------------------------------------------------------------------
    */

    public function createDriver( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'full_name'             => 'required',
                'nic_no'            => 'required|unique:driver',
                'contact_no'            => 'required',
                'date_of_birth'         => 'required',
                'licence_no'            => 'required|unique:driver',
                'licence_front'         => 'required|image|mimes:jpeg,png,jpg',
                'address'               => 'required',
                'licence_back'          => 'required|image|mimes:jpeg,png,jpg',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();

            $driver = Driver::create( [
                'full_name'         => $request->full_name,
                'nic_no'            => $request->nic_no,
                'contact_no'            => $request->contact_no,
                'date_of_birth'          => Carbon::parse( $request->date_of_birth ),
                'licence_no'          => $request->licence_no,
                'address'          => $request->address,
            ] );

            $licence_front  =  uploadImage( $request->licence_front, 'licence/front' );
            $licence_back   =  uploadImage( $request->licence_front, 'licence/back' );

            LicenceImage::create( [
                'driver_id' => $driver->id,
                'front_image_name' => $licence_front,
                'back_image_name' => $licence_back,
            ] );

            DB::commit();
            return redirect()->route( 'view-driver' )->with( [ 'temp-success' => true, 'message' => 'Driver Created Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->route( 'view-driver' )->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION UPDATE DRIVER
    ----------------------------------------------------------------------------------------------------------
    */

    public function updateDriver( Request $request, $id ) {
        try {
            $validator = Validator::make( $request->all(), [
                'full_name' => 'required',
                'nic_no' => 'required|unique:driver,nic_no,' . $id,
                'contact_no' => 'required',
                'date_of_birth' => 'required',
                'licence_no' => 'required|unique:driver,licence_no,' . $id,
                'address' => 'required',
                'is_active' => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();

            $driver = Driver::find( $id );
            $driver->full_name = $request->full_name;
            $driver->nic_no = $request->nic_no;
            $driver->contact_no = $request->contact_no;
            $driver->date_of_birth = Carbon::parse( $request->date_of_birth );
            $driver->licence_no = $request->licence_no;
            $driver->address = $request->address;
            $driver->is_active = $request->is_active;
            $driver->save();

            if ( $request->licence_front || $request->licence_back ) {
                $images = LicenceImage::where( 'driver_id', $id )->first();
                if ( $request->licence_front ) {
                    $licence_front  =  uploadImage( $request->licence_front, 'licence/front' );
                    $images->front_image_name = $licence_front;
                }
                if ( $request->licence_back ) {
                    $licence_back  =  uploadImage( $request->licence_back, 'licence/back' );
                    $images->back_image_name = $licence_back;
                }
                $images->save();
            }
            DB::commit();
            return redirect()->route( 'view-driver' )->with( [ 'temp-success' => true, 'message' => 'Driver Updated Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    //                                      FUNCTIONS FOR HOTEL MANAGEMENT TOOLS

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE ROOM TYPE
    ----------------------------------------------------------------------------------------------------------
    */

    public function createRoomType( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'add_room_type'             => 'required',
                'add_short_code'            => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }

            DB::beginTransaction();

            RoomType::create( [
                'room_type'         => $request->add_room_type,
                'short_code'        => $request->add_short_code,
            ] );

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'Room Type Created Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION UPDATE ROOM TYPE
    ----------------------------------------------------------------------------------------------------------
    */

    public function updateRoomType( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'id' => 'required',
                'edit_room_type' => 'required',
                'edit_short_code' => 'required',
                'is_active' => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();

            $room_type = RoomType::find( $request->id );
            $room_type->room_type = $request->edit_room_type;
            $room_type->short_code = $request->edit_short_code;
            $room_type->is_active = $request->is_active;
            $room_type->save();

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'Room Type Updated Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE ROOM CATEGORY
    ----------------------------------------------------------------------------------------------------------
    */

    public function createRoomCategory( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'add_room_category'             => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }

            DB::beginTransaction();

            RoomCategory::create( [
                'room_category'         => $request->add_room_category,
            ] );

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'Room Category Created Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION UPDATE ROOM CATEGORY
    ----------------------------------------------------------------------------------------------------------
    */

    public function updateRoomCategory( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'id' => 'required',
                'edit_room_category' => 'required',
                'is_active' => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();

            $room_category = RoomCategory::find( $request->id );
            $room_category->room_category = $request->edit_room_category;
            $room_category->is_active = $request->is_active;
            $room_category->save();

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'Room Category Updated Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE HOTEL CITY
    ----------------------------------------------------------------------------------------------------------
    */

    public function createHotelCity( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'add_hotel_cities'             => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }

            DB::beginTransaction();

            HotelCity::create( [
                'city'         => $request->add_hotel_cities,
            ] );

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'City Details Created Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION UPDATE HOTEL CITY
    ----------------------------------------------------------------------------------------------------------
    */

    public function updateHotelCity( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'id' => 'required',
                'edit_hotel_city' => 'required',
                'is_active' => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();

            $hotel_city = HotelCity::find( $request->id );
            $hotel_city->city = $request->edit_hotel_city;
            $hotel_city->is_active = $request->is_active;
            $hotel_city->save();

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'City Details Updated Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE HOTEL
    ----------------------------------------------------------------------------------------------------------
    */

    public function createHotel( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'hotel_name'   => 'required',
                'rate'         => 'required',
                'phone_one'    => 'required',
                'address'      => 'required',
                'room_category'         => 'required|array',
                'room_category.*'       => 'required',
                'city' => 'required',
                'room_type'    => 'required|array',
                'room_type.*'  => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }

            DB::beginTransaction();

            $hotel = Hotel::create( [
                'hotel_name'        => $request->hotel_name,
                'rate'              => $request->rate,
                'phone_one'        => $request->phone_one,
                'address'        => $request->address,
            ] );

            if ( $request->phone_two ) {
                $created_hotel = Hotel::find( $hotel->id );
                $created_hotel->phone_two = $request->phone_two;
                $created_hotel->save();
            }

            HotelCityMap::create( [
                'hotel_id' => $hotel->id,
                'city_id' => $request->city,
            ] );

            foreach ( $request->room_category as $key => $room_category ) {
                foreach ( $request->room_type[ $key ] as $room_type ) {
                    HotelRoomTypeMap::create( [
                        'hotel_id' => $hotel->id,
                        'room_category_id' => $room_category,
                        'room_type_id' => $room_type,
                    ] );
                }
            }

            DB::commit();
            return redirect()->route( 'hotel' )->with( [ 'temp-success' => true, 'message' => 'Hotel Details Created Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION UPDATE HOTEL
    ----------------------------------------------------------------------------------------------------------
    */

    public function updateHotel( Request $request, $id ) {
        try {
            $validator = Validator::make( $request->all(), [
                'hotel_name'   => 'required',
                'rate'         => 'required',
                'phone_one'    => 'required',
                'address'      => 'required',
                'room_category'         => 'required|array',
                'room_category.*'       => 'required',
                'city' => 'required',
                'is_active' => 'required',
                'room_type'    => 'required|array',
                'room_type.*'  => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }

            DB::beginTransaction();

            $hotel = Hotel::find( $id );
            $hotel->hotel_name = $request->hotel_name;
            $hotel->rate = $request->rate;
            $hotel->phone_one = $request->phone_one;
            $hotel->address = $request->address;
            $hotel->is_active = $request->is_active;

            if ( $request->phone_two ) {
                $hotel->phone_two = $request->phone_two;
            }
            $hotel->save();

            HotelCityMap::where( 'hotel_id', $id )->delete();

            HotelCityMap::create( [
                'hotel_id' => $hotel->id,
                'city_id' => $request->city,
            ] );

            HotelRoomTypeMap::where( 'hotel_id', $id )->delete();

            foreach ( $request->room_category as $key => $room_category ) {
                foreach ( $request->room_type[ $key ] as $room_type ) {
                    HotelRoomTypeMap::create( [
                        'hotel_id' => $hotel->id,
                        'room_category_id' => $room_category,
                        'room_type_id' => $room_type,
                    ] );
                }
            }

            DB::commit();
            return redirect()->route( 'hotel' )->with( [ 'temp-success' => true, 'message' => 'Hotel Details Updated Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE COUNTRY CODE
    ----------------------------------------------------------------------------------------------------------
    */

    public function createCountryCode( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'add_country_name'         => 'required',
                'add_country_code'            => 'required',
                'add_nationality'            => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();

            Country::create( [
                'country_name'         => $request->add_country_name,
                'code'            => $request->add_country_code,
                'nationality'            => $request->add_nationality,
            ] );

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'Country Details Created Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION UPDATE COUNTRY CODE
    ----------------------------------------------------------------------------------------------------------
    */

    public function updateCountry( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'id'                      => 'required',
                'edit_country_name'        => 'required',
                'edit_country_code'        => 'required',
                'edit_nationality'        => 'required',
                'is_active'                 => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();

            $country = Country::find( $request->id );
            $country->country_name = $request->edit_country_name;
            $country->code = $request->edit_country_code;
            $country->nationality = $request->edit_nationality;
            $country->is_active = $request->is_active;
            $country->save();

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'Country Details Updated Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE BASIS CODE
    ----------------------------------------------------------------------------------------------------------
    */

    public function createBasis( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'add_basis_title'           => 'required',
                'add_basis_code'            => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();

            Basis::create( [
                'title'         => $request->add_basis_title,
                'code'            => $request->add_basis_code,
            ] );

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'Basis Details Created Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION UPDATE COUNTRY CODDE
    ----------------------------------------------------------------------------------------------------------
    */

    public function updateBasis( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'id'                      => 'required',
                'edit_basis_title'        => 'required',
                'edit_basis_code'        => 'required',
                'is_active'                 => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();

            $basis = Basis::find( $request->id );
            $basis->title = $request->edit_basis_title;
            $basis->code = $request->edit_basis_code;
            $basis->is_active = $request->is_active;
            $basis->save();

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'Basis Details Updated Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE GUIDE LANGUAGE
    ----------------------------------------------------------------------------------------------------------
    */

    public function createGuideLanguage( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'add_language'         => 'required',

            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();

            GuideLanguage::create( [
                'language'         => $request->add_language,
            ] );

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'Language Details Created Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION UPDATE COUNTRY CODDE
    ----------------------------------------------------------------------------------------------------------
    */

    public function updateLanguage( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'id'                    => 'required',
                'edit_language'         => 'required',
                'is_active'             => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();

            $language = GuideLanguage::find( $request->id );
            $language->language = $request->edit_language;
            $language->is_active = $request->is_active;
            $language->save();

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'Language Updated Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE GUIDE DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function createGuide( Request $request ) {
        try {

            $validator = Validator::make( $request->all(), [
                'add_full_name'         => 'required',
                'add_nic'               => 'required',
                'add_address'           => 'required',
                'add_contact_no'           => 'required',
                'add_language'          => 'required|array',
                'add_language.*'        => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();
            $guide = Guide::create( [
                'full_name'         => $request->add_full_name,
                'nic'         => $request->add_nic,
                'address'         => $request->add_address,
                'contact_no'         => $request->add_contact_no,
            ] );

            foreach ( $request->add_language as $value ) {
                $language = GuideLanguageMap::create( [
                    'guide_id'         => $guide->id,
                    'language_id'       => $value,
                ] );
            }
            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'Guide Registered Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION UPDATE GUIDE DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function updateGuide( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'id'                    => 'required',
                'edit_full_name'        => 'required',
                'edit_nic'              => 'required',
                'edit_address'          => 'required',
                'edit_language'         => 'required|array',
                'edit_language.*'       => 'required',
                'is_active'             => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();

            $guide = Guide::find( $request->id );
            $guide->full_name = $request->edit_full_name;
            $guide->nic = $request->edit_nic;
            $guide->address = $request->edit_address;
            $guide->is_active = $request->is_active;
            $guide->save();

            GuideLanguageMap::where( 'guide_id', $request->id )->delete();

            foreach ( $request->edit_language as $value ) {
                GuideLanguageMap::create( [
                    'guide_id'         => $request->id,
                    'language_id'       => $value,
                ] );
            }

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'Guide Details Updated Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE AGENT DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function createAgent( Request $request ) {
        try {

            $validator = Validator::make( $request->all(), [
                'add_name'         => 'required',
                'add_email'        => 'required',
                'add_contact_no'   => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();
            Agent::create( [
                'name'              => $request->add_name,
                'email'             => $request->add_email,
                'contact_no'        => $request->add_contact_no,
            ] );

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'Agent Registered Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION UPDATE AGENT DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function updateAgent( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'id'                    => 'required',
                'edit_name'             => 'required',
                'edit_email'            => 'required',
                'edit_contact_no'       => 'required',
                'is_active'             => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();

            $agent = Agent::find( $request->id );
            $agent->name = $request->edit_name;
            $agent->email = $request->edit_email;
            $agent->contact_no = $request->edit_contact_no;
            $agent->is_active = $request->is_active;
            $agent->save();

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'Agent Details Updated Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE TOUR DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function addTour( Request $request ) {
        try {

            $validator = Validator::make( $request->all(), [
                'guest_name'        => 'required',
                'country'           => 'required',
                'no_of_visiter'     => 'required',
                'arrivel_date'      => 'required',
                'departure_date'    => 'required',
                'agent'             => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();

            $created_tour = Tour::create( [
                'guest_name'            => $request->guest_name,
                'country'               => $request->country,
                'no_of_visiter'         => $request->no_of_visiter,
                'arrivel_date'          => $request->arrivel_date,
                'departure_date'        => $request->departure_date,
                'agent'                 => $request->agent,
                'status'                => 2,
            ] );

            $country_code = Country::select( 'code' )->where( 'id', $request->country )->first();
            $tour_number = 'NV-'.$country_code->code.'-'.str_pad( $created_tour->id, 5, '0', STR_PAD_LEFT );
            $tour = Tour::find( $created_tour->id );
            $tour->tour_number = $tour_number;
            $tour->save();

            $arrival_date = Carbon::parse( $tour->arrivel_date );
            $departure_date = Carbon::parse( $tour->departure_date );
            $diffInDays = $arrival_date->diffInDays( $departure_date );

            for ( $i = 0; $i <= $diffInDays; $i++ ) {
                TourSchedule::create( [
                    'tour_id' => $created_tour->id,
                    'tour_number' => $tour->tour_number,
                    'date' => $arrival_date->copy()->addDays( $i ),
                ] );
            }

            DB::commit();
            return redirect()->route( 'tour' )->with( [ 'temp-success' => true, 'message' => 'Tour Created Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CHANGE TOUR STATUS
    ----------------------------------------------------------------------------------------------------------
    */

    public function changeTourStatus( $id, $status ) {
        try {
            DB::beginTransaction();

            $tour = Tour::find( $id );
            $tour->status = $status;
            $tour->save();
            if ( $status == 1 ) {
                $message_text = 'Status Set Pending';
            }
            if ( $status == 2 ) {
                $tour_schedule = TourSchedule::where( 'tour_id', $id )->get();
                foreach ( $tour_schedule as $key => $value ) {
                    $value->amended_count = $value->amended_count + 1;
                    $value->save();
                }
                $message_text = 'confirmed';
            }
            if ( $status == 3 ) {
                $message_text = 'Canceled';
                $tour_schedule = TourSchedule::where( 'tour_id', $id )->get();
                foreach ( $tour_schedule as $key => $value ) {
                    $value->amended_count = $value->amended_count + 1;
                    $value->save();
                }
            }
            if ( $status == 4 ) {
                $message_text = 'Completed';
            }

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'Tour '.$message_text.' Successfully!' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CHANGE TOUR STATUS TO COMPLETE
    ----------------------------------------------------------------------------------------------------------
    */

    public function confirmHotelBooking( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'tour_id'                    => 'required',
                'tour_schedule_id'           => 'required',
                'hotel_id'                   => 'required',
                'start_date'                 => 'required',
                'confirmation_number'        => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();
            ConfirmatonVoucher::where( 'tour_schedule_id', $request->tour_schedule_id )->delete();
            ConfirmatonVoucher::create( [
                'tour_id'   => $request->tour_id,
                'tour_schedule_id'   => $request->tour_schedule_id,
                'hotel_id'   => $request->hotel_id,
                'confirmation_no'   => $request->confirmation_number,
            ] );
            $tour_schedule = TourSchedule::where( 'tour_id', $request->tour_id )
            ->where( 'hotel', $request->hotel_id )
            ->where( 'date', '>=', $request->start_date )
            ->orderBy( 'date' )
            ->get();

            if ( count( $tour_schedule ) == 1 ) {
                $tour_schedule[ 0 ]->hotel_booking_status = 1;
                $tour_schedule[ 0 ]->save();
            } else {
                for ( $key = 1; $key < count( $tour_schedule );
                $key++ ) {
                    $prev_date = Carbon::parse( $tour_schedule[ $key - 1 ]->date );
                    $current_date = Carbon::parse( $tour_schedule[ $key ]->date );
                    $different = $prev_date->diffInDays( $current_date );

                    if ( $different == 1 ) {
                        $tour_schedule[ $key - 1 ]->hotel_booking_status = 1;
                        $tour_schedule[ $key ]->hotel_booking_status = 1;
                        $tour_schedule[ $key ]->save();
                        $tour_schedule[ $key - 1 ]->save();
                    } else {
                        $tour_schedule[ $key - 1 ]->hotel_booking_status = 1;
                        $tour_schedule[ $key - 1 ]->save();
                        break;
                    }
                }
            }

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'Booking Confirmed Successfully!' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION UPDATE TOUR DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function updateTour( Request $request, $id ) {
        try {

            $validator = Validator::make( $request->all(), [
                'guest_name'        => 'required',
                'country'           => 'required',
                'no_of_visiter'     => 'required',
                'arrivel_date'      => 'required',
                'departure_date'    => 'required',
                'agent'             => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();
            $tour_schedule = TourSchedule::where( 'tour_id', $id )->get();
            $is_hotel_booked = false;
            if ( $tour_schedule[ 0 ]->hotel != null ) {
                $is_hotel_booked = true;
            }
            TempAmendmentTourSchedule::where( 'tour_id', $id )->delete();
            foreach ( $tour_schedule as $key => $value ) {
                $temp_data = TempAmendmentTourSchedule::create( [
                    'id' => $value->id,
                    'tour_id' => $value->tour_id,
                    'tour_number' => $value->tour_number,
                    'date' => $value->date,
                    'guide' => $value->guide,
                    'vehical' => $value->vehical,
                    'hotel' => $value->hotel,
                    'hotel_booking_status' => $value->hotel_booking_status,
                    'special_requirement' => $value->special_requirement,
                    'amended_count' => $value->amended_count,
                    'created_at' => $value->created_at,
                ] );
            }

            $reservation_details = ReservationVoucher::where( 'tour_id', $id )->get();
            TempReservationVoucher::where( 'tour_id', $id )->delete();
            foreach ( $reservation_details as $key => $value ) {
                $voucher_number = TempReservationVoucherNumber::where( 'tour_id', $value->tour_id )->where( 'hotel_id', $value->hotel_id )->first();
                if ( !$voucher_number ) {
                    TempReservationVoucherNumber::create( [
                        'tour_id' => $value->tour_id,
                        'hotel_id' => $value->hotel_id,
                        'voucher_number' => $value->id,
                    ] );
                }
                TempReservationVoucher::create( [
                    'id' => $value->id,
                    'tour_schedule_id' => $value->tour_schedule_id,
                    'tour_id' => $value->tour_id,
                    'hotel_id' => $value->hotel_id,
                    'checkin_date' => $value->checkin_date,
                    'checkout_date' => $value->checkout_date,
                    'no_of_nights' => $value->no_of_nights,
                    'rate' => $value->rate,
                    'special_requirement' => $value->special_requirement,
                    'is_generated' => $value->is_generated,
                ] );
            }

            ReservationVoucher::where( 'tour_id', $id )->delete();

            $tour = Tour::find( $id );
            $before_arrivel_date = $tour->arrivel_date;
            $before_departure_date = $tour->departure_date;

            $tour->guest_name = $request->guest_name;
            $tour->country = $request->country;
            $tour->no_of_visiter = $request->no_of_visiter;
            $tour->arrivel_date = $request->arrivel_date;
            $tour->departure_date = $request->departure_date;
            $tour->agent = $request->agent;
            $tour->status = 2;
            $tour->amended_count = $tour->amended_count + 1;
            $tour->save();

            $arrival_date = Carbon::parse( $request->arrivel_date );
            $departure_date = Carbon::parse( $request->departure_date );
            $diffInDays = $arrival_date->diffInDays( $departure_date );
            TourSchedule::where( 'tour_id', $id )->delete();
            if ( $is_hotel_booked == true ) {
                $amended_count = $temp_data->amended_count + 1;
            } else {
                $amended_count = 0;
            }
            for ( $i = 0; $i <= $diffInDays; $i++ ) {
                TourSchedule::create( [
                    'tour_id' => $id,
                    'tour_number' => $tour->tour_number,
                    'date' => $arrival_date->copy()->addDays( $i ),
                    'amended_count' => $amended_count,
                ] );
            }
            // if ( $before_arrivel_date != $request->arrivel_date || $before_departure_date != $request->departure_date ) {
            //     $arrival_date = Carbon::parse( $tour->arrivel_date );
            //     foreach ( $tour_schedule as $key => $value ) {
            //         ReservationVoucher::where( 'tour_schedule_id', $value->id )->delete();
            //         $value->date = $arrival_date->copy()->addDays( $key );
            //         $value->hotel_booking_status = 0;
            //         $value->amended_count = $value->amended_count + 1;
            //         $value->save();
            //     }
            // }

            DB::commit();
            return redirect()->route( 'tour' )->with( [ 'temp-success' => true, 'message' => 'Tour Updated Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION UPDATE TOUR FRANCHISE
    ----------------------------------------------------------------------------------------------------------
    */

    public function updateTourFranchise( Request $request, $id ) {
        try {

            DB::beginTransaction();

            $tour_shedule = TourSchedule::find( $id );
            if ( $request->guide ) {
                $tour_shedule->guide = $request->guide;
            }
            if ( $request->vehical ) {
                $tour_shedule->vehical = $request->vehical;
            }
            if ( $request->driver ) {
                $tour_shedule->driver = $request->driver;
            }
            if ( $request->hotel ) {
                $tour_shedule->hotel = $request->hotel;
                TourRoomMap::where( 'tour_id', $tour_shedule->tour_id )
                ->where( 'tour_schedule_id', $id )
                ->delete();
                foreach ( $request->room_category as $key => $value ) {
                    TourRoomMap::create( [
                        'tour_id' => $tour_shedule->tour_id,
                        'tour_schedule_id' => $id,
                        'hotel_id' => $request->hotel,
                        'room_category_id' => $value,
                        'room_type_id' => $request->room_type[ $key ],
                        'basis_id' => $request->basis[ $key ],
                        'no_of_room' => $request->rooms_count[ $key ],
                    ] );
                }

            }
            if ( $request->special_requirement ) {
                $tour_shedule->special_requirement = $request->special_requirement;
            }
            $tour_shedule->save();

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'Franchise Assign Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE TRANSPORT FRANCHISE
    ----------------------------------------------------------------------------------------------------------
    */

    public function createTransportFranchise( Request $request, $id ) {
        try {

            $validator = Validator::make( $request->all(), [
                'guide'   => 'required',
                'vehical' => 'required',
                'driver'  => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }

            DB::beginTransaction();

            $tourSchedules = TourSchedule::where( 'tour_id', $id )->get();

            foreach ( $tourSchedules as $tourSchedule ) {
                $tourSchedule->update( [
                    'guide'             => $request->guide,
                    'vehical'           => $request->vehical,
                    'driver'            => $request->driver,
                    'special_requirement' => $request->special_requirement,
                ] );
            }

            DB::commit();
            return redirect()->route( 'manage-tour-from-transport' )->with( [ 'temp-success' => true, 'message' => 'Transportation assigned successfully!' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION ASSIGN HOTEL
    ----------------------------------------------------------------------------------------------------------
    */

    public function assignHotelFromHM( Request $request ) {
        try {
            // return $request;
            // Convert comma-separated strings to arrays
            $ids = explode( ',', $request->input( 'ids' ) );
            $request->merge( [ 'ids' => $ids ] );

            // Validate the request data
            $validator = Validator::make( $request->all(), [
                'hotel' => 'required|integer',
                'room_category' => 'required|array',
                'room_category.*' => 'required|integer',
                'room_type' => 'required|array',
                'room_type.*' => 'required|integer',
                'basis' => 'required|integer',
                'rooms_count' => 'required|array',
                'rooms_count.*' => 'required|integer',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [
                    'error' => true,
                    'message' => implode( ' ', $validator->messages()->all() )
                ] );
            }

            DB::beginTransaction();
            foreach ( $request->ids as $key => $value ) {
                $tour_schedule = TourSchedule::find( $value );
                if ( !$tour_schedule ) {
                    return redirect()->back()->with( [
                        'error' => true,
                        'message' => 'Tour Schedule not found for ID ' . $value
                    ] );
                }
                $tour_schedule->hotel = $request->hotel;
                $tour_schedule->save();

                foreach ( $request->room_category as $category_key => $value2 ) {
                    $tour_id = ( int ) $tour_schedule->tour_id;
                    $tour_schedule_id = ( int ) $value;
                    $hotel_id = ( int ) $request->hotel;
                    $room_category_id = ( int ) $value2;
                    $room_type_id = ( int ) $request->room_type[ $category_key ];
                    $basis_id = ( int ) $request->basis;
                    $no_of_room = ( int ) $request->rooms_count[ $category_key ];

                    TourRoomMap::create( [
                        'tour_id' => $tour_id,
                        'tour_schedule_id' => $tour_schedule_id,
                        'hotel_id' => $hotel_id,
                        'room_category_id' => $room_category_id,
                        'room_type_id' => $room_type_id,
                        'basis_id' => $basis_id,
                        'no_of_room' => $no_of_room,
                    ] );
                }
            }

            DB::commit();
            return redirect()->back()->with( [
                'temp-success' => true,
                'message' => 'Hotel Assigned Successfully!'
            ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [
                'error' => true,
                'message' => $th->getMessage() . ' at line ' . $th->getLine()
            ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION RE ASSIGN HOTEL
    ----------------------------------------------------------------------------------------------------------
    */

    public function reAssignHotelFromHM( Request $request ) {
        try {
            // return $request;
            // Convert comma-separated strings to arrays
            $ids = explode( ',', $request->input( 'ids' ) );
            $request->merge( [ 'ids' => $ids ] );

            // Validate the request data
            $validator = Validator::make( $request->all(), [
                'hotel' => 'required|integer',
                'room_category' => 'required|array',
                'room_category.*' => 'required|integer',
                'room_type' => 'required|array',
                'room_type.*' => 'required|integer',
                'basis' => 'required|integer',
                'rooms_count' => 'required|array',
                'rooms_count.*' => 'required|integer',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [
                    'error' => true,
                    'message' => implode( ' ', $validator->messages()->all() )
                ] );
            }

            DB::beginTransaction();

            foreach ( $request->ids as $key => $value ) {
                $tour_schedule = TourSchedule::find( $value );
                if ( !$tour_schedule ) {
                    return redirect()->back()->with( [
                        'error' => true,
                        'message' => 'Tour Schedule not found for ID ' . $value
                    ] );
                }
                $tour_schedule->hotel = $request->hotel;
                $tour_schedule->save();

                foreach ( $request->room_category as $category_key => $value2 ) {
                    $tour_id = ( int ) $tour_schedule->tour_id;
                    $tour_schedule_id = ( int ) $value;
                    $hotel_id = ( int ) $request->hotel;
                    $room_category_id = ( int ) $value2;
                    $room_type_id = ( int ) $request->room_type[ $category_key ];
                    $basis_id = ( int ) $request->basis;
                    $no_of_room = ( int ) $request->rooms_count[ $category_key ];

                    TourRoomMap::create( [
                        'tour_id' => $tour_id,
                        'tour_schedule_id' => $tour_schedule_id,
                        'hotel_id' => $hotel_id,
                        'room_category_id' => $room_category_id,
                        'room_type_id' => $room_type_id,
                        'basis_id' => $basis_id,
                        'no_of_room' => $no_of_room,
                    ] );
                }
            }
            $new_tourSchedule = TourSchedule::find( $request->ids[ 0 ] );
            $all_new_tour_schedule = TourSchedule::where( 'tour_id', $new_tourSchedule->tour_id )->get();
            $whole_schedule_hotel_assign = true;
            for ( $i = 0; $i < count( $all_new_tour_schedule ) - 1 ;$i++ ) {
                if ( $all_new_tour_schedule[ $i ]->hotel == null ) {
                    $whole_schedule_hotel_assign = false;
                    break;
                }
            }
            if ($whole_schedule_hotel_assign == true) {

                $old_hotels = TempAmendmentTourSchedule::where('tour_id', $new_tourSchedule->tour_id)->pluck('hotel')->toArray();
                $new_hotels = TourSchedule::where('tour_id', $new_tourSchedule->tour_id)->pluck('hotel')->toArray();

                $unmatched_hotels = array_diff($old_hotels, $new_hotels);

                $already_unmatched_hotels = [];

                foreach ($unmatched_hotels as $unmatched_hotel) {
                    if (!in_array($unmatched_hotel, $already_unmatched_hotels)) {
                        $already_unmatched_hotels[] = $unmatched_hotel;
                        $updated_amended_schedules = TempAmendmentTourSchedule::where('tour_id', $new_tourSchedule->tour_id)->where('hotel',$unmatched_hotel)->get();
                        foreach ($updated_amended_schedules as $key => $updated_amended_schedule) {
                           $updated_amended_schedule->hotel_booking_status = 2;
                           $updated_amended_schedule->save();
                        }
                        $temp_reservation_voucher = TempReservationVoucher::where('tour_id', $new_tourSchedule->tour_id)->where('hotel_id',$unmatched_hotel)->get();
                        foreach ($temp_reservation_voucher as $key => $value) {
                            CancelledReservation::create([
                                'tour_number' => $new_tourSchedule->tour_number,
                                'tour_id' => $value->tour_id,
                                'tour_schedule_id' => $value->tour_schedule_id,
                                'hotel_id' => $value->hotel_id,
                                'reservation_voucher_no' => $value->id,
                                'checkin_date' => $value->checkin_date,
                                'checkout_date' => $value->checkout_date,
                                'booking_status' => 2,
                                'no_of_nights' => $value->no_of_nights,
                            ]);
                        }

                    }
                }
            }

            DB::commit();
            return redirect()->back()->with( [
                'temp-success' => true,
                'message' => 'Hotel Re Assigned Successfully!'
            ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [
                'error' => true,
                'message' => $th->getMessage() . ' at line ' . $th->getLine()
            ] );
        }
    }


     /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CANCELLATION ACCEPT
    ----------------------------------------------------------------------------------------------------------
    */

    public function cancellationAccept( Request $request ) {
        try {

            // Validate the request data
            $validator = Validator::make( $request->all(), [
                'id' => 'required|integer',
                'confirmation_number' => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [
                    'error' => true,
                    'message' => implode( ' ', $validator->messages()->all() )
                ] );
            }

            DB::beginTransaction();

            $cancel_reservation = CancelledReservation::find($request->id);
            $cancel_reservation->confirmation_no = $request->confirmation_number;
            $cancel_reservation->booking_status = 3;
            $cancel_reservation->save();

            DB::commit();
            return redirect()->back()->with( [
                'temp-success' => true,
                'message' => 'Cancel Reservation Confirmed Successfully!'
            ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [
                'error' => true,
                'message' => $th->getMessage() . ' at line ' . $th->getLine()
            ] );
        }
    }

}
