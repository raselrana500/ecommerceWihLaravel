<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $fillable = [
        'name',
        'short_name',
        'image',
        'transaction_id',
        'priority',
        'no',
        'type'
    ];
}
