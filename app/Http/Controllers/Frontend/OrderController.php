<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use App\Models\Backend\Brand;
use App\Models\Backend\Product;
use App\Models\Frontend\Order;
use App\Models\Frontend\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItems= Cart::orderBy('id','asc')->where('order_id',NULL)->get();
        return view('frontend.pages.checkout', compact('cartItems'));
    }

 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required|max:255',
            'email'=>'required|max:255',
            'shipping_address'=>'required|max:255',
        ],
        [
            'first_name.required'        => 'Please Insert Your Name',
            'email.required'             => 'Please Insert Your Email',
            'shipping_address.required'  => 'Please Insert Your Shipping Address',
        ]
        );

        $oder = new Order();

        if (Auth::check()) {
            $cart = Cart:: where ('user_id', Auth::id())->where('product_id',$request->product_id)->first();
         }
         else{
             $cart = Cart:: where ('ip_address',request()->ip())->where('product_id',$request->product_id)->first();
         }
         if (Auth::check()) {
           $oder->user_id  = Auth::id();
         } 
         else {
            $oder->ip_address  = $request->ip();
        }

            $oder->first_name           = $request->first_name;
            $oder->last_name            = $request-> last_name;
            $oder->email                = $request->email;
            $oder->phone                = $request->phone;
            $oder->shipping_address     = $request->shipping_address;
            $oder->zip_code             = $request->zip_code;
            $oder->message              = $request->message;
            $oder->product_finalPrice   = $request->product_finalPrice;
            $oder->payment_id           = $request->optionsRadios;

            if ( $oder->payment_id == 1) {
                $oder->transection_id       = $request->btransection_id;
            }
            elseif ($oder->payment_id == 2) {
                $oder->transection_id       = $request->ntransection_id;
            }
            elseif ($oder->payment_id == 3) {
                $oder->transection_id       = $request->rtransection_id;
            }
            $oder->save();
            foreach (Cart::totalCarts() as $cart) {
                $cart->order_id =$oder->id;
                if (Auth::check()) {
                   $cart->user_id =Auth::id();
                }
                else {
                    $cart->ip_address =$request->ip();
                }
                $cart->save();
            }
            $notification =array(
                'message' =>"Thank You. Your Order Placed Successfully.",
                'alart_type' =>"success"
            );
            return redirect()->route('homepage')->with($notification);
            
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
