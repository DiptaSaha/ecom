<?php

namespace App\Models\Frontend;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Product;
use App\Models\Backend\Order;
use Auth;
use phpDocumentor\Reflection\Types\Null_;

class Cart extends Model
{
    use HasFactory;
    public $fillable = [
        'user_id',
        'ip_address',
        'order_id',
        'product_id',
        'product_quantity'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function cart(){
        return $this->belongsTo(Cart::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }

    public static function totalCarts(){
        if (Auth::check()) {
            $carts = Cart:: where ('user_id', Auth::id())->where('order_id',NULL)->get();
         }
         else{
             $carts = Cart:: where ('ip_address',request()->ip())->where('order_id',NULL)->get();
         }
         return $carts;
    }
    public static function totalItems(){
        if (Auth::check()) {
            $carts = Cart:: where ('user_id', Auth::id())->where('order_id',NULL)->get();
         }
         else{
             $carts = Cart:: where ('ip_address',request()->ip())->where('order_id',NULL)->get();
         }
        $totalItems =0;
        foreach($carts as $cart){
            $totalItems +=$cart->product_quantity;
        }
        return $totalItems;
    }
    public static function totalPrice(){
        if (Auth::check()) {
            $carts = Cart:: where ('user_id', Auth::id())->where('order_id',NULL)->get();
         }
         else{
             $carts = Cart:: where ('ip_address',request()->ip())->where('order_id',NULL)->get();
         }
        $totalPrice =0;
        foreach($carts as $cart){
           if (!is_null($cart->product->offer_price)) {
              $totalPrice += $cart->product_quantity * $cart->product->offer_price;
           }
           else {
            $totalPrice += $cart->product_quantity * $cart->product->regular_price;
           }
        }
        return $totalPrice;
    }
}
