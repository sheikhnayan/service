<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StartUp extends Model
{
    use HasFactory;

    public function indrustry()
    {
        return $this->belongsTo(StartUpCategory::class,'indrusty_id','id');
    }
}
