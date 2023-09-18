<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{

    public function index()
    {
        $cities = City::orderBy('id', 'desc')->get();
        return view('admin.city.index', ['cities' => $cities]);
    }


    public function create()
    {
        $countries = Country::orderBy('countryname')->get();
        $states = State::orderBy('statename')->get();

        return view('admin.city.create', compact('countries', 'states'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'country_id' => 'required',
            'state_id' => 'required',
            'cityname' => 'required|unique:cities,cityname'

        ]);

        $city = new City($request->input());
        $city->save();
        return redirect()->route('admin-city.index')->with('success', 'added successfully');
    }


    public function show($id)
    {
        $city = City::find($id);
        return view('admin.city.show', compact('city'));
    }


    public function edit($id)
    {
        $countries = Country::orderBy('countryname')->get();
        $states = State::orderBy('statename')->get();

        $city = City::find($id);
        return view('admin.city.edit', compact('countries', 'states', 'city'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'country_id' => 'required',
            'state_id' => 'required',
            'cityname' => 'required|unique:cities,cityname,', $id,
        ]);

        $input = $request->all();
        $city = City::find($id);
        $city->update($input);

        return redirect()->route('admin-city.index')
            ->with('success', 'updated successfully.');
    }

    public function destroy($id)
    {
        $city = City::find($id);

        $city->delete();
        return redirect()->route('admin-city.index')->with('success', 'deleted successfully.');
    }


}
