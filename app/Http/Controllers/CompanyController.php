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
        $companies = Company::paginate(12);
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
}
