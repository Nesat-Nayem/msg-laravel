<?php

namespace App\Http\Controllers;

use App\Models\BookService;
use App\Models\Provider;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Admin;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Subscription;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\ContactUs;
use App\Models\GeneralSettings;
use App\Models\Payment;
use App\Rules\AdminMatchOldPassword;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function login()
    {
        $generalsetting = GeneralSettings::orderBy('id', 'desc')->first();
        return view('admin.login', compact('generalsetting'));
    }

    public function adminloginstore(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::guard('adminpanel')->attempt($credentials)) {
            return redirect()->intended('admindashboard')
                ->with('success', 'Signed in');
        }

        return redirect()->back()->with('error', 'Login details are not valid');
    }

    public function adminlogout()
    {
        Session::flush();
        Auth::guard('adminpanel')->logout();
        return redirect()->route('admin.login')->with('success', 'Logged Out');
    }

    public function admindashboard()
    {
        $admins = Admin::orderby('id', 'desc')->get();
        $providers = Provider::orderby('id', 'desc')->get();
        $users = User::orderby('id', 'desc')->get();
        $categories = Category::orderby('id', 'desc')->get();
        $subcategories = SubCategory::orderby('id', 'desc')->get();
        $services = Service::orderby('id', 'desc')->get();
        $subscriptions = Subscription::orderby('id', 'desc')->get();
        $countries = Country::orderby('id', 'desc')->get();
        $states = State::orderby('id', 'desc')->get();
        $cities = City::orderby('id', 'desc')->get();
        $contactus = ContactUs::orderby('id', 'desc')->get();
        $bookings = BookService::latest()->take(5)->get();
        $payments = Payment::latest()->take(5)->get();
        $generalsetting = GeneralSettings::orderBy('id', 'desc')->first();
        return view('admin.index', compact('admins', 'users', 'providers', 'categories', 'subcategories', 'services', 'subscriptions', 'countries', 'states', 'cities', 'contactus', 'bookings', 'payments', 'generalsetting'));
    }

    public function totalreport()
    {
        $bookings = BookService::orderBy('id', 'desc')->get();
        return view('admin.total-report', compact('bookings'));
    }

    public function loginsettings()
    {
        return view('admin.login-settings');
    }

    public function seosettings()
    {
        return view('admin.seo-settings');
    }

    public function changepassword()
    {
        return view('admin.change-password');
    }

    public function updatepassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required', new AdminMatchOldPassword,
            'new_password' => 'required_with:confirmpassword|same:confirmpassword',
            'confirmpassword' => 'required',
        ]);

        if (Hash::check($request->old_password, Auth::guard('adminpanel')->user()->password)) {

            Admin::find(Auth::guard('adminpanel')->user()->id)->update(['password' => Hash::make($request->new_password)]);
            return redirect()->back()->with('success', 'Password changed successfully');
        }
        return redirect()->back()->with('error', 'Old Password does not matched');
    }

    public function othersettings()
    {
        return view('admin.other-settings');
    }

    public function admin_notifications()
    {
        return view('admin.admin-notifications');
    }

    public function markNotification(Request $request)
    {
        Auth::guard('adminpanel')->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();
        return response()->noContent();
    }

    public function admin_userwallet(Request $request)
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.userwallet.index', compact('users'));
    }
}
