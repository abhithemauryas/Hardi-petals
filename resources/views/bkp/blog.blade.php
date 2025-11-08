@extends('layouts.default')

@section('content')

<main class="page-main" >
     <div class="section-hero">
                <div class="section-hero__bg"><img src="img/blog-hero.png" alt="home-hero"></div>
                <div class="section-hero__content" data-uk-scrollspy="target: &gt; *; cls: uk-animation-slide-bottom-small; delay: 500">
                    <h1 class="section-hero__title section-hero__top_padding">Blog</h1>
                </div>
            </div>
            <div class="page-content" >
                <div class="uk-section uk-margin-large-bottom uk-container">
                    <div class="uk-grid" data-uk-grid>
                        <div class="uk-width-2-3@m">
                            <article class="article-full"><img class="uk-width-1-1" src="img/img-article-full.jpg" alt="">
                                <div class="article-full__info">
                                    <div class="article-full__author"><img src="img/img-blog-author.png" alt="blog-author"><span>Rebicca h. clark</span></div>
                                    <div class="article-full__date"><i class="icon_calendar"></i><span>31 jan 2021</span></div>
                                    <div class="article-full__category"><i class="icon_ribbon_alt"></i><span>Makeup</span></div>
                                </div>
                                <h1 class="article-full__title">15 Tips For a Perfect Makeup</h1>
                                <div class="article-full__content">
                                    <p>Enim venia quis nostrud exrcit ulamco laboris niust aliquip conse reprehen derity fugiat nulla pariatur excpteur sint ipsum occaecat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercit ation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laud antium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p>
                                    <div class="uk-grid uk-grid-medium uk-child-width-1-2@s uk-margin-medium" data-uk-grid data-uk-lightbox>
                                        <div><a href="./img/img-article-gallery-1.jpg"><img class="uk-width-1-1" src="./img/img-article-gallery-1.jpg" alt="gallery"></a></div>
                                        <div><a href="./img/img-article-gallery-2.jpg"><img class="uk-width-1-1" src="./img/img-article-gallery-2.jpg" alt="gallery"></a></div>
                                    </div>
                                    <p>Et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, quia non numquam eius modi tempora incidunt magnam aliquam quaerat voluptatem.</p>
                                    <blockquote>
                                        <p>“The right place to buy cosmetic products with luxury & stylish, - The unbeaten price & uncompromising quality.“</p><cite>Sadia O’Conner, USA</cite>
                                    </blockquote>
                                    <ul class="uk-margin-medium list-dots">
                                        <li>Enim venia quis nostrud exrcit ulamco laboris nst aliquip</li>
                                        <li>Conseq reprehen derit fugiat nula pariatur excpteur</li>
                                        <li>Sint ipsum occaecat. Lorem ipsum dolor sit amet ipsum konsect</li>
                                        <li>Etur adipisicing elit sed do eiusmod tempor.</li>
                                    </ul>
                                    <p>Tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercit ation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est antium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p>
                                </div>
                                <div class="article-full__bottom" id="article-bottom">
                                    <div class="widjet widjet-tags">
                                        <h4 class="widjet__title">Tags</h4>
                                        <ul class="tags-list">
                                            <li><a href="#!">Skincare</a></li>
                                            <li> <a href="#!">Cosmetics</a></li>
                                            <li><a href="#!">Makeup</a></li>
                                        </ul>
                                    </div>
                                    <div class="widjet widjet-social">
                                        <h4 class="widjet__title">Share</h4>
                                        <ul class="social">
                                            <li><a href="#!"><i class="fab fa-pinterest"></i></a></li>
                                            <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="section-article-navigation">
                                    <div class="article-navigation-item article-navigation-item--prev">
                                        <div class="article-navigation-item__media"> <a href="05_blog-post.html"> <img src="img/news-card-1.jpg" alt="news-card"></a></div>
                                        <div class="article-navigation-item__desc">
                                            <div class="article-navigation-item__label">Prev Article</div>
                                            <div class="article-navigation-item__title"> <a href="05_blog-post.html">Top 10 Hotels And Spa to Visit</a></div>
                                        </div>
                                    </div>
                                    <div class="article-navigation-item article-navigation-item--next">
                                        <div class="article-navigation-item__media"> <a href="05_blog-post.html"> <img src="img/news-card-2.jpg" alt="news-card"></a></div>
                                        <div class="article-navigation-item__desc">
                                            <div class="article-navigation-item__label">Next Article</div>
                                            <div class="article-navigation-item__title"> <a href="05_blog-post.html">How to Maintain a Slim Body</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="section-article-reviews" id="article-reviews">
                                    <div class="section-article-reviews__box">
                                        <div class="uk-h2">Comments (2)</div>
                                        <div class="comment-item">
                                            <div class="comment-item__user"> <img src="img/avatar-comment-1.jpg" alt="avatar-comment"></div>
                                            <div class="comment-item__desc">
                                                <div class="comment-item__head">
                                                    <div class="comment-item__user-name">Benny Willow</div>
                                                    <div class="comment-item__date">February 10, 2021 at 11:30 pm</div>
                                                </div>
                                                <div class="comment-item__body">
                                                    <p>Et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magnid.</p>
                                                </div>
                                                <div class="comment-item__btn"><a class="uk-button uk-button-link" href="#!">Reply</a></div>
                                            </div>
                                        </div>
                                        <div class="comment-item">
                                            <div class="comment-item__user"> <img src="img/avatar-comment-2.jpg" alt="avatar-comment"></div>
                                            <div class="comment-item__desc">
                                                <div class="comment-item__head">
                                                    <div class="comment-item__user-name">Maria Sandy</div>
                                                    <div class="comment-item__date">February 10, 2021 at 11:30 pm</div>
                                                </div>
                                                <div class="comment-item__body">
                                                    <p>Et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magnid.</p>
                                                </div>
                                                <div class="comment-item__btn"><a class="uk-button uk-button-link" href="#!">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="section-article-reviews__form">
                                        <div class="uk-h2">Leave a Reply</div>
                                        <div class="section-content">
                                            <form action="#!">
                                                <!-- Hidden Required Fields -->
                                                <input type="hidden" name="project_name" value="Viasun">
                                                <input type="hidden" name="admin_email" value="test@gmail.com">
                                                <input type="hidden" name="form_subject" value="Comment">
                                                <!-- END Hidden Required Fields -->
                                                <div class="uk-grid uk-grid-small uk-child-width-1-3@s" data-uk-grid>
                                                    <div><input class="uk-input uk-form-large" type="text" name="Name" placeholder="Name"></div>
                                                    <div><input class="uk-input uk-form-large" type="text" name="Email" placeholder="Email"></div>
                                                    <div><input class="uk-input uk-form-large" type="text" name="Website" placeholder="Website"></div>
                                                    <div class="uk-width-1-1"><textarea class="uk-textarea" name="Message" placeholder="Message"></textarea></div>
                                                    <div><button class="uk-button uk-button-danger uk-button-large" type="submit">Post comment</button></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="uk-width-1-3@m">
                            <aside class="sidebar">
                                <!-- <div class="widjet widjet-search">
                                    <form class="uk-search uk-search-default" action="#!"><button class="uk-search-icon-flip" data-uk-search-icon type="submit"></button><input class="uk-input uk-search-input uk-form-large" type="search" placeholder="Keyword"></form>
                                </div> -->
                                <!-- <div class="widjet widjet-category">
                                    <h4 class="widjet__title">Categories</h4>
                                    <ul class="list-category">
                                        <li> <a href="04_blog-main.html"><span>Skin Care</span><span>(45)</span></a></li>
                                        <li class="uk-active"><a href="04_blog-main.html"><span>Eye Brows</span><span>(9)</span></a></li>
                                        <li> <a href="04_blog-main.html"><span>Face Cosmetics</span><span>(128)</span></a></li>
                                        <li> <a href="04_blog-main.html"><span>Hair Care</span><span>(67)</span></a></li>
                                        <li> <a href="04_blog-main.html"><span>Makeup</span><span>(42)</span></a></li>
                                    </ul>
                                </div> -->
                                <div class="widjet widjet-list-articles">
                                    <h4 class="widjet__title">Recent Posts</h4>
                                    <ul class="list-articles">
                                        <li class="list-articles-item"><a class="list-articles-item__link" href="05_blog-post.html">
                                                <div class="list-articles-item__img"><img src="./img/img-article-thumb-1.jpg" alt="article-thumb"></div>
                                                <div class="list-articles-item__info">
                                                    <div class="list-articles-item__title">15 Tips For a Perfect Makup</div>
                                                    <div class="list-articles-item__date"> <i class="icon_calendar"></i><span>31 jan 2021</span></div>
                                                </div>
                                            </a></li>
                                        <li class="list-articles-item"><a class="list-articles-item__link" href="05_blog-post.html">
                                                <div class="list-articles-item__img"><img src="./img/img-article-thumb-2.jpg" alt="article-thumb"></div>
                                                <div class="list-articles-item__info">
                                                    <div class="list-articles-item__title">How to Maintain a Slim Body</div>
                                                    <div class="list-articles-item__date"> <i class="icon_calendar"></i><span>31 jan 2021</span></div>
                                                </div>
                                            </a></li>
                                        <li class="list-articles-item"><a class="list-articles-item__link" href="05_blog-post.html">
                                                <div class="list-articles-item__img"><img src="./img/img-article-thumb-3.jpg" alt="article-thumb"></div>
                                                <div class="list-articles-item__info">
                                                    <div class="list-articles-item__title">Attend Any Event With Full Spirit</div>
                                                    <div class="list-articles-item__date"> <i class="icon_calendar"></i><span>31 jan 2021</span></div>
                                                </div>
                                            </a></li>
                                        <li class="list-articles-item"><a class="list-articles-item__link" href="05_blog-post.html">
                                                <div class="list-articles-item__img"><img src="./img/img-article-thumb-4.jpg" alt="article-thumb"></div>
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
