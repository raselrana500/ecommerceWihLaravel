<?php

namespace App\Models;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $fillable = [
        'product_id',
        'user_id',
        'order_id',
        'ip_address',
        'product_quantity'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function product(){
        return $this->belongsTo(product::class);
    }
    public function order(){
        return $this->belongsTo(Order::class);
    }

    /**
     * Total item in the cart
     * @return integer total item
     */
    public static function totalItems(){
        $carts = Cart::totalCarts();
        $total_item = 0;
        foreach($carts as $cart){
            $total_item += $cart->product_quantity;
        }
        return $total_item;
    }

    /**
     * Total carts
     * @return integer total cart model
     */
    public static function totalCarts(){
        if(Auth::check()){
            $carts = Cart::Where('user_id',Auth::id())
            ->orWhere('ip_address',request()->ip())
            ->where('order_id',NULL)           
            ->get();
        }else{
            $carts =  Cart::Where('ip_address',request()->ip())->where('order_id',NULL)->get();
        }
        return $carts;
    }
}
