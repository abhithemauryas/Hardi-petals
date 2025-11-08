@extends('layouts.default')

@section('content')
    <main class="page-main">
        <div class="section-hero">
            <div class="section-hero__bg">
                <img src="{{ asset('img/img-about.png') }}?adsf" alt="home-hero">
            </div>
            <div class="section-hero__content"
                data-uk-scrollspy="target: &gt; *; cls: uk-animation-slide-bottom-small; delay: 500">
            </div>
        </div>

        <div class="page-content">
            <div class="uk-section uk-margin-large-bottom uk-container">

                <div class="filter-head">
                    <div
                        style="display:flex; align-items:center; gap:8px; margin:12px 0; font-weight:500; color:#333;font-size:18px;">
                        {{-- <span style="font-size:18px;">✨</span>
  <span></span> --}}
                        ✨ Explore Our Best Picks
                    </div>

                    <div>
                        <select class="js-select right" id="productSort">
                            <option value="">Sort By Popularity</option>
                            <option value="rating">Sort By Average Rating</option>
                            <option value="latest">Sort By Latest</option>
                            <option value="price_low_high">Sort By Price: Low to High</option>
                            <option value="price_high_low">Sort By Price: High to Low</option>
                        </select>

                    </div>
                </div>

                <div id="productWrapper" class="uk-grid uk-grid-medium uk-child-width-1-4@m uk-child-width-1-2@s"
                    data-uk-grid data-uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-small; delay: 300">

                    @foreach ($products as $product)
                        @php
                            $image = null;

                            if (!empty($product->imageGallery) && isset($product->imageGallery[0])) {
                                $decoded = json_decode($product->imageGallery[0], true);
                                $image = $decoded['medium'] ?? ($decoded['original'] ?? null);
                            }

                            $firstImage = $image ?: asset('img/placeholder.png');

                            $finalPrice = $product->discount
                                ? $product->price - ($product->price * $product->discount) / 100
                                : $product->price;
                        @endphp

                        <div>
                            <div class="product-card product-card--2">
                                <div class="product-card__box">
                                    <div class="product-card__media">
                                        <img class="product-card__img" src="{{ $firstImage }}"
                                            alt="{{ $product->name }}" />

                                        <div class="product-card__btns">
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0)" class="add-cart-btn"
                                                        data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                                        data-price="{{ $product->price }}"
                                                        data-image="{{ $product->imageGallery[0] ?? '' }}"
                                                        onclick="addToCart(this.dataset)">
                                                        <span>Add to cart</span>
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="{{ $firstImage }}"
                                                        data-lightbox="product-{{ $product->id }}">
                                                        <span>zoom</span><i class="fas fa-search-plus"></i>
                                                    </a>
                                                </li>

                                                {{-- <li><a href="#"><span>Add to wishlist</span><i
                                                            class="fas fa-heart"></i></a></li> --}}
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="product-card__info">
                                        <div class="product-card__title">
                                            <a href="{{ route('product.details', $product->id) }}">
                                                {{ $product->name }}
                                            </a>
                                            <span>{{ $product->category }}</span>
                                        </div>
                                        <div class="product-card__price">€{{ $finalPrice }}</div>
                                        <div class="product-card__stars">
                                            <ul>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- <ul class="uk-pagination uk-flex-center uk-margin-large-top">
                    <li class="uk-active"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                </ul> --}}

            </div>
        </div>
        <div class="section-reviews">
            <div class="uk-section-large uk-container">
                <div data-uk-scrollspy="target: &gt; *; cls: uk-animation-slide-bottom-small; delay: 300">
                    <div class="section-reviews__title">What Customers Saying</div>
                    <div class="uk-position-relative" tabindex="-1" data-uk-slider>
                        <ul class="uk-slider-items uk-grid uk-child-width-1-1">
                            <li>
                                <blockquote>
                                    <p data-uk-slideshow-parallax="x: 300,-300">“I really love the hair mask and the oil it
                                        works really very good. And the smell is very nice“</p><cite
                                        data-uk-slideshow-parallax="x: 200,-200">Ridhi</cite>
                                </blockquote>
                            </li>
                            <li>
                                <blockquote>
                                    <p data-uk-slideshow-parallax="x: 300,-300">“The product is very nice and smells so
                                        good. Am enjoying a lot.“</p><cite
                                        data-uk-slideshow-parallax="x: 200,-200">Amrira</cite>
                                </blockquote>
                            </li>
                            <li>
                                <blockquote>
                                    <p data-uk-slideshow-parallax="x: 300,-300">“Super excellent pure natural product!Feels
                                        softness smells good !A real treat 🥰👌“</p><cite
                                        data-uk-slideshow-parallax="x: 200,-200">Kash Hoeksma-Askrana</cite>
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

    </main>
    <script>
        function addToCart(product) {

            const imageTypes = JSON.parse(product.image)
            product = {
                ...product,
                image: imageTypes ? imageTypes.thumbnail : null
            };

            console.log(product);
            let cart = JSON.parse(localStorage.getItem('cart_'));
            if (!cart) {
                cart = {};
            }
            localStorage.setItem('cart_', JSON.stringify({
                ...cart,
                [product.id]: {
                    id: product.id,
                    name: product.name,
                    price: product.price,
                    quantity: (cart[product.id]?.quantity || 0) + 1,
                    image: product.image
                }
            }));

            // ✅ IMPORTANT — update header instantly!
            window.dispatchEvent(new Event("cartUpdated"));

            window.notify.success('Product added to cart!');
        }

        document.getElementById("productSort").addEventListener("change", function() {
            let sortBy = this.value;
            let products = [...document.querySelectorAll("#productWrapper > div")];

            products.sort((a, b) => {
                let priceA = parseFloat(a.querySelector(".product-card__price").textContent.replace("$",
                    ""));
                let priceB = parseFloat(b.querySelector(".product-card__price").textContent.replace("$",
                    ""));

                if (sortBy === "price_low_high") return priceA - priceB;
                if (sortBy === "price_high_low") return priceB - priceA;
                if (sortBy === "latest") return b.dataset.id - a.dataset.id;

                return 0;
            });

            document.getElementById("productWrapper").innerHTML = "";
            products.forEach(el => document.getElementById("productWrapper").appendChild(el));
        });
    </script>
@endsection
