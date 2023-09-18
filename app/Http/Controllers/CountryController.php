<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{

    public function index()
    {
        $countries = Country::orderBy('id', 'desc')->get();
        return view('admin.country.index', compact('countries'));
    }

    public function create()
    {
        return view('admin.country.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'countryname' => 'required|unique:countries,countryname'
        ]);

        $country = new Country($request->input());
        $country->save();
        return redirect()->route('admin-country.index')->with('success', 'added successfully');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $country = Country::find($id);
        return view('admin.country.edit', compact('country'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'countryname' => 'required|unique:countries,countryname', $id
        ]);

        $input = $request->all();
        $country = Country::find($id);
        $country->update($input);


        return redirect()->route('admin-country.index')
            ->with('success', 'updated successfully.');
    }

    public function destroy($id)
    {
        $country = Country::find($id);
        $country->delete();
        return redirect()->route('admin-country.index')->with('success', 'deleted successfully.');
    }
}
