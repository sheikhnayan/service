<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;

    public function service()
    {
        return $this->hasOne(Service::class,'id','product_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }

    public function food()
    {
        return $this->hasOne(Food::class,'id','product_id');
    }

    public function campaign()
    {
        return $this->hasOne(Campaign::class,'id','product_id');
    }

    public function event()
    {
        return $this->hasOne(Event::class,'id','product_id');
    }
}
