<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $primaryKey = 'company_id';
    protected $fillable = [
        'company_name',
        'company_web',
        'company_address',
        'company_phone',
        'company_code',
    ];

    public function categories()
    {
        return $this->belongsToMany(
            Category::class,        // model liên quan 
            'company_category',     // bảng trung gian
            'company_id',           // company_id trong bảng trung gian
            'category_id',          // category_id trong bảng trung gian
            'company_id',           // company_id từ bảng companies
            'category_id'           // category_id từ bảng categories
        );
    }
}
