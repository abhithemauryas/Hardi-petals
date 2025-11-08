@extends('layouts.default')

@section('content')
    <main class="page-main">
        <div class="section-hero">
            <div class="section-hero__bg">
                <img src="{{ asset('img/product-hero.png') }}" alt="home-hero">
            </div>
            <div class="section-hero__content"
                data-uk-scrollspy="target: &gt; *; cls: uk-animation-slide-bottom-small; delay: 500">
            </div>
        </div>

        <div class="page-content">
            <div class="uk-section uk-margin-large-bottom uk-container">

                <div class="filter-head">
                    <div>SHOWING 1–6 OF 7 RESULTS</div>
                    <div>
                        <select class="js-select right">
                            <option value="Sort By Popularity">Sort By Popularity</option>
                            <option value="Sort By Average Rating">Sort By Average Rating</option>
                            <option value="Sort By Latest">Sort By Latest</option>
                            <option value="Sort By Price: Low to High">Sort By Price: Low to High</option>
                            <option value="Sort By Price: High to Low">Sort By Price: High to Low</option>
                        </select>
                    </div>
                </div>

                <div class="uk-grid uk-grid-medium uk-child-width-1-4@m uk-child-width-1-2@s" data-uk-grid
                    data-uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-small; delay: 300">

                    @foreach ($products as $product)
                        @php
                            $image = null;

                            if (!empty($product->imageGallery) && isset($product->imageGallery[0])) {
                                $decoded = json_decode($product->imageGallery[0], true);
                                $image =
                                    $decoded['thumbnail'] ?? ($decoded['medium'] ?? ($decoded['original'] ?? null));
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
                                                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="qty" value="1">
                                                        <button type="submit" class="add-cart-btn">
                                                            <span>Add to cart</span>
                                                            <i class="fas fa-shopping-basket"></i>
                                                        </button>
                                                    </form>
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
                                            <a href="{{ route('product.details', $product->id) }}">
                                                {{ $product->name }}
                                            </a>
                                            <span>{{ $product->category }}</span>
                                        </div>
                                        <div class="product-card__price">${{ $finalPrice }}</div>
                                        <div class="product-card__stars">
                                            <ul>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <ul class="uk-pagination uk-flex-center uk-margin-large-top">
                    <li class="uk-active"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                </ul>

            </div>
        </div>
    </main>
@endsection
