<header class="page-header">
    <div class="page-header__inner">

        <!-- Logo -->
        <div class="page-header__logo">
            <a class="logo" href="{{ url('/') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Logo">
            </a>
        </div>

        <!-- Navigation Menu -->
        <div class="page-header__menu">
            <nav class="page-nav" data-uk-navbar>
                <ul class="uk-navbar-nav">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ route('products.public') }}">Shop</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('blog') }}">Blog</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </nav>
        </div>

        <!-- RIGHT SIDE ICONS -->
        <div class="page-header__icons uk-flex uk-flex-middle uk-grid-small">

            <!-- Search -->
            {{-- <a class="header-icon uk-icon-link" href="#modal-search" data-uk-toggle data-uk-icon="search"></a> --}}

            <!-- User -->
            @auth
                <span style="color: white">Hey! {{ Auth::user()->name }}</span>
            @else
                <a class="header-icon uk-icon-link" href="{{ route('login') }}" data-uk-icon="user"></a>
            @endauth


            <!-- Wishlist -->
            {{-- <a class="header-icon uk-icon-link" href="#!" data-uk-icon="heart"></a> --}}

            <!-- Cart -->
            <div class="uk-inline header-cart-icon">
                <a class="header-icon uk-icon-link cart-trigger" href="{{ route('cart.index') }}" data-uk-icon="cart">

                   <span class="cart-badge"></span>

                </a>

                <div data-uk-drop="pos: bottom-right">
                    <div class="uk-card uk-card-body uk-card-default uk-card-small">
                        <ul class="uk-list uk-list-divider">

                            {{-- ✅ If cart is empty --}}
                            @if ($cartCount == 0)
                                <li class="uk-text-center">
                                    Cart is empty 😢
                                </li>
                            @else
                                {{-- ✅ Loop cart items --}}
                                @php $subtotal = 0; @endphp
                                @foreach (session('cart') as $id => $item)
                                    @php
                                        $subtotal += $item['price'] * $item['qty'];
                                    @endphp

                                    <li>
                                        <div class="uk-grid-small uk-flex-middle" data-uk-grid>
                                            <div class="uk-width-auto">
                                                <img class="uk-border-circle" width="60" height="60"
                                                    src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
                                            </div>
                                            <div class="uk-width-expand">
                                                <h5 class="uk-margin-remove-bottom">{{ $item['name'] }}</h5>
                                                <p class="uk-text-meta uk-margin-remove-top">
                                                    {{ $item['qty'] }}x ${{ number_format($item['price'], 2) }}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach

                                {{-- ✅ Subtotal --}}
                                <li>
                                    <div class="uk-grid-small uk-flex-middle uk-flex-between" data-uk-grid>
                                        <div><span>Subtotal:</span></div>
                                        <div><span>${{ number_format($subtotal, 2) }}</span></div>

                                        <div class="uk-width-1-2 uk-grid-margin">
                                            <a class="uk-button uk-button-default uk-button-small uk-width-1-1"
                                                href="{{ route('cart.index') }}">
                                                View cart
                                            </a>
                                        </div>

                                        <div class="uk-width-1-2 uk-grid-margin">
                                            <a class="uk-button uk-button-danger uk-button-small uk-width-1-1"
                                                href="{{ url('/checkout') }}">
                                                Checkout
                                            </a>
                                        </div>
                                    </div>
                                </li>

                            @endif

                        </ul>
                    </div>
                </div>
            </div>


        </div>

        <!-- Mobile Menu Button -->
        <div class="page-header__btn">
            <a class="menu-btn" href="#offcanvas" data-uk-toggle>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="#0d0d0c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </a>
        </div>

    </div>
  <script>
  document.addEventListener("DOMContentLoaded", function () {

    let cartData = JSON.parse(localStorage.getItem("cart_") ?? "{}");

    updateCartCount();
    renderHeaderCart();
    
    var root = "{{asset('')}}";

    function updateCartCount() {
        let count = 0;
        Object.values(cartData).forEach(p => {
            count += p.quantity ?? 1;
        });

        let badge = document.querySelector(".cart-badge");
        badge.textContent = count > 0 ? count : "";
    }

    var list = document.querySelector(".uk-list-divider");
    if (!list) return;
    
    function renderHeaderCart() {
        var list =document.querySelector('.uk-list-divider')
        console.log(list)
        if (!list) return;
        list.innerHTML = ""; // clear
        const keys = Object.keys(cartData);

        if (keys.length === 0) {
            list.innerHTML = `<li class="uk-text-center">Cart is empty 😢</li>`;
            return;
        }

        let subtotal = 0;

        keys.forEach(id => {
            let p = cartData[id];
            subtotal += p.price * p.quantity;

            list.innerHTML += `
                <li>
                    <div class="uk-grid-small uk-flex-middle" data-uk-grid>
                        <div class="uk-width-auto">
                            <img class="uk-border-circle" width="60" height="60"
                            src="${p.image.indexOf('http') !== -1 ? p.image : root + p.image}" alt="${p.name}">
                        </div>
                        <div class="uk-width-expand">
                            <h5 class="uk-margin-remove-bottom">${p.name}</h5>
                            <p class="uk-text-meta uk-margin-remove-top">
                                ${p.quantity}x €${Number(p.price).toFixed(2)}
                            </p>
                        </div>
                        <div>
                            <button class="remove-item" data-id="${id}"
                                style="background:none;border:none;color:red;cursor:pointer">
                                ✕
                            </button>
                        </div>
                    </div>
                </li>`;
        });

        list.innerHTML += `
            <li>
                <div class="uk-grid-small uk-flex-middle uk-flex-between" data-uk-grid>
                    <div><span>Subtotal:</span></div>
                    <div><span>€${subtotal.toFixed(2)}</span></div>

                    <div class="uk-width-1-2 uk-grid-margin">
                        <a class="uk-button uk-button-default uk-button-small uk-width-1-1"
                            href="/cart">
                            View cart
                        </a>
                    </div>

                    <div class="uk-width-1-2 uk-grid-margin">
                        <a class="uk-button uk-button-danger uk-button-small uk-width-1-1"
                            href="/checkout">
                            Checkout
                        </a>
                    </div>
                </div>
            </li>
        `;

        attachRemoveEvents();
    }

    function attachRemoveEvents() {
        document.querySelectorAll(".remove-item").forEach(btn => {
            btn.addEventListener("click", function () {
                let id = this.getAttribute("data-id");
                delete cartData[id];
                localStorage.setItem("cart_", JSON.stringify(cartData));
                updateCartCount();
                renderHeaderCart();
                window.dispatchEvent(new Event("cartUpdated"));
            });
        });
    }

    // When cart page updates
    window.addEventListener("cartUpdated", () => {
        cartData = JSON.parse(localStorage.getItem("cart_") ?? "{}");
        updateCartCount();
        renderHeaderCart();
    });

    // Update when cart changes from another page
    window.addEventListener("storage", () => {
        cartData = JSON.parse(localStorage.getItem("cart_") ?? "{}");
        updateCartCount();
        renderHeaderCart();
    });

    // Force update now
    window.dispatchEvent(new Event("cartUpdated"));
    // =========================
// FIX: Stop redirect hijack
// =========================

// Stop click bubbling on ANY button or link inside cart dropdown
document.querySelectorAll(".uk-button, .checkout-btn, .remove-item").forEach(el => {
    el.addEventListener("click", function(e) {
        e.stopPropagation();
    });
});

// Force checkout to redirect properly
document.querySelectorAll('a[href="/checkout"], a[href="{{ route('checkout') }}"]').forEach(el => {
    el.addEventListener("click", function(e) {
        e.preventDefault();
        e.stopPropagation();
        window.location = this.href;
    });
});

});
</script>


</header>
