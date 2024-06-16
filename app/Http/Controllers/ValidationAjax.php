<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Basis;
use App\Models\RoomType;
use App\Models\Driver;
use App\Models\Country;
use App\Models\Guide;
use App\Models\Vehical;

class ValidationAjax extends Controller {
    public function userEmailValidation( Request $request ) {
        $email = $request->input( 'email' );

        $isUnique = !User::where( 'email', $email )->exists();

        return response()->json( [ 'valid' => $isUnique ] );
    }

    public function updateUserEmailValidation( Request $request ) {
        $email = $request->input( 'email' );
        $id = $request->input( 'id' );

        $isUnique = !User::where( 'email', $email )->where( 'id','!=', $id )->exists();

        return response()->json( [ 'valid' => $isUnique ] );
    }

    public function basisCodeValidation( Request $request ) {
        $basis_code = $request->input( 'basis_code' );

        $isUnique = !Basis::where( 'code', $basis_code )->exists();

        return response()->json( [ 'valid' => $isUnique ] );
    }

    public function updateBasisCodeValidation( Request $request ) {
        $basis_code = $request->input( 'code' );
        $id = $request->input( 'id' );

        $isUnique = !Basis::where( 'code', $basis_code )->where( 'id','!=', $id )->exists();

        return response()->json( [ 'valid' => $isUnique ] );
    }

    public function roomTypeValidation( Request $request ) {
        $short_code = $request->input( 'short_code' );

        $isUnique = !RoomType::where( 'short_code', $short_code )->exists();

        return response()->json( [ 'valid' => $isUnique ] );
    }

    public function updateRoomTypeCodeValidation( Request $request ) {
        $short_code = $request->input( 'code' );
        $id = $request->input( 'id' );

        $isUnique = !RoomType::where( 'short_code', $short_code )->where( 'id','!=', $id )->exists();

        return response()->json( [ 'valid' => $isUnique ] );
    }

    public function driverNicValidation( Request $request ) {
        $nic_no = $request->input( 'nic_no' );

        $isUnique = !Driver::where( 'nic_no', $nic_no )->exists();

        return response()->json( [ 'valid' => $isUnique ] );
    }

    public function guideNicValidation( Request $request ) {
        $nic = $request->input( 'add_nic' );

        $isUnique = !Guide::where( 'nic', $nic )->exists();

        return response()->json( [ 'valid' => $isUnique ] );
    }

    public function vehicleNumberValidation( Request $request ) {
        $no = $request->input( 'add_vehical_no' );

        $isUnique = !Vehical::where( 'vehical_no', $no )->exists();

        return response()->json( [ 'valid' => $isUnique ] );
    }

    public function driverLicenceNoValidation( Request $request ) {
        $licence_no = $request->input( 'licence_no' );

        $isUnique = !Driver::where( 'licence_no', $licence_no )->exists();

        return response()->json( [ 'valid' => $isUnique ] );
    }

    public function countryCodeValidation( Request $request ) {
        $code = $request->input( 'code' );

        $isUnique = !Country::where( 'code', $code )->exists();

        return response()->json( [ 'valid' => $isUnique ] );
    }

    public function updateCountryCodeValidation( Request $request ) {
        $code = $request->input( 'code' );
        $id = $request->input( 'id' );

        $isUnique = !Country::where( 'code', $code )->where( 'id','!=', $id )->exists();

        return response()->json( [ 'valid' => $isUnique ] );
    }

    public function updateVehicleNoValidation( Request $request ) {
        $no = $request->input( 'edit_vehical_no' );
        $id = $request->input( 'id' );

        $isUnique = !Vehical::where( 'vehical_no', $no )->where( 'id','!=', $id )->exists();

        return response()->json( [ 'valid' => $isUnique ] );
    }

    public function updateGuideNicValidation( Request $request ) {
        $nic = $request->input( 'edit_nic' );
        $id = $request->input( 'id' );

        $isUnique = !Guide::where( 'nic', $nic )->where( 'id','!=', $id )->exists();

        return response()->json( [ 'valid' => $isUnique ] );
    }

    public function updateDriverNicValidation( Request $request ) {
        $no = $request->input( 'nic_no' );
        $id = $request->input( 'id' );

        $isUnique = !Driver::where( 'nic_no', $no )->where( 'id','!=', $id )->exists();

        return response()->json( [ 'valid' => $isUnique ] );
    }


}
