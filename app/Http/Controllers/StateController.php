<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{

    public function index()
    {
        $states = State::orderBy('id', 'desc')->get();
        return view('admin.state.index', ['states' => $states]);
    }


    public function create()
    {
        $countries = Country::orderBy('countryname')->get();
        return view('admin.state.create', compact('countries'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'country_id' => 'required',
            'statename' => 'required|unique:states,statename'
        ]);


        $state = new State($request->input());
        $state->save();

        return redirect()->route('admin-state.index')->with('success', 'added successfully');
    }


    public function show($id)
    {
        $state = State::find($id);
        return view('admin.state.show', compact('state'));
    }


    public function edit($id)
    {
        $countries = Country::orderBy('countryname')->get();
        $state = State::find($id);
        return view('admin.state.edit', compact('countries', 'state'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'country_id' => 'required',
            'statename' => 'required|unique:states,statename,' . $id
        ]);

        $input = $request->all();
        $state = State::find($id);
        $state->update($input);

        return redirect()->route('admin-state.index')
            ->with('success', 'updated successfully.');
    }


    public function destroy($id)
    {
        $state = State::find($id);

        $state->delete();
        return redirect()->route('admin-state.index')->with('success', 'deleted successfully.');
    }
}
