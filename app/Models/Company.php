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
        return $this->belongsToMany(Category::class,'company_category','company_id','category_id','company_id','category_id');
    }

}
