@extends('layouts.default')

@section('content')
    <main class="page-main" style="margin-top: 40px">
        <div class="uk-container checkout-wrapper">
            <h3 class="checkout-title">Checkout</h3>
            <p class="checkout-sub">Secure & Fast — Complete Your Order</p>
            <div class="uk-grid-large" data-uk-grid>
                <div class="uk-width-3-5@m">
                    <div class="checkout-card">
                        <h4><span uk-icon="user"></span> Shipping Information</h4>
                        <hr>
                        <form action="{{ route('checkout.process') }}" method="POST">@csrf
                            <div class="uk-grid-small" data-uk-grid>
                                <div class="uk-width-1-2">
                                    <label class="uk-form-label">Full Name</label>
                                    <input required type="text" name="name" class="uk-input">
                                </div>
                                <div class="uk-width-1-2">
                                    <label class="uk-form-label">Email</label>
                                    <input required type="email" name="email" class="uk-input">
                                </div>
                                <div class="uk-width-1-2">
                                    <label class="uk-form-label">Phone</label>
                                    <input required type="text" name="phone" class="uk-input">
                                </div>
                                <div class="uk-width-1-2">
                                    <label class="uk-form-label">Country</label>
                                    <input required type="text" name="country" class="uk-input">
                                </div>
                                <div class="uk-width-1-2">
                                    <label class="uk-form-label">City</label>
                                    <input required type="text" name="city" class="uk-input">
                                </div>
                                <div class="uk-width-1-2">
                                    <label class="uk-form-label">Postal Code</label>
                                    <input required type="text" name="postal" class="uk-input">
                                </div>
                                <div class="uk-width-1-2">
                                    <label class="uk-form-label">Landmark (Optional)</label>
                                    <input type="text" name="landmark" class="uk-input">
                                </div>
                                <div class="uk-width-1-1">
                                    <label class="uk-form-label">Full Address</label>
                                    <textarea required name="address" class="uk-textarea" rows="3"></textarea>
                                </div>
                            </div>
                            <hr>
                            <h4><span uk-icon="credit-card"></span> Payment</h4>
                            <label class="uk-form-label">Select Payment Method</label>
                            <select class="uk-select" name="payment">
                                <option value="cod">Cash On Delivery</option>
                                <option value="card">Credit/Debit Card</option>
                                <option value="paypal">PayPal</option>
                            </select>
                            <input type="hidden" name="total" id="total" value="0">
                            <div class="estimate-box uk-margin-top">Estimated Delivery:
                                <strong>@php echo now()->addDays(4)->format('d M') . ' - ' . now()->addDays(7)->format('d M'); @endphp</strong>
                                <br>Free Standard Shipping
                            </div>
                             <input type="hidden" name="cart_json" id="cartJson">
                            <button class="uk-button checkout-btn uk-margin-top uk-width-1-1">Place Order Securely</button>
                        </form>
                    </div>
                </div>
                <div class="uk-width-2-5@m">
                    <div class="checkout-card">
                        <h4><span uk-icon="bag"></span> Order Summary</h4>
                        <hr>
                        <div id="summaryItems"></div>
                        <hr>
                        <div class="summary-item"><span>Subtotal:</span><span id="subtotalAmount">€0.00</span></div>
                        <div class="summary-item"><span>Shipping:</span><span>Free</span></div>
                        <hr>
                        <div class="summary-item" style="font-size:17px;font-weight:700;">
                            <span>Total:</span>
                            <span class="uk-text-danger" id="totalAmount">€0.00</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <script>
document.addEventListener("DOMContentLoaded", () => {

    const summaryContainer = document.getElementById("summaryItems");
    const subtotalField = document.getElementById("subtotalAmount");
    const totalField = document.getElementById("totalAmount");
    const cartJsonField = document.getElementById("cartJson");
    
    function renderSummary() {
        let cart = JSON.parse(localStorage.getItem("cart_")) || {};
        summaryContainer.innerHTML = "";
        
        let subtotal = 0;

        Object.values(cart).forEach(item => {
            let itemTotal = item.price * item.quantity;
            subtotal += itemTotal;

            summaryContainer.innerHTML += `
                <div class="summary-item">
                    <div class="summary-row">
                        <img class="summary-thumb" src="${item.image}">${item.name} × ${item.quantity}
                    </div>
                    <div class="summary-price">€${itemTotal.toFixed(2)}</div>
                </div>
            `;
        });

        subtotalField.textContent = "€" + subtotal.toFixed(2);
        totalField.textContent = "€" + subtotal.toFixed(2);
        document.getElementById("total").textContent = "€" + subtotal.toFixed(2);

        cartJsonField.value = JSON.stringify(Object.values(cart));
    }

    renderSummary();
    window.addEventListener("cartUpdated", renderSummary);

});
</script>

    </main>
@endsection
