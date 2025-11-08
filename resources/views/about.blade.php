@extends('layouts.default')

@section('content')

        <main class="page-main">
            <div class="section-hero">
                <div class="section-hero__bg"><img src="img/home-hero.png" alt="home-hero"></div>
                <div class="section-hero__content" data-uk-scrollspy="target: &gt; *; cls: uk-animation-slide-bottom-small; delay: 500">
                   <h1 class="section-hero__title section-hero__top_padding animated-title">
    About Us
  </h1>
                </div>
            </div>
           <div class="section-about">
            <div class="uk-section-large uk-container">
        <div class="uk-grid uk-child-width-1-2@m" data-uk-grid>
            <!-- Left Image Section -->
            <div>
                <div class="section-about__media _anim">
                    <div class="img-animate _anim _anim-no-repeat">
                        <img src="/img/about-banner.png" alt="About Hardi Petals">
                    </div>
                </div>
            </div>

            <!-- Right Content Section -->
            <div>
                <div class="section-about__desc" data-uk-scrollspy="target: > *; cls: uk-animation-slide-bottom-small; delay: 300">
                    <div class="section-title">
                        <span>Hardi Petals</span>
                        <h3>Natural Beauty, Redefined</h3>
                    </div>
                    <div class="section-content">
                        <p>
                            At Hardi Petals, we believe in enhancing natural beauty through self-care and
                            elegance. Our products are inspired by nature, crafted with love, and made to help
                            every individual feel confident, calm, and beautiful in their own skin.
                        </p>
                        <a class="uk-button uk-button-danger uk-button-large" href="{{ url('/products') }}">
                            View Collection
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section-story">
  <div class="section-story__container">
    <div class="section-story__image">
      <img src="img/about-story.webp" alt="Our Story Image">
    </div>

    <div class="section-story__content">
      <h2 class="section-story__title">Our Story</h2>
      <p>
        Rukmini van Hunen started her career in finance. During her studies, which she largely completed from home due to COVID, she struggled. "Mentally, I found it a very challenging period. I lost my balance and started exploring how you can bring positivity into your daily life with relatively small actions. Self-care is incredibly important."
      </p>

      <p>
        At Hardi Petals, we believe that self-care starts with a connection to nature.
      </p>

      <h3 class="section-story__subtitle">Our Mission</h3>
      <p>
        To inspire people to reconnect with nature through self-care and self-love. We want to make nature's benefits accessible to everyone.
      </p>

      <p>
        We dream of a world where 'natural' isn't a marketing term, but a lifestyle.
      </p>

      <h3 class="section-story__subtitle">Our Vision</h3>
      <p>
        We strive for a world where the beauty benefits of nature are embraced. A world where people appreciate nature and integrate it into their daily lives.
      </p>
    </div>
  </div>
</section>





            <!-- <div class="section-slider">
                <div class="slider-first-screen">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="section-slider-item"><img src="img/slider-slide-1.jpg" alt="slider-slide"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="section-slider-item"><img src="img/slider-slide-2.jpg" alt="slider-slide"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="section-slider-item"> <img src="img/slider-slide-3.jpg" alt="slider-slide"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="section-slider-item"> <img src="img/slider-slide-4.jpg" alt="slider-slide"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="section-plus">
                <div class="uk-section uk-container">
                    <div class="uk-grid uk-child-width-1-4@m uk-child-width-1-2@s uk-grid-divider" data-uk-grid data-uk-scrollspy="target: &gt; *; cls: uk-animation-slide-bottom-small; delay: 300">
                        <div>
                            <div class="plus-item"><img class="plus-item__icon" src="img/plus-item-1.png" alt="plus-item">
                                <div class="plus-item__numb">4+</div>
                                <div class="plus-item__title">Products</div>
                            </div>
                        </div>
                        <div>
                            <div class="plus-item"><img class="plus-item__icon" src="img/plus-item-2.png" alt="plus-item">
                                <div class="plus-item__numb">15k+</div>
                                <div class="plus-item__title">Positive reviews</div>
                            </div>
                        </div>
                        <div>
                            <div class="plus-item"><img class="plus-item__icon" src="img/plus-item-3.png" alt="plus-item">
                                <div class="plus-item__numb">20k</div>
                                <div class="plus-item__title">Satisfied Customers</div>
                            </div>
                        </div>
                        <div>
                            <div class="plus-item"><img class="plus-item__icon" src="img/plus-item-4.png" alt="plus-item">
                                <div class="plus-item__numb">136+</div>
                                <div class="plus-item__title">orders in queue</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="section-team">
                <div class="uk-background-muted">
                    <div class="uk-section-large uk-container">
                        <div class="section-title"> <span>Best suiting & clothing</span>
                            <h3>Meet Our Team</h3>
                        </div>
                        <div class="section-content">
                            <div class="uk-position-relative" tabindex="-1">
                                <ul class="uk-slider-items uk-child-width-1-2@s uk-child-width-1-3@m uk-grid">
                                    <li>
                                        <div class="team-item">
                                            <div class="team-item__media"> <img src="img/team-item-1.jpg" alt="team-item">
                                                <ul class="social">
                                                    <li><a href="http://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="http://www.pinterest.com" target="_blank"><i class="fab fa-pinterest"></i></a></li>
                                                    <li><a href="http://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="http://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="team-item__desc">
                                                <div class="team-item__name">Kam Willianson</div>
                                                <div class="team-item__position">Shop Director</div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="team-item">
                                            <div class="team-item__media"> <img src="img/team-item-2.jpg" alt="team-item">
                                                <ul class="social">
                                                    <li><a href="http://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="http://www.pinterest.com" target="_blank"><i class="fab fa-pinterest"></i></a></li>
                                                    <li><a href="http://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="http://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="team-item__desc">
                                                <div class="team-item__name">Celia Anderson</div>
                                                <div class="team-item__position">Makeup Artist</div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="team-item">
                                            <div class="team-item__media"> <img src="img/team-item-3.jpg" alt="team-item">
                                                <ul class="social">
                                                    <li><a href="http://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="http://www.pinterest.com" target="_blank"><i class="fab fa-pinterest"></i></a></li>
                                                    <li><a href="http://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="http://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="team-item__desc">
                                                <div class="team-item__name">John Snowery</div>
                                                <div class="team-item__position">Product Manager</div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin-top"></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="section-video">
                <div class="section-video__bg" data-uk-lightbox>
                    <a class="section-video__link" href="https://youtu.be/IUYs3mYgEPI"
                     data-attrs="width: 1280; height: 720;" data-caption="YouTube">
                         <img src="img/about-video.png" alt="video" class="video-thumbnail">
                       <div class="play-btn">
                ▶
            </div>
                    </a></div>
            </div>
            <div class="section-reviews">
                <div class="uk-section-large uk-container">
                    <div data-uk-scrollspy="target: &gt; *; cls: uk-animation-slide-bottom-small; delay: 300">
                        <div class="section-reviews__title">What Customers Saying</div>
                        <div class="uk-position-relative" tabindex="-1" data-uk-slider>
                            <ul class="uk-slider-items uk-grid uk-child-width-1-1">
                                <li>
                                    <blockquote>
                                        <p data-uk-slideshow-parallax="x: 300,-300">“I really love the hair mask and the oil it works really very good. And the smell is very nice“</p><cite data-uk-slideshow-parallax="x: 200,-200">Ridhi</cite>
                                    </blockquote>
                                </li>
                                <li>
                                    <blockquote>
                                        <p data-uk-slideshow-parallax="x: 300,-300">“The product is very nice and smells so good. Am enjoying a lot.“</p><cite data-uk-slideshow-parallax="x: 200,-200">Amrira</cite>
                                    </blockquote>
                                </li>
                                <li>
                                    <blockquote>
                                        <p data-uk-slideshow-parallax="x: 300,-300">“Super excellent pure natural product!Feels softness smells good !A real treat 🥰👌“</p><cite data-uk-slideshow-parallax="x: 200,-200">Kash Hoeksma-Askrana</cite>
                                    </blockquote>
                                </li>
                            </ul>
                            <div class="uk-visible@m"><a class="uk-position-center-left" href="#" data-uk-slidenav-previous data-uk-slider-item="previous"></a><a class="uk-position-center-right" href="#" data-uk-slidenav-next data-uk-slider-item="next"></a></div>
                            <div class="uk-hidden@m">
                                <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin-medium-top"></ul>
                            </div>
                        </div>
                    </div>
                </div>
         </div>
        </main>
   @endsection
