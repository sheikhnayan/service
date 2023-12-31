<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(FoodMenuCategory::class,'category_id','id');
    }

    public function vendor()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
