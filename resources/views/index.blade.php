@extends('layouts.default')

@section('content')

    <main class="page-main">
        <div class="section-hero section-home">
            <div class="section-hero__bg">
                <img id="heroImage" src="{{ asset('img/about-hero.png') }}" alt="hero-background">
            </div>
            <div class="section-hero__content"
                data-uk-scrollspy="target: > *; cls: uk-animation-slide-bottom-small; delay: 500">
                <h1 class="section-hero__title">Reconnect With Nature</h1>
                <p class="section-hero__subtitle">Self-Care Begins with Self-Love</p>
            </div>
        </div>

        <div class="section-slider">
            <div class="slider-first-screen">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="section-slider-item"><img src="{{ asset('img/slider-slide-1.jpeg') }}"
                                    alt="slider-slide">

                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="section-slider-item section-slider-item-png"><img
                                    src="{{ asset('img/slider-slide-one.jpeg') }}" alt="slider-slide">
                                <div class="slider-text">“Beauty that’s kind — because compassion never goes out of style.”
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="section-slider-item"><img src="{{ asset('img/slider-slide-2.jpeg') }}"
                                    alt="slider-slide"></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="section-slider-item section-slider-item-png"><img
                                    src="{{ asset('img/slider-slide-two.jpeg') }}" alt="slider-slide">
                                <div class="slider-text">“Nurture your glow, just like nature nurtures life.”</div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="section-slider-item"> <img src="{{ asset('img/slider-slide-3.jpeg') }}"
                                    alt="slider-slide"></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="section-slider-item section-slider-item-png"><img
                                    src="{{ asset('img/slider-slide-three.jpeg') }}" alt="slider-slide">
                                <div class="slider-text">“Pure. Gentle. Inspired by nature’s calm essence.”</div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="section-slider-item"> <img src="{{ asset('img/slider-slide-4.jpeg') }}"
                                    alt="slider-slide"></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="section-slider-item section-slider-item-png"><img
                                    src="{{ asset('img/slider-slide-four.jpeg') }}" alt="slider-slide">
                                <div class="slider-text">“Every box holds a promise — pure, kind, and natural.”</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="section-about">
            <div class="uk-section-large uk-container">
                <div class="uk-grid uk-child-width-1-2@m" data-uk-grid>
                    <!-- Image Section -->
                    <div>
                        <div class="section-about__media _anim">
                            <div class="img-animate _anim _anim-no-repeat">
                                <img src="/img/img-about.png" alt="Hardi Petals Products">
                            </div>
                        </div>
                    </div>

                    <!-- Text Section -->
                    <div>
                        <div class="section-about__desc"
                            data-uk-scrollspy="target: > *; cls: uk-animation-slide-bottom-small; delay: 300">
                            <div class="section-title">
                                <span style="color: #D4AF37;">Hardi Petals</span>
                                <h3>Embrace Natural Hair Care</h3>
                            </div>
                            <div class="section-content">
                                <p>At Hardi Petals, we believe in the power of nature to nourish and rejuvenate your hair.
                                    Our products are crafted with care, using natural ingredients free from sulfates,
                                    parabens, and microplastics. We are committed to eco-friendly practices, offering
                                    packaging made from recycled materials and ensuring our products are cruelty-free.</p>
                                <a class="uk-button" href="{{ route('products.public') }}"
                                    style="background-color: #D4AF37; color: #fff; border-radius: 5px; padding: 12px 30px; font-weight: 600;">
                                    Explore Our Collection
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-shop-categories">
            <div class="uk-section uk-container">
                <div class="section-content">
                    <div class="uk-grid uk-child-width-1-5@m uk-child-width-1-2 uk-flex-center" data-uk-grid
                        data-uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-small; delay: 300">

                        <!-- Hair Care -->
                        <div>
                            <div class="shop-categories-unit">
                                <a class="shop-categories-unit__link" href="{{ route('_shop') }}">
                                    <span class="shop-categories-unit__icon">
                                        <img src="/img/shop-categories-4.png" alt="Hair Care">
                                    </span>
                                    <span class="shop-categories-unit__title">Hair Care</span>
                                </a>
                            </div>
                        </div>

                        <!-- Shampoo & Conditioner -->
                        <!-- <div>
                                            <div class="shop-categories-unit">
                                                <a class="shop-categories-unit__link" href="{{ route('_shop') }}">
                                                    <span class="shop-categories-unit__icon">
                                                        <img src="/img/shop-categories-2.png" alt="Shampoo & Conditioner">
                                                    </span>
                                                    <span class="shop-categories-unit__title">Shampoo & Conditioner</span>
                                                </a>
                                            </div>
                                        </div> -->

                        <!-- Hair Oils -->
                        <div>
                            <div class="shop-categories-unit">
                                <a class="shop-categories-unit__link" href="{{ route('_shop') }}">
                                    <span class="shop-categories-unit__icon">
                                        <img src="/img/shop-categories-1.png" alt="Hair Oils">
                                    </span>
                                    <span class="shop-categories-unit__title">Hair Oils</span>
                                </a>
                            </div>
                        </div>

                        <!-- Hair Masks -->
                        <div>
                            <div class="shop-categories-unit">
                                <a class="shop-categories-unit__link" href="{{ route('_shop') }}">
                                    <span class="shop-categories-unit__icon">
                                        <img src="/img/shop-categories-5.png" alt="Hair Masks">
                                    </span>
                                    <span class="shop-categories-unit__title">Hair Masks</span>
                                </a>
                            </div>
                        </div>

                    </div>

                    <!-- Section Description -->
                    <div class="section-shop-categories__desc"
                        data-uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-small; delay: 300">
                        <div class="section-shop-categories__title">Explore Our Natural Hair Care Collection</div>
                        <div class="section-shop-categories__text">
                            Hardi Petals offers a wide range of natural hair care products crafted with herbal ingredients.
                            From nourishing shampoos to restorative hair oils and masks, we help you maintain healthy,
                            vibrant hair.
                        </div>
                        <div class="section-shop-categories__btn">
                            <a class="uk-button" href="{{ route('products.public') }}"
                                style="background-color: #D4AF37; color: #fff; border-radius: 5px; padding: 12px 30px; font-weight: 600;">
                                Start Shopping
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="section-new-arrivals">
            <div class="uk-background-muted">
                <div class="uk-section-large uk-container">
                    <div class="section-title"
                        data-uk-scrollspy="target: > *; cls: uk-animation-slide-bottom-small; delay: 300">
                        <span style="color: #D4AF37;">Natural Hair Care</span>
                        <h3>Explore Our Latest Products</h3>
                    </div>

                    <div class="uk-grid uk-child-width-1-3@m uk-child-width-1-2@s home-products" data-uk-grid
                        data-uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-small; delay: 300">

                        @foreach ($products as $product)
                            @php
                                // extract gallery image from DB JSON array
                                $gallery = [];
                                if (!empty($product->imageGallery)) {
                                    foreach ($product->imageGallery as $g) {
                                        $gallery[] = json_decode($g, true);
                                    }
                                }

                                $img = $gallery[0] ?? null;

                                $imgSrc =
                                    $img['thumbnail'] ??
                                    ($img['medium'] ?? ($img['original'] ?? asset('img/default-product.jpg')));
                            @endphp

                            <div>
                                <div class="product-card">
                                    <div class="product-card__box">
                                        <div class="product-card__media">
                                            <img class="product-card__img" src="{{ $imgSrc }}"
                                                alt="{{ $product->name }}" />

                                            {{-- Example "new" badge logic --}}
                                            @if ($product->created_at >= now()->subDays(7))
                                                <div class="product-card__badge new">new</div>
                                            @endif

                                            <div class="product-card__btns">
                                                <ul>
                                                    <li>

                                                        <a href="javascript:void(0)" class="add-cart-btn"
                                                            data-id="{{ $product->id }}"
                                                            data-name="{{ $product->name }}"
                                                            data-price="{{ $product->price }}"
                                                            data-image="{{ $product->imageGallery[0] ?? '' }}"
                                                            onclick="addToCart(this.dataset)">

                                                            <span>Add to cart</span>
                                                            <i class="fas fa-shopping-basket"></i>
                                                        </a>

                                                    </li>
                                                    <li>
                                                        <a href="{{ $img['original'] ?? $imgSrc }}"
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

                                            <div class="product-card__price">
                                                € {{ $product->price }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
        <div class="section-video">
            <div class="section-video__bg" data-uk-lightbox>
                <a class="section-video__link" href="https://youtu.be/IUYs3mYgEPI" data-attrs="width: 1280; height: 720;"
                    data-caption="YouTube">
                    <img src="/img/home-video.png" alt="video" class="video-thumbnail">

                    <!-- Play Button Overlay -->
                    <div class="play-btn">
                        ▶
                    </div>
                </a>
            </div>
        </div>

        <div class="section-info">
            <div class="uk-section-large uk-container uk-container-large">
                <div class="uk-grid uk-child-width-1-2@m uk-flex-middle" data-uk-grid>
                    <div>
                        <div class="section-info__desc"
                            data-uk-scrollspy="target: > *; cls: uk-animation-slide-bottom-small; delay: 300">
                            <div class="section-title">
                                <span style="color: #D4AF37;">Herbal Hair & Skin Wellness</span>
                                <h3>Premium Natural Care<br> Infused with Ayurveda</h3>
                            </div>
                            <div class="section-content">
                                <p>Our products are crafted with plant-based ingredients and traditional formulations to
                                    nourish hair and skin naturally. From oil blends to herbal shampoos,
                                    every solution is made to promote long-lasting health and beauty.</p>
                                <a class="uk-button uk-button-danger uk-button-large"
                                    href="{{ route('products.public') }}">
                                    Discover More
                                </a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="section-info__slider">
                            <div class="slider-info">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="/img/slider-haircare-1.jpeg" alt="Hair Care Product">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="/img/slider-haircare-2.jpg" alt="Herbal Oil">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="/img/slider-haircare-3.jpeg" alt="Natural Shampoo">
                                        </div>
                                        <!-- <div class="swiper-slide">
                                                                <img src="/img/slider-haircare-4.jpg" alt="Ayurvedic Treatment">
                                                            </div> -->
                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="section-newsletter">
            <div class="uk-grid uk-grid-collapse uk-child-width-1-2@l" data-uk-grid>
                <div>
                    <div class="section-newsletter__form"
                        data-uk-scrollspy="target: > *; cls: uk-animation-slide-bottom-small; delay: 300">
                        <div class="section-newsletter__title"> <span style="color: #D4AF37;">Naturally Inspired
                                Wellness</span>
                            <h3>Get Hardi Petals Newsletter<br> & Stay Updated With Us</h3>
                        </div>
                        <form action="#!">
                            <!-- Hidden Required Fields -->
                            <input type="hidden" name="project_name" value="Viasun">
                            <input type="hidden" name="admin_email" value="test@gmail.com">
                            <input type="hidden" name="form_subject" value="Newsletter">
                            <!-- END Hidden Required Fields --><input type="text"
                                placeholder="youremail@example.com"><input class="uk-button uk-button-danger"
                                type="submit" value="Subscribe now">
                        </form>
                    </div>
                </div>
                <div>
                    <div class="section-newsletter__img"> <img src="/img/img-newsletter.png" alt="img-newsletter"></div>
                </div>
            </div>
        </div>

        <div class="section-instagram">
            <div class="uk-section uk-container uk-container-large">
                <div class="section-title"
                    data-uk-scrollspy="target: > *; cls: uk-animation-slide-bottom-small; delay: 300">
                    <span>Follow our gallery</span>
                    <h3>Instagram<span data-uk-icon="instagram"></span></h3>
                </div>

                <div class="section-content">
                    <div class="uk-grid uk-grid-small uk-flex-middle" data-uk-grid>

                        <div class="uk-width-1-4@m uk-width-1-2">
                            <a href="https://www.instagram.com/hardi_petals" target="_blank">
                                <div class="instagram-item instagram-item-1"
                                    data-uk-scrollspy="cls:uk-animation-slide-left-small">
                                    <img src="img/instagram-1.jpg" alt="instagram">
                                </div>
                            </a>

                            <a href="https://www.instagram.com/hardi_petals" target="_blank">
                                <div class="instagram-item instagram-item-2"
                                    data-uk-scrollspy="cls:uk-animation-slide-left-small; delay: 200">
                                    <img src="img/instagram-2.jpg" alt="instagram">
                                </div>
                            </a>
                        </div>

                        <div class="uk-width-1-4@m uk-width-1-2 uk-flex-last@m">
                            <a href="https://www.instagram.com/hardi_petals" target="_blank">
                                <div class="instagram-item instagram-item-4"
                                    data-uk-scrollspy="cls:uk-animation-slide-right-small; delay: 600">
                                    <img src="img/instagram-4.jpg" alt="instagram">
                                </div>
                            </a>

                            <a href="https://www.instagram.com/hardi_petals" target="_blank">
                                <div class="instagram-item instagram-item-5"
                                    data-uk-scrollspy="cls:uk-animation-slide-right-small; delay: 800">
                                    <img src="img/instagram-5.jpg" alt="instagram">
                                </div>
                            </a>
                        </div>

                        <div class="uk-width-expand@m">
                            <a href="https://www.instagram.com/hardi_petals" target="_blank">
                                <div class="instagram-item instagram-item-3"
                                    data-uk-scrollspy="cls:uk-animation-fade; delay: 400">
                                    <img src="img/instagram-3.jpg" alt="instagram">
                                </div>
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        {{-- <div class="section-reviews">
        <div class="uk-section-large uk-container">
            <div data-uk-scrollspy="target: > *; cls: uk-animation-slide-bottom-small; delay: 300">
                <div class="section-reviews__title">What Customers Saying</div>
                <div class="uk-position-relative" tabindex="-1" data-uk-slider>
                    <ul class="uk-slider-items uk-grid uk-child-width-1-1">
                        <li>
                            <blockquote>
                                <p data-uk-slideshow-parallax="x: 300,-300">“I love these hair products! I have frizzy hair and am picky, but they're good for my hair and don't dry it out. I also love how wonderful they smell. It's a treat every time I wash my hair.“</p><cite
                                    data-uk-slideshow-parallax="x: 200,-200">Aurora</cite>
                            </blockquote>
                        </li>
                        <li>
                            <blockquote>
                                <p data-uk-slideshow-parallax="x: 300,-300">“
                        I really love the hair mask and the oil it works really very good. And the smell is very nice“</p><cite
                                    data-uk-slideshow-parallax="x: 200,-200">Ridhi</cite>
                            </blockquote>
                        </li>
                        <li>
                            <blockquote>
                                <p data-uk-slideshow-parallax="x: 300,-300">“I've tried the shampoo, conditioner, and hair mask and I'm thrilled! They smell wonderful, condition my difficult, wavy hair well, and make my natural curls stand out beautifully, without frizz. It's great that they're vegan and effective. Definitely recommended!“</p><cite
                                    data-uk-slideshow-parallax="x: 200,-200">Patty</cite>
                            </blockquote>
                        </li>
                    </ul>
                    <div class="uk-visible@m"><a class="uk-position-center-left" href="#" data-uk-slidenav-previous
                            data-uk-slider-item="previous"></a><a class="uk-position-center-right" href="#"
                            data-uk-slidenav-next data-uk-slider-item="next"></a></div>
                    <div class="uk-hidden@m">
                        <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin-medium-top"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

   <div class="section-video-reviews">
    <div class="uk-section-large uk-container">
        <div class="section-title" 
            data-uk-scrollspy="target: > *; cls: uk-animation-slide-bottom-small; delay: 300">
            <span style="color: #D4AF37;">Customer Feedback</span>
            <h3>Video Reviews</h3>
        </div>

        <div class="uk-grid uk-child-width-1-3@m uk-child-width-1-2@s uk-grid-medium uk-flex-center"
            data-uk-grid
            data-uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-small; delay: 300">

            <!-- Video 1 -->
            <div>
                <video controls muted autoplay loop class="review-video">
                    <source src="/videos/review1.mp4" type="video/mp4">
                </video>
            </div>

            <!-- Video 2 -->
            <div>
                <video controls muted autoplay loop class="review-video">
                    <source src="/videos/review2.mp4" type="video/mp4">
                </video>
            </div>

            <!-- Video 3 -->
            <div>
                <video controls muted autoplay loop class="review-video">
                    <source src="/videos/review3.mp4" type="video/mp4">
                </video>
            </div>

        </div>
    </div>
</div>



        <div class="section-new-arrivals section-news-and-posts">
            <div class="uk-background-muted">
                <div class="uk-section-large uk-container">
                    <div class="section-title"
                        data-uk-scrollspy="target: > *; cls: uk-animation-slide-bottom-small; delay: 300"><span>Hardi
                            Petals
                            Latest happenings</span>
                        <h3>Articles From Blog</h3>
                    </div>
                    <div class="section-content"
                        data-uk-scrollspy="target: > *; cls: uk-animation-slide-bottom-small; delay: 300">
                        <div data-uk-slider>
                            <div class="uk-position-relative" tabindex="-1">
                                <ul
                                    class="uk-slider-items uk-grid uk-child-width-1-2@s
uk-child-width-1-3@m uk-child-width-1-4@l">

                                    <li>
                                        <div class="news-card">
                                            <div class="news-card__media">
                                                <a href="{{ route('blog') }}">
                                                    <img src="{{ asset('img/news-card-1.jpg') }}"
                                                        alt="Daily Self-Care Rituals">
                                                </a>
                                            </div>
                                            <div class="news-card__body">
                                                <div class="news-card__info">
                                                    <span class="news-card__category"> Self-care </span>
                                                    <span class="news-card__date"> 12 Jan 2025</span>
                                                </div>
                                                <div class="news-card__title">
                                                    <a href="{{ route('blog') }}">Daily Self-Care Rituals</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="news-card">
                                            <div class="news-card__media">
                                                <a href="{{ route('blog') }}">
                                                    <img src="{{ asset('img/news-card-2.jpg') }}"
                                                        alt="Benefits of Nature Therapy">
                                                </a>
                                            </div>
                                            <div class="news-card__body">
                                                <div class="news-card__info">
                                                    <span class="news-card__category"> Nature </span>
                                                    <span class="news-card__date"> 20 Jan 2025</span>
                                                </div>
                                                <div class="news-card__title">
                                                    <a href="{{ route('blog') }}">Benefits of Nature Therapy</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="news-card">
                                            <div class="news-card__media">
                                                <a href="{{ route('blog') }}">
                                                    <img src="{{ asset('img/news-card-3.jpg') }}"
                                                        alt="Holistic Wellness Tips">
                                                </a>
                                            </div>
                                            <div class="news-card__body">
                                                <div class="news-card__info">
                                                    <span class="news-card__category"> Wellness </span>
                                                    <span class="news-card__date"> 05 Feb 2025</span>
                                                </div>
                                                <div class="news-card__title">
                                                    <a href="{{ route('blog') }}">Holistic Wellness Tips</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="news-card">
                                            <div class="news-card__media">
                                                <a href="{{ route('blog') }}">
                                                    <img src="{{ asset('img/news-card-4.jpg') }}"
                                                        alt="Reconnect with Your Inner Self">
                                                </a>
                                            </div>
                                            <div class="news-card__body">
                                                <div class="news-card__info">
                                                    <span class="news-card__category"> Mindfulness </span>
                                                    <span class="news-card__date"> 10 Feb 2025</span>
                                                </div>
                                                <div class="news-card__title">
                                                    <a href="{{ route('blog') }}">Reconnect with Your Inner Self</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin-top"></ul>
                        </div>

                        <div class="uk-margin-medium-top uk-text-center">
                            <a class="uk-button uk-button-default uk-button-large" href="{{ route('blog') }}">
                                Read Full Blog
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const images = [
                    "{{ asset('img/about-hero.png') }}",
                    "{{ asset('img/home-hero.png') }}", // Add your second image here
                    // "{{ asset('img/home-hero-3.jpg') }}",  // Add third if needed
                ];

                let index = 0;
                const heroImg = document.getElementById('heroImage');

                setInterval(() => {
                    index = (index + 1) % images.length;
                    heroImg.src = images[index];
                }, 5000); // 5 seconds
            });

            function addToCart(product) {
                const imageType = JSON.parse(product.image);
                product = {
                    ...product,
                    image: imageType ? imageType.thumbnail : null
                }
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
                }))
                // ✅ IMPORTANT — update header instantly!
                window.dispatchEvent(new Event("cartUpdated"));

                window.notify.success('Product added to cart!');
            }
        </script>

    </main>
@endsection
