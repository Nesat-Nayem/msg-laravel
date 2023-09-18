<?php

namespace App\Http\Controllers;

use App\Models\BookService;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Provider;
use App\Models\Category;
use App\Models\GeneralSettings;
use App\Models\Payment;
use App\Models\Service;
use App\Models\SubCategory;
use App\Models\Subscription;
use App\Rules\ProviderMatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;



class FEProviderController extends Controller
{
    public function providerlogin()
    {
        return view('frontend.providerlogin');
    }

    public function myservices()
    {
        $pid = Auth::guard('providerpanel')->user()->id;
        $services = Service::orderBy('id', 'desc')->where('provider_id', $pid)->where('status', '=', 'active')->paginate(6);

        $provider = Provider::where('id', $pid)->first();
        $generalsetting = GeneralSettings::orderBy('id', 'desc')->first();
        return view('frontend.my-services', compact('services', 'provider', 'generalsetting'));
    }

    public function inactiveservices()
    {
        $pid = Auth::guard('providerpanel')->user()->id;
        $services = Service::orderBy('id', 'desc')->where('provider_id', $pid)->where('status', '=', 'inactive')->paginate(6);
        $provider = Provider::where('id', $pid)->first();

        $generalsetting = GeneralSettings::orderBy('id', 'desc')->first();

        return view('frontend.inactive-services', compact('services', 'provider', 'generalsetting'));
    }

    public function addservice()
    {
        $countries = Country::orderBy('countryname')->get();
        $states = State::orderBy('statename')->get();
        $cities = City::orderBy('cityname')->get();
        // $providers = Provider::orderBy('name')->get();
        $categories = Category::orderBy('categoryname')->get();
        $subcategories = SubCategory::orderBy('subcategoryname')->get();
        $pid = Auth::guard('providerpanel')->user()->id;
        $provider = Provider::where('id', $pid)->first();
        $generalsetting = GeneralSettings::orderBy('id', 'desc')->first();
        return view('frontend.add-service', compact('countries', 'states', 'cities', 'categories', 'subcategories', 'provider', 'generalsetting'));
    }

    public function servicestore(Request $request)
    {
        $request->validate([
            'servicetitle' => 'required',
            'servicetitle' => 'required',
            'serviceamount' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'serviceoffer' => 'required',
            'description' => 'required',
            'serviceimage' => 'image|mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
            'service_gallery.*' => 'image|mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($file = $request->hasFile('serviceimage')) {
            $file = $request->file('serviceimage');
            $fileName = date('Ymd_His', time()) . "_serviceimage." . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/images/admin/serviceimage';
            $file->move($destinationPath, $fileName);
            $request['serviceimage'] = $fileName;
        }

        if (Service::whereslug($slug = Str::slug($request->slug))->exists()) {
            $slug = $this->incrementSlug($slug);
            $request['slug'] = $slug;
        }

        $service = new Service($request->input());
        $service->provider_id = Auth::guard('providerpanel')->user()->id;

        $category = Category::where('id', $request->category_id)->first();
        $cp = $category->commission_percentage;
        $temp = (($request->serviceamount) * ($cp)) / 100;
        $total = ($request->serviceamount) + ($temp);
        $service->totalamount = $total;


        $amount = $service->totalamount;
        $discount = $service->discount;
        $price = ($discount / 100) * $amount;
        $discountprice = $amount - $price;
        $service->rate = $discountprice;

        // dd($service);

        if ($request->hasFile('service_gallery')) {
            $servfiles = $request->file('service_gallery');
            $imgarr = array();
            foreach ($servfiles as $sfile) {
                // dump($sfile);
                $fileName = date('Ymd_His', time()) . "_" . $sfile->getClientOriginalName();
                $destinationPath = public_path() . '/images/admin/servicegallery';
                $sfile->move($destinationPath, $fileName);
                $imgarr[] = $fileName;
            }
            $service->service_gallery = json_encode($imgarr);
        }

        $service->save();

        return redirect()->route('myservices')->with('success', 'added successfully');
    }

    public function editservice($slug)
    {
        $countries = Country::orderBy('countryname')->get();
        $states = State::orderBy('statename')->get();
        $cities = City::orderBy('cityname')->get();
        $providers = Provider::orderBy('name')->get();
        $categories = Category::orderBy('categoryname')->get();
        $subcategories = SubCategory::orderBy('subcategoryname')->get();

        $service = Service::where('slug', $slug)->first();
        return view('frontend.edit-service', compact('countries', 'states', 'cities', 'providers', 'categories', 'subcategories', 'service'));
    }

    public function updateservice(Request $request, $slug)
    {
        // dd($request->all());
        $request->validate([
            'servicetitle' => 'required',
            'servicetitle' => 'required',
            'serviceamount' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'serviceoffer' => 'required',
            'description' => 'required',
            'serviceimage' => 'mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $service = Service::where('slug', $slug)->first();

        $category = Category::where('id', $request->category_id)->first();
        // dd($category);
        $cp = $category->commission_percentage;

        $temp = (($request->serviceamount) * ($cp)) / 100;
        $total = ($request->serviceamount) + ($temp);

        $service->totalamount = $total;


        $service->totalamount = $request->totalamount;
        $service->discount = $request->discount;

        $price = ($service->totalamount / 100) * $service->discount;

        $discountprice = $service->totalamount - $price;
        // dd($discountprice);
        $service->rate = $discountprice;
        // dd($service->rate);
        $input = $request->all();
        // dd($input);
        if ($serviceimage = $request->file('serviceimage')) {
            $destinationPath = 'images/admin/serviceimage/';
            $destination  = 'images/admin/serviceimage/' . $service->serviceimage;

            if (File::exists($destination)) {
                File::delete($destination);
            }

            $serviceImage = date('Ymd_His', time()) . "_serviceimage." . $serviceimage->getClientOriginalExtension();
            $serviceimage->move($destinationPath, $serviceImage);
            $input['serviceimage'] = $serviceImage;
        } else {
            unset($input['serviceimage']);
        }

        if ($service->title != $request->title) {
            // dd($buyerDetails->title != $request->title);
            if (Service::whereslug($slug = Str::slug($request->slug))->exists()) {
                $slug = $this->incrementSlug($slug);
                $input['slug'] = $slug;
            }
        }


        if ($request->hasFile('service_gallery')) {
            // Remove Old Gallery Images
            $gallery = json_decode($service->service_gallery, true);
            if ($gallery) {
                foreach ($gallery as $img) {
                    if ($img) {
                        $file_path = public_path() . '/images/admin/servicegallery/' . $img;
                        // dd(File::exists($file_path));
                        if (File::exists($file_path)) {
                            File::delete($file_path);
                        }
                        // dd($file_path);
                    }
                }
            }

            // Replace New Gallery Images
            $servfiles = $request->file('service_gallery');
            $imgarr = array();
            foreach ($servfiles as $sfile) {
                $fileName = date('Ymd_His', time()) . "_" . $sfile->getClientOriginalName();
                $destinationPath = public_path() . '/images/admin/servicegallery';
                $sfile->move($destinationPath, $fileName);
                $imgarr[] = $fileName;
            }
            $input['service_gallery'] = json_encode($imgarr);
        }

        // dd($service);
        $service->update($input);

        return redirect()->route('myservices')
            ->with('success', 'updated successfully');
    }

    public function providerregister(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'mobilenumber' => 'required|unique:provider,mobilenumber',
            'email' => 'required',
            'password' => 'required',
            'confirmpassword' => 'required|same:password',
            'profileimage' => 'mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($file = $request->hasFile('profileimage')) {
            $file = $request->file('profileimage');
            $fileName = date('Ymd_His', time()) . "_profileimage." . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/images/admin/providerprofileimage';
            $file->move($destinationPath, $fileName);
            $request['profileimage'] = $fileName;
        }

        $provider = new Provider($request->input());
        $provider->password = Hash::make($request->get('password'));
        $provider->confirmpassword = Hash::make($request->get('confirmpassword'));
        // dd($provider);
        $provider->save();

        // $provider_id = $provider->id;
        return redirect()->route('subscriptionplan', $provider->id)->with('success', 'Registered successfully');
    }

    public function subscriptionplan($id)
    {
        $provider = Provider::find($id);
        return view('frontend.subscription-plan', compact('provider'));
    }

    public function subplan_store(Request $request)
    {
        // dd($request->all());

        $subscription = new Subscription($request->input());

        $subscription->save();

        $provider = Provider::find($request->provider_id);
        $provider->subscription_id = $subscription->id;
        // dd($provider);
        $provider->save();

        return redirect()->route('provider.providerlogin')->with('success', 'Registered successfully');
    }

    public function providerloginstore(Request $request)
    {
        // dd("test");
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $data = Provider::where('email', $request->email)->first();

        $credentials = $request->only('email', 'password');
        // if (Auth::guard('providerpanel')->attempt($credentials)) {
        //     return redirect()->route('index')
        //         ->with('success', 'Signed in');
        // }

        if (Auth::guard('providerpanel')->attempt($credentials)) {

            // dd($data);
            if ($data->status == "active") {
                // dd("if");
                return redirect()->route('index')
                    ->with('success', 'Signed in');
            }
            if ($data->status == "inactive") {
                // dd("else");
                return redirect()->route('provider.providerlogin')
                    ->with('info', 'Your Account Is Still Not Active');
            }
            // dd("end");
        } else {
            return redirect()->back()->with('error', 'Login details are not valid');
        }
    }

    public function providerlogout()
    {
        // Session::flush();
        Auth::guard('providerpanel')->logout();
        return redirect()->route('provider.providerlogin')->with('success', 'Logged Out');
    }

    public function provideravailability()
    {
        $pid = Auth::guard('providerpanel')->user()->id;
        $provider = Provider::where('id', $pid)->first();
        $generalsetting = GeneralSettings::orderBy('id', 'desc')->first();
        return view('frontend.provider-availability', compact('provider', 'generalsetting'));
    }

    public function provideravailability_store(Request $request)
    {
        // dd($request->all());
        $pid = Auth::guard('providerpanel')->user()->id;
        $provider = Provider::where('id', $pid)->first();

        // dd($provider);

        // $provider = new Provider($request->input());
        // dd($provider);
        // $from_time = $request->input('from_time');
        // dd($from_time->count());

        // $to_time = $request->input('to_time');
        // dd($to_time);

        // $from = [];
        // $to = [];
        // for ($count = 0; $count < count($from_time); $count++) {
        // $from[]  = $from_time[$count];
        // }
        // dd($from);

        // $provider->from_time = $from;
        $provider->from_time = json_encode($request->from_time);
        // dd($provider->from_time);

        // for ($count = 0; $count < count($to_time); $count++) {
        // $to[]  = $to_time[$count];
        // }
        // dd($to);

        // $provider->to_time = $to;
        $provider->to_time = json_encode($request->to_time);
        // dd($provider->to_time);

        // dd($provider);
        $provider->update();
        // dd($provider);

        return redirect()->route('provideravailability')->with('success', 'updated successfully.');
        // return view('frontend.provider-availability', compact('provider'));
    }

    public function providerbookings()
    {
        $pid = Auth::guard('providerpanel')->user()->id;
        $provider = Provider::where('id', $pid)->first();
        $userbookings = BookService::orderBy('id', 'desc')->get();

        $services = Service::select('id')->where('provider_id', $pid)->get()->toArray();
        // dd($services);
        $bookings = [];
        foreach ($services as $service) {
            // dd($service);
            $book = BookService::where('service_id', $service)->get();
            // dd($bookings);

            foreach ($book as $b) {
                $bookings[] = $b;
            }
        }
        // dd($bookings);
        $userbook = sizeof($bookings);
        $bookings = $this->paginate_booking($bookings)->withPath('providerbookings');


        $generalsetting = GeneralSettings::orderBy('id', 'desc')->first();
        // dd($userbook);
        return view('frontend.provider-bookings', compact('bookings', 'userbookings', 'services', 'provider', 'userbook', 'generalsetting'));
    }

    public function providerdashboard()
    {
        $pid = Auth::guard('providerpanel')->user()->id;
        $provider = Provider::where('id', $pid)->first();
        $userbookings = BookService::orderBy('id', 'desc')->get();

        $services = Service::select('id')->where('provider_id', $pid)->get()->toArray();
        // dd($services);
        $bookings = [];
        foreach ($services as $service) {
            // dd($service);
            $book = BookService::where('service_id', $service)->get();
            // dd($bookings);

            foreach ($book as $b) {
                $bookings[] = $b;
            }
        }
        // dd(sizeof($bookings));
        $userbook = sizeof($bookings);
        $service_all = sizeof($services);
        // dd($service_all);
        // dd($userbook);
        $generalsetting = GeneralSettings::orderBy('id', 'desc')->first();
        return view('frontend.provider-dashboard', compact('bookings', 'userbookings', 'services', 'provider', 'userbook', 'generalsetting', 'service_all'));
    }

    public function providerpayment()
    {
        $pid = Auth::guard('providerpanel')->user()->id;
        $provider = Provider::where('id', $pid)->first();

        $list = DB::table('services')
            ->join('payments', 'services.id', '=', 'payments.service_id')
            ->join('users', 'users.id', '=', 'payments.user_id')
            ->select('services.servicetitle', 'users.profileimage', 'users.name', 'payments.created_at', 'payments.amount', 'payments.json_response')
            ->where('services.provider_id', '=', $pid)
            ->get();
        // dd($list);




        $list = $this->paginate_payment($list)->withPath('providerpayment');
        // dd($list);
        $generalsetting = GeneralSettings::orderBy('id', 'desc')->first();
        return view('frontend.provider-payment', compact('provider', 'generalsetting', 'list'));
    }

    public function providerreviews()
    {
        $pid = Auth::guard('providerpanel')->user()->id;
        $provider = Provider::where('id', $pid)->first();
        $generalsetting = GeneralSettings::orderBy('id', 'desc')->first();
        return view('frontend.provider-reviews', compact('provider', 'generalsetting'));
    }

    public function providersettings(Request $request, $id)
    {
        $countries = Country::orderBy('countryname')->get();
        $states = State::orderBy('statename')->get();
        $cities = City::orderBy('cityname')->get();
        $categories = Category::orderBy('categoryname')->get();
        $subcategories = SubCategory::orderBy('subcategoryname')->get();
        $pid = Auth::guard('providerpanel')->user()->id;
        $provider = Provider::where('id', $pid)->first();
        // $providerid = Provider::find($id);
        $generalsetting = GeneralSettings::orderBy('id', 'desc')->first();
        return view('frontend.provider-settings', compact('countries', 'states', 'cities', 'provider', 'categories', 'subcategories', 'generalsetting'));
    }

    public function providersettings_update(Request $request, $id)
    {
        // dd('Hiii');
        // dd($request->all());
        $request->validate([
            'profileimage' => 'mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $pid = Auth::guard('providerpanel')->user()->id;
        // dd($pid);

        $provider = Provider::find($pid);
        // dd($provider);
        $input = $request->all();
        if ($profileimage = $request->file('profileimage')) {
            $destinationPath = 'images/admin/providerprofileimage/';
            $destination  = 'images/admin/providerprofileimage/' . $provider->profileimage;

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
        $provider->update($input);
        return redirect()->route('providersettings', $provider->id)
            ->with('success', 'updated successfully');
    }

    public function provider_changepassword()
    {
        $pid = Auth::guard('providerpanel')->user()->id;
        $provider = Provider::where('id', $pid)->first();
        $generalsetting = GeneralSettings::orderBy('id', 'desc')->first();
        return view('frontend.provider-changepassword', compact('provider', 'generalsetting'));
    }

    public function provider_updatepassword(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'old_password' => 'required', new ProviderMatchOldPassword,
            'new_password' => 'required_with:confirmpassword|same:confirmpassword',
            'confirmpassword' => 'required',
        ]);

        if (Hash::check($request->old_password, Auth::guard('providerpanel')->user()->password)) {

            Provider::find(Auth::guard('providerpanel')->user()->id)->update(['password' => Hash::make($request->new_password)]);
            return redirect()->back()->with('success', 'Password changed successfully');
        }
        return redirect()->back()->with('error', 'Old Password does not matched');

        // dd('Password change successfully.');
    }

    public function providersubscription()
    {
        $pid = Auth::guard('providerpanel')->user()->id;
        $provider = Provider::where('id', $pid)->first();
        $generalsetting = GeneralSettings::orderBy('id', 'desc')->first();
        return view('frontend.provider-subscription', compact('provider', 'generalsetting'));
    }

    public function providerwallet()
    {
        $pid = Auth::guard('providerpanel')->user()->id;
        $provider = Provider::where('id', $pid)->first();
        $generalsetting = GeneralSettings::orderBy('id', 'desc')->first();
        return view('frontend.provider-wallet', compact('provider', 'generalsetting'));
    }

    public function provider_notifications()
    {
        return view('frontend.provider-notifications');
    }
    public function provider_markNotification(Request $request)
    {
        Auth::guard('providerpanel')->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();
        return response()->noContent();
    }

    public function paginate_payment($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function paginate_booking($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function incrementSlug($slug)
    {
        $original = $slug;
        $count = 1;

        while (Service::whereslug($slug)->exists()) {
            $slug = "{$original}-" . $count++;
        }
        return $slug;
    }
}
