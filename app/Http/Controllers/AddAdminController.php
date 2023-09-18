<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\GeneralSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class AddAdminController extends Controller
{
    public function index()
    {
        $admins = Admin::orderBy('id', 'desc')->get();
        $generalsetting = GeneralSettings::orderBy('id', 'desc')->first();
        return view('admin.addadmin.index', compact('admins','generalsetting'));
    }

    public function create()
    {
        return view('admin.addadmin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required|unique:admin,email',
            'profileimage' => 'mimes:webp,jpeg,png,jpg,gif,svg|max:2048',

        ]);

        if ($file = $request->hasFile('profileimage')) {
            $file = $request->file('profileimage');
            $fileName = date('Ymd_His', time()) . "_profileimage." . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/images/admin/adminprofileimage';
            $file->move($destinationPath, $fileName);
            $request['profileimage'] = $fileName;
        }
        $admin = new Admin($request->input());

        $admin->password = Hash::make($request->get('password'));

        $admin->save();

        return redirect()->route('addadmin.index')->with('success', 'added successfully');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $admin = Admin::find($id);
        return view('admin.addadmin.edit', compact('admin'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|unique:admin,email,' . $id,
            'profileimage' => 'image|mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $admin = Admin::find($id);
        $input = $request->all();
        if ($profileimage = $request->file('profileimage')) {
            $destinationPath = 'images/admin/adminprofileimage/';
            $destination  = 'images/admin/adminprofileimage/' . $admin->profileimage;

            if (File::exists($destination)) {
                File::delete($destination);
            }

            $profileImage = date('Ymd_His', time()) . "_profileimage." . $profileimage->getClientOriginalExtension();
            $profileimage->move($destinationPath, $profileImage);
            $input['profileimage'] = $profileImage;
        } else {
            unset($input['profileimage']);
        }
        $admin->update($input);

        return redirect()->route('addadmin.index')
            ->with('success', 'updated successfully.');
    }

    public function destroy(string $id)
    {
        $admin = Admin::find($id);
        if ($admin->profileimage) {
            $destination  =  public_path() . '/images/admin/adminprofileimage/' . $admin->profileimage;
            if (File::exists($destination)) {
                unlink($destination);
            }
        }
        $admin->delete();
        return redirect()->route('addadmin.index')
            ->with('success', 'deleted successfully');
    }
}
