@extends('layouts.default')

@section('content')

<main class="page-main">
    <div class="section-hero">
        <div class="section-hero__bg">
            <img src="{{ asset('img/blog-hero.png') }}" alt="blog-hero">
        </div>
        <div class="section-hero__content">
            <h1 class="section-hero__title section-hero__top_padding">Blog</h1>
        </div>
    </div>

    <style>
        .blog-wrapper {
            background: #fff;
            border-radius: 14px;
            padding: 35px;
            box-shadow: 0 0 30px rgba(0,0,0,0.06);
            margin-bottom: 50px;
        }
        .blog-wrapper img {
            border-radius: 12px;
            margin-bottom: 25px;
        }
        .blog-title {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 15px;
            line-height: 1.3;
        }
        .blog-meta {
            font-size: 14px;
            color: #888;
            margin-bottom: 25px;
        }
        .blog-content p {
            font-size: 17px;
            line-height: 1.8;
            color: #444;
            margin-bottom: 18px;
        }
        .blog-content ul {
            padding-left: 20px;
            list-style: disc;
            margin-bottom: 18px;
            color: #444;
        }
        .blog-content h3 {
            margin-top: 25px;
            margin-bottom: 12px;
            font-size: 22px;
            font-weight: 600;
            color: #111;
        }
        /* sidebar */
        .widjet {
            background: #fff;
            border-radius: 12px;
            padding: 20px 24px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.06);
        }
    </style>

    <div class="page-content">
        <div class="uk-section uk-container uk-margin-large-bottom">
            <div class="uk-grid" data-uk-grid>

                <!-- Left Side -->
                <div class="uk-width-2-3@m">
                    
                    <div class="blog-wrapper">
                        <img class="uk-width-1-1" src="{{ asset('img/hardi-mask.webp') }}" alt="thumbnail">

                        <h1 class="blog-title">Hardi Petals Review; A Vegan and Cruelty-Free Hair Mask ♡</h1>
                        <div class="blog-meta">By Admin • {{ date('d M Y') }}</div>

                        <div class="blog-content">
                            
                            <p>This week I received a hair mask from Hardi Petals to test and review. Hardi Petals is a brand that sells cruelty-free and vegan hair masks. It's a relatively new brand that was recently added to my cruelty-free list. Naturally, I was very curious!</p>

                            <h3>First Impression</h3>
                            <p>What immediately caught my eye was the packaging. Very cheerful and colorful — and definitely Instagram-worthy! The company also has several good principles:</p>

                            <ul>
                                <li>The hair mask is not tested on animals.</li>
                                <li>The hair mask is vegan.</li>
                                <li>Up to 50% less plastic is used.</li>
                                <li>It is 95% biodegradable.</li>
                                <li>Plant-based cleaning system.</li>
                            </ul>

                            <h3>Testing Experience</h3>
                            <p>The scent was amazing — coconut based! After washing, I applied the mask and left it for 5-10 minutes. You can instantly feel hydration while applying. After rinsing and air-drying — my hair was soft, hydrated, and easy to comb.</p>

                            <h3>Final Thoughts</h3>
                            <p>I love supporting small businesses and startups working for environmental and animal safety. This mask works beautifully, and I’ll definitely use it more often.</p>

                            <p>If you'd like to support Hardi Petals and order a hair mask, click <a href="/products" target="_blank">here</a> to visit their webshop!</p>
                        </div>

                    </div>
                </div>

                <!-- Sidebar -->
                <div class="uk-width-1-3@m">
                    <aside class="sidebar">
                        <div class="widjet">
                            <h4 class="widjet__title">Recent Posts</h4>
                            <ul class="list-articles">
                                <li class="list-articles-item">
                                    <div class="list-articles-item__title">Hardi Petals Review; A Vegan Hair Mask</div>
                                    <div class="list-articles-item__date">{{ date('d M Y', strtotime('-1 day')) }}</div>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>

            </div>
        </div>
    </div>

</main>

@endsection
