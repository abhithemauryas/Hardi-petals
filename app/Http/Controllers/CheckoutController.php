<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // make sure you create this model
use Illuminate\Support\Facades\Notification;

class CheckoutController extends Controller
{
    public function index() {
        
    }
    

public function process(Request $request)
{
    //dd($request->all());
    $request->validate([
        'name'=>'required',
        'email'=>'required|email',
        'phone'=>'required',
        'country'=>'required',
        'city'=>'required',
        'postal'=>'required',
        'address'=>'required',
        'payment'=>'required',
    ]);

    // ✅ Get cart from hidden field
    $cart = json_decode($request->cart_json, true);

    if(!$cart || count($cart) == 0){
        return redirect()->route('products.public')->with('error','Cart is empty!');
    }

    // ✅ Calculate subtotal
    $subtotal = 0;
    foreach($cart as $item){
        $subtotal += $item['price'] * $item['quantity'];
    }

    // ✅ Discount if needed
    $discount = 0;
    $total = $subtotal - $discount;

    // ✅ Save Order
    $order = Order::create([
        'name'          => $request->name,
        'email'         => $request->email,
        'phone'         => $request->phone,
        'country'       => $request->country,
        'city'          => $request->city,
        'postal'        => $request->postal,
        'landmark'      => $request->landmark,
        'address'       => $request->address,
        'payment_method'=> $request->payment,
        'payment_status'=> 'pending',
        'subtotal'      => $subtotal,
        'discount'      => $discount,
        'total'         => $total,
        'order_status'  => 'processing',
        'tracking_no'   => 'HT'.rand(10000,99999),
        'orderData'     => $cart, // store for later
        'customer_id'   => auth()->check() ? auth()->id() : null,
    ]);

    Notification::route('mail', env('ADMIN_EMAIL'))
    ->notify(new \App\Notifications\CustomOrder($request->all()));

    // ✅ Clear cart from localStorage (front-end)
    session()->forget('cart'); // session fallback

    return redirect()->route('checkout.success')->with('order_id', $order->id);
}


    public function success() {
        return view('checkout-success');
    }
}
