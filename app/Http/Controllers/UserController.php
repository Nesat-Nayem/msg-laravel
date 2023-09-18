<?php

namespace App\Http\Controllers;

use App\Models\GeneralSettings;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        $generalsetting = GeneralSettings::orderBy('id', 'desc')->first();
        return view('admin.user.index', compact('users', 'generalsetting'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'contactno' => 'required',
            'email' => 'required|unique:users,email',
            'profileimage' => 'image|mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($file = $request->hasFile('profileimage')) {
            $file = $request->file('profileimage');
            $fileName = date('Ymd_His', time()) . "_profileimage." . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/images/admin/usersprofileimage';
            $file->move($destinationPath, $fileName);
            $request['profileimage'] = $fileName;
        }
        $user = new User($request->input());

        $user->password = Hash::make($request->get('password'));

        if ($request->active == 'checked') {

            $user->active = 1;
            $user->inactive = 0;
        } elseif ($request->inactive == 'checked') {

            $user->inactive = 1;
            $user->active = 0;
        }
        // dd($user);
        $user->save();

        return redirect()->route('admin-users.index')->with('success', 'added successfully');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'contactno' => 'required',
            'email' => 'required|unique:users,email,' . $id,
            'profileimage' => 'image|mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::find($id);

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

        if ($request->active == 'checked') {

            $user->active = 1;
            $user->inactive = 0;
        } elseif ($request->inactive == 'checked') {

            $user->inactive = 1;
            $user->active = 0;
        }

        $user->update($input);

        return redirect()->route('admin-users.index')
            ->with('success', 'updated successfully');
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        if ($user->profileimage) {
            $destination  =  public_path() . '/images/admin/usersprofileimage/' . $user->profileimage;
            if (File::exists($destination)) {
                unlink($destination);
            }
        }
        $user->delete();
        return redirect()->route('admin-users.index')
            ->with('success', 'deleted successfully');
    }
}
