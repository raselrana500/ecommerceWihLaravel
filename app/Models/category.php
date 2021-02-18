<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function parentCatName(){
        return $this->belongsTo(category::class, 'parent_id');
    }
}
