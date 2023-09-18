xx<?php

namespace App\Http\Controllers;

use App\Models\BookService;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\ContactUs;
use App\Models\GeneralSettings;
use App\Models\Service;
use App\Models\State;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index()
    {
        $cities = City::orderBy('cityname')->get();
        $services = Service::latest()->where('status', '=', 'active')->take(3)->get();
        $categories = Category::latest()->where('status', '=', 'active')->where('categoryfeature', '=', 'yes')->take(3)->get();
        $generalsetting = GeneralSettings::orderBy('id', 'desc')->first();
        return view('frontend.index', compact('cities', 'services', 'categories', 'generalsetting'));
        // return view('frontend.index');
    }

    public function search(Request $request)
    {
        $cities = City::orderBy('cityname')->get();
        $services = Service::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->get();
        $generalsetting = GeneralSettings::orderBy('id', 'desc')->first();

        return view('frontend.search-services', compact('cities', 'services', 'categories', 'generalsetting'));
    }


    public function aboutus()
    {
        return view('frontend.about-us');
    }

    public function categories()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('frontend.categories', compact('categories'));
    }

    public function category($categoryslug)
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $cities = City::orderBy('id', 'desc')->get();
        $category = Category::where('categoryslug', $categoryslug)->first();
        // dd($categories);
        $categoryService = Service::where('category_id', $category->id)->get();
        // dd($categoryService);
        $generalsetting = GeneralSettings::orderBy('id', 'desc')->first();
        return view('frontend.search-services', compact('categories', 'categoryService', 'generalsetting', 'cities'));
        // return redirect()->route('search', compact('categories', 'service', 'generalsetting'));
    }


    public function contactus()
    {
        return view('frontend.contact-us');
    }

    public function contactus_store(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'mobilenumber' => 'required',
            'message' => 'required',
        ]);

        $contactus = new ContactUs($request->input());
        $contactus->save();

        return redirect()->route('contactus')->with('success', 'message sent successfully');
    }

    public function favourites()
    {
        return view('frontend.chat');
    }

    public function services()
    {
        $services = Service::orderBy('id', 'desc')->get();
        $generalsetting = GeneralSettings::orderBy('id', 'desc')->first();
        return view('frontend.services', compact('services', 'generalsetting'));
    }

    public function searchservice(Request $request)
    {
        $cities = City::orderBy('cityname')->get();
        $categories = Category::orderBy('categoryname')->get();

        $search = $request->input('search');
        $city = $request->input('city_id');

        $services = Service::query()
            ->where('servicetitle', 'LIKE', "%{$search}%")
            // ->orWhere('description', 'LIKE', "%{$search}%")
            ->Where('city_id', 'LIKE', "%{$city}%")
            ->where('status', '=', 'active')
            ->get();
        // dd($services);
        $generalsetting = GeneralSettings::orderBy('id', 'desc')->first();
        return view('frontend.search-services', compact('services', 'cities', 'categories', 'generalsetting'));
    }

    public function searchservices(Request $request)
    {
        // dd($request->all());
        $cities = City::orderBy('cityname')->get();
        $categories = Category::orderBy('categoryname')->get();

        $search = $request->input('search');
        $sort = $request->input('sort');
        $city = $request->input('city_id');
        $category = $request->input('category_id');

        $generalsetting = GeneralSettings::orderBy('id', 'desc')->first();

        if ($search && $sort == null && $category == null && $city == null) {
            $services = Service::Where('servicetitle', 'LIKE', "%{$search}%")->where('status', '=', 'active')->get();
            return view('frontend.search-services', compact('services', 'cities', 'categories', 'generalsetting'));
        } else if ($search == null && $sort == 'Price Low to High' && $category == null && $city == null) {
            $services = Service::orderBy('serviceamount', 'asc')->where('status', '=', 'active')->get();
            return view('frontend.search-services', compact('services', 'cities', 'categories', 'generalsetting'));
        } else if ($search == null && $sort == 'Price High to Low' && $category == null && $city == null) {
            $services = Service::orderBy('serviceamount', 'desc')->where('status', '=', 'active')->get();
            return view('frontend.search-services', compact('services', 'cities', 'categories', 'generalsetting'));
        } else if ($search == null && $sort == 'Newest' && $category == null && $city == null) {
            $services = Service::orderBy('id', 'desc')->where('status', '=', 'active')->get();
            return view('frontend.search-services', compact('services', 'cities', 'categories', 'generalsetting'));
        } else if ($search == null && $sort == null && $category && $city == null) {
            $services = Service::where('category_id', 'LIKE', "%{$category}%")->where('status', '=', 'active')->get();
            return view('frontend.search-services', compact('services', 'cities', 'categories', 'generalsetting'));
        } else if ($search == null && $sort == null && $category == null && $city) {
            $services = Service::where('city_id', 'LIKE', "%{$city}%")->where('status', '=', 'active')->get();
            return view('frontend.search-services', compact('services', 'cities', 'categories', 'generalsetting'));
        } else if ($search && $sort == 'Price Low to High' && $category == null && $city == null) {
            $services = Service::orderBy('serviceamount', 'asc')->where('servicetitle', 'LIKE', "%{$search}%")->where('status', '=', 'active')->get();
            return view('frontend.search-services', compact('services', 'cities', 'categories', 'generalsetting'));
        } else if ($search && $sort == 'Price High to Low' && $category == null && $city == null) {
            $services = Service::orderBy('serviceamount', 'desc')->where('servicetitle', 'LIKE', "%{$search}%")->where('status', '=', 'active')->get();
            return view('frontend.search-services', compact('services', 'cities', 'categories', 'generalsetting'));
        } else if ($search && $sort == 'Newest' && $category == null && $city == null) {
            $services = Service::orderBy('id', 'desc')->where('servicetitle', 'LIKE', "%{$search}%")->where('status', '=', 'active')->get();
            return view('frontend.search-services', compact('services', 'cities', 'categories', 'generalsetting'));
        } else if ($search && $sort == null && $category && $city == null) {
            $services = Service::where('servicetitle', 'LIKE', "%{$search}%")->where('category_id', 'LIKE', "%{$category}%")->where('status', '=', 'active')->get();
            return view('frontend.search-services', compact('services', 'cities', 'categories', 'generalsetting'));
        } else if ($search && $sort == null && $category == null && $city) {
            $services = Service::where('servicetitle', 'LIKE', "%{$search}%")->where('city_id', 'LIKE', "%{$city}%")->where('status', '=', 'active')->get();
            return view('frontend.search-services', compact('services', 'cities', 'categories', 'generalsetting'));
        } else if ($search == null && $sort == 'Price Low to High' && $category && $city == null) {
            $services = Service::orderBy('serviceamount', 'asc')->where('category_id', 'LIKE', "%{$category}%")->where('status', '=', 'active')->get();
            return view('frontend.search-services', compact('services', 'cities', 'categories', 'generalsetting'));
        } else if ($search == null && $sort == 'Price High to Low' && $category && $city == null) {
            $services = Service::orderBy('serviceamount', 'desc')->where('category_id', 'LIKE', "%{$category}%")->where('status', '=', 'active')->get();
            return view('frontend.search-services', compact('services', 'cities', 'categories', 'generalsetting'));
        } else if ($search == null && $sort == 'Newest' && $category && $city == null) {
            $services = Service::orderBy('id', 'desc')->where('category_id', 'LIKE', "%{$category}%")->where('status', '=', 'active')->get();
            return view('frontend.search-services', compact('services', 'cities', 'categories', 'generalsetting'));
        } else if ($search == null && $sort == 'Price Low to High' && $category == null && $city) {
            $services = Service::orderBy('serviceamount', 'asc')->where('city_id', 'LIKE', "%{$city}%")->where('status', '=', 'active')->get();
            return view('frontend.search-services', compact('services', 'cities', 'categories', 'generalsetting'));
        } else if ($search == null && $sort == 'Price High to Low' && $category == null && $city) {
            $services = Service::orderBy('serviceamount', 'desc')->where('city_id', 'LIKE', "%{$city}%")->where('status', '=', 'active')->get();
            return view('frontend.search-services', compact('services', 'cities', 'categories', 'generalsetting'));
        } else if ($search == null && $sort == 'Newest' && $category == null && $city) {
            $services = Service::orderBy('id', 'desc')->where('city_id', 'LIKE', "%{$city}%")->where('status', '=', 'active')->get();
            return view('frontend.search-services', compact('services', 'cities', 'categories', 'generalsetting'));
        } else if ($search == null && $sort == null && $category && $city) {
            $services = Service::where('category_id', 'LIKE', "%{$category}%")->where('city_id', 'LIKE', "%{$city}%")->where('status', '=', 'active')->get();
            return view('frontend.search-services', compact('services', 'cities', 'categories', 'generalsetting'));
        } else if ($search && $sort == 'Price Low to High' && $category && $city == null) {
            $services = Service::orderBy('serviceamount', 'asc')->where('servicetitle', 'LIKE', "%{$search}%")->where('category_id', 'LIKE', "%{$category}%")->where('status', '=', 'active')->get();
            return view('frontend.search-services', compact('services', 'cities', 'categories', 'generalsetting'));
        } else if ($search && $sort == 'Price High to Low' && $category && $city == null) {
            $services = Service::orderBy('serviceamount', 'desc')->where('servicetitle', 'LIKE', "%{$search}%")->where('category_id', 'LIKE', "%{$category}%")->where('status', '=', 'active')->get();
            return view('frontend.search-services', compact('services', 'cities', 'categories', 'generalsetting'));
        } else if ($search && $sort == 'Newest' && $category && $city == null) {
            $services = Service::orderBy('id', 'desc')->where('servicetitle', 'LIKE', "%{$search}%")->where('category_id', 'LIKE', "%{$category}%")->where('status', '=', 'active')->get();
            return view('frontend.search-services', compact('services', 'cities', 'categories', 'generalsetting'));
        } else if ($search && $sort == null && $category && $city) {
            $services = Service::where('servicetitle', 'LIKE', "%{$search}%")->where('category_id', 'LIKE', "%{$category}%")->where('city_id', 'LIKE', "%{$city}%")->where('status', '=', 'active')->get();
            return view('frontend.search-services', compact('services', 'cities', 'categories', 'generalsetting'));
        } else if ($search == null && $sort == 'Price Low to High' && $category && $city) {
            $services = Service::orderBy('serviceamount', 'asc')->where('category_id', 'LIKE', "%{$category}%")->where('city_id', 'LIKE', "%{$city}%")->where('status', '=', 'active')->get();
            return view('frontend.search-services', compact('services', 'cities', 'categories', 'generalsetting'));
        } else if ($search == null && $sort == 'Price High to Low' && $category && $city) {
            $services = Service::orderBy('serviceamount', 'desc')->where('category_id', 'LIKE', "%{$category}%")->where('city_id', 'LIKE', "%{$city}%")->where('status', '=', 'active')->get();
            return view('frontend.search-services', compact('services', 'cities', 'categories', 'generalsetting'));
        } else if ($search == null && $sort == 'Newest' && $category && $city) {
            $services = Service::orderBy('id', 'desc')->where('category_id', 'LIKE', "%{$category}%")->where('city_id', 'LIKE', "%{$city}%")->where('status', '=', 'active')->get();
            return view('frontend.search-services', compact('services', 'cities', 'categories', 'generalsetting'));
        } else if ($search && $sort == 'Price Low to High' && $category && $city) {
            $services = Service::orderBy('serviceamount', 'asc')->where('servicetitle', 'LIKE', "%{$search}%")->where('category_id', 'LIKE', "%{$category}%")->where('city_id', 'LIKE', "%{$city}%")->where('status', '=', 'active')->get();
            return view('frontend.search-services', compact('services', 'cities', 'categories', 'generalsetting'));
        } else if ($search && $sort == 'Price High to Low' && $category && $city) {
            $services = Service::orderBy('serviceamount', 'desc')->where('servicetitle', 'LIKE', "%{$search}%")->where('category_id', 'LIKE', "%{$category}%")->where('city_id', 'LIKE', "%{$city}%")->where('status', '=', 'active')->get();
            return view('frontend.search-services', compact('services', 'cities', 'categories', 'generalsetting'));
        } else if ($search && $sort == 'Newest' && $category && $city) {
            $services = Service::orderBy('id', 'desc')->where('servicetitle', 'LIKE', "%{$search}%")->where('category_id', 'LIKE', "%{$category}%")->where('city_id', 'LIKE', "%{$city}%")->where('status', '=', 'active')->get();
            return view('frontend.search-services', compact('services', 'cities', 'categories', 'generalsetting'));
        }
    }

    public function servicedetails($slug)
    {
        $generalsetting = GeneralSettings::orderBy('id', 'desc')->first();
        $service = Service::where('slug', $slug)->first();
        // dd($service);
        $uid = Auth::guard('web')->user()->id;
        // dd($uid);
        $bookservice = BookService::where('service_id', $service->id)->where('user_id', $uid)->get();
        if ($bookservice == "[]") {
            return view('frontend.service-details', compact('service', 'generalsetting'));
        } else {
            return view('frontend.service-details', compact('service', 'generalsetting', 'bookservice'));
        }
    }

    public function getCityFromState($state)
    {
        $cities = City::where('state_id', $state)->get();
        return $cities;
    }

    public function getSubCategoryFromCategory($category)
    {
        $subcategories = SubCategory::where('category_id', $category)->get();
        return $subcategories;
    }

    public function getStateFromCountry($country)
    {
        $states = State::where('country_id', $country)->get();
        return $states;
    }
}
