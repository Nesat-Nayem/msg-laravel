<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\BookService;
use App\Models\City;
use App\Models\Country;
use App\Models\GeneralSettings;
use App\Models\Payment;
use App\Models\Provider;
use App\Models\Service;
use App\Models\State;
use App\Models\User;
use App\Notifications\BookServiceNotification;
use App\Rules\UserMatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Session;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class FEUserController extends Controller
{

    public function userlogin()
    {
        return view('frontend.userlogin');
    }

    public function userregister(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'contactno' => 'required|unique:users,contactno',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'confirmpassword' => 'required|same:password',
            'profileimage' => 'mimes:webp,jpeg,png,jpg,gif,svg|max:2048',

        ]);
        if ($file = $request->hasFile('profileimage')) {
            $file = $request->file('profileimage');
            $fileName = date('Ymd_His', time()) . "_profileimage." . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/images/admin/usersprofileimage';
            $file->move($destinationPath, $fileName);
            $request['profileimage'] = $fileName;
        }

        $user = new User($request->input());
        // dd($user);
        $user->password = Hash::make($request->get('password'));
        $user->confirmpassword = Hash::make($request->get('confirmpassword'));
        // dd($user);
        $user->save();
        return redirect()->route('user.login')->with('success', 'Registered successfully');
    }

    public function userloginstore(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if ($request->temp) {
                // dd($request->temp);
                return redirect()->route('bookservice', $request->temp)->with('success', 'Signed In');
            } else {
                return redirect()->route('index')
                    ->with('success', 'Signed in');
            }
        }

        return redirect()->back()->with('error', 'Login details are not valid');
    }


    public function user_logincheck(Request $request, $slug)
    {
        $temp = $request->temp;
        // dd($temp);
        return view('frontend.userlogin', compact('temp'));
    }

    public function userlogout()
    {
        // Session::flush();
        Auth::logout();
        return redirect()->route('user.login')->with('success', 'Logged Out');
    }

    public function bookservice($slug)
    {
        $uid = Auth::user()->id;
        $user = User::where('id', $uid)->first();
        $service = Service::where('slug', $slug)->first();
        // dd($service);
        $cities = City::orderBy('id', 'desc')->get();

        $ftime = json_decode($service->provider->from_time);
        $ttime = json_decode($service->provider->to_time);

        return view('frontend.book-service', compact('cities', 'service', 'ftime', 'ttime', 'user'));
    }

    public function bookservice_store(Request $request)
    {
        // dd('hii');
        $input = $request->all();
        // dd($input);
        $uid = Auth::user()->id;
        // dd($uid);
        $bookservice = new BookService($input);
        $bookservice->user_id = $uid;

        // dd($bookservice);
        $bookservice->save();

        $service = Service::where('id', $bookservice->service_id)->first();
        $provider = Provider::where('id', $service->provider_id)->first();
        // dd($provider);
        $admin = Admin::orderBy('id', 'desc')->first();
        // dd($admin);
        $provider->notify(new BookServiceNotification($bookservice));
        $admin->notify(new BookServiceNotification($bookservice));
        // dd($admin);
        // dd('done');
        return response()->json(['success' => true, 'msg' => "Service booked successfully."]);
    }

    public function userbookings()
    {
        $uid = Auth::user()->id;
        $user = User::where('id', $uid)->first();
        $userbookings = BookService::where('user_id', $user->id)->get();
        $generalsetting = GeneralSettings::orderBy('id', 'desc')->first();

        $userbookings = $this->paginate_userbooking($userbookings)->withPath('userbookings');

        return view('frontend.user-bookings', compact('user', 'userbookings', 'generalsetting'));
    }

    public function paginate_userbooking($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function userdashboard()
    {
        $uid = Auth::user()->id;
        $user = User::where('id', $uid)->first();
        $userbookings = BookService::where('user_id', $user->id)->get();
        // dd($userbookings);
        $generalsetting = GeneralSettings::orderBy('id', 'desc')->first();
        return view('frontend.user-dashboard', compact('user', 'userbookings', 'generalsetting'));
    }

    public function userpayment()
    {
        $uid = Auth::user()->id;
        $user = User::where('id', $uid)->first();
        $payments = Payment::where('user_id', $uid)->get();
        // dd($payments);
        $generalsetting = GeneralSettings::orderBy('id', 'desc')->first();
        return view('frontend.user-payment', compact('user', 'generalsetting', 'payments'));
    }

    public function userreviews()
    {
        $uid = Auth::user()->id;
        $user = User::where('id', $uid)->first();
        $generalsetting = GeneralSettings::orderBy('id', 'desc')->first();
        return view('frontend.user-reviews', compact('user', 'generalsetting'));
    }

    public function usersettings()
    {
        $countries = Country::orderBy('countryname')->get();
        $states = State::orderBy('statename')->get();
        $cities = City::orderBy('cityname')->get();
        $uid = Auth::user()->id;
        $user = User::where('id', $uid)->first();
        $generalsetting = GeneralSettings::orderBy('id', 'desc')->first();
        return view('frontend.user-settings', compact('user', 'countries', 'states', 'cities', 'generalsetting'));
    }

    public function usersettings_update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'profileimage' => 'mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $uid = Auth::user()->id;
        // dd($uid);

        $user = User::find($uid);
        // dd($user);

        $input = $request->all();
        if ($profileimage = $request->file('profileimage')) {
            $destinationPath = 'images/admin/usersprofileimage/';
            $destination  = 'images/admin/usersprofileimage/' . $user->profileimage;

            if (File::exists($destination)) {
                File::delete($destination);
            }

            $profileImage = date('Ymd_His', time()) . "_profileimage." . $profileimage->getClientOriginalExtension();
            $profileimage->move($destinationPath, $profileImage);
            $input['profileimage'] = $profileImage;
        } else {
            unset($input['profileimage']);
        }
        // dd($input);
        $user->update($input);
        return redirect()->route('usersettings', $user->id)
            ->with('success', 'updated successfully');
    }

    public function userwallet()
    {
        $uid = Auth::user()->id;
        $user = User::where('id', $uid)->first();

        $book_service = BookService::where('user_id', $uid)->get();
        // dd($book_service);

        $generalsetting = GeneralSettings::orderBy('id', 'desc')->first();
        return view('frontend.user-wallet', compact('user', 'generalsetting', 'book_service'));
    }

    public function user_changepassword()
    {
        $uid = Auth::user()->id;
        $user = User::where('id', $uid)->first();
        $generalsetting = GeneralSettings::orderBy('id', 'desc')->first();
        return view('frontend.user-changepassword', compact('user', 'generalsetting'));
    }

    public function user_updatepassword(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'old_password' => 'required', new UserMatchOldPassword,
            'new_password' => 'required_with:confirmpassword|same:confirmpassword',
            'confirmpassword' => 'required',
        ]);

        if (Hash::check($request->old_password, Auth::user()->password)) {

            User::find(Auth::user()->id)->update(['password' => Hash::make($request->new_password)]);
            return redirect()->back()->with('success', 'Password changed successfully');
        }
        return redirect()->back()->with('error', 'Old Password does not matched');
    }
}
