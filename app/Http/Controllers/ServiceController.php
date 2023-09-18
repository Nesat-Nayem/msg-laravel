<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Provider;
use App\Models\Service;
use App\Models\State;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;



class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('id', 'desc')->get();
        return view('admin.service.index', compact('services'));
    }

    public function create()
    {
        $countries = Country::orderBy('countryname')->get();
        $states = State::orderBy('statename')->get();
        $cities = City::orderBy('cityname')->get();
        $providers = Provider::orderBy('name')->get();
        $categories = Category::orderBy('categoryname')->get();
        $subcategories = SubCategory::orderBy('subcategoryname')->get();
        return view('admin.service.create', compact('countries', 'states', 'cities', 'providers', 'categories', 'subcategories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'provider_id' => 'required',
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
        ]);
        // dd($request);

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
        // dd($service);
        $service->save();

        return redirect()->route('admin-service.index')->with('success', 'added successfully');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $countries = Country::orderBy('countryname')->get();
        $states = State::orderBy('statename')->get();
        $cities = City::orderBy('cityname')->get();
        $providers = Provider::orderBy('name')->get();
        $categories = Category::orderBy('categoryname')->get();
        $subcategories = SubCategory::orderBy('subcategoryname')->get();

        $service = Service::find($id);
        return view('admin.service.edit', compact('countries', 'states', 'cities', 'providers', 'categories', 'subcategories', 'service'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'servicetitle' => 'required',
            'provider_id' => 'required',
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

        $service = Service::find($id);

        // dd($service);
        $input = $request->all();
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

        // dd($input);
        $service->update($input);

        return redirect()->route('admin-service.index')
            ->with('success', 'updated successfully');
    }

    public function destroy(string $id)
    {
        $service = Service::find($id);
        if ($service->serviceimage) {
            $destination  =  public_path() . '/images/admin/serviceimage/' . $service->serviceimage;
            if (File::exists($destination)) {
                unlink($destination);
            }
        }
        $service->delete();
        return redirect()->route('admin-service.index')
            ->with('success', 'deleted successfully');
    }

    public function pendingservices()
    {
        $services = Service::orderBy('id', 'desc')->where('status', '=', 'pending')->get();
        return view('admin.pending-services', compact('services'));
    }

    public function deletedservices()
    {
        $services = Service::orderBy('id', 'desc')->where('status', '=', 'deleted')->get();
        return view('admin.deleted-services', compact('services'));
    }

    public function inactiveservices()
    {
        $services = Service::orderBy('id', 'desc')->where('status', '=', 'inactive')->get();
        return view('admin.inactive-services', compact('services'));
    }

    public function service_filter(Request $request)
    {
        $servicename = $request->input('servicename');
        $fromdate = date('Y-m-d', strtotime($request->fromdate));
        $todate = date('Y-m-d', strtotime($request->todate));

        $data = Service::where('servicetitle', $servicename)
            ->whereDate('created_at', '>=', $fromdate)->whereDate('created_at', '<=', $todate)
            ->get();

        // dd($data);
        return view('admin.service.index', compact('data'));
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
