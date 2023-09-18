<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = SubCategory::orderBy('id', 'desc')->get();
        return view('admin.subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::orderBy('categoryname')->get();
        return view('admin.subcategories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subcategoryname' => 'required|unique:subcategories,subcategoryname',
            'subcategoryslug' => 'required|unique:subcategories,subcategoryslug',
            'subcategoryimage' => 'image|mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($file = $request->hasFile('subcategoryimage')) {
            $file = $request->file('subcategoryimage');
            $fileName = date('Ymd_His', time()) . "_subcategoryimage." . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/images/admin/subcategoryimage';
            $file->move($destinationPath, $fileName);
            $request['subcategoryimage'] = $fileName;
        }

        $subcategory = new SubCategory($request->input());
        // dd($subcategory);
        $subcategory->save();

        return redirect()->route('admin-subcategory.index')->with('success', 'added successfully');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $categories = Category::orderBy('categoryname')->get();
        $subcategory = SubCategory::find($id);
        return view('admin.subcategories.edit', compact('categories', 'subcategory'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'subcategoryname' => 'required|unique:subcategories,subcategoryname,' . $id,
            'subcategoryslug' => 'required|unique:subcategories,subcategoryslug,' . $id,
            'subcategoryimage' => 'image|mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $subcategory = SubCategory::find($id);

        $input = $request->all();
        if ($subcategoryimage = $request->file('subcategoryimage')) {
            $destinationPath = 'images/admin/subcategoryimage/';
            $destination  = 'images/admin/subcategoryimage/' . $subcategory->subcategoryimage;

            if (File::exists($destination)) {
                File::delete($destination);
            }

            $subcategoryImage = date('Ymd_His', time()) . "_subcategoryimage." . $subcategoryimage->getClientOriginalExtension();
            $subcategoryimage->move($destinationPath, $subcategoryImage);
            $input['subcategoryimage'] = $subcategoryImage;
        } else {
            unset($input['subcategoryimage']);
        }

        $subcategory->update($input);

        return redirect()->route('admin-subcategory.index')
            ->with('success', 'updated successfully');
    }

    public function destroy(string $id)
    {
        $subcategory = SubCategory::find($id);
        if ($subcategory->subcategoryimage) {
            $destination  =  public_path() . '/images/admin/subcategoryimage/' . $subcategory->subcategoryimage;
            if (File::exists($destination)) {
                unlink($destination);
            }
        }
        $subcategory->delete();
        return redirect()->route('admin-subcategory.index')
            ->with('success', 'deleted successfully');
    }
}
