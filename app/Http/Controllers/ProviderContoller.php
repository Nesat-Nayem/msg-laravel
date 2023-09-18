<?php

namespace App\Http\Controllers;

use App\Models\GeneralSettings;
use App\Models\Provider;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;


class ProviderContoller extends Controller
{
    public function index()
    {
        $providers = Provider::orderBy('id', 'desc')->get();
        $generalsetting = GeneralSettings::orderBy('id', 'desc')->first();
        return view('admin.provider.index', compact('providers', 'generalsetting'));
    }

    public function create()
    {
        return view('admin.provider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobilenumber' => 'required',
            'email' => 'required|unique:provider,email',
            'profileimage' => 'image|mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
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

        if ($request->active == 'checked') {

            $provider->active = 1;
            $provider->inactive = 0;
        } elseif ($request->inactive == 'checked') {

            $provider->inactive = 1;
            $provider->active = 0;
        }

        $subscription = Subscription::latest()->first();
        // dd($subscription);
        if ($subscription == '' || $subscription == null) {

            $sub = new Subscription();
            // dd($sub);
            $sub->id = $subscription->id + 1;
            $sub->plan = 'Basic';
            $sub->amount = 0;
            $sub->status = 'paid';

            $sub->save();
        } else {
            $sub = new Subscription();

            $sub->id = $subscription->id + 1;
            $sub->plan = 'Basic';
            $sub->amount = 0;
            $sub->status = 'paid';

            // dd($sub);
            $sub->save();
        }

        $provider->subscription_id = $sub->id;
        // dd($provider);
        $provider->save();

        return redirect()->route('admin-provider.index')->with('success', 'added successfully');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $provider = Provider::find($id);
        return view('admin.provider.edit', compact('provider'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'mobilenumber' => 'required',
            'email' => 'required|unique:provider,email,' . $id,
            'profileimage' => 'image|mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $provider = Provider::find($id);

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

        if ($request->active == 'checked') {

            $provider->active = 1;
            $provider->inactive = 0;
        } elseif ($request->inactive == 'checked') {

            $provider->inactive = 1;
            $provider->active = 0;
        }

        $provider->update($input);

        return redirect()->route('admin-provider.index')
            ->with('success', 'updated successfully');
    }

    public function destroy(string $id)
    {
        $provider = Provider::find($id);
        $sid = $provider->subscription_id;
        if ($provider->profileimage) {
            $destination  =  public_path() . '/images/admin/providerprofileimage/' . $provider->profileimage;
            if (File::exists($destination)) {
                unlink($destination);
            }
        }
        $subscription = Subscription::where('id', $sid)->first();
        // dd($subscription);
        $provider->delete();
        $subscription->delete();
        return redirect()->route('admin-provider.index')
            ->with('success', 'deleted successfully');
    }
}
