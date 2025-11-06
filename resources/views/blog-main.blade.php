@extends('layouts.default')

@section('content')

        <main class="page-main">
            <div class="section-hero">
                <div class="section-hero__bg"><img src="img/blog-hero.jpg" alt="home-hero"></div>
                <div class="section-hero__content" data-uk-scrollspy="target: &gt; *; cls: uk-animation-slide-bottom-small; delay: 500">
                    <h1 class="section-hero__title section-hero__top_padding">Blog Main</h1>
                </div>
            </div>
            <div class="page-content">
                <div class="uk-section-large uk-container">
                    <div class="uk-grid uk-grid-large" data-uk-grid>
                        <div class="uk-width-2-3@m">
                            <div data-uk-scrollspy="target: &gt; *; cls: uk-animation-slide-bottom-small; delay: 500">
                                <article class="article-intro">
                                    <div class="article-intro__image shine"><a href="05_blog-post.html"><img src="img/img-article-intro-1.jpg" alt="img-article"></a></div>
                                    <div class="article-intro__head">
                                        <div class="article-intro__info">
                                            <div class="article-intro__author"><img src="img/img-blog-author.png" alt="blog-author"><a href="05_blog-post.html">Rebicca h. clark</a></div>
                                            <div class="article-intro__date"><i class="icon_calendar"></i><span>31 jan 2021</span></div>
                                            <div class="article-intro__category"><i class="icon_ribbon_alt"></i><a href="05_blog-post.html">Makeup</a></div>
                                        </div>
                                        <h3 class="article-intro__title">15 Tips For a Perfect Makup </h3>
                                    </div>
                                    <div class="article-intro__body">
                                        <div class="article-intro__content">
                                            <p>Enim venia quis nostrud exrcit ulamco laboris niust aliquip conse reprehen derity fugiat nulla pariatur excpteur sint ipsum occaecat. Lorem ipsum dolor sit amet sed dolor ipsum consectetur.</p>
                                        </div>
                                    </div>
                                </article>
                                <article class="article-intro">
                                    <div class="article-intro__image shine">
                                        <div class="video" data-uk-lightbox="video-autoplay:true; index: 1"><a href="https://youtu.be/IUYs3mYgEPI" data-attrs="width: 1280; height: 720;" data-caption="YouTube"><img src="img/img-article-intro-2.jpg" alt="img-article"></a></div>
                                    </div>
                                    <div class="article-intro__head">
                                        <div class="article-intro__info">
                                            <div class="article-intro__author"><img src="img/img-blog-author.png" alt="blog-author"><a href="05_blog-post.html">Ben Jason</a></div>
                                            <div class="article-intro__date"><i class="icon_calendar"></i><span>31 jan 2021</span></div>
                                            <div class="article-intro__category"><i class="icon_ribbon_alt"></i><a href="05_blog-post.html">Fitness</a></div>
                                        </div>
                                        <h3 class="article-intro__title">How to Maintain a Slim Body</h3>
                                    </div>
                                    <div class="article-intro__body">
                                        <div class="article-intro__content">
                                            <p>Enim venia quis nostrud exrcit ulamco laboris niust aliquip conse reprehen derity fugiat nulla pariatur excpteur sint ipsum occaecat. Lorem ipsum dolor sit amet sed dolor ipsum consectetur.</p>
                                        </div>
                                    </div>
                                </article>
                                <article class="article-intro">
                                    <div class="article-intro__image shine">
                                        <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" data-uk-slideshow>
                                            <ul class="uk-slideshow-items">
                                                <li><img src="img/img-article-intro-4.jpg" alt data-uk-cover></li>
                                                <li><img src="img/img-article-intro-3.jpg" alt data-uk-cover></li>
                                                <li><img src="img/img-article-intro-2.jpg" alt data-uk-cover></li>
                                                <li><img src="img/img-article-intro-1.jpg" alt data-uk-cover></li>
                                            </ul><a class="uk-position-center-left" href="#" data-uk-slidenav-previous data-uk-slideshow-item="previous"></a><a class="uk-position-center-right" href="#" data-uk-slidenav-next data-uk-slideshow-item="next"></a>
                                        </div>
                                    </div>
                                    <div class="article-intro__head">
                                        <div class="article-intro__info">
                                            <div class="article-intro__author"><img src="img/img-blog-author.png" alt="blog-author"><a href="05_blog-post.html">Ben Jason</a></div>
                                            <div class="article-intro__date"><i class="icon_calendar"></i><span>31 jan 2021</span></div>
                                            <div class="article-intro__category"><i class="icon_ribbon_alt"></i><a href="05_blog-post.html">Health</a></div>
                                        </div>
                                        <h3 class="article-intro__title">Attend Any Event With Full Spirit</h3>
                                    </div>
                                    <div class="article-intro__body">
                                        <div class="article-intro__content">
                                            <p>Eiusmod temporl incididuntys labore dolore magna aliqua sed lorems ipsum dolor amet consecteur eiusmod tempor incididunt ut labore et dolor magna minim venia quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                                            <blockquote>
                                                <p>“The right place to buy cosmetic products with luxury & stylish, - The unbeaten price & uncompromising quality.“</p><cite>Sadia O’Conner, USA</cite>
                                            </blockquote>
                                        </div>
                                    </div>
                                </article>
                                <article class="article-intro">
                                    <div class="article-intro__image shine"><a href="/page-blog-article.html"><img src="img/img-article-intro-3.jpg" alt="img-article"></a></div>
                                    <div class="article-intro__head">
                                        <div class="article-intro__info">
                                            <div class="article-intro__author"><img src="img/img-blog-author.png" alt="blog-author"><a href="05_blog-post.html">Ben Jason</a></div>
                                            <div class="article-intro__date"><i class="icon_calendar"></i><span>31 jan 2021</span></div>
                                            <div class="article-intro__category"><i class="icon_ribbon_alt"></i><a href="05_blog-post.html">Makeup</a></div>
                                        </div>
                                        <h3 class="article-intro__title">Top 10 Spa And Hotels To Visit</h3>
                                    </div>
                                    <div class="article-intro__body">
                                        <div class="article-intro__content">
                                            <p>Eiusmod temporl incididuntys labore dolore magna aliqua sed lorems ipsum dolor amet consecteur eiusmod tempor incididunt ut labore et dolor magna minim venia quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                                        </div>
                                    </div>
                                </article>
                                <ul class="uk-pagination uk-flex-center uk-margin-large-top">
                                    <li class="uk-active"><span>1</span></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="uk-width-1-3@m">
                            <aside class="sidebar">
                                <div class="widjet widjet-search">
                                    <form class="uk-search uk-search-default" action="#!"><button class="uk-search-icon-flip" data-uk-search-icon type="submit"></button><input class="uk-input uk-search-input uk-form-large" type="search" placeholder="Keyword"></form>
                                </div>
                                <div class="widjet widjet-category">
                                    <h4 class="widjet__title">Categories</h4>
                                    <ul class="list-category">
                                        <li> <a href="04_blog-main.html"><span>Skin Care</span><span>(45)</span></a></li>
                                        <li class="uk-active"><a href="04_blog-main.html"><span>Eye Brows</span><span>(9)</span></a></li>
                                        <li> <a href="04_blog-main.html"><span>Face Cosmetics</span><span>(128)</span></a></li>
                                        <li> <a href="04_blog-main.html"><span>Hair Care</span><span>(67)</span></a></li>
                                        <li> <a href="04_blog-main.html"><span>Makeup</span><span>(42)</span></a></li>
                                    </ul>
                                </div>
                                <div class="widjet widjet-list-articles">
                                    <h4 class="widjet__title">Recent Posts</h4>
                                    <ul class="list-articles">
                                        <li class="list-articles-item"><a class="list-articles-item__link" href="05_blog-post.html">
                                                <div class="list-articles-item__img"><img src="img/img-article-thumb-1.jpg" alt="article-thumb"></div>
                                                <div class="list-articles-item__info">
                                                    <div class="list-articles-item__title">15 Tips For a Perfect Makup</div>
                                                    <div class="list-articles-item__date"> <i class="icon_calendar"></i><span>31 jan 2021</span></div>
                                                </div>
                                            </a></li>
                                        <li class="list-articles-item"><a class="list-articles-item__link" href="05_blog-post.html">
                                                <div class="list-articles-item__img"><img src="img/img-article-thumb-2.jpg" alt="article-thumb"></div>
                                                <div class="list-articles-item__info">
                                                    <div class="list-articles-item__title">How to Maintain a Slim Body</div>
                                                    <div class="list-articles-item__date"> <i class="icon_calendar"></i><span>31 jan 2021</span></div>
                                                </div>
                                            </a></li>
                                        <li class="list-articles-item"><a class="list-articles-item__link" href="05_blog-post.html">
                                                <div class="list-articles-item__img"><img src="img/img-article-thumb-3.jpg" alt="article-thumb"></div>
                                                <div class="list-articles-item__info">
                                                    <div class="list-articles-item__title">Attend Any Event With Full Spirit</div>
                                                    <div class="list-articles-item__date"> <i class="icon_calendar"></i><span>31 jan 2021</span></div>
                                                </div>
                                            </a></li>
                                        <li class="list-articles-item"><a class="list-articles-item__link" href="05_blog-post.html">
                                                <div class="list-articles-item__img"><img src="img/img-article-thumb-4.jpg" alt="article-thumb"></div>
                                                <div class="list-articles-item__info">
                                                    <div class="list-articles-item__title">Top 10 Spa & Hotels to Visit</div>
                                                    <div class="list-articles-item__date"> <i class="icon_calendar"></i><span>31 jan 2021</span></div>
                                                </div>
                                            </a></li>
                                    </ul>
                                </div>
                                <div class="widjet widjet-newsletter">
                                    <h4 class="widjet__title">Newsletter</h4>
                                    <p>Get Viasun Newsletter and Stay Updated With Us</p>
                                    <form class="form-newsletter" action="#!">
                                        <!-- Hidden Required Fields -->
                                        <input type="hidden" name="project_name" value="Viasun">
                                        <input type="hidden" name="admin_email" value="test@gmail.com">
                                        <input type="hidden" name="form_subject" value="Newsletter">
                                        <!-- END Hidden Required Fields --><button type="submit"><i class="fas fa-envelope-open"></i></button><input class="uk-input uk-form-large" type="email" name="Email" placeholder="Email">
                                    </form>
                                </div>
                                <div class="widjet widjet-tags-cloud">
                                    <h4 class="widjet__title">Tags Cloud</h4>
                                    <ul class="tags-list">
                                        <li><a href="#!">Health care</a></li>
                                        <li> <a href="#!">Skincare</a></li>
                                        <li><a href="#!">Face</a></li>
                                        <li><a href="#!">Cosmetics</a></li>
                                        <li> <a href="#!">Makeup</a></li>
                                        <li><a href="#!">Hairs growth</a></li>
                                        <li><a href="#!">Therapy</a></li>
                                    </ul>
                                </div>
                                <div class="widjet widjet-product">
                                    <h4 class="widjet__title">Featured Product</h4>
                                    <div class="product-card">
                                        <div class="product-card__box">
                                            <div class="product-card__media"> <img class="product-card__img" src="img/img-product-1.jpg" alt="V-Beauty Pack" />
                                                <div class="product-card__badge new">new</div>
                                                <div class="product-card__btns">
                                                    <ul>
                                                        <li><a href="#"><span>Add to cart</span><i class="fas fa-shopping-basket"></i></a></li>
                                                        <li><a href="#"><span>zoom</span><i class="fas fa-search-plus"></i></a></li>
                                                        <li><a href="#"><span>Add to wishlist</span><i class="fas fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__title"> <a href="{{url("view/03_product")}}">V-Beauty Pack</a><span>Face Lotion</span></div>
                                                <div class="product-card__price">$25.65</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </main>
      @endsection
