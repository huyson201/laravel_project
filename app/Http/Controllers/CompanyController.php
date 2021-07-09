<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //

    public function index(Request $request)
    {
        $sort_name = $request->sort;
        $sort_type = $request->sort_type;
        $categories = Category::pluck('category_name', 'category_id');
        $category = $request->category_id;
        $key = $request->k;
        // Kiểm tra request = null thì lấy dữ liệu bảng companies sắp xếp giảm dần
        if ($request->all() == null) {
            $companies = Company::orderBy('company_id', 'DESC')->paginate(12);
        } else { //Ngược lại
            //Kiểm tra có request sắp xếp hay không
            if ($sort_name && $sort_type) {
                //Nếu có request thì kiểm tra xem có thoả điều kiện sắp xếp theo id hoặc tên và sắp xếp tăng hay giảm không
                if ($sort_name != 'company_id' && $sort_name != 'company_name' ||
                    $sort_type != 'asc' && $sort_type != 'desc') {
                    return abort(404, 'Not found'); // Không thoả điều kiện trả về trang 404 | NOT FOUND
                }
                // Kiểm tra xem có request tìm kiếm hay không
                if($category && $key){
                    // Có thì tìm kiếm và sắp xếp
                    $companies = $this->search($category, $key);
                    $companies = $companies->orderBy($sort_name, $sort_type)->paginate(12);
                }
                else{
                    // Không thì chỉ sắp xếp
                    $companies = Company::orderBy($sort_name, $sort_type)->paginate(12);
                }
            } else {
                // Trường hợp không có request sắp xếp thì thực hiện tìm kiếm và sắp xếp giảm dần
                $companies = $this->search($category, $key);
                $companies = $companies->orderBy('company_id', 'DESC')->paginate(12);
            }
        }
        return view('company.company-list', ['companies' => $companies, 'categories' => $categories]);
    }


    public function create_view()
    {
        $categories = Category::pluck('category_name', 'category_id');
        return view('company.company-form',  ['categories' => $categories]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'company_web' => ['regex:/^((https?|ftp|smtp):\/\/)?(www.)?[a-z0-9]+(\.[a-z]{2,}){1,3}(#?\/?[a-zA-Z0-9#]+)*\/?(\?[a-zA-Z0-9-_]+=[a-zA-Z0-9-%]+&?)?$/'],
            'company_phone' =>  ['regex:/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'],
            'company_code' =>  'regex:/^[0-9]+$/',
        ]);
        $company = new Company($request->all());
        $company->save();
        $company->categories()->sync($request->categories);
        return redirect()->route('company.list')->with('message', "Created company successfully!");
    }

    public function edit_view($id)
    {
        $company = Company::find($id);
        if (!$company) {
            return abort(403, 'Company Not found');
        }
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
            'company_phone' =>  ['regex:/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'],
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

    public function search($category, $key)
    {
        // category == 0 => search All categories
        // Tìm kiếm theo toàn bộ categories và không có từ khoá
        if ($category == 0 && $key == null) {
            $companies = Company::whereHas('categories');
        // Tìm kiếm theo toàn bộ categories và có từ khoá
        } else if ($category == 0 && $key != null) {
            $companies = Company::whereHas('categories')
            ->where(function ($query) use ($key) {
                return $query->orWhere('company_name', 'Like', "%{$key}%")
                    ->orWhere('company_web', 'Like', "%{$key}%")
                    ->orWhere('company_address',  'Like', "%{$key}%")
                    ->orWhere('company_phone',  'Like', "%{$key}%");
            });
        // Tìm kiếm theo category_id và có từ khoá 
        } else if($category != 0 && $key != null){
            $companies = Company::whereHas('categories', function ($query) use ($category) {
                return $query->where('categories.category_id', '=', $category);
            })->where(function ($query) use ($key) {
                return $query->orWhere('company_name', 'Like', "%{$key}%")
                    ->orWhere('company_web', 'Like', "%{$key}%")
                    ->orWhere('company_address',  'Like', "%{$key}%")
                    ->orWhere('company_phone',  'Like', "%{$key}%");
            });
        }
        // Tìm kiếm theo category_id và không có từ khoá
        else{
            $companies = Company::whereHas('categories', function ($query) use ($category) {
                return $query->where('categories.category_id', '=', $category);
            });
        }
        return $companies;
    }
}
