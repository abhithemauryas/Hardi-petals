<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Show cart
    public function index()
    {
        $cart = session()->get('cart', []);

        $total = 0;
        foreach ($cart as $c) {
            $total += $c['price'] * $c['qty'];
        }

        $cartItems = collect($cart);

        return view('cart', compact('cartItems', 'total'));
    }

    // Add item
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $qty = $request->qty ?? 1;

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty'] += $qty;
        } else {

            // Handle product image from imageGallery
            $img = asset('img/default-product.jpg');
            if (!empty($product->imageGallery)) {
                $decoded = json_decode($product->imageGallery[0], true);
                $img = $decoded['thumbnail'] ?? $decoded['medium'] ?? $decoded['original'];
            }

            $cart[$id] = [
                'name'  => $product->name,
                'price' => $product->price,
                'qty'   => $qty,
                'image' => $img,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added!');
    }

    // Update qty
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (!isset($cart[$id])) {
            return back()->with('error', 'Item not found in cart.');
        }

        // Prefer explicit inputs:
        // hidden 'qty' is current qty, 'change' is -1 or +1 when user clicked buttons
        // if user edits the number directly later, we could accept 'display_qty' too
        $currentQty = isset($request->qty) ? (int)$request->qty : (int)$cart[$id]['qty'];
        $change = isset($request->change) ? (int)$request->change : null;

        if ($change !== null) {
            // button click (increase/decrease)
            $newQty = $currentQty + $change;
        } elseif ($request->has('display_qty')) {
            // if user typed a number and submitted (we'll accept it)
            $newQty = (int)$request->input('display_qty', $currentQty);
        } else {
            // fallback: use qty param (safe)
            $newQty = $currentQty;
        }

        // never let qty drop below 1
        $newQty = max(1, $newQty);

        // update session
        $cart[$id]['qty'] = $newQty;
        session()->put('cart', $cart);

        return back()->with('success', 'Cart updated.');
    }



    // Remove item
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back();
    }
    public function applyCoupon(Request $request)
    {
        $coupon = $request->coupon;

        // Example dummy coupon logic
        if ($coupon === 'WELCOME10') {
            session()->put('discount', 10); // 10%
            return back()->with('success', 'Coupon applied successfully!');
        }

        return back()->with('error', 'Invalid coupon code!');
    }
}
