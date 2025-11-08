@extends('layouts.default')

@section('content')

<style>
    .success-wrapper {
        padding: 80px 0;
        text-align: center;
    }

    .success-card {
        max-width: 620px;
        margin: auto;
        background: #ffffff;
        border-radius: 16px;
        padding: 50px 40px;
        box-shadow: 0 4px 18px rgba(0,0,0,0.08);
        border: 1px solid #eee;
        animation: fadeIn .6s ease-in-out;
    }

    @keyframes fadeIn {
        0% { opacity: 0; transform: translateY(10px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    .success-icon {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        border: 4px solid #D4AF37;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: auto;
        font-size: 45px;
        color: #D4AF37;
    }

    .success-heading {
        font-size: 32px;
        font-weight: 800;
        margin-top: 20px;
        color: #111;
        letter-spacing: .5px;
    }

    .success-subtext {
        font-size: 16px;
        margin-top: 10px;
        color: #444;
    }

    .order-box {
        background: #fafafa;
        padding: 18px;
        border-radius: 10px;
        margin-top: 25px;
        border-left: 4px solid #D4AF37;
        font-weight: 600;
    }

    .uk-button.shop-btn {
        background: #D4AF37 !important;
        color: #111 !important;
        font-weight: 700;
        padding: 12px 28px;
        border-radius: 8px;
        margin-top: 30px;
        transition: .3s;
    }

    .uk-button.shop-btn:hover {
        background: #b28f2e !important;
        transform: translateY(-2px);
    }

    .delivery-estimate {
        margin-top: 20px;
        font-size: 14px;
        color: #333;
        font-weight: 500;
    }

    .payment-icons img {
        width: 48px;
        margin: 6px;
        filter: drop-shadow(0 0 2px #bbb);
    }
</style>

<div class="uk-container success-wrapper">

    <div class="success-card">

        <div class="success-icon">
            <i class="fas fa-check"></i>
        </div>

        <h2 class="success-heading">Order Placed Successfully!</h2>

        <p class="success-subtext">
            Thank you for shopping with us. Your order is being processed.
        </p>

        {{-- ✅ Delivery Estimate --}}
        <div class="delivery-estimate">
            Estimated Delivery:
            <strong>
                @php
                    echo now()->addDays(4)->format('d M') . " - " . now()->addDays(7)->format('d M');
                @endphp
            </strong>
        </div>

        {{-- ✅ Order Number --}}
        <div class="order-box">
            Order Number:
            <span style="color:#D4AF37;">
                #{{ rand(100000,999999) }}
            </span>
        </div>

        {{-- ✅ Payment Icons --}}
        {{-- <div class="payment-icons uk-margin-small-top">
            <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Visa.svg">
            <img src="https://upload.wikimedia.org/wikipedia/commons/0/0c/Mastercard_logo.svg">
            <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg">
            <img src="https://upload.wikimedia.org/wikipedia/commons/d/d8/Cash.svg">
        </div> --}}

        <a href="/products" class="uk-button shop-btn">
            Continue Shopping
        </a>

    </div>

</div>
@endsection
