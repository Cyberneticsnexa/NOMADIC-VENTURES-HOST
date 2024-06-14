<?php

use Illuminate\Support\Facades\Route;

/*
----------------------------------------------------------------------------------------------------------
                                                BACK END ROUTES
----------------------------------------------------------------------------------------------------------
*/

/*
----------------------------------------------------------------------------------------------------------
BACK END ROUTES WITHOUT LOGIN VALIDATE
----------------------------------------------------------------------------------------------------------
*/

Route::group([
    'namespace'=>'App\Http\Controllers',

],function ($router) {

    /*
    ----------------------------------------------------------------------------------------------------------
    VIEW CONTROLLER
    ----------------------------------------------------------------------------------------------------------
    */

    Route::get('/login'                             , 'ViewController@login')->name('login');
    Route::post('/signin'                           , 'AuthController@dologin')->name('signin');
    /*
    ----------------------------------------------------------------------------------------------------------
    AUTH CONTROLLER
    ----------------------------------------------------------------------------------------------------------
    */

    Route::get('/logout'                            , 'AuthController@dologout')->name('logout');
});

/*
----------------------------------------------------------------------------------------------------------
BACK END ROUTES WITH LOGIN & PERMISSION VALIDATE
----------------------------------------------------------------------------------------------------------
*/

Route::group([
    'middleware'=>['login_validation','permission_validation'],
    'namespace'=>'App\Http\Controllers',
],function ($router) {

    /*
    ----------------------------------------------------------------------------------------------------------
    VIEW CONTROLLER
    ----------------------------------------------------------------------------------------------------------
    */

    /*
    ----------------------------------------------------------------------------------------------------------
                                                    SINGLE VIEW ROUTES
    ----------------------------------------------------------------------------------------------------------
    */

    /*---------------------------------------------  VIEW DASHBOARD   --------------------------------------*/

    Route::get('/'                                  , 'ViewController@dashboard')->name('dashboard');

    /*---------------------------------------------  VIEW DASHBOARD   --------------------------------------*/

    Route::get('/site-settings'                     , 'ViewController@viewSiteSetting')->name('site-settings');

    /*
    ----------------------------------------------------------------------------------------------------------
                                                    MULTIPLE VIEW ROUTES
    ----------------------------------------------------------------------------------------------------------
    */

    /*
    ----------------------------------------------------------------------------------------------------------
                                                    ADMIN TOOLS
    ----------------------------------------------------------------------------------------------------------
    */

    Route::get('/user'                              , 'ViewController@userDetails')->name('user');

    Route::get('/user-roll'                         , 'ViewController@userRoll')->name('user-roll');

    Route::get('/edit-user-roll/{id?}'              , 'ViewController@editUserRoll')->name('edit-user-roll');

    /*
    ----------------------------------------------------------------------------------------------------------
                                                    TRANSPOTATION
    ----------------------------------------------------------------------------------------------------------
    */

    Route::get('/vehicle'                           , 'ViewController@vehical')->name('vehicle');

    Route::get('/vehicle-type'                      , 'ViewController@vehicalType')->name('vehicle-type');


    Route::get('/add-driver'                        , 'ViewController@addDriver')->name('add-driver');

    Route::get('/view-driver'                       , 'ViewController@viewDriver')->name('view-driver');

    Route::get('/edit-driver/{id?}'                 , 'ViewController@editDriver')->name('edit-driver');

    Route::get('/manage-tour-from-transport'        , 'ViewController@manageTourFromTransport')->name('manage-tour-from-transport');

    Route::get('/assign-franchise-from-transport/{id?}'                     , 'ViewController@assignFranchiseFromTransport')->name('assign-franchise-from-transport');


    /*
    ----------------------------------------------------------------------------------------------------------
                                                    HOTEL MANAGEMENT
    ----------------------------------------------------------------------------------------------------------
    */
    Route::get('/room-type'                         , 'ViewController@roomType')->name('room-type');

    Route::get('/room-category'                     , 'ViewController@roomCategory')->name('room-category');

    Route::get('/create-hotel'                      , 'ViewController@createHotel')->name('create-hotel');

    Route::get('/hotel-cities'                      , 'ViewController@hotelCities')->name('hotel-cities');

    Route::get('/hotel'                             , 'ViewController@viewHotels')->name('hotel');

    Route::get('/edit-hotel/{id?}'                  , 'ViewController@editHotels')->name('edit-hotel');

    Route::get('/basis'                             , 'ViewController@basis')->name('basis');

    Route::get('/manage-tour-from-hotel-management' , 'ViewController@manageTourFromHotel')->name('manage-tour-from-hotel-management');




    /*
    ----------------------------------------------------------------------------------------------------------
                                                    TOUR MANAGEMENT
    ----------------------------------------------------------------------------------------------------------
    */
    Route::get('/add-country-code'                  , 'ViewController@country')->name('add-country-code');

    Route::get('/create-tour'                       , 'ViewController@createTour')->name('create-tour');

    Route::get('/agent'                             , 'ViewController@agent')->name('agent');

    Route::get('/tour'                              , 'ViewController@tour')->name('tour');

    Route::get('/assign-franchises/{id?}'           , 'ViewController@assignFranchises')->name('assign-franchises');


    /*
    ----------------------------------------------------------------------------------------------------------
                                                    GUIDE
    ----------------------------------------------------------------------------------------------------------
    */

    Route::get('/guide-language'                    , 'ViewController@guideLanguage')->name('guide-language');

    Route::get('/guide-register'                    , 'ViewController@guideRegister')->name('guide-register');





    /*
    ----------------------------------------------------------------------------------------------------------
    ACTION CONTROLLER
    ----------------------------------------------------------------------------------------------------------
    */

    /*
    ----------------------------------------------------------------------------------------------------------
                                                    DEVELOPER TOOLS
    ----------------------------------------------------------------------------------------------------------
    */

    Route::post('/create-site-settings'             , 'ActionController@createSiteSettings')->name('create-site-settings');


    /*
    ----------------------------------------------------------------------------------------------------------
                                                    ADMIN TOOLS
    ----------------------------------------------------------------------------------------------------------
    */

    Route::post('/create-user-roll'                 , 'ActionController@createUserRoll')->name('create-user-roll');

    Route::post('/create-user'                      , 'ActionController@createUser')->name('create-user');

    Route::post('/edit-user'                        , 'ActionController@updateUser')->name('edit-user');


    /*
    ----------------------------------------------------------------------------------------------------------
                                                    TRANSPOTAION
    ----------------------------------------------------------------------------------------------------------
    */

    Route::post('/create-vehical-type'              , 'ActionController@createVehicalType')->name('create-vehical-type');

    Route::post('/edit-vehical-type'                , 'ActionController@updateVehicalType')->name('edit-vehical-type');

    Route::post('/create-vehical'                   , 'ActionController@createVehical')->name('create-vehical');

    Route::post('/edit-vehical'                     , 'ActionController@updateVehical')->name('edit-vehical');

    Route::post('/create-guide'                     , 'ActionController@guide')->name('create-guide');


    /*
    ----------------------------------------------------------------------------------------------------------
                                                    HOTEL MANAGEMENT
    ----------------------------------------------------------------------------------------------------------
    */

    Route::post('/create-room-type'                 , 'ActionController@createRoomType')->name('create-room-type');

    Route::post('/edit-room-type'                   , 'ActionController@updateRoomType')->name('edit-room-type');

    Route::post('/create-room-category'             , 'ActionController@createRoomCategory')->name('create-room-category');

    Route::post('/edit-room-category'               , 'ActionController@updateRoomCategory')->name('edit-room-category');

    Route::post('/create-hotel-cities'              , 'ActionController@createHotelCity')->name('create-hotel-cities');

    Route::post('/edit-hotel-city'                  , 'ActionController@updateHotelCity')->name('edit-hotel-city');

    Route::post('/create-basis'                     , 'ActionController@createBasis')->name('create-basis');

    Route::post('/edit-basis'                       , 'ActionController@updateBasis')->name('edit-basis');


    /*
    ----------------------------------------------------------------------------------------------------------
                                                    TOUR MANAGEMENT
    ----------------------------------------------------------------------------------------------------------
    */

    Route::post('/register-agent'                   , 'ActionController@createAgent')->name('register-agent');

    Route::post('/edit-agent-register'              , 'ActionController@updateAgent')->name('edit-agent-register');


     /*
    ----------------------------------------------------------------------------------------------------------
    AJAX CONTROLLER
    ----------------------------------------------------------------------------------------------------------
    */


});


/*
----------------------------------------------------------------------------------------------------------
BACK END ROUTES WITH LOGIN  VALIDATE
----------------------------------------------------------------------------------------------------------
*/

Route::group([
    'middleware'=>['login_validation'],
    'namespace'=>'App\Http\Controllers',
],function ($router) {

    /*
    ----------------------------------------------------------------------------------------------------------
    VIEW CONTROLLER
    ----------------------------------------------------------------------------------------------------------
    */

    /*
    ----------------------------------------------------------------------------------------------------------
                                                    HOTEL DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    Route::get('/view-hotel/{id?}'                  , 'ViewController@viewHotel');

    /*
    ----------------------------------------------------------------------------------------------------------
    ACTION CONTROLLER
    ----------------------------------------------------------------------------------------------------------
    */

    /*
    ----------------------------------------------------------------------------------------------------------
                                                    ADMIN TOOLS
    ----------------------------------------------------------------------------------------------------------
    */

    Route::post('/update-user-roll/{id?}'           , 'ActionController@updateUserRoll')->name('update-user-roll');

    /*
    ----------------------------------------------------------------------------------------------------------
                                                    TRANSPOTAION
    ----------------------------------------------------------------------------------------------------------
    */

    Route::post('/create-driver'                    , 'ActionController@createDriver')->name('create-driver');

    Route::post('/update-driver/{id?}'              , 'ActionController@updateDriver')->name('update-driver');

    Route::post('/create-transport-franchise/{id?}' , 'ActionController@createTransportFranchise')->name('create-transport-franchise');


    /*
    ----------------------------------------------------------------------------------------------------------
                                                    HOTEL MANAGEMENT
    ----------------------------------------------------------------------------------------------------------
    */

    Route::post('/add-hotel'                        , 'ActionController@createHotel')->name('add-hotel');

    Route::post('/update-hotel/{id?}'               , 'ActionController@updateHotel')->name('update-hotel');

    Route::get('/view-tour-schedule-for-hotel-management/{id?}'          , 'ViewController@viewTourScheduleForHotel');

    Route::post('/assign-hotel-for-tour'            , 'ActionController@assignHotelFromHM')->name('assign-hotel-for-tour');

    Route::post('/re-assign-hotel-for-tour'            , 'ActionController@reAssignHotelFromHM')->name('re-assign-hotel-for-tour');

    Route::get('/re-assign-hotel/{tour_number?}/{id?}'          , 'ViewController@reAssignHotelView');

    Route::get('/cancelled-bookings/{tour_number?}'          , 'ViewController@cancelledBooking');





     /*
    ----------------------------------------------------------------------------------------------------------
                                                    TOUR MANAGEMENT
    ----------------------------------------------------------------------------------------------------------
    */

    Route::post('/create-country'                   , 'ActionController@createCountryCode')->name('create-country');

    Route::post('/edit-country'                     , 'ActionController@updateCountry')->name('edit-country');

    Route::post('/add-tour'                         , 'ActionController@addTour')->name('add-tour');

    Route::get('/tour-status/{id?}/{status?}'       , 'ActionController@changeTourStatus')->name('tour-status');

    Route::post('/update-tour/{id?}'                 , 'ActionController@updateTour')->name('update-tour');

    Route::get('/view-tour-schedule/{id?}'          , 'ViewController@viewTourSchedule');

    Route::get('/view-tour-schedule-for-transpotaion/{id?}'          , 'ViewController@viewTourScheduleForTranspotaion');

    Route::get('/edit-tour/{id?}'                   , 'ViewController@editTour');

    Route::post('/update-tour-franchise/{id?}'      , 'ActionController@updateTourFranchise');

    Route::post('/confirm-hotel-booking'      , 'ActionController@confirmHotelBooking');

    Route::post('/get-hotels-for-tour'      , 'AjaxController@getHotelsForTourConfirmation');


    /*
    ----------------------------------------------------------------------------------------------------------
                                                    GUIDE LANGUAGE
    ----------------------------------------------------------------------------------------------------------
    */



    Route::post('/create-guide-language'            , 'ActionController@createGuideLanguage')->name('create-guide-language');

    Route::post('/edit-guide-language'              , 'ActionController@updateLanguage')->name('edit-guide-language');

    /*
    ----------------------------------------------------------------------------------------------------------
                                                    GUIDE LANGUAGE
    ----------------------------------------------------------------------------------------------------------
    */

    Route::post('/create-guide'                     , 'ActionController@createGuide')->name('create-guide');

    Route::post('/edit-guide'                       , 'ActionController@updateGuide')->name('edit-guide');




    /*
    ----------------------------------------------------------------------------------------------------------
    AJAX CONTROLLER
    ----------------------------------------------------------------------------------------------------------
    */


    /*
    ----------------------------------------------------------------------------------------------------------
                                                    GUEST
    ----------------------------------------------------------------------------------------------------------
    */

    Route::post('/get-tour'                         , 'AjaxController@getTours')->name('get-tour');

    Route::post('/get-tour-for-transport'           , 'AjaxController@getToursForTransport')->name('get-tour-for-transport');

    Route::post('/get-tour-for-hotel'               , 'AjaxController@getToursForHotel')->name('get-tour-for-hotel');

    Route::post('/get-guide-for-language'           , 'AjaxController@getGuideForLanguage')->name('get-guide-for-language');

    Route::post('/get-vehical-for-type'             , 'AjaxController@getVehicalForType')->name('get-vehical-for-type');

    Route::post('/get-hotel-for-city'               , 'AjaxController@getHotelForCity')->name('get-hotel-for-city');

    Route::post('/get-rooms-for-hotel'              , 'AjaxController@getRoomsForHotel')->name('get-rooms-for-hotel');

    Route::get('/get-pdf'                           , 'PDFController@generatePDF')->name('get-pdf');

    Route::post('/create-hotel-reservation'                , 'PDFController@viewHotelReservatonPDF')->name('create-hotel-reservation');

    Route::post('/create-cancelled-hotel-reservation'                , 'PDFController@viewHotelCancelledReservatonPDF')->name('create-cancelled-hotel-reservation');

    Route::get('/view-cancelled-hotel-reservation/{id?}'                , 'PDFController@viewPrintedHotelCancelledReservatonPDF')->name('view-cancelled-hotel-reservation');

    Route::get('/view-hotel-reservation/{id?}/{date?}'                , 'PDFController@viewPrintedHotelReservatonPDF')->name('view-hotel-reservation');

    Route::get('/view-confirmation-voucher/{id?}/{date?}'                , 'PDFController@viewConfirmationPDF')->name('view-confirmation-voucher');

    Route::post('/cancellation-hotel-booking-accept'            , 'ActionController@cancellationAccept')->name('cancellation-hotel-booking-accept');

    /*
    ----------------------------------------------------------------------------------------------------------
                                                    VALIDATION AJAX
    ----------------------------------------------------------------------------------------------------------
    */

    Route::post('/user-email-verification'                  , 'ValidationAjax@userEmailValidation')->name('user-email-verification');

    Route::post('/update-user-email-verification'           , 'ValidationAjax@updateUserEmailValidation')->name('update-user-email-verification');

    Route::post('/basis-code-verification'           , 'ValidationAjax@basisCodeValidation')->name('basis-code-verification');

    Route::post('/update-basis-code-verification'           , 'ValidationAjax@updateBasisCodeValidation')->name('update-basis-code-verification');

    Route::post('/room-category-verification'           , 'ValidationAjax@roomTypeValidation')->name('room-category-verification');

    Route::post('/update-room-type-verification'           , 'ValidationAjax@updateRoomTypeCodeValidation')->name('update-room-type-verification');

    Route::post('/driver-nic-verification'           , 'ValidationAjax@driverNicValidation')->name('driver-nic-verification');

    Route::post('/guide-nic-verification'           , 'ValidationAjax@guideNicValidation')->name('guide-nic-verification');

    Route::post('/vehicle-no-verification'           , 'ValidationAjax@vehicleNumberValidation')->name('vehicle-no-verification');

    Route::post('/driver-licence-verification'           , 'ValidationAjax@driverLicenceNoValidation')->name('driver-licence-verification');

    Route::post('/country-code-verification'           , 'ValidationAjax@countryCodeValidation')->name('country-code-verification');

    Route::post('/update-country-code-verification'           , 'ValidationAjax@updateCountryCodeValidation')->name('update-country-code-verification');

    Route::post('/update-vehicle-no-verification'           , 'ValidationAjax@updateVehicleNoValidation')->name('update-vehicle-no-verification');

    Route::post('/update-guide-nic-verification'           , 'ValidationAjax@updateGuideNicValidation')->name('update-guide-nic-verification');

    Route::post('/update-driver-nic-verification'           , 'ValidationAjax@updateDriverNicValidation')->name('update-driver-nic-verification');



});
