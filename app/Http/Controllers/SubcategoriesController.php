<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SubcategoriesController extends Controller
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
        $subcategories = Subcategory::all();

        $data['subcategories'] = $subcategories;

        return view('admin/subcategories.index',$data);
    }

    public function create()
    {
        $categories = Category::all()->sortBy('name');
        $data['categories'] = $categories;

        return view('admin/subcategories.create', $data);
    }

    public function edit($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $categories = Category::all()->sortBy('name');
        $data['categories'] = $categories;
        $data['subcategory'] = $subcategory;
        return view('admin/subcategories.edit', $data);
    }


    public function store(Request $request)
    {
        $Subcategory = new Subcategory();

        $Subcategory->name = $request->name;
        $Subcategory->icon = $request->icon;
        $Subcategory->categoryId = $request->categoryId;

        if ($request->hasfile('imageUrl')) {
            $file = $request->file('imageUrl');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('public/uploads/images/', $filename);
            File::delete($Subcategory->imageUrl);
            $Subcategory->imageUrl = 'public/uploads/images/' . $filename;
        }

        $Subcategory->save();
        return redirect('subcategories')->with('Message', 'Subategoría creada correctamente');
    }

    public function update(Request $request, $id)
    {
        $Subcategory = Subcategory::findOrFail($id);
        $Subcategory->name = $request->name;
        $Subcategory->icon = $request->icon;
        $Subcategory->categoryId = $request->categoryId;

        if ($request->hasfile('imageUrl')) {
            $file = $request->file('imageUrl');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('public/uploads/images/', $filename);
            File::delete($Subcategory->imageUrl);
            $Subcategory->imageUrl = 'public/uploads/images/' . $filename;
        }

        $Subcategory->save();
        return redirect('subcategories')->with('Message', 'Subcategoría creada correctamente');
    }

    public function destroy($id)
    {
        Subcategory::destroy($id);
        return redirect('subcategories')->with('Message', 'Subcategoría eliminada correctamente');
    }

    public function getsubcategoriesByCategory($id){
        $subcategories = Subcategory::where('CategoryId', $id)->select('id','name')->get();
        $subcategories = $subcategories->sortBy('name');

        $response = collect([
            "statusCode" => 0,
            "statusMessage" => "OK",
            "resultset" => ""
        ]);


        if($subcategories->Count() == 0){
            $response['statusCode'] = 1;
        }
   
        $response['resultset'] = $subcategories;

        return response()->json($response, 200);
    }
}
