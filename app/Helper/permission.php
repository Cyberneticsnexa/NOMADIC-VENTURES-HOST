<?php
use App\Models\UserRollPermission;

function getAllPermissions() {
    return array(
        [
            'group'=>'Dashboard',
            'icon'=>'nav-icon fas fa-tachometer-alt',
            'is_dev_tool' => false,
            'type'=>'single',
            'data'=>array(
                [ 'title' => 'Dashboard', 'permission'=>'dashboard', 'show_in_sidebar'=>true ],
            )
        ],
        [
            'group'=>'Tour Management',
            'icon'=>'nav-icon fa fa-umbrella-beach',
            'is_dev_tool' => false,
            'type'=>'multiple',
            'data'=>array(
                [ 'title' => 'Tour', 'permission'=>'tour', 'show_in_sidebar'=>true ],
                [ 'title' => 'Create Tour', 'permission'=>'create-tour', 'show_in_sidebar'=>true ],
                [ 'title' => 'View Tour Schedule', 'permission'=>'view-tour-schedule-for-tour-manager', 'show_in_sidebar'=>false ],
                [ 'title' => 'Complete Tour', 'permission'=>'change-tour-action', 'show_in_sidebar'=>false ],
                [ 'title' => 'Edit Tour', 'permission'=>'edit-tour', 'show_in_sidebar'=>false ],
                [ 'title' => 'Cancel Tour', 'permission'=>'cancel-tour', 'show_in_sidebar'=>false ],
                //[ 'title' => 'Assign Franchises', 'permission'=>'assign-franchises', 'show_in_sidebar'=>false ],

                [ 'title' => 'Agent', 'permission'=>'agent', 'show_in_sidebar'=>true ],
                [ 'title' => 'Create Agent', 'permission'=>'register-agent', 'show_in_sidebar'=>false ],
                [ 'title' => 'Update Agent', 'permission'=>'edit-agent-register', 'show_in_sidebar'=>false ],

                [ 'title' => 'Country', 'permission'=>'add-country-code', 'show_in_sidebar'=>true ],
                [ 'title' => 'Country Code Create', 'permission'=>'create-country-code', 'show_in_sidebar'=>false ],
                [ 'title' => 'Country Code Update', 'permission'=>'edit-country-code', 'show_in_sidebar'=>false ],

            )
        ],
        [
            'group'=>'Hotel Management',
            'icon'=>'nav-icon fas fa-hotel',
            'is_dev_tool' => false,
            'type'=>'multiple',
            'data'=>array(
                [ 'title' => 'Manage Tour', 'permission'=>'manage-tour-from-hotel-management', 'show_in_sidebar'=>true ],
                [ 'title' => 'Assign Hotel', 'permission'=>'assign-franchise-from-hotel', 'show_in_sidebar'=>false ],
                [ 'title' => 'Hotel', 'permission'=>'hotel', 'show_in_sidebar'=>true ],
                [ 'title' => 'Create Hotel', 'permission'=>'create-hotel', 'show_in_sidebar'=>true ],
                [ 'title' => 'Update Hotel', 'permission'=>'edit-hotel', 'show_in_sidebar'=>false ],
                [ 'title' => 'Hotel Cities', 'permission'=>'hotel-cities', 'show_in_sidebar'=>true ],
                [ 'title' => 'Create Hotel Cities', 'permission'=>'create-hotel-cities', 'show_in_sidebar'=>false ],
                [ 'title' => 'Update Hotel Cities', 'permission'=>'edit-hotel-city', 'show_in_sidebar'=>false ],

                [ 'title' => 'Room Type', 'permission'=>'room-type', 'show_in_sidebar'=>true ],
                [ 'title' => 'Create Room Type', 'permission'=>'create-room-type', 'show_in_sidebar'=>false ],
                [ 'title' => 'Update Room Type', 'permission'=>'edit-room-type', 'show_in_sidebar'=>false ],

                [ 'title' => 'Room Category', 'permission'=>'room-category', 'show_in_sidebar'=>true ],
                [ 'title' => 'Create Category', 'permission'=>'create-room-category', 'show_in_sidebar'=>false ],
                [ 'title' => 'Update Category', 'permission'=>'edit-room-category', 'show_in_sidebar'=>false ],

                [ 'title' => 'Basis', 'permission'=>'basis', 'show_in_sidebar'=>true ],
                [ 'title' => 'Create Basis', 'permission'=>'create-basis', 'show_in_sidebar'=>false ],
                [ 'title' => 'Update Basis', 'permission'=>'edit-basis', 'show_in_sidebar'=>false ],
            )
        ],
        [
            'group'=>'Transport Management',
            'icon'=>'nav-icon fas fa-car',
            'is_dev_tool' => false,
            'type'=>'multiple',
            'data'=>array(
                [ 'title' => 'Manage Tour', 'permission'=>'manage-tour-from-transport', 'show_in_sidebar'=>true ],
                [ 'title' => 'Assign Franchise for Tour', 'permission'=>'assign-franchise-from-transport', 'show_in_sidebar'=>false ],


                [ 'title' => 'Driver', 'permission'=>'view-driver', 'show_in_sidebar'=>true ],
                [ 'title' => 'Create Driver', 'permission'=>'add-driver', 'show_in_sidebar'=>true ],
                [ 'title' => 'Update Driver', 'permission'=>'edit-driver', 'show_in_sidebar'=>false ],

                [ 'title' => 'Vehicle', 'permission'=>'vehicle', 'show_in_sidebar'=>true ],
                [ 'title' => 'Create Vehical', 'permission'=>'create-vehical', 'show_in_sidebar'=>false ],
                [ 'title' => 'Update Vehical', 'permission'=>'edit-vehical', 'show_in_sidebar'=>false ],

                [ 'title' => 'Vehicle Type', 'permission'=>'vehicle-type', 'show_in_sidebar'=>true ],
                [ 'title' => 'Create Vehical Type', 'permission'=>'create-vehical-type', 'show_in_sidebar'=>false ],
                [ 'title' => 'Update Vehical Type', 'permission'=>'edit-vehical-type', 'show_in_sidebar'=>false ],

                [ 'title' => 'Guide', 'permission'=>'guide-register', 'show_in_sidebar'=>true ],
                [ 'title' => 'Create Guide', 'permission'=>'create-guide', 'show_in_sidebar'=>false ],
                [ 'title' => 'Update Guide Details', 'permission'=>'edit-guide', 'show_in_sidebar'=>false ],

                [ 'title' => 'Guide Language', 'permission'=>'guide-language', 'show_in_sidebar'=>true ],
                [ 'title' => 'Create Guide Language', 'permission'=>'create-guide-language', 'show_in_sidebar'=>false ],
                [ 'title' => 'Update Guide Language', 'permission'=>'edit-guide-language', 'show_in_sidebar'=>false ],

            )
        ],

        [
            'group'=>'Admin Tools',
            'icon'=>'nav-icon fas fa-gears',
            'is_dev_tool' => false,
            'type'=>'multiple',
            'data'=>array(
                [ 'title' => 'User', 'permission'=>'user', 'show_in_sidebar'=>true ],
                [ 'title' => 'Create User', 'permission'=>'create-user', 'show_in_sidebar'=>false ],
                [ 'title' => 'Update User', 'permission'=>'edit-user', 'show_in_sidebar'=>false ],

                [ 'title' => 'User Roll', 'permission'=>'user-roll', 'show_in_sidebar'=>true ],
                [ 'title' => 'Create User Roll', 'permission'=>'create-user-roll', 'show_in_sidebar'=>false ],
                [ 'title' => 'Update User Roll', 'permission'=>'edit-user-roll', 'show_in_sidebar'=>false ],

            )
        ],
        [
            'group'=>'Developer Tools',
            'icon'=>'nav-icon fas fa-gear',
            'is_dev_tool' => true,
            'type'=>'single',
            'data'=>array(
                [ 'title' => 'Site Settings', 'permission'=>'site-settings', 'show_in_sidebar'=>true ],
                [ 'title' => 'Site Settings Update', 'permission'=>'create-site-settings', 'show_in_sidebar'=>false ],
            )
        ],
    );
}

if ( !function_exists( 'isPermissions' ) ) {
    function isPermissions( $permission ) {
        $UserPermissions = UserRollPermission::where( 'user_roll_id', Auth::user()->user_roll )->where( 'permission', $permission )->count( 'id' );
        if ( $UserPermissions == 1 ) {
            return true;
        }
        return false;
    }
}


function ordinal($number) {
    $ends = ['th','st','nd','rd','th','th','th','th','th','th'];
    if ((($number % 100) >= 11) && (($number % 100) <= 13)) {
        return $number . 'th';
    } else {
        return $number . $ends[$number % 10];
    }
}
