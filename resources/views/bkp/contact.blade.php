@extends('layouts.default')

@section('content')

        <main class="page-main">
            <div class="section-hero">
                <div class="section-hero__bg"><img src="img/contacts-hero.png" alt="home-hero"></div>
                <div class="section-hero__content" data-uk-scrollspy="target: &gt; *; cls: uk-animation-slide-bottom-small; delay: 500">
                    <h1 class="section-hero__title section-hero__top_padding">Contact Us</h1>
                </div>
            </div>
            <div class="page-content">
                <div class="uk-section-large uk-container">
                    <div class="uk-grid uk-grid-large uk-child-width-1-2@m" data-uk-grid>
                        <div> <iframe class="iframe-contact" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3460.8711380435816!2d-95.45152868446732!3d29.839141135195867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1s2724%20%20Candlelight%20Drive%2C%20Houston%20Washington%2077002%20-%20USA!5e0!3m2!1sru!2sua!4v1617517102024!5m2!1sru!2sua" allowfullscreen loading="lazy"></iframe></div>
                        <div>
                            <div class="contacts-info" data-uk-scrollspy="target: &gt; *; cls: uk-animation-slide-bottom-small; delay: 500">
                                <div class="contacts-info__item">
                                    <div class="contacts-info__title">Location</div>
                                    <div class="contacts-info__content">
                                        <p>2724 Candlelight Drive, Houston<br> Washington 77002 - USA</p>
                                    </div>
                                </div>
                                <div class="contacts-info__item">
                                    <div class="contacts-info__title">Contact</div>
                                    <div class="contacts-info__content"> <a href="tel:+12814005971">T: (+1) 281-400-5971</a><a href="mailto:products@viasun.com">E: products@viasun.com</a></div>
                                </div>
                                <div class="contacts-info__item">
                                    <div class="contacts-info__title">Shop Hours</div>
                                    <div class="contacts-info__content">
                                        <p>Mon to Fri: 8:15 am — 5:30 pm<br> Sat: 9:00 am — 4:00 pm<br> Sun: 10:00 am — 8:00 pm</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-margin-xlarge-bottom uk-container">
                    <div class="section-title" data-uk-scrollspy="target: &gt; *; cls: uk-animation-slide-bottom-small; delay: 500"><span>We're Here to Connect</span>
                        <h3>Get in Touch With Us</h3>
                    </div>
                    <div class="section-content">
                        <form action="#!">
                            <!-- Hidden Required Fields -->
                            <input type="hidden" name="project_name" value="Viasun">
                            <input type="hidden" name="admin_email" value="test@gmail.com">
                            <input type="hidden" name="form_subject" value="Form Contacts page">
                            <!-- END Hidden Required Fields -->
                            <div class="uk-grid uk-child-width-1-3@s" data-uk-grid data-uk-scrollspy="target: &gt; *; cls: uk-animation-slide-bottom-small; delay: 200">
                                <div><input class="uk-input uk-form-large" type="text" name="Name" placeholder="Name"></div>
                                <div><input class="uk-input uk-form-large" type="text" name="Email" placeholder="Email"></div>
                                <div><input class="uk-input uk-form-large" type="text" name="Phone" placeholder="Phone"></div>
                                <div class="uk-width-1-1"><input class="uk-input uk-form-large" type="text" name="Subject" placeholder="Subject"></div>
                                <div class="uk-width-1-1"><textarea class="uk-textarea" name="Message" placeholder="Message"></textarea></div>
                                <div class="uk-width-1-1 uk-text-center"><button class="uk-button uk-button-danger uk-button-large" type="submit">Send message</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
   @endsection
