<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{

    public $fillable = [
        'name',
        'description',
        'image',
        'paren_id'
    ];
    public function parentCatName(){
        return $this->belongsTo(category::class, 'parent_id');
    }
    public function products(){
        return $this->hasMany(product::class);
    }
    
    public static function ParentOrNotCategory($parent_id,$child_id){
        $categories = category::where('id',$child_id)->where('parent_id',$parent_id)->get();
        if(!is_null($categories )){
            return true;
        }else{
            return false;
        }
    }
}
