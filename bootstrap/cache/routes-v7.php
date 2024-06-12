<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sanctum.csrf-cookie',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/health-check' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.healthCheck',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/execute-solution' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.executeSolution',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/update-config' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.updateConfig',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KAC5lbvLgo2CK12w',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/signin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'signin',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logout',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/site-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'site-settings',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user-roll' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user-roll',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/vehicle' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'vehicle',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/vehicle-type' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'vehicle-type',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/add-driver' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'add-driver',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/view-driver' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'view-driver',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manage-tour-from-transport' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manage-tour-from-transport',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/room-type' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'room-type',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/room-category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'room-category',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/create-hotel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-hotel',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/hotel-cities' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hotel-cities',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/hotel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hotel',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/basis' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'basis',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manage-tour-from-hotel-management' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manage-tour-from-hotel-management',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/add-country-code' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'add-country-code',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/create-tour' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-tour',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agent' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/tour' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tour',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/guide-language' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'guide-language',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/guide-register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'guide-register',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/create-site-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-site-settings',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/create-user-roll' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-user-roll',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/create-user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-user',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/edit-user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'edit-user',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/create-vehical-type' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-vehical-type',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/edit-vehical-type' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'edit-vehical-type',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/create-vehical' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-vehical',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/edit-vehical' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'edit-vehical',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/create-guide' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-guide',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/create-room-type' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-room-type',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/edit-room-type' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'edit-room-type',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/create-room-category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-room-category',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/edit-room-category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'edit-room-category',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/create-hotel-cities' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-hotel-cities',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/edit-hotel-city' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'edit-hotel-city',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/create-basis' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-basis',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/edit-basis' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'edit-basis',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/register-agent' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'register-agent',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/edit-agent-register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'edit-agent-register',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/create-driver' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-driver',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/add-hotel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'add-hotel',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/assign-hotel-for-tour' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assign-hotel-for-tour',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/re-assign-hotel-for-tour' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 're-assign-hotel-for-tour',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/create-country' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-country',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/edit-country' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'edit-country',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/add-tour' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'add-tour',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/confirm-hotel-booking' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4VvDJtPPaFoFJfh6',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-hotels-for-tour' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mn0Lzb524NgfR3X0',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/create-guide-language' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-guide-language',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/edit-guide-language' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'edit-guide-language',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/edit-guide' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'edit-guide',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-tour' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get-tour',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-tour-for-transport' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get-tour-for-transport',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-tour-for-hotel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get-tour-for-hotel',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-guide-for-language' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get-guide-for-language',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-vehical-for-type' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get-vehical-for-type',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-hotel-for-city' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get-hotel-for-city',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-rooms-for-hotel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get-rooms-for-hotel',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-pdf' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get-pdf',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/create-hotel-reservation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-hotel-reservation',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user-email-verification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user-email-verification',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/update-user-email-verification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-user-email-verification',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/basis-code-verification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'basis-code-verification',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/update-basis-code-verification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-basis-code-verification',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/room-category-verification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'room-category-verification',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/update-room-type-verification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-room-type-verification',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/driver-nic-verification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'driver-nic-verification',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/guide-nic-verification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'guide-nic-verification',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/vehicle-no-verification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'vehicle-no-verification',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/driver-licence-verification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'driver-licence-verification',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/country-code-verification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'country-code-verification',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/update-country-code-verification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-country-code-verification',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/update-vehicle-no-verification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-vehicle-no-verification',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/update-guide-nic-verification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-guide-nic-verification',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/update-driver-nic-verification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-driver-nic-verification',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/edit\\-(?|user\\-roll(?:/([^/]++))?(*:41)|driver(?:/([^/]++))?(*:68)|hotel(?:/([^/]++))?(*:94)|tour(?:/([^/]++))?(*:119))|/assign\\-franchise(?|\\-from\\-transport(?:/([^/]++))?(*:180)|s(?:/([^/]++))?(*:203))|/view\\-(?|hotel(?|(?:/([^/]++))?(*:244)|\\-reservation(?:/([^/]++)(?:/([^/]++))?)?(*:293))|tour\\-schedule(?|\\-for\\-hotel\\-management(?:/([^/]++))?(*:357)|(?:/([^/]++))?(*:379)|\\-for\\-transpotaion(?:/([^/]++))?(*:420))|confirmation\\-voucher(?:/([^/]++)(?:/([^/]++))?)?(*:478))|/update\\-(?|user\\-roll(?:/([^/]++))?(*:523)|driver(?:/([^/]++))?(*:551)|hotel(?:/([^/]++))?(*:578)|tour(?|(?:/([^/]++))?(*:607)|\\-franchise(?:/([^/]++))?(*:640)))|/create\\-transport\\-franchise(?:/([^/]++))?(*:693)|/re\\-assign\\-hotel(?:/([^/]++)(?:/([^/]++))?)?(*:747)|/tour\\-status(?:/([^/]++)(?:/([^/]++))?)?(*:796))/?$}sDu',
    ),
    3 => 
    array (
      41 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'edit-user-roll',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      68 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'edit-driver',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      94 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'edit-hotel',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      119 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::SnAnnDFQEu1XAGLz',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      180 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assign-franchise-from-transport',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      203 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assign-franchises',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      244 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RZiqS2LhKxxuhQR1',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      293 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'view-hotel-reservation',
            'id' => NULL,
            'date' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'date',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      357 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1XqtBxkOaEbnNInk',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      379 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lVGdGsd6NtCc5qYU',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      420 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Bqqluh4YQFYvfgvH',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      478 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'view-confirmation-voucher',
            'id' => NULL,
            'date' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'date',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      523 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-user-roll',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      551 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-driver',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      578 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-hotel',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      607 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-tour',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      640 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fS3eYOqWbkIWE4ck',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      693 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-transport-franchise',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      747 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8OY8haB3GmYHGNbk',
            'tour_number' => NULL,
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'tour_number',
            1 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      796 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tour-status',
            'id' => NULL,
            'status' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'sanctum.csrf-cookie' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'sanctum.csrf-cookie',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.healthCheck' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_ignition/health-check',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController',
        'as' => 'ignition.healthCheck',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.executeSolution' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/execute-solution',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController',
        'as' => 'ignition.executeSolution',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.updateConfig' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/update-config',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController',
        'as' => 'ignition.updateConfig',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KAC5lbvLgo2CK12w' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000005210000000000000000";}}',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::KAC5lbvLgo2CK12w',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@login',
        'controller' => 'App\\Http\\Controllers\\ViewController@login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'signin' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'signin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@dologin',
        'controller' => 'App\\Http\\Controllers\\AuthController@dologin',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'signin',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'logout' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@dologout',
        'controller' => 'App\\Http\\Controllers\\AuthController@dologout',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@dashboard',
        'controller' => 'App\\Http\\Controllers\\ViewController@dashboard',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'dashboard',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'site-settings' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'site-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@viewSiteSetting',
        'controller' => 'App\\Http\\Controllers\\ViewController@viewSiteSetting',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'site-settings',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@userDetails',
        'controller' => 'App\\Http\\Controllers\\ViewController@userDetails',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'user',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user-roll' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user-roll',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@userRoll',
        'controller' => 'App\\Http\\Controllers\\ViewController@userRoll',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'user-roll',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'edit-user-roll' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'edit-user-roll/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@editUserRoll',
        'controller' => 'App\\Http\\Controllers\\ViewController@editUserRoll',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'edit-user-roll',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'vehicle' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'vehicle',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@vehical',
        'controller' => 'App\\Http\\Controllers\\ViewController@vehical',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'vehicle',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'vehicle-type' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'vehicle-type',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@vehicalType',
        'controller' => 'App\\Http\\Controllers\\ViewController@vehicalType',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'vehicle-type',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'add-driver' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'add-driver',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@addDriver',
        'controller' => 'App\\Http\\Controllers\\ViewController@addDriver',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'add-driver',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'view-driver' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'view-driver',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@viewDriver',
        'controller' => 'App\\Http\\Controllers\\ViewController@viewDriver',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'view-driver',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'edit-driver' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'edit-driver/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@editDriver',
        'controller' => 'App\\Http\\Controllers\\ViewController@editDriver',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'edit-driver',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manage-tour-from-transport' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manage-tour-from-transport',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@manageTourFromTransport',
        'controller' => 'App\\Http\\Controllers\\ViewController@manageTourFromTransport',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'manage-tour-from-transport',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'assign-franchise-from-transport' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'assign-franchise-from-transport/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@assignFranchiseFromTransport',
        'controller' => 'App\\Http\\Controllers\\ViewController@assignFranchiseFromTransport',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'assign-franchise-from-transport',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'room-type' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'room-type',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@roomType',
        'controller' => 'App\\Http\\Controllers\\ViewController@roomType',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'room-type',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'room-category' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'room-category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@roomCategory',
        'controller' => 'App\\Http\\Controllers\\ViewController@roomCategory',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'room-category',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-hotel' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'create-hotel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@createHotel',
        'controller' => 'App\\Http\\Controllers\\ViewController@createHotel',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'create-hotel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hotel-cities' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'hotel-cities',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@hotelCities',
        'controller' => 'App\\Http\\Controllers\\ViewController@hotelCities',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'hotel-cities',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hotel' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'hotel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@viewHotels',
        'controller' => 'App\\Http\\Controllers\\ViewController@viewHotels',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'hotel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'edit-hotel' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'edit-hotel/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@editHotels',
        'controller' => 'App\\Http\\Controllers\\ViewController@editHotels',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'edit-hotel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'basis' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'basis',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@basis',
        'controller' => 'App\\Http\\Controllers\\ViewController@basis',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'basis',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manage-tour-from-hotel-management' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manage-tour-from-hotel-management',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@manageTourFromHotel',
        'controller' => 'App\\Http\\Controllers\\ViewController@manageTourFromHotel',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'manage-tour-from-hotel-management',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'add-country-code' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'add-country-code',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@country',
        'controller' => 'App\\Http\\Controllers\\ViewController@country',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'add-country-code',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-tour' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'create-tour',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@createTour',
        'controller' => 'App\\Http\\Controllers\\ViewController@createTour',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'create-tour',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agent',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@agent',
        'controller' => 'App\\Http\\Controllers\\ViewController@agent',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'agent',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tour' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'tour',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@tour',
        'controller' => 'App\\Http\\Controllers\\ViewController@tour',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'tour',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'assign-franchises' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'assign-franchises/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@assignFranchises',
        'controller' => 'App\\Http\\Controllers\\ViewController@assignFranchises',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'assign-franchises',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guide-language' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'guide-language',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@guideLanguage',
        'controller' => 'App\\Http\\Controllers\\ViewController@guideLanguage',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guide-language',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guide-register' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'guide-register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@guideRegister',
        'controller' => 'App\\Http\\Controllers\\ViewController@guideRegister',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guide-register',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-site-settings' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'create-site-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@createSiteSettings',
        'controller' => 'App\\Http\\Controllers\\ActionController@createSiteSettings',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'create-site-settings',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-user-roll' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'create-user-roll',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@createUserRoll',
        'controller' => 'App\\Http\\Controllers\\ActionController@createUserRoll',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'create-user-roll',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-user' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'create-user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@createUser',
        'controller' => 'App\\Http\\Controllers\\ActionController@createUser',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'create-user',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'edit-user' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'edit-user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@updateUser',
        'controller' => 'App\\Http\\Controllers\\ActionController@updateUser',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'edit-user',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-vehical-type' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'create-vehical-type',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@createVehicalType',
        'controller' => 'App\\Http\\Controllers\\ActionController@createVehicalType',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'create-vehical-type',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'edit-vehical-type' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'edit-vehical-type',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@updateVehicalType',
        'controller' => 'App\\Http\\Controllers\\ActionController@updateVehicalType',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'edit-vehical-type',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-vehical' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'create-vehical',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@createVehical',
        'controller' => 'App\\Http\\Controllers\\ActionController@createVehical',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'create-vehical',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'edit-vehical' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'edit-vehical',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@updateVehical',
        'controller' => 'App\\Http\\Controllers\\ActionController@updateVehical',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'edit-vehical',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-guide' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'create-guide',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@createGuide',
        'controller' => 'App\\Http\\Controllers\\ActionController@createGuide',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'create-guide',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-room-type' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'create-room-type',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@createRoomType',
        'controller' => 'App\\Http\\Controllers\\ActionController@createRoomType',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'create-room-type',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'edit-room-type' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'edit-room-type',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@updateRoomType',
        'controller' => 'App\\Http\\Controllers\\ActionController@updateRoomType',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'edit-room-type',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-room-category' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'create-room-category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@createRoomCategory',
        'controller' => 'App\\Http\\Controllers\\ActionController@createRoomCategory',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'create-room-category',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'edit-room-category' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'edit-room-category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@updateRoomCategory',
        'controller' => 'App\\Http\\Controllers\\ActionController@updateRoomCategory',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'edit-room-category',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-hotel-cities' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'create-hotel-cities',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@createHotelCity',
        'controller' => 'App\\Http\\Controllers\\ActionController@createHotelCity',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'create-hotel-cities',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'edit-hotel-city' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'edit-hotel-city',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@updateHotelCity',
        'controller' => 'App\\Http\\Controllers\\ActionController@updateHotelCity',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'edit-hotel-city',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-basis' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'create-basis',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@createBasis',
        'controller' => 'App\\Http\\Controllers\\ActionController@createBasis',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'create-basis',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'edit-basis' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'edit-basis',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@updateBasis',
        'controller' => 'App\\Http\\Controllers\\ActionController@updateBasis',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'edit-basis',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'register-agent' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'register-agent',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@createAgent',
        'controller' => 'App\\Http\\Controllers\\ActionController@createAgent',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'register-agent',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'edit-agent-register' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'edit-agent-register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
          2 => 'permission_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@updateAgent',
        'controller' => 'App\\Http\\Controllers\\ActionController@updateAgent',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'edit-agent-register',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::RZiqS2LhKxxuhQR1' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'view-hotel/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@viewHotel',
        'controller' => 'App\\Http\\Controllers\\ViewController@viewHotel',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::RZiqS2LhKxxuhQR1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-user-roll' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'update-user-roll/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@updateUserRoll',
        'controller' => 'App\\Http\\Controllers\\ActionController@updateUserRoll',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'update-user-roll',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-driver' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'create-driver',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@createDriver',
        'controller' => 'App\\Http\\Controllers\\ActionController@createDriver',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'create-driver',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-driver' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'update-driver/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@updateDriver',
        'controller' => 'App\\Http\\Controllers\\ActionController@updateDriver',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'update-driver',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-transport-franchise' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'create-transport-franchise/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@createTransportFranchise',
        'controller' => 'App\\Http\\Controllers\\ActionController@createTransportFranchise',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'create-transport-franchise',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'add-hotel' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'add-hotel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@createHotel',
        'controller' => 'App\\Http\\Controllers\\ActionController@createHotel',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'add-hotel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-hotel' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'update-hotel/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@updateHotel',
        'controller' => 'App\\Http\\Controllers\\ActionController@updateHotel',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'update-hotel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::1XqtBxkOaEbnNInk' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'view-tour-schedule-for-hotel-management/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@viewTourScheduleForHotel',
        'controller' => 'App\\Http\\Controllers\\ViewController@viewTourScheduleForHotel',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::1XqtBxkOaEbnNInk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'assign-hotel-for-tour' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'assign-hotel-for-tour',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@assignHotelFromHM',
        'controller' => 'App\\Http\\Controllers\\ActionController@assignHotelFromHM',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'assign-hotel-for-tour',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    're-assign-hotel-for-tour' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 're-assign-hotel-for-tour',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@reAssignHotelFromHM',
        'controller' => 'App\\Http\\Controllers\\ActionController@reAssignHotelFromHM',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 're-assign-hotel-for-tour',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8OY8haB3GmYHGNbk' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 're-assign-hotel/{tour_number?}/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@reAssignHotelView',
        'controller' => 'App\\Http\\Controllers\\ViewController@reAssignHotelView',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::8OY8haB3GmYHGNbk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-country' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'create-country',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@createCountryCode',
        'controller' => 'App\\Http\\Controllers\\ActionController@createCountryCode',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'create-country',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'edit-country' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'edit-country',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@updateCountry',
        'controller' => 'App\\Http\\Controllers\\ActionController@updateCountry',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'edit-country',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'add-tour' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'add-tour',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@addTour',
        'controller' => 'App\\Http\\Controllers\\ActionController@addTour',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'add-tour',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tour-status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'tour-status/{id?}/{status?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@changeTourStatus',
        'controller' => 'App\\Http\\Controllers\\ActionController@changeTourStatus',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'tour-status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-tour' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'update-tour/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@updateTour',
        'controller' => 'App\\Http\\Controllers\\ActionController@updateTour',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'update-tour',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::lVGdGsd6NtCc5qYU' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'view-tour-schedule/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@viewTourSchedule',
        'controller' => 'App\\Http\\Controllers\\ViewController@viewTourSchedule',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::lVGdGsd6NtCc5qYU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Bqqluh4YQFYvfgvH' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'view-tour-schedule-for-transpotaion/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@viewTourScheduleForTranspotaion',
        'controller' => 'App\\Http\\Controllers\\ViewController@viewTourScheduleForTranspotaion',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Bqqluh4YQFYvfgvH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::SnAnnDFQEu1XAGLz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'edit-tour/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ViewController@editTour',
        'controller' => 'App\\Http\\Controllers\\ViewController@editTour',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::SnAnnDFQEu1XAGLz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fS3eYOqWbkIWE4ck' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'update-tour-franchise/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@updateTourFranchise',
        'controller' => 'App\\Http\\Controllers\\ActionController@updateTourFranchise',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::fS3eYOqWbkIWE4ck',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4VvDJtPPaFoFJfh6' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'confirm-hotel-booking',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@confirmHotelBooking',
        'controller' => 'App\\Http\\Controllers\\ActionController@confirmHotelBooking',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::4VvDJtPPaFoFJfh6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::mn0Lzb524NgfR3X0' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'get-hotels-for-tour',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\AjaxController@getHotelsForTourConfirmation',
        'controller' => 'App\\Http\\Controllers\\AjaxController@getHotelsForTourConfirmation',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::mn0Lzb524NgfR3X0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-guide-language' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'create-guide-language',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@createGuideLanguage',
        'controller' => 'App\\Http\\Controllers\\ActionController@createGuideLanguage',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'create-guide-language',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'edit-guide-language' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'edit-guide-language',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@updateLanguage',
        'controller' => 'App\\Http\\Controllers\\ActionController@updateLanguage',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'edit-guide-language',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'edit-guide' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'edit-guide',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionController@updateGuide',
        'controller' => 'App\\Http\\Controllers\\ActionController@updateGuide',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'edit-guide',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get-tour' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'get-tour',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\AjaxController@getTours',
        'controller' => 'App\\Http\\Controllers\\AjaxController@getTours',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'get-tour',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get-tour-for-transport' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'get-tour-for-transport',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\AjaxController@getToursForTransport',
        'controller' => 'App\\Http\\Controllers\\AjaxController@getToursForTransport',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'get-tour-for-transport',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get-tour-for-hotel' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'get-tour-for-hotel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\AjaxController@getToursForHotel',
        'controller' => 'App\\Http\\Controllers\\AjaxController@getToursForHotel',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'get-tour-for-hotel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get-guide-for-language' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'get-guide-for-language',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\AjaxController@getGuideForLanguage',
        'controller' => 'App\\Http\\Controllers\\AjaxController@getGuideForLanguage',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'get-guide-for-language',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get-vehical-for-type' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'get-vehical-for-type',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\AjaxController@getVehicalForType',
        'controller' => 'App\\Http\\Controllers\\AjaxController@getVehicalForType',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'get-vehical-for-type',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get-hotel-for-city' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'get-hotel-for-city',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\AjaxController@getHotelForCity',
        'controller' => 'App\\Http\\Controllers\\AjaxController@getHotelForCity',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'get-hotel-for-city',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get-rooms-for-hotel' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'get-rooms-for-hotel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\AjaxController@getRoomsForHotel',
        'controller' => 'App\\Http\\Controllers\\AjaxController@getRoomsForHotel',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'get-rooms-for-hotel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get-pdf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'get-pdf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\PDFController@generatePDF',
        'controller' => 'App\\Http\\Controllers\\PDFController@generatePDF',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'get-pdf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-hotel-reservation' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'create-hotel-reservation',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\PDFController@viewHotelReservatonPDF',
        'controller' => 'App\\Http\\Controllers\\PDFController@viewHotelReservatonPDF',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'create-hotel-reservation',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'view-hotel-reservation' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'view-hotel-reservation/{id?}/{date?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\PDFController@viewPrintedHotelReservatonPDF',
        'controller' => 'App\\Http\\Controllers\\PDFController@viewPrintedHotelReservatonPDF',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'view-hotel-reservation',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'view-confirmation-voucher' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'view-confirmation-voucher/{id?}/{date?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\PDFController@viewConfirmationPDF',
        'controller' => 'App\\Http\\Controllers\\PDFController@viewConfirmationPDF',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'view-confirmation-voucher',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user-email-verification' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user-email-verification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ValidationAjax@userEmailValidation',
        'controller' => 'App\\Http\\Controllers\\ValidationAjax@userEmailValidation',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'user-email-verification',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-user-email-verification' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'update-user-email-verification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ValidationAjax@updateUserEmailValidation',
        'controller' => 'App\\Http\\Controllers\\ValidationAjax@updateUserEmailValidation',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'update-user-email-verification',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'basis-code-verification' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'basis-code-verification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ValidationAjax@basisCodeValidation',
        'controller' => 'App\\Http\\Controllers\\ValidationAjax@basisCodeValidation',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'basis-code-verification',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-basis-code-verification' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'update-basis-code-verification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ValidationAjax@updateBasisCodeValidation',
        'controller' => 'App\\Http\\Controllers\\ValidationAjax@updateBasisCodeValidation',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'update-basis-code-verification',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'room-category-verification' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'room-category-verification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ValidationAjax@roomTypeValidation',
        'controller' => 'App\\Http\\Controllers\\ValidationAjax@roomTypeValidation',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'room-category-verification',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-room-type-verification' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'update-room-type-verification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ValidationAjax@updateRoomTypeCodeValidation',
        'controller' => 'App\\Http\\Controllers\\ValidationAjax@updateRoomTypeCodeValidation',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'update-room-type-verification',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'driver-nic-verification' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'driver-nic-verification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ValidationAjax@driverNicValidation',
        'controller' => 'App\\Http\\Controllers\\ValidationAjax@driverNicValidation',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'driver-nic-verification',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guide-nic-verification' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'guide-nic-verification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ValidationAjax@guideNicValidation',
        'controller' => 'App\\Http\\Controllers\\ValidationAjax@guideNicValidation',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guide-nic-verification',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'vehicle-no-verification' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'vehicle-no-verification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ValidationAjax@vehicleNumberValidation',
        'controller' => 'App\\Http\\Controllers\\ValidationAjax@vehicleNumberValidation',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'vehicle-no-verification',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'driver-licence-verification' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'driver-licence-verification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ValidationAjax@driverLicenceNoValidation',
        'controller' => 'App\\Http\\Controllers\\ValidationAjax@driverLicenceNoValidation',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'driver-licence-verification',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'country-code-verification' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'country-code-verification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ValidationAjax@countryCodeValidation',
        'controller' => 'App\\Http\\Controllers\\ValidationAjax@countryCodeValidation',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'country-code-verification',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-country-code-verification' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'update-country-code-verification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ValidationAjax@updateCountryCodeValidation',
        'controller' => 'App\\Http\\Controllers\\ValidationAjax@updateCountryCodeValidation',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'update-country-code-verification',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-vehicle-no-verification' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'update-vehicle-no-verification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ValidationAjax@updateVehicleNoValidation',
        'controller' => 'App\\Http\\Controllers\\ValidationAjax@updateVehicleNoValidation',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'update-vehicle-no-verification',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-guide-nic-verification' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'update-guide-nic-verification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ValidationAjax@updateGuideNicValidation',
        'controller' => 'App\\Http\\Controllers\\ValidationAjax@updateGuideNicValidation',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'update-guide-nic-verification',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-driver-nic-verification' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'update-driver-nic-verification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'login_validation',
        ),
        'uses' => 'App\\Http\\Controllers\\ValidationAjax@updateDriverNicValidation',
        'controller' => 'App\\Http\\Controllers\\ValidationAjax@updateDriverNicValidation',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'update-driver-nic-verification',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
