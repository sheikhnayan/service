<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class,'category_id','id');
    }

    public function sub_category()
    {
        return $this->belongsTo(ServiceSubCategory::class,'sub_category_id','id');
    }

    public function vendor()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
