<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class productimage extends Model
{
    public $fillable = [
        'product_id',
        'image'
    ];
}
