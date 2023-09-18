<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'categoryname' => 'required|unique:categories,categoryname',
            'categoryimage' => 'image|mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
            'categoryfeature' => 'required',
        ]);

        if ($file = $request->hasFile('categoryimage')) {
            $file = $request->file('categoryimage');
            $fileName = date('Ymd_His', time()) . "_categoryimage." . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/images/admin/categoryimage';
            $file->move($destinationPath, $fileName);
            $request['categoryimage'] = $fileName;
        }

        $request['slug'] = Str::slug($request->categoryslug);
        $category = new Category($request->input());

        if ($request->yes == 'checked') {

            $category->yes = 1;
            $category->no = 0;
        } elseif ($request->no == 'checked') {

            $category->no = 1;
            $category->yes = 0;
        }
        // dd($category);
        $category->save();

        return redirect()->route('admin-category.index')->with('success', 'added successfully');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'categoryname' => 'required|unique:categories,categoryname,' . $id,
            'categoryimage' => 'image|mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
            'categoryfeature' => 'required',
        ]);

        $category = Category::find($id);

        $input = $request->all();
        if ($categoryimage = $request->file('categoryimage')) {
            $destinationPath = 'images/admin/categoryimage/';
            $destination  = 'images/admin/categoryimage/' . $category->categoryimage;

            if (File::exists($destination)) {
                File::delete($destination);
            }

            $categoryImage = date('Ymd_His', time()) . "_categoryimage." . $categoryimage->getClientOriginalExtension();
            $categoryimage->move($destinationPath, $categoryImage);
            $input['categoryimage'] = $categoryImage;
        } else {
            unset($input['categoryimage']);
        }

        if ($request->yes == 'checked') {

            $category->yes = 1;
            $category->no = 0;
        } elseif ($request->no == 'checked') {

            $category->no = 1;
            $category->yes = 0;
        }
        // dd($category);
        $category->update($input);

        return redirect()->route('admin-category.index')
            ->with('success', 'updated successfully');
    }

    public function destroy(string $id)
    {
        $category = Category::find($id);
        if ($category->categoryimage) {
            $destination  =  public_path() . '/images/admin/categoryimage/' . $category->categoryimage;
            if (File::exists($destination)) {
                unlink($destination);
            }
        }
        $category->delete();
        return redirect()->route('admin-category.index')
            ->with('success', 'deleted successfully');
    }
}
