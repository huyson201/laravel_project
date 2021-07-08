<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $primaryKey = 'category_id';
    protected $fillable = [
        'category_name',
    ];
    // public function categories()
    // {
    //     return $this->belongsToMany(Category::class,'company_category','company_id','category_id','company_id','category_id');
    // }
}

