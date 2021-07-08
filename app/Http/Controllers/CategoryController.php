<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
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
        // if ($id == -1) {
        //     $category = Category::orderBy('category_id', 'ASC');
        // } else {
            $category = Category::find($id);
        // }
        // if (count($category->get()) > 0) {
        //     for ($i = 1; $i <= count($category->get()); $i++) {
        //         $selected[$i] = $i;
        //     };
        // } else {
        //     $selected = '';
        // };
        return view('category.categories-delete', [ 'category' => $category  ]);
    }
    public function delete($id)
    {
        // dd($id);
        // if(is_array( $id ))
        // {
        //     Category::all()->delete();
        //     return redirect()->route('categories.list')->with('message', 'Deleted successfully!');

        // }else{
        Category::find($id)->delete();
        // }
        return redirect()->route('categories.list')->with('message', 'Deleted successfully!');
    }

    public function search(Request $request)
    {
        $key = $request->k;
        $categories = Category::orWhere('category_id', 'Like', "%{$key}%")
            ->orWhere('category_name', 'Like', "%{$key}%")
            ->orderBy('category_id', 'ASC')->paginate(10)->appends($request->except('page'));
        return view('category.categories-list', ['cate' => $categories]);
    }
}
