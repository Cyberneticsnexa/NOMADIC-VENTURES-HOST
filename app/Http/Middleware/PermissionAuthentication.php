<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermissionAuthentication {
    /**
    * Handle an incoming request.
    *
    * @param  \Closure( \Illuminate\Http\Request ): ( \Symfony\Component\HttpFoundation\Response )  $next
    */

    public function handle( Request $request, Closure $next ): Response {
        if ( !isPermissions( $request->route()->getName() ) ) {
            return redirect()->back()->with( [ 'error' => true, 'message' => "You don't  have permission for this !" ] );
        }
        if ($request->route()->getName() === 'edit-user-roll' && $request->route('id') === '1' && Auth::user()->user_roll != 1) {
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => "You don't have permission for this !" ]);
        }
        return $next( $request );
    }
}
