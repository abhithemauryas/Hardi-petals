@extends('layouts.default')

@section('content')
    <main class="page-main">

        {{-- ⭐ CART SECTION --}}
        <div class="section-cart">
            <div class="uk-section-large uk-container">

                {{-- Title --}}
                <div class="section-title">
                    <h3 class="uk-text-bold">My Cart</h3>
                </div>

                {{-- If cart empty --}}
                <div class="empty-cart-box" style="display:none;">
                    <img src="{{ asset('img/empty-cart.gif') }}" class="empty-cart-icon">
                    <h4>Your cart is empty</h4>
                    <a href="/products" class="uk-button custom-gold-btn uk-button-large">
                        Shop Now
                    </a>
                </div>

                {{-- Cart Items --}}
                <div class="cart-items-wrapper">
                    <!-- Javascript will generate here -->
                </div>

                {{-- Summary --}}
                <div class="summary-wrapper" style="display:none;">
                    <div class="summary-card">
                        <h4>Cart Summary</h4>

                        <p>Subtotal <span>€0.00</span></p>

                        <p class="discount" style="display:none;">
                            Discount (<span class="discountPercent"></span>%)
                            <span>- €0.00</span>
                        </p>

                        <p>Shipping <span>Free</span></p>

                        <hr>

                        <p class="grand-total">
                            Final Total
                            <span>€0.00</span>
                        </p>

                        <a href="{{ route('checkout') }}" class="checkout-btn"
                            onclick="event.stopPropagation(); event.preventDefault(); window.location=this.href;">
                            Proceed to Checkout
                        </a>

                    </div>
                </div>

            </div>
        </div>

    </main>

    {{-- =========================
     FRONTEND CART JAVASCRIPT
============================ --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            /** Highlight navbar cart **/
            const cartNav = document.getElementById("nav-cart");
            if (cartNav) cartNav.classList.add("active-nav-link");

            /** Fetch saved cart from localStorage **/
            let cartData = JSON.parse(localStorage.getItem("cart_") ?? "{}");
            let discountPercent = parseInt(localStorage.getItem("discount") ?? 0);


            // ------------------------------
            // Render Cart UI
            // ------------------------------
            function renderCart() {
                let html = "";

                for (const id in cartData) {
                    const p = cartData[id];

                    html += `
            <div class="cart-card" data-id="${id}">
                <div class="cart-thumb">
                    <img src="${p.image}" alt="${p.name}">
                </div>

                <div class="cart-info">
                    <h4 class="cart-title">${p.name}</h4>
                    <span class="cart-sku">SKU: ${p.sku ?? "N/A"}</span>
                    <span class="stock">✔ In Stock</span>

                    <div class="cart-price">€ ${p.price}</div>
                </div>

                <div class="qty-box">
                    <div class="qty-controls">
                        <button class="qty-btn decrease">-</button>
                        <input type="number" value="${p.quantity}" readonly>
                        <button class="qty-btn increase">+</button>
                    </div>
                </div>

                <div class="subtotal">
                    € ${(p.price * p.quantity).toFixed(2)}
                </div>

                <div class="cart-actions">
                    <button class="remove-btn"><i class="fas fa-trash"></i></button>
                </div>
            </div>`;
                }

                document.querySelector(".cart-items-wrapper").innerHTML = html;

                // Show/hide sections
                if (Object.keys(cartData).length === 0) {
                    document.querySelector(".empty-cart-box").style.display = "block";
                    document.querySelector(".summary-wrapper").style.display = "none";
                } else {
                    document.querySelector(".empty-cart-box").style.display = "none";
                    document.querySelector(".summary-wrapper").style.display = "block";
                }

                attachEvents();
                calculateSummary();

                // ✅ prevent unwanted product redirect
                disableCardClickHijack();
            }


            // ------------------------------
            // Attach Events
            // ------------------------------
            function attachEvents() {

                // Increase
                document.querySelectorAll(".increase").forEach(btn => {
                    btn.addEventListener("click", (e) => {
                        e.stopPropagation();
                        const id = getId(btn);
                        cartData[id].quantity++;
                        saveAndRender();
                    });
                });

                // Decrease
                document.querySelectorAll(".decrease").forEach(btn => {
                    btn.addEventListener("click", (e) => {
                        e.stopPropagation();
                        const id = getId(btn);
                        if (cartData[id].quantity > 1) cartData[id].quantity--;
                        saveAndRender();
                    });
                });

                // Remove Item
                document.querySelectorAll(".remove-btn").forEach(btn => {
                    btn.addEventListener("click", (e) => {
                        e.stopPropagation();
                        const id = getId(btn);
                        delete cartData[id];
                        saveAndRender();
                    });
                });
            }


            // ------------------------------
            // Helper Functions
            // ------------------------------
            function getId(el) {
                return el.closest(".cart-card").getAttribute("data-id");
            }

            function saveAndRender() {
                localStorage.setItem("cart_", JSON.stringify(cartData));
                renderCart();
            }

            // ✅ disable global product-page redirects
            function disableCardClickHijack() {
                document.querySelectorAll(".cart-card").forEach(card => {
                    card.onclick = null;
                });
            }


            // ------------------------------
            // Summary Calculation
            // ------------------------------
            function calculateSummary() {
                let subtotal = 0;

                Object.values(cartData).forEach(p => {
                    subtotal += p.price * p.quantity;
                });

                document.querySelector(".summary-card p span").innerText =
                    "€" + subtotal.toFixed(2);

                // Discount
                let discountValue = 0;

                if (discountPercent > 0) {
                    discountValue = (subtotal * discountPercent) / 100;

                    document.querySelector(".discount").style.display = "block";
                    document.querySelector(".discount span:nth-child(2)").innerText =
                        "- €" + discountValue.toFixed(2);
                }

                // Final Total
                let finalTotal = subtotal - discountValue;
                document.querySelector(".grand-total span").innerText =
                    "€" + finalTotal.toFixed(2);
            }

            // Render on load
            renderCart();
        });
    </script>
@endsection
