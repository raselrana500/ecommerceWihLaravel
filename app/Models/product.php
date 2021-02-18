<?php

namespace App\Models;
use App\productimages;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public function images()
    {
        return $this->hasMany(productimage::class);
    }
}
