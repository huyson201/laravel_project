<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //

    public function index()
    {
        
        $categories = Category::pluck('category_name', 'category_id');
        $companies = Company::orderBy('company_id', 'DESC')->paginate(12);
        return view('company.companies-list', ['companies' => $companies,'categories'=>$categories]);
    }


    public function create_view()
    {
        $categories = Category::pluck('category_name', 'category_id');
        return view('company.company-form',  ['categories' => $categories]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'company_name' =>  'required',
            'company_web' => ['required', 'regex:/^((https?|ftp|smtp):\/\/)?(www.)?[a-z0-9]+(\.[a-z]{2,}){1,3}(#?\/?[a-zA-Z0-9#]+)*\/?(\?[a-zA-Z0-9-_]+=[a-zA-Z0-9-%]+&?)?$/'],
            'company_address' =>  'required',
            'company_phone' =>  ['required', 'regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/'],
            'company_code' =>  'required|regex:/^[0-9]+$/',
        ]);
        $company = new Company($request->all());
        $company->save();
        $company->categories()->sync($request->categories);
        return redirect()->route('company.list')->with('message', "Created company successfully!");
    }

    public function edit_view($id)
    {
        $company = Company::find($id);
        if (count($company->categories()->get()) > 0) {
            for ($i = 1; $i <= count($company->categories()->get()); $i++) {
                $selected[$i] = $i;
            };
        } else {
            $selected = '';
        };
        $categories = Category::pluck('category_name', 'category_id');
        return view('company.company-form', ['company' => $company, 'categories' => $categories, 'selected' => $selected]);
    }

    public function edit(Request $request)
    {
        $request->validate([
            'company_web' => ['regex:/^((https?|ftp|smtp):\/\/)?(www.)?[a-z0-9]+(\.[a-z]{2,}){1,3}(#?\/?[a-zA-Z0-9#]+)*\/?(\?[a-zA-Z0-9-_]+=[a-zA-Z0-9-%]+&?)?$/'],
            'company_phone' =>  ['regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/'],
            'company_code' =>  'regex:/^[0-9]+$/',
        ]);
        $data = $request->all();
        $company = Company::find($request->company_id);
        $company->update($data);
        $company->categories()->sync($request->categories);
        return redirect()->route('company.edit', [$request->company_id])->with('success', 'Updated successfully!');
    }

    public function delete($id)
    {
        Company::find($id)->delete();
        return redirect()->route('company.list')->with('message', 'Deleted successfully!');
    }

    public function search(Request $request)
    {
        $category = $request->category_id;
        $key = $request->k;

        $companies = Company::whereHas('categories', function ($query) use ($category) {
            return $query->where('categories.category_id', '=', $category);
        })->where(function($query) use ($key){
           return $query->orWhere('company_name', 'Like', "%{$key}%")
            ->orWhere('company_web', 'Like', "%{$key}%")
            ->orWhere('company_address',  'Like', "%{$key}%")
            ->orWhere('company_phone',  'Like', "%{$key}%");
        })->orderBy('company_id', 'DESC')->paginate(12)->appends($request->except('page'));
        $categories = Category::pluck('category_name', 'category_id');
     
        return view('company.companies-list', ['companies' => $companies,'categories'=>$categories]);
    }
}
