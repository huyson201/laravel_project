<?php

namespace App\Exports;
// use App\Category;
use App\Models\Category;
use App\Models\Category as ModelsCategory;
use Maatwebsite\Excel\Concerns\FromCollection;

class CategoriesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Category::orderBy('category_id', 'ASC')->get();
    }
    
}
