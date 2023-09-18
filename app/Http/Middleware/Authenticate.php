<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // return $request->expectsJson() ? null : route('login');

        if (!$request->expectsJson()) {
            if ($request->routeIs('adminpanel.*')) {
                return route('admin.login');
            }
            if($request->routeIs('providerpanel.*')){
                return route('provider.providerlogin');
            }
            return route('index');

            // if ($request->routeIs('providerpanel.*')) {
            //     return route('providerdashboard');
            // }
            // return route('provider.providerlogin');
        }
    }
}
