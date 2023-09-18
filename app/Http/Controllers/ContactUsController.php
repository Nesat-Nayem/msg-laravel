<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        $contactus = ContactUs::orderBy('id', 'desc')->get();
        return view('admin.contactus.index', compact('contactus'));
    }

    public function create()
    {
        return view('admin.contactus.create');
    }

    public function store(Request $request)
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

        return redirect()->route('admincontactus.index')->with('success', 'added successfully');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $contactus = ContactUs::find($id);
        return view('admin.contactus.edit', compact('contactus'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'mobilenumber' => 'required',
            'message' => 'required',
        ]);

        $contactus = ContactUs::find($id);
        $input = $request->all();
        $contactus->update($input);

        return redirect()->route('admincontactus.index')->with('success', 'updated successfully');
    }

    public function destroy(string $id)
    {
        $contactus = ContactUs::find($id);
        $contactus->delete();
        return redirect()->route('admincontactus.index')->with('success', 'deleted successfully');
    }
}
