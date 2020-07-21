<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoriesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        date_default_timezone_set('America/Monterrey');
        $categories = Category::all();

        $data['categories'] = $categories;
        return view('admin/categories.index',$data);
    }

    public function create()
    {
        return view('admin/categories.create');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $data['category'] = $category;
        return view('admin/categories.edit', $data);
    }


    public function store(Request $request)
    {
        $Category = new Category();

        $Category->name = $request->name;
        $Category->icon = $request->icon;

        if ($request->hasfile('imageUrl')) {
            $file = $request->file('imageUrl');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('public/uploads/images/', $filename);
            File::delete($Category->imageUrl);
            $Category->imageUrl = 'public/uploads/images/' . $filename;
        }

        $Category->save();
        return redirect('categories')->with('Message', 'Categoría creada correctamente');
    }

    public function update(Request $request, $id)
    {
        $Category = Category::findOrFail($id);
        $Category->name = $request->name;
        $Category->icon = $request->icon;

        if ($request->hasfile('imageUrl')) {
            $file = $request->file('imageUrl');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('public/uploads/images/', $filename);
            File::delete($Category->imageUrl);
            $Category->imageUrl = 'public/uploads/images/' . $filename;
        }

        $Category->save();
        return redirect('categories')->with('Message', 'Card created successfully');
        return view('categories');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return redirect('categories')->with('Message', 'Categoría eliminada correctamente');
    }
}
