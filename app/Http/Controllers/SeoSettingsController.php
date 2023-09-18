<?php

namespace App\Http\Controllers;

use App\Models\SeoSetting;
use Illuminate\Http\Request;

class SeoSettingsController extends Controller
{
    public function index()
    {
        $seo = SeoSetting::find(1);
        return view('admin.seo-settings', compact('seo'));
    }

    public function create()
    {
        return view('admin.seo-settings');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'metatitle' => 'required',
            'metakeyword' => 'required',
            'metadescription' => 'required',
        ]);

        $seo = new SeoSetting($request->input());
        // dd($seo);
        $seo->save();

        return redirect()->route('admin-seosettings.create')->with('success', 'created successfully');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $seo = SeoSetting::find($id);
        return view('admin.seo-settings', compact('seo'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'metatitle' => 'required',
            'metakeyword' => 'required',
            'metadescription' => 'required',
        ]);

        $seo = SeoSetting::find($id);
        $input = $request->all();
        $seo->update($input);

        return redirect()->route('admin-seosettings.index')
            ->with('success', 'updated successfully');
    }

    public function destroy(string $id)
    {
        //
    }
}
