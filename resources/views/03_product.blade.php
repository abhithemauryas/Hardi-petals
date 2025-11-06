@extends('layouts.default')

@section('content')

    <main class="page-main">

        <div class="section-hero">
            <div class="section-hero__bg"><img src="{{ asset('img/productDetails-hero.png') }}" alt="home-hero"></div>
            <div class="section-hero__content"
                data-uk-scrollspy="target: &gt; *; cls: uk-animation-slide-bottom-small; delay: 500">
                {{-- <h1 class="section-hero__title section-hero__top_padding">Anti-Aging Cream</h1>
                <p class="section-hero__subtitle">By Viasun</p> --}}
            </div>
        </div>

        <div class="section-product-info">

            <div class="uk-grid uk-grid-collapse uk-child-width-1-2@l" data-uk-grid>

                {{-- ✅ PRODUCT IMAGES SLIDER --}}
                <div class="uk-flex-last@l">
                    <div data-uk-slider>
                        <div class="uk-position-relative" tabindex="-1">
                            <ul class="uk-slider-items uk-child-width-1-1">

                                @php
                                    $gallery = [];
                                    if (!empty($product->imageGallery)) {
                                        foreach ($product->imageGallery as $g) {
                                            $decoded = json_decode($g, true);
                                            $gallery[] = $decoded;
                                        }
                                    }
                                @endphp

                                @if (count($gallery) > 0)
                                    @foreach ($gallery as $img)
                                        <li>
                                            <img src="{{ $img['thumbnail'] ?? ($img['medium'] ?? $img['original']) }}"
                                                alt="{{ $product->name }}">
                                        </li>
                                    @endforeach
                                @else
                                    <li><img src="{{ asset('img/default-product.jpg') }}" alt="Default"></li>
                                @endif

                            </ul>

                            <div class="uk-position-bottom-center uk-position-medium">
                                <ul class="uk-slider-nav uk-dotnav"></ul>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ✅ PRODUCT DETAILS --}}
                <div class="uk-flex-first@l">
                    <div class="section-product-info__box">
                        <div class="section-product-info__content"
                            data-uk-scrollspy="target: > *; cls: uk-animation-slide-bottom-small; delay: 300">

                            {{-- ✅ Product Title + Category --}}
                            <div class="section-title section-product-info__title">
                                {{-- <span>{{ $product->category }}</span> --}}
                                <h3>{{ $product->name }}</h3>
                            </div>

                            {{-- ✅ Product Description --}}
                            <div class="section-product-info__intro">
                                <p>{!! \Illuminate\Support\Str::words(strip_tags($product->description), 30, '...') !!}</p>


                            </div>

                            {{-- ✅ Product Price --}}
                            <div class="section-product-info__price">
                                <sup>€</sup><span>{{ $product->price }}</span>
                            </div>

                            {{-- ✅ Product Sizes (Example static) --}}
                            <div class="section-product-info__size">
                                <ul>
                                    <li><label><input type="radio" name="size"><span>75ml</span></label></li>
                                    <li><label><input type="radio" name="size" checked><span>150ml</span></label></li>
                                    <li><label><input type="radio" name="size"><span>200ml</span></label></li>
                                </ul>
                            </div>

                            {{-- ✅ Quantity + Add to Cart --}}
                            <div class="section-product-info__btns">
                                <div class="jq-number input-col">
                                    <div class="jq-number__spin minus"></div>
                                    <div class="jq-number__field">
                                        <input class="input-col" type="number" value="1" min="1">
                                    </div>
                                    <div class="jq-number__spin plus"></div>
                                </div>

                                <button class="uk-button uk-button-danger uk-button-large" id="addToBagBtn">
                                    Add to bag
                                </button>


                            </div>

                            {{-- ✅ Product Category --}}
                            <div class="section-product-info__category">
                                Categories: {{ $product->category }}
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="section-product-desc">
            <div class="uk-section-large uk-container uk-container-small">
                <div class="section-product-desc__title section-product-desc__title_center">
                    <ul>
                        <li class="ankr-active">
                            <div class="uk-h3">Description</div>
                        </li>
                        <li>
                            <div class="uk-h3"><a href="#reviews" data-uk-scroll> Reviews</a></div>
                        </li>
                    </ul>
                </div>
                <div class="uk-text-center">
                    <p>{!! $product->description !!}</p>
                </div>
            </div>
        </div>


        <div class="section-new-arrivals">
            <div class="uk-background-muted">
                <div class="uk-section-large uk-container">
                    <div class="section-title"
                        data-uk-scrollspy="target: &gt; *; cls: uk-animation-slide-bottom-small; delay: 500">
                        {{-- <span>Best
                            suiting & clothing</span> --}}
                        <h3>Shop New Arrivals</h3>
                    </div>
                    <div class="section-content" data-uk-scrollspy="target: > *; cls: uk-animation-slide-bottom-medium">
                        <div class="slider-outline" data-uk-slider>
                            <div class="uk-position-relative" tabindex="-1">
                                <ul
                                    class="uk-slider-items uk-grid uk-child-width-1-2@suk-child-width-1-3@m uk-child-width-1-3@l">

                                    @foreach ($newArrivals as $p)
                                        @php
                                            $gallery = [];
                                            if (!empty($p->imageGallery)) {
                                                foreach ($p->imageGallery as $g) {
                                                    $gallery[] = json_decode($g, true);
                                                }
                                            }
                                            $img = $gallery[0] ?? null;
                                            $imgSrc =
                                                $img['thumbnail'] ??
                                                ($img['medium'] ??
                                                    ($img['original'] ?? asset('img/default-product.jpg')));
                                        @endphp

                                        <li>
                                            <div class="product-card">
                                                <div class="product-card__box">
                                                    <div class="product-card__media">
                                                        <img class="product-card__img" src="{{ $imgSrc }}"
                                                            alt="{{ $p->name }}" />

                                                        <div class="product-card__btns">
                                                            <ul>
                                                                <li>
                                                                    <a href="javascript:void(0)" class="add-cart-btn"
                                                                        data-id="{{ $p->id }}"
                                                                        data-name="{{ $p->name }}"
                                                                        data-price="{{ $p->price }}"
                                                                        data-image="{{ $p->imageGallery[0] ?? '' }}">
                                                                        <span>Add to cart</span>
                                                                        <i class="fas fa-shopping-basket"></i>
                                                                    </a>
                                                                </li>

                                                                <li><a href="#"><span>zoom</span><i
                                                                            class="fas fa-search-plus"></i></a></li>
                                                                <li><a href="#"><span>Add to wishlist</span><i
                                                                            class="fas fa-heart"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="product-card__info">
                                                        <div class="product-card__title">
                                                            <a
                                                                href="{{ route('product.details', $p->id) }}">{{ $p->name }}</a>
                                                            {{-- <span>{!! $p->description !!} </span> --}}
                                                            <p>{!! Str::limit($p->description, 25) !!}</p>


                                                        </div>
                                                        <div class="product-card__price">€ {{ $p->price }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>

                            <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin-top"></ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="section-reviews uk-margin-large-bottom" id="reviews">
            <div class="uk-section-large uk-container">
                <div data-uk-scrollspy="target: &gt; *; cls: uk-animation-slide-bottom-small; delay: 500">
                    <div class="section-reviews__title">What Customers Saying</div>
                    <div class="uk-position-relative" tabindex="-1" data-uk-slider>
                        <ul class="uk-slider-items uk-grid uk-child-width-1-1">
                            <li>
                                <blockquote>
                                    <p data-uk-slideshow-parallax="x: 300,-300">“The right place to buy cosmetic products
                                        with luxury & stylish, - The unbeaten price & uncompromising quality.“</p><cite
                                        data-uk-slideshow-parallax="x: 200,-200">Sadia O’Conner, USA</cite>
                                </blockquote>
                            </li>
                            <li>
                                <blockquote>
                                    <p data-uk-slideshow-parallax="x: 300,-300">“The right place to buy cosmetic products
                                        with luxury & stylish, - The unbeaten price & uncompromising quality.“</p><cite
                                        data-uk-slideshow-parallax="x: 200,-200">Sadia O’Conner, USA</cite>
                                </blockquote>
                            </li>
                            <li>
                                <blockquote>
                                    <p data-uk-slideshow-parallax="x: 300,-300">“The right place to buy cosmetic products
                                        with luxury & stylish, - The unbeaten price & uncompromising quality.“</p><cite
                                        data-uk-slideshow-parallax="x: 200,-200">Sadia O’Conner, USA</cite>
                                </blockquote>
                            </li>
                        </ul>
                        <div class="uk-visible@m"><a class="uk-position-center-left" href="#"
                                data-uk-slidenav-previous data-uk-slider-item="previous"></a><a
                                class="uk-position-center-right" href="#" data-uk-slidenav-next
                                data-uk-slider-item="next"></a></div>
                        <div class="uk-hidden@m">
                            <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin-medium-top"></ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", () => {

                // ✅ Universal add-to-cart function
                function addToCart(product) {

                    let cart = JSON.parse(localStorage.getItem("cart_")) || {};

                    if (!cart[product.id]) {
                        cart[product.id] = {
                            ...product,
                            quantity: Number(product.quantity || 1)
                        };
                    } else {
                        cart[product.id].quantity += Number(product.quantity || 1);
                    }

                    // ✅ Save cart
                    localStorage.setItem("cart_", JSON.stringify(cart));

                    // ✅ Notify the header counter
                    window.dispatchEvent(new Event("cartUpdated"));

                    alert("Product added to cart!");
                }

                // ✅ PAGE PRODUCT BUTTON LOGIC
                const addBtn = document.getElementById("addToBagBtn");

                if (addBtn) {
                    addBtn.addEventListener("click", function() {

                        let qty = document.querySelector(".jq-number__field input").value;

                        let product = {
                            id: {{ $product->id }},
                            name: "{{ $product->name }}",
                            price: {{ $product->price }},
                            quantity: qty,
                            image: "{{ $gallery[0]['thumbnail'] ?? ($gallery[0]['medium'] ?? ($gallery[0]['original'] ?? asset('img/default-product.jpg'))) }}"
                        };

                        addToCart(product);
                    });
                }

                // ✅ SLIDER BUTTON LOGIC
                document.querySelectorAll('.add-cart-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        let product = {
                            id: this.dataset.id,
                            name: this.dataset.name,
                            price: this.dataset.price,
                            quantity: 1,
                            image: this.dataset.image
                        };
                        addToCart(product);
                    });
                });

            });
        </script>


    </main>
@endsection
