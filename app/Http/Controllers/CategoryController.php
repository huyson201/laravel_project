<?php

namespace App\Http\Controllers;

use App\Exports\CategoriesExport;
use App\Imports\CategoriesImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {

        $listCategories = Category::orderBy('category_id', 'ASC')->paginate(15);
        return view('category.categories-list', ['cate' => $listCategories]);
    }


    public function create_view()
    {
        return view('category.categories-form',  []);
    }

    public function create(Request $request)
    {
        $request->validate([
            'category_name' =>  'required',
        ]);
        $categories = new Category($request->all());
        $categories->save();
        return redirect()->route('categories.list')->with('message', "Created category successfully!");
    }

    public function edit_view($id)
    {
        $category = Category::find($id);
        return view('category.categories-form', ['category' => $category]);
    }

    public function edit(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);
        $data = $request->all();
        $category = Category::find($request->category_id);
        $category->update($data);
        return redirect()->route('categories.edit', [$request->category_id])->with('success', 'Updated successfully!');
    }
    public function deleteconfirm($id)
    {
        $category = Category::find($id);

        return view('category.categories-delete', ['category' => $category]);
    }
    public function delete($id)
    {
        Category::find($id)->delete();
        return redirect()->route('categories.list')->with('message', 'Deleted successfully!');
    }
    public function deleteall()
    {
        $categories = Category::all();
        foreach ($categories as $category) {
            $category->delete();
        }
        return redirect()->route('categories.list')->with('message', 'Deleted All Categories successfully!');
    }


    public function search(Request $request)
    {
        $key = $request->k;
        $categories = Category::orWhere('category_id', 'Like', "%{$key}%")
            ->orWhere('category_name', 'Like', "%{$key}%")
            ->orderBy('category_id', 'ASC')->paginate(10)->appends($request->except('page'));
        return view('category.categories-list', ['cate' => $categories]);
    }
    //Import & export
    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        return Excel::download(new CategoriesExport, "List_Categories_" . time() . ".xlsx");
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function route_import()
    {
        return view('category.categories-io', []);
    }
    public function import(Request $request)
    {
        if ($request->hasFile('file')) {
            Excel::import(new CategoriesImport, request()->file('file'));
            return back()->with('messages', 'Import successfully!');
        } else {
            return back()->with('message', "Wrong file or There's no file . Please choose a correct file !");
        }
    }
}
