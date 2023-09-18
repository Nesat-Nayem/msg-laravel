<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\GeneralSettings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            if (Auth::guard('providerpanel')->check() && Auth::guard('providerpanel')->user()->status == 'active') {
                $notifications = Auth::guard('providerpanel')->user()->unreadNotifications;
                $view->with('notifications', $notifications);
            }
        });

        // view()->composer('*', function (Request $request, $view) {

        //     $request->validate([
        //         'email' => 'required',
        //         'password' => 'required',
        //     ]);

        //     $credentials = $request->only('email', 'password');
        //     if (Auth::guard('providerpanel')->attempt($credentials) && Auth::guard('providerpanel')->user()->status == 'active') {
        //         return redirect()->route('index')->with('success', 'Signed in');
        //     } else if (Auth::guard('providerpanel')->attempt($credentials) && Auth::guard('providerpanel')->user()->status == 'inactive') {
        //         return redirect()->route('provider.providerlogin')->with('info', 'Your Account Is Still Not Active');
        //     } else {
        //         return redirect()->back()->with('error', 'Login details are not valid');
        //     }
        // });

        view()->composer('*', function ($view) {
            if (Auth::guard('adminpanel')->check()) {
                $notifications = Auth::guard('adminpanel')->user()->unreadNotifications;
                $view->with('notifications', $notifications);
            }
        });

        // $footercategory = Category::orderBy('id', 'desc')->get();
        $footercategory = Category::latest()->where('status', '=', 'active')->where('categoryfeature', '=', 'yes')->take(4)->get();
        view::share(['footercategory' => $footercategory]);
        // dd($footercategory);

        $general = GeneralSettings::orderBy('id', 'desc')->first();
        // dd($general);
        view::share(['general' => $general]);
    }
}
