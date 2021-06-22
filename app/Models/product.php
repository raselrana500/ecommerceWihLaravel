<?php

namespace App\Models;
use App\productimages;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public $fillable = [
        'category_id',
        'brand_id',
        'title',
        'description',
        'slug',
        'quantity',
        'price',
        'offer_price',
        'status',
        'admin_id'
    ];
    public function images()
    {
        return $this->hasMany(productimage::class);
    }
    public function category()
    {
        return $this->belongsTo(category::class);
    }
    public function brand()
    {
        return $this->belongsTo(brand::class);
    }
}
