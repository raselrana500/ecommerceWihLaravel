<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Models\Cart;

use Auth;

class CartsController extends Controller
{

    public function store(Request $request){

        $this->validate($request,[
            'product_id' => 'required'
        ],
        [
            'product_id.required' => 'please give a product.'
        ]);

        if(Auth::check()){
            $cart= Cart::Where('user_id',Auth::id())
                    ->Where('product_id',$request->product_id)
                    ->where('order_id',NULL)  
                    ->first();
        }else{
            $cart= Cart::Where('ip_address',request()->ip())
                    ->Where('product_id',$request->product_id)
                    ->where('order_id',NULL)  
                    ->first();
        }
        



        if(!is_null($cart)){
            $cart->increment('product_quantity');
        }else{
            $cart = new Cart();

            if(Auth::check()){
                $cart->user_id = Auth::id();
            }

            $cart->ip_address = request()->ip();
            $cart->product_id = $request->product_id;
            $cart->save();
        }
        return json_encode(['status' => 'success', 'Messege' => 'Item added to cart ', 'totalItems' => Cart::totalItems() ]);
        
    }

    
}
