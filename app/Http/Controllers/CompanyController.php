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
        $companies = Company::orderBy('company_id', 'DESC')->paginate(12);
        return view('company.companies-list', ['companies' => $companies]);
    }
    public function edit_view($id)
    {
        $company = Company::find($id);
        $categories = Category::pluck('category_name', 'category_id');
        return view('company.company-form', ['company' => $company, 'categories' => $categories]);
    }
    public function create_view()
    {
        $categories = Category::pluck('category_name', 'category_id');
        return view('company.company-form',  ['categories' => $categories]);
    }
    public function create(Request $request)
    {

        $request->validate([

            'company_name'=>  'required',
            'company_web' => ['required','regex:/^((https?|ftp|smtp):\/\/)?(www.)?[a-z0-9]+(\.[a-z]{2,}){1,3}(#?\/?[a-zA-Z0-9#]+)*\/?(\?[a-zA-Z0-9-_]+=[a-zA-Z0-9-%]+&?)?$/'],
            'company_address'=>  'required',
            'company_phone' =>  ['required','regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/'],
            'company_code' =>  'required|regex:/^[0-9]+$/',
        ]);

        $company = new Company($request->all());
        $company->save();

        return redirect()->route('company.list')->with('message', "Create company successfully!");
    }
}
