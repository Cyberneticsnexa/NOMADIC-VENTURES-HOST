<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ViewController extends DataController
{
    /*---------------------------------------------------------------------------------------------------------------------------------------------------------- */
    /*BACK-END */
    /*---------------------------------------------------------------------------------------------------------------------------------------------------------- */

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW LOGIN
    ----------------------------------------------------------------------------------------------------------
    */

    public function login() {
        $data['site_settings'] = $this->getSiteSettings();
        return view::make( 'back-end.login',$data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW DEFAULT
    ----------------------------------------------------------------------------------------------------------
    */

    public function default( $data ) {

        $css = array(
            config( 'site-specific.google-font-css' ),
            config( 'site-specific.all-min-css' ),
            config( 'site-specific.all-min-css2' ),
            config( 'site-specific.icon-min-css' ),
            config( 'site-specific.tempusdominus-bootstrap-min-css' ),
            config( 'site-specific.icheck-bootstrap-min-css' ),
            config( 'site-specific.jqvmap-min-css' ),
            config( 'site-specific.adminlte-min-css' ),
            config( 'site-specific.OverlayScrollbars-min-css' ),
            config( 'site-specific.daterangepicker-min-css' ),
            config( 'site-specific.summernote-min-css' ),
            config( 'site-specific.sweetalert-css' ),
            config( 'site-specific.toastr-css' ),
            config( 'site-specific.select2-css' ),
            config( 'site-specific.select2-bootstrap4-css' ),
            config( 'site-specific.custom-css' ),
            config( 'site-specific.codemirror-min-css' ),
            config( 'site-specific.dropify-css' ),
        );

        $script = array(
            config( 'site-specific.jquery-min-js' ),
            config( 'site-specific.jquery-ui-min-js' ),
            config( 'site-specific.bootstrap-bundle-min-js' ),
            config( 'site-specific.Chart-min-js' ),
            // config( 'site-specific.sparkline-min-js' ),
            config( 'site-specific.jquery-vmap-min-js' ),
            config( 'site-specific.jquery-vmap-usa-min-js' ),
            config( 'site-specific.jquery-knob-min-js' ),
            config( 'site-specific.moment-min-js' ),
            config( 'site-specific.daterangepicker-min-js' ),
            config( 'site-specific.tempusdominus-bootstrap-min-js' ),
            config( 'site-specific.summernote-min-js' ),
            config( 'site-specific.jquery-overlayScrollbars-min-js' ),
            config( 'site-specific.adminlte-min-js' ),
            config( 'site-specific.sweetalert2-js' ),
            config( 'site-specific.toastr-js' ),
            config( 'site-specific.select2-js' ),
            config( 'site-specific.tooltip-core' ),
            config( 'site-specific.tooltip-dom' ),
            config( 'site-specific.jquery-validate-js' ),
            config( 'site-specific.additional-methods-js' ),
            config( 'site-specific.form-validation-init-js' ),
            config( 'site-specific.codemirror-min-js' ),
            config( 'site-specific.codemirror-htmlmixed-js' ),
            config( 'site-specific.dropify-init-js' ),
        );

        if ( isset( $data[ 'css' ] ) ) {
            $data[ 'css' ]    = array_merge( $css, $data[ 'css' ] );
        } else {
            $data[ 'css' ]    = $css;
        }
        if ( isset( $data[ 'script' ] ) ) {
            $data[ 'script' ] = array_merge( $script, $data[ 'script' ] );
        } else {
            $data[ 'script' ] = $script;
        }
        $data['site_settings'] = $this->getSiteSettings();
        return view::make( 'back-end.home', $data );
    }

    //                                                  FUNCTIONS FOR VIEW DEVELOPER TOOL

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION SITE SETTINGS
    ----------------------------------------------------------------------------------------------------------
    */

    public function viewSiteSetting() {
        $data = [
            'title'     => 'Site Settings',
            'view'      => 'back-end.site-settings',
            'script'                => array(config('site-specific.site-settings-init-js')),

            'user_roll' => $this->getUserRoll(),
        ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW DASHBOARD
    ----------------------------------------------------------------------------------------------------------
    */

    public function dashboard() {
        $data = [
            'title' => 'Dashboard',
            'view' => 'back-end.dashboard',
            'css'       => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'    => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                config( 'site-specific.pdfmake-min-js' ),
                                config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                config( 'site-specific.dashboard-init-js' )
                             ),
            'dashboard_data' => $this->getDashboardData(),
        ];

        // return $data['dashboard_data'];
        return $this->default( $data );
    }

    //                                                  FUNCTIONS FOR VIEW ADMIN TOOL

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION USER ROLL DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function userRoll() {
        $data = [
            'title'     => 'User Roll',
            'view'      => 'back-end.user-roll',
            'css'       => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'    => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                config( 'site-specific.pdfmake-min-js' ),
                                config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                config( 'site-specific.user-roll-init-js' )
                             ),
            'user_roll' => $this->getUserRoll(),
        ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION EDIT USER ROLL DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function editUserRoll($id) {
        $data = [
            'title'                 => 'Edit User Roll',
            'view'                  => 'back-end.edit-user-roll',
            'script'                => array(config('site-specific.edit-user-roll-init-js')),
            'user_roll'             => $this->getUserRollForEdit($id),
            'user_roll_permission'  => $this->getSelectedUserRollPermission($id),
        ];
        // return $data['user_roll'];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION USER DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function userDetails() {
        $data = [
            'title'     => 'User',
            'view'      => 'back-end.user',
            'css'       => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'    => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                config( 'site-specific.pdfmake-min-js' ),
                                config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                config( 'site-specific.user-init-js' )
                             ),
            'user_roll' => $this->getUserRoll(1),
            'user'      => $this->getUser(),
        ];
        return $this->default( $data );
    }

    //                                                  FUNCTIONS FOR VIEW TRANSPOTATION

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VEHICAL TYPE DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function vehicalType() {
        $data = [
            'title'             => 'Vehicle Type',
            'view'              => 'back-end.vehical-type',
            'css'               => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'            => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                            config( 'site-specific.pdfmake-min-js' ),
                                            config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                            config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                            config( 'site-specific.vehical-type-init-js' )
                                        ),
            'vehical_type'      => $this->getVehicalType(),
        ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VEHICAL DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function vehical() {
        $data = [
            'title'             => 'Vehicle',
            'view'              => 'back-end.vehical',
            'css'               => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'            => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                            config( 'site-specific.pdfmake-min-js' ),
                                            config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                            config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                            config( 'site-specific.vehical-init-js' )
                                        ),
            'vehical_type'      => $this->getVehicalType(1),
            'vehical'           => $this->getVehical(),
        ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION ADD DRIVER
    ----------------------------------------------------------------------------------------------------------
    */

    public function addDriver() {
        $data = [
            'title'             => 'Create Driver',
            'view'              => 'back-end.add-driver',
            'css'               => array( config( 'site-specific.cropper-min-init-css' ) ),
            'script'            => array( config( 'site-specific.cropper-min-init-js' ),config( 'site-specific.create-driver-init-js' )),
        ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION DRIVER DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function viewDriver() {
        $data = [
            'title'             => 'Driver',
            'view'              => 'back-end.driver',
            'css'               => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'            => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                            config( 'site-specific.pdfmake-min-js' ),
                                            config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                            config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                            config( 'site-specific.vehical-init-js' )
                                        ),
            'driver'            => $this->getDriver(),
        ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION ADD DRIVER
    ----------------------------------------------------------------------------------------------------------
    */

    public function editDriver($id) {
        $data = [
            'title'             => 'Update Driver',
            'view'              => 'back-end.update-driver',
            'css'               => array( config( 'site-specific.cropper-min-init-css' ) ),
            'script'            => array( config( 'site-specific.cropper-min-init-js' ),
                                          config( 'site-specific.create-driver-init-js' ),
                                          config( 'site-specific.edit-driver-init-js' ),
                                        //   config( 'site-specific.edit-driver-image-init-js' ),
                                        ),
            'driver_details'    => $this->getDriverForEdit( $id )
        ];
        return $this->default( $data );
    }


    //                                                  FUNCTIONS FOR VIEW HOTEL MANAGEMENT

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION ROOM TYPE DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function roomType() {
        $data = [
            'title'             => 'Room Type',
            'view'              => 'back-end.room-type',
            'css'               => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'            => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                            config( 'site-specific.pdfmake-min-js' ),
                                            config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                            config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                            config( 'site-specific.room-type-init-js' )
                                        ),
            'room_type'         => $this->getRoomType(),
        ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION ROOM CATEGORY DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function roomCategory() {
        $data = [
            'title'             => 'Room Category',
            'view'              => 'back-end.room-category',
            'css'               => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                    config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'            => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                            config( 'site-specific.pdfmake-min-js' ),
                                            config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                            config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                            config( 'site-specific.room-category-init-js' )
                                        ),
            'room_category'     => $this->getRoomCategory(),
        ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION BASIS DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function basis() {
        $data = [
            'title'             => 'Basis',
            'view'              => 'back-end.basis',
            'css'               => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'            => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                            config( 'site-specific.pdfmake-min-js' ),
                                            config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                            config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                            config( 'site-specific.basis-init-js' )
                                        ),
            'basis'             => $this->getBasis(),
        ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION HOTEL CITIES DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function hotelCities() {
        $data = [
            'title'             => 'Hotel Cities',
            'view'              => 'back-end.hotel-cities',
            'css'               => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'            => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                            config( 'site-specific.pdfmake-min-js' ),
                                            config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                            config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                            config( 'site-specific.hotel-cities-init-js' )
                                        ),
            'hotel_city'        => $this->getHotelCity(),
        ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE HOTEL
    ----------------------------------------------------------------------------------------------------------
    */

    public function createHotel() {
        $data = [
            'title'             => 'Create Hotel',
            'view'              => 'back-end.create-hotel',
            'script'            => array( config( 'site-specific.create-hotel-init-js' )),
            'room_type'         => $this->getRoomType(1),
            'room_category'     => $this->getRoomCategory(1),
            'hotel_city'        => $this->getHotelCity(1),
        ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION HOTEL DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function viewHotels() {
        $data = [
            'title'             => 'Hotels',
            'view'              => 'back-end.view-hotels',
            'css'               => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'            => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                            config( 'site-specific.pdfmake-min-js' ),
                                            config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                            config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                            config( 'site-specific.hotels-init-js' )
                                        ),
            'hotels_details'    => $this->getHotels(),
        ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION HOTEL DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function viewHotel($id) {
        $hotel_details = $this->getHotel( $id );
        $data = [
            'title'             => $hotel_details['hotel_data']->hotel_name,
            'view'              => 'back-end.view-hotel',
            'hotel_details'     => $hotel_details,
        ];
        // return $hotel_details;
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION UPDATE HOTEL
    ----------------------------------------------------------------------------------------------------------
    */

    public function editHotels($id) {
        $hotel_details = $this->getHotel( $id );
        $data = [
            'title'             => "Update Hotel",
            'view'              => 'back-end.update-hotel',
            'hotel_details'     => $hotel_details,
            'room_type'         => $this->getRoomType(1),
            'room_category'     => $this->getRoomCategory(1),
            'hotel_city'        => $this->getHotelCity(1),
            'script'            => array( config( 'site-specific.update-hotel-init-js' )),
        ];
        // return $hotel_details;
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION COUNTRY DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function country() {
        $data = [
            'title'             => 'Country',
            'view'              => 'back-end.add-country-code',
            'css'               => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'            => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                            config( 'site-specific.pdfmake-min-js' ),
                                            config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                            config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                            config( 'site-specific.country-init-js' )
                                        ),
            'country_code'           => $this->getContryCode(),
        ];
        return $this->default( $data );
    }

     /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GUIDE LANGUAGE DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function guideLanguage() {
        $data = [
            'title'             => 'Guide Language',
            'view'              => 'back-end.guide-language',
            'css'               => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'            => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                            config( 'site-specific.pdfmake-min-js' ),
                                            config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                            config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                            config( 'site-specific.guide-init-js' )
                                        ),

            'guide_language'           => $this->getGuideLanguage(),
        ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GUIDE REGISTER DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function guideRegister() {
        $data = [
            'title'             => 'Guide',
            'view'              => 'back-end.guide',
            'css'               => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'            => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                            config( 'site-specific.pdfmake-min-js' ),
                                            config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                            config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                            config( 'site-specific.guide-register-init-js' )
                                        ),

            'guide_register'           => $this->getGuide(),
            'guide_language'      => $this->getGuideLanguage(1),
        ];
        // return $data["guide_register"];
        return $this->default( $data );
    }

    //                                                  FUNCTIONS FOR VIEW TOUR MANAGEMENT

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GUIDE REGISTER DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function agent() {
        $data = [
            'title'             => 'Agents',
            'view'              => 'back-end.agent',
            'css'               => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'            => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                            config( 'site-specific.pdfmake-min-js' ),
                                            config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                            config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                            config( 'site-specific.agent-init-js' )
                                        ),

            'agents'            => $this->getAgent(),
        ];
        // return $data["guide_register"];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE TOUR
    ----------------------------------------------------------------------------------------------------------
    */

    public function createTour() {
        $data = [
            'title'             => 'Create Tour',
            'view'              => 'back-end.create-tour',
            'country'           => $this->getContryCode(1),
            'agent'             => $this->getAgent(1),
        ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION TOUR DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function tour() {
        $data = [
            'title'             => 'Tour',
            'view'              => 'back-end.tour',
            'css'               => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'            => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                            config( 'site-specific.pdfmake-min-js' ),
                                            config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                            config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                            config( 'site-specific.tour-list-init-js' )
                                        ),

            'agents'            => $this->getAgent(),
        ];
        // return $data["guide_register"];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION TOUR SCHEDULE
    ----------------------------------------------------------------------------------------------------------
    */

    public function viewTourSchedule($id) {

        $tour_schedule = $this->getTourScheduleDetails($id);
        $data = [
            'title'             => $tour_schedule->tour_number.' Schedule',
            'view'              => 'back-end.tour-schedule',
            'css'               => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'            => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                            config( 'site-specific.pdfmake-min-js' ),
                                            config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                            config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                            config( 'site-specific.tour-schedule-init-js' )
                                        ),

            'tour_schedule'     => $tour_schedule,
        ];
        // return $tour_schedule;
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION EDIT TOUR
    ----------------------------------------------------------------------------------------------------------
    */

    public function editTour($id) {
        $data = [
            'title'             => 'Update Tour',
            'view'              => 'back-end.edit-tour',
            'script'            => array( config( 'site-specific.edit-tour-init-js' ) ),
            'country'           => $this->getContryCode(1),
            'agent'             => $this->getAgent(1),
            'tour'              => $this->getTour($id),
        ];
        // return $data['tour'];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION ASSIGN FRANCHISES
    ----------------------------------------------------------------------------------------------------------
    */

    public function assignFranchises($id) {
        $data = [
            'title'             => 'Assign Franchises',
            'view'              => 'back-end.assign-franchises',
            'script'            => array( config( 'site-specific.assign-franchise-init-js' )),
            'guide'             => $this->getGuide(1),
            'vehical'           => $this->getVehical(1),
            'driver'            => $this->getDriver(1),
            'hotel'             => $this->getHotels(1),
            'tour_schedule'     => $this->getTourSchedule($id),
            'guide_language'    => $this->getGuideLanguage(1),
            'vehical_type'      => $this->getVehicalType(1),
            'hotel_city'        => $this->getHotelCity(1),
            'basis'             => $this->getBasis(1),
        ];
        // return $data['hotel'];
        return $this->default( $data );
    }


    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION TOUR DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function manageTourFromTransport() {
        $data = [
            'title'             => 'Manage Tour',
            'view'              => 'back-end.transport-tour',
            'css'               => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'            => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                            config( 'site-specific.pdfmake-min-js' ),
                                            config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                            config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                            config( 'site-specific.transport-tour-list-init-js' )
                                        ),
        ];
        // return $data["guide_register"];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION ASSIGN FRANCHISES FROM TRANSPORT
    ----------------------------------------------------------------------------------------------------------
    */

    public function assignFranchiseFromTransport($id) {
        $data = [
            'title'             => 'Assign Franchises',
            'view'              => 'back-end.assign-franchises-from-transport',
            'script'            => array( config( 'site-specific.assign-franchise-from-transport-init-js' )),
            'guide'             => $this->getGuide(1),
            'vehical'           => $this->getVehical(1),
            'driver'            => $this->getDriver(1),
            'hotel'             => $this->getHotels(1),
            'guide_language'    => $this->getGuideLanguage(1),
            'vehical_type'      => $this->getVehicalType(1),
            'tour_id'           => $id,
        ];
        // return $data['hotel'];
        return $this->default( $data );
    }


    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION TOUR SCHEDULE FOR TRANSPOTATION
    ----------------------------------------------------------------------------------------------------------
    */

    public function viewTourScheduleForTranspotaion($id) {

        $tour_schedule = $this->getTourScheduleDetails($id);
        $data = [
            'title'             => $tour_schedule->tour_number.' Schedule',
            'view'              => 'back-end.tour-schedule-for-transpotation',
            'css'               => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'            => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                            config( 'site-specific.pdfmake-min-js' ),
                                            config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                            config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                            config( 'site-specific.tour-schedule-init-js' )
                                        ),

            'tour_schedule'     => $tour_schedule,
        ];
        // return $tour_schedule;
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION TOUR DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function manageTourFromHotel() {
        $data = [
            'title'             => 'Manage Tour',
            'view'              => 'back-end.hotel-tour',
            'css'               => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'            => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                            config( 'site-specific.pdfmake-min-js' ),
                                            config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                            config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                            config( 'site-specific.hotel-tour-list-init-js' )
                                        ),
        ];
        // return $data["guide_register"];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION TOUR SCHEDULE FOR HOTEL MANAGEMENT
    ----------------------------------------------------------------------------------------------------------
    */

    public function viewTourScheduleForHotel($id) {

        $tour_schedule = $this->getTourScheduleDetails($id);
        $data = [
            'title'             => $tour_schedule->tour_number.' Schedule',
            'view'              => 'back-end.tour-schedule-for-hotel',
            'css'               => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ),config( 'site-specific.datatable-select-min-css' ) ),
            'script'            => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                            config( 'site-specific.pdfmake-min-js' ),
                                            config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                            config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                            config( 'site-specific.datatable-select-min-js' ),
                                            config( 'site-specific.tour-schedule-for-hotel-init-js' )
                                        ),

            'tour_schedule'     => $tour_schedule,
            'hotel_city'        => $this->getHotelCity(1),
            'basis'             => $this->getBasis(1),
        ];
        // return $tour_schedule;
        return $this->default( $data );
    }


}
