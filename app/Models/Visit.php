<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class,'product_id','id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class,'product_id','id');
    }

    public function food()
    {
        return $this->belongsTo(Food::class,'product_id','id');
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class,'product_id','id');
    }
}
