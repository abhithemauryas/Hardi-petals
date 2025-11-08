@component('mail::message')
# Order Confirmed ✅

Hello **{{ $user->name }}**,  
Your order has been successfully received!

---

### 🧾 Order Details
**Order ID:** {{ $order->id }}  
**Total Amount:** ₹{{ number_format($order->total, 2) }}  

---

We will update you once your food is prepared and served.

@component('mail::button', ['url' => url('/')])
Visit Our Website
@endcomponent

Thanks for ordering with us!  
{{ config('app.name') }}
@endcomponent
