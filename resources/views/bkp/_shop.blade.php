@extends('layouts.default')
@section('content')
        <main class="page-main">
            <div class="section-hero">
                <div class="section-hero__bg"><img src="img/shop-hero.jpg" alt="shop-hero"></div>
                <div class="section-hero__content" data-uk-scrollspy="target: &gt; *; cls: uk-animation-slide-bottom-small; delay: 500">
                    <p class="section-hero__subtitle section-hero__top_padding">Products By Viasun</p>
                    <h1 class="section-hero__title">Our Shop</h1>
                </div>
            </div>
            <div class="page-content">
                <div class="uk-section-large uk-container">
                    <div data-uk-scrollspy="target: &gt; *; cls: uk-animation-slide-bottom-medium; delay: 500">
                        <div class="product-category-card">
                            <div class="product-category-card__media"> <img src="img/product-category-1.png" alt="product-category"></div>
                            <div class="product-category-card__info">
                                <div class="product-category-card__cat">Creams</div>
                                <div class="product-category-card__title">Anti-Aging Cream</div>
                                <div class="product-category-card__intro">Enim venia quis nostrud exrcit ulamco laboris com conseq reprehen derit fugiat nula pariatur sint ipsum occaecat. Lorem ipsum dolor sit am etur adipisicing elit sed tempor.</div>
                                <div class="product-category-card__more"><a class="uk-button uk-button-default uk-button-large" href="{{url("view/03_product")}}">View details</a></div>
                            </div>
                        </div>
                        <div class="product-category-card">
                            <div class="product-category-card__media"> <img src="img/product-category-2.png" alt="product-category"></div>
                            <div class="product-category-card__info">
                                <div class="product-category-card__cat">Hair care</div>
                                <div class="product-category-card__title">Hair Style Gel</div>
                                <div class="product-category-card__intro">Enim venia quis nostrud exrcit ulamco laboris com conseq reprehen derit fugiat nula pariatur sint ipsum occaecat. Lorem ipsum dolor sit am etur adipisicing elit sed tempor.</div>
                                <div class="product-category-card__more"><a class="uk-button uk-button-default uk-button-large" href="{{url("view/03_product")}}">View details</a></div>
                            </div>
                        </div>
                        <div class="product-category-card">
                            <div class="product-category-card__media"> <img src="img/product-category-3.png" alt="product-category"></div>
                            <div class="product-category-card__info">
                                <div class="product-category-card__cat">Skin care</div>
                                <div class="product-category-card__title">A Skinny Lotion</div>
                                <div class="product-category-card__intro">Enim venia quis nostrud exrcit ulamco laboris com conseq reprehen derit fugiat nula pariatur sint ipsum occaecat. Lorem ipsum dolor sit am etur adipisicing elit sed tempor.</div>
                                <div class="product-category-card__more"><a class="uk-button uk-button-default uk-button-large" href="{{url("view/03_product")}}">View details</a></div>
                            </div>
                        </div>
                        <div class="product-category-card">
                            <div class="product-category-card__media"> <img src="img/product-category-4.png" alt="product-category"></div>
                            <div class="product-category-card__info">
                                <div class="product-category-card__cat">Healthy bath</div>
                                <div class="product-category-card__title">V-Bath Saltish</div>
                                <div class="product-category-card__intro">Enim venia quis nostrud exrcit ulamco laboris com conseq reprehen derit fugiat nula pariatur sint ipsum occaecat. Lorem ipsum dolor sit am etur adipisicing elit sed tempor.</div>
                                <div class="product-category-card__more"><a class="uk-button uk-button-default uk-button-large" href="{{url("view/03_product")}}">View details</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-newsletter">
                <div class="uk-grid uk-grid-collapse uk-child-width-1-2@l" data-uk-grid>
                    <div>
                        <div class="section-newsletter__form" data-uk-scrollspy="target: &gt; *; cls: uk-animation-slide-bottom-small; delay: 300">
                            <div class="section-newsletter__title"><span>Best suiting & clothing</span>
                                <h3>Get Viasun Newsletter<br> & Stay Updated With Us</h3>
                            </div>
                            <form action="#!">
                                <!-- Hidden Required Fields -->
                                <input type="hidden" name="project_name" value="Viasun">
                                <input type="hidden" name="admin_email" value="test@gmail.com">
                                <input type="hidden" name="form_subject" value="Newsletter">
                                <!-- END Hidden Required Fields --><input type="text" placeholder="youremail@example.com"><input class="uk-button uk-button-danger" type="submit" value="Subscribe now">
                            </form>
                        </div>
                    </div>
                    <div>
                        <div class="section-newsletter__img"> <img src="img/img-newsletter.jpg" alt="img-newsletter"></div>
                    </div>
                </div>
            </div>
            <div class="section-quote">
                <div class="uk-container">
                    <div class="section-quote__title" data-uk-scrollspy="target: &gt; *; cls: uk-animation-slide-bottom-small; delay: 500">
                        <h3>Beauty begins the moment you<br> decide to be yourself.</h3><span>viasun thinking</span>
                    </div>
                    <div class="section-quote__content" data-uk-scrollspy="target: &gt; *; cls: uk-animation-slide-bottom-medium; delay: 500"> <img class="section-quote__img section-quote__img--1" src="img/img-quote-1.jpg" alt="img-quote"><img class="section-quote__img section-quote__img--2" src="img/img-quote-2.jpg" alt="img-quote"><img class="section-quote__img section-quote__img--3" src="img/img-quote-3.jpg" alt="img-quote"></div>
                </div>
            </div>
        </main>
     @endsection
