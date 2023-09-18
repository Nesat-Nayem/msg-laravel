<?php

namespace App\Http\Controllers;

use App\Models\GeneralSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GeneralSettingsController extends Controller
{
    public function index()
    {
        $generalsetting = GeneralSettings::find(1);
        return view('admin.general-settings', compact('generalsetting'));
    }

    public function create()
    {
        return view('admin.general-settings');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'websitename' => 'required',
            'contactdetails' => 'required',
            'mobilenumber' => 'required',
            'language' => 'required',
            // 'location_radius' => 'required',
            // 'commission_percentage' => 'required',
            // 'service_locationtype' => 'required',
            'service_placeholder' => 'required|mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
            'profile_placeholder' => 'required|mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
            'logo' => 'required|mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'required|mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
            'icon' => 'required|mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
            'demo_access' => 'required',
        ]);

        if ($file = $request->hasFile('service_placeholder')) {
            $file = $request->file('service_placeholder');
            $fileName = date('Ymd_His', time()) . "_service_placeholder." . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/images/admin/generalsettings';
            $file->move($destinationPath, $fileName);
            $request['service_placeholder'] = $fileName;
        }

        if ($file = $request->hasFile('profile_placeholder')) {
            $file = $request->file('profile_placeholder');
            $fileName = date('Ymd_His', time()) . "_profile_placeholder." . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/images/admin/generalsettings';
            $file->move($destinationPath, $fileName);
            $request['profile_placeholder'] = $fileName;
        }

        if ($file = $request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = date('Ymd_His', time()) . "_logo." . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/images/admin/generalsettings';
            $file->move($destinationPath, $fileName);
            $request['logo'] = $fileName;
        }

        if ($file = $request->hasFile('favicon')) {
            $file = $request->file('favicon');
            $fileName = date('Ymd_His', time()) . "_favicon." . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/images/admin/generalsettings';
            $file->move($destinationPath, $fileName);
            $request['favicon'] = $fileName;
        }

        if ($file = $request->hasFile('icon')) {
            $file = $request->file('icon');
            $fileName = date('Ymd_His', time()) . "_icon." . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/images/admin/generalsettings';
            $file->move($destinationPath, $fileName);
            $request['icon'] = $fileName;
        }



        $generalsettings = new GeneralSettings($request->input());
        // dd($generalsettings);
        $generalsettings->save();

        return redirect()->route('admin-generalsettings.create')->with('success', 'created successfully');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'websitename' => 'required',
            'contactdetails' => 'required',
            'mobilenumber' => 'required',
            'language' => 'required',
            // 'location_radius' => 'required',
            // 'commission_percentage' => 'required',
            // 'service_locationtype' => 'required',
            'service_placeholder' => 'mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
            'profile_placeholder' => 'mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
            'logo' => 'mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
            'icon' => 'mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
            'demo_access' => 'required',
        ]);


        $generalsetting = GeneralSettings::find($id);

        $input = $request->all();

        if ($service_placeholder = $request->file('service_placeholder')) {
            $destinationPath = 'images/admin/generalsettings/';
            $destination  = 'images/admin/generalsettings/' . $generalsetting->service_placeholder;

            if (File::exists($destination)) {
                File::delete($destination);
            }

            $service_Placeholder = date('Ymd_His', time()) . "_service_placeholder." . $service_placeholder->getClientOriginalExtension();
            $service_placeholder->move($destinationPath, $service_Placeholder);
            $input['service_placeholder'] = $service_Placeholder;
        } else {
            unset($input['service_placeholder']);
        }

        if ($profile_placeholder = $request->file('profile_placeholder')) {
            $destinationPath = 'images/admin/generalsettings/';
            $destination  = 'images/admin/generalsettings/' . $generalsetting->profile_placeholder;

            if (File::exists($destination)) {
                File::delete($destination);
            }

            $profile_Placeholder = date('Ymd_His', time()) . "_profile_placeholder." . $profile_placeholder->getClientOriginalExtension();
            $profile_placeholder->move($destinationPath, $profile_Placeholder);
            $input['profile_placeholder'] = $profile_Placeholder;
        } else {
            unset($input['profile_placeholder']);
        }

        if ($logo = $request->file('logo')) {
            $destinationPath = 'images/admin/generalsettings/';
            $destination  = 'images/admin/generalsettings/' . $generalsetting->logo;

            if (File::exists($destination)) {
                File::delete($destination);
            }

            $Logo = date('Ymd_His', time()) . "_logo." . $logo->getClientOriginalExtension();
            $logo->move($destinationPath, $Logo);
            $input['logo'] = $Logo;
        } else {
            unset($input['logo']);
        }

        if ($favicon = $request->file('favicon')) {
            $destinationPath = 'images/admin/generalsettings/';
            $destination  = 'images/admin/generalsettings/' . $generalsetting->favicon;

            if (File::exists($destination)) {
                File::delete($destination);
            }

            $Favicon = date('Ymd_His', time()) . "_favicon." . $favicon->getClientOriginalExtension();
            $favicon->move($destinationPath, $Favicon);
            $input['favicon'] = $Favicon;
        } else {
            unset($input['favicon']);
        }

        if ($icon = $request->file('icon')) {
            $destinationPath = 'images/admin/generalsettings/';
            $destination  = 'images/admin/generalsettings/' . $generalsetting->icon;

            if (File::exists($destination)) {
                File::delete($destination);
            }

            $Icon = date('Ymd_His', time()) . "_icon." . $icon->getClientOriginalExtension();
            $icon->move($destinationPath, $Icon);
            $input['icon'] = $Icon;
        } else {
            unset($input['icon']);
        }

        $generalsetting->update($input);

        return redirect()->route('admin-generalsettings.index')
            ->with('success', 'updated successfully');
    }

    public function destroy(string $id)
    {
        //
    }
}
