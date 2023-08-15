<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(ProductCategory::class,'category_id','id');
    }

    public function sub_category()
    {
        return $this->belongsTo(ProductSubCategory::class,'sub_category_id','id');
    }

    public function vendor()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
