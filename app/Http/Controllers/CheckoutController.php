<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Notification;
use Mollie\Laravel\Facades\Mollie;

class CheckoutController extends Controller
{
    public function index() {

    }

    public function process(Request $request)
    {
        try {
            // dd($request->all());
    
            $request->validate([
                'name'=>'required',
                'email'=>'required|email',
                'phone'=>'required',
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
    
            $subtotal = 0;
            $discount = 0;
            foreach($cart as $item) {
                $subtotal += $item['price'] * $item['quantity'];
            }
            $total = $subtotal - $discount;
    
            $order = Order::create([
                'name'          => $request->name,
                'email'         => $request->email,
                'phone'         => $request->phone,
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
                // 'customer_id'   => auth()->check() ? auth()->id() : null,
            ]);
    
            try {
                Notification::route('mail', env('ADMIN_EMAIL'))
                ->notify(new \App\Notifications\CustomOrder($request->all(), $cart));

                Notification::route('mail', $request->email)
                ->notify(new \App\Notifications\OrderConfirmed($order));
                
            } catch (\Throwable $th) {
                logger($th->getMessage());
            }
    
            if($request->payment === 'mollie') {
    
                $payment = Mollie::api()->payments->create([
                    "amount" => [
                        "currency" => "EUR",
                        "value" => number_format($total, 2, '.', '') // required format
                    ],
                    "description" => "Order Payment",
                    "redirectUrl" => route('payment.success'),
                    "webhookUrl"  => route('payment.webhook'),
                ]);
    
                session()->put('payment_id', $payment->id);
                
                $order->update([
                    'payment_id' => $payment->id
                ]);
    
                return redirect($payment->getCheckoutUrl());
    
            }
    
            return redirect()->route('checkout.success')->with('order_id', $order->id);
    
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
    }
    public function paymentSuccess(Request $request)
    {
        $paymentId = session()->get('payment_id');

        $payment = Mollie::api()->payments->get($paymentId);

        if ($payment->isPaid()) {
            // ✅ Payment success
            return "Payment Successful!";
        }

        return "Payment Failed or Pending";
    }

    public function success() {
        return view('checkout-success');
    }
}
