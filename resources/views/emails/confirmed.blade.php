@component('mail::message')
# Order Confirmed ✅

Hello **{{ $user->name }}**,  
Your order has been successfully placed!

---

### 🧾 Order Details
**Order ID:** {{ $order->order_number ?? $order->id }}  
**Total Amount:** €{{ number_format($order->total, 2) }}  

---

### 🛍️ Items Ordered

@php
    $items = $order->orderData;
@endphp

@foreach ($items as $item)
<div style="display:flex; align-items:center; margin-bottom:10px;">

    @php
        $img = $item['image'];
        if(is_array($img) && isset($img['thumbnail'])){
            $img = $img['thumbnail'];
        }
    @endphp

    <img src="{{ $img }}" alt="{{ $item['name'] }}" width="50" height="50" style="margin-right:10px;">

    <div>
        <strong>{{ $item['name'] }}</strong><br>
        Qty: {{ $item['quantity'] }} × €{{ number_format($item['price'],2) }}<br>
        <strong>Subtotal: €{{ number_format($item['price'] * $item['quantity'],2) }}</strong>
    </div>
</div>
@endforeach

---

### ✅ Grand Total
**€{{ number_format($order->total, 2) }}**

---

@component('mail::button', ['url' => url('/')])
Visit Our Website
@endcomponent

Thanks for shopping with us!  
{{ config('app.name') }}
@endcomponent
