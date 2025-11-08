@extends('layouts.default')

@section('content')
    <main class="page-main">

        {{-- ✅ CART PAGE HERO --}}
        {{-- <div class="section-hero">
            <div class="section-hero__bg">
                <img src="{{ asset('img/cart-hero.png') }}" alt="Cart Hero">
            </div>
            <div class="section-hero__content"
                data-uk-scrollspy="target: > *; cls: uk-animation-slide-bottom-small; delay: 500">
            </div>
        </div> --}}

        {{-- ✅ CART SECTION --}}
       <div class="section-cart">
    <div class="uk-section-large uk-container">

        {{-- Title --}}
        <div class="section-title">
            <h3 class="uk-text-bold">My Cart</h3>
        </div>

        {{-- If cart empty --}}
        @if(count($cartItems) == 0)
            <div class="empty-cart-box">
                <img src="{{ asset('img/empty-cart.gif') }}" class="empty-cart-icon">
                <h4>Your cart is empty</h4>
               <a href="/products" class="uk-button custom-gold-btn uk-button-large">
    Shop Now
</a>

            </div>
        @endif

        {{-- CART ITEMS --}}
        <div class="cart-items-wrapper">

            @foreach($cartItems as $id => $item)
                <div class="cart-card">

                    {{-- Product Image --}}
                    <div class="cart-thumb">
                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
                    </div>

                    {{-- Details --}}
                    <div class="cart-info">
                        <h4 class="cart-title">{{ $item['name'] }}</h4>
                        <span class="cart-sku">SKU: {{ $item['sku'] ?? 'N/A' }}</span>
                        <span class="stock">✔ In Stock</span>

                        <div class="cart-price">
                            €{{ number_format($item['price'],2) }}
                        </div>
                    </div>

                    {{-- Quantity --}}
                    <div class="qty-box">
                        <form action="{{ route('cart.update',$id) }}" method="POST">
                            @csrf
                            <div class="qty-controls">
                                <button name="qty" value="{{ $item['qty'] - 1 }}">-</button>
                                <input type="number" name="qty" value="{{ $item['qty'] }}" min="1">
                                <button name="qty" value="{{ $item['qty'] + 1 }}">+</button>
                            </div>
                        </form>
                    </div>

                    {{-- Subtotal --}}
                    <div class="subtotal">
                        €{{ number_format($item['price'] * $item['qty'],2) }}
                    </div>

                    {{-- Actions --}}
                    <div class="cart-actions">
                        <form action="{{ route('cart.remove',$id) }}" method="POST">
                            @csrf
                            <button class="remove-btn"><i class="fas fa-trash"></i></button>
                        </form>

                        <button class="wishlist-btn"><i class="fas fa-heart"></i></button>
                    </div>
                </div>
            @endforeach

        </div>

        {{-- Summary --}}
        @if(count($cartItems) > 0)
        <div class="summary-wrapper">

            {{-- Coupon --}}
            {{-- <div class="coupon-card">
                <h4>Apply Coupon</h4>
                <form action="{{ route('cart.coupon') }}" method="POST">
                    @csrf
                    <input type="text" name="coupon" placeholder="Enter coupon">
                    <button>Apply</button>
                </form>
            </div> --}}

            {{-- Totals --}}
            <div class="summary-card">
                <h4>Cart Summary</h4>

                <p>Subtotal
                    <span>€{{ number_format($total,2) }}</span>
                </p>

                @if(session('discount'))
                    @php $discountValue = ($total * session('discount')) / 100; @endphp
                    <p class="discount">Discount ({{ session('discount') }}%)
                        <span>- €{{ number_format($discountValue,2) }}</span>
                    </p>
                @endif

                <p>Shipping <span>Free</span></p>

                <hr>

                @php
                    $finalTotal = session('discount')
                        ? $total - ($total * session('discount') / 100)
                        : $total;
                @endphp

                <p class="grand-total">
                    Final Total
                    <span>€{{ number_format($finalTotal,2) }}</span>
                </p>

                <a href="/checkout" class="checkout-btn">Proceed to Checkout</a>
            </div>
        </div>
        @endif

    </div>
</div>


    </main>
@endsection
