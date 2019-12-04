<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard= null)
    {


        if (Auth::guard($guard)->check()) {
            if(Auth::user()->isAdmin()){
                return $next($request);
            }
        }
        return response()->json(abort(404),404);

       /* if () {

        } else {

        }*/
    }
}
