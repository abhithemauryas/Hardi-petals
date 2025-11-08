<footer class="page-footer">
    <div class="page-footer__inner">
        <div data-uk-grid>

            <!-- Left Section -->
            <div class="uk-width-2-5@m">
                <div class="page-footer__logo">
                    <a class="logo" href="{{ url('/') }}">
                        <img src="{{ asset('img/logo.png') }}" alt="Hardi Petals">
                    </a>
                </div>

                <div class="page-footer__menus">
                    <div class="uk-child-width-1-2" data-uk-grid>
                        <div>
                            <div class="uk-h4">Quick Links</div>
                            <ul class="uk-nav">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ url('products') }}">Shop</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>

                            </ul>
                        </div>
                        <div>
                            <div class="uk-h4">Customer Care</div>
                            <ul class="uk-nav">
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Order History</a></li>
                                <li><a href="#">Shipping Policy</a></li>
                                <li><a href="#">Returns & Support</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Section -->
            <div class="uk-width-3-5@m">
                <div class="page-footer__text">
                    <p>At Hardi Petals, we believe that self-care starts with reconnecting to nature. Our mission is to
                        make natural wellness a lifestyle, not a trend.</p>
                </div>

                <div class="page-footer__social">
                    <div class="uk-h3">Follow Us</div>
                    <ul class="social">
                        <li><a href="https://www.facebook.com/people/Hardi-Petals/61551794878392/" target="_blank"><i
                                    class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://www.instagram.com/hardi_petals" target="_blank"><i
                                    class="fab fa-instagram"></i></a></li>
                        <li><a href="https://tiktok.com/@hardipetals" target="_blank"><i class="fab fa-tiktok"></i></a>
                        </li>
                    </ul>
                </div>

                <div class="page-footer__bottom">
                    <div class="copy">© {{ date('Y') }} — All rights reserved by Hardi Petals.</div>
                </div>

            </div>
        </div>
    </div>

    <!-- Offcanvas Menu (Mobile) -->
    <div id="offcanvas" data-uk-offcanvas="overlay: true; mode: slide; flip: true">
        <div class="uk-offcanvas-bar uk-flex uk-flex-column uk-flex-between">
            <button class="uk-offcanvas-close" type="button" data-uk-close></button>
            <div>
                <div class="uk-margin uk-margin-remove-top">
                    <a class="logo" href="{{ url('/') }}">
                        <img src="{{ asset('img/logo.png') }}" alt="Hardi Petals">
                    </a>
                </div>
            </div>
            <div>
                <div class="uk-margin">
                    <ul class="uk-nav uk-nav-default">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('products') }}">Shop</a></li>
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('blog') }}">Blog</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                         @else
                            <li>
                                <a href="{{ url('/') }}">Hello, {{ auth()->guard('admin')->user()->name ?? 'User' }}</a>
                            </li>
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    <button type="submit"
                                        style="background:none;border:none;padding:0;color:inherit;cursor:pointer;">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        @endguest

                        </li>
                    </ul>
                </div>
            </div>
            <div class="social-block">
                <p>Stay connected with us for natural wellness updates.</p>
                <ul class="social">
                    <li><a href="https://www.facebook.com/people/Hardi-Petals/61551794878392/" target="_blank"><i
                                class="fab fa-facebook-f"></i></a></li>
                    <li><a href="https://www.instagram.com/hardi_petals" target="_blank"><i
                                class="fab fa-instagram"></i></a></li>
                    <li><a href="https://tiktok.com/@hardipetals" target="_blank"><i class="fab fa-tiktok"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <a href="https://wa.me/31657934327?text=Hello%20I%20want%20to%20know%20more%20about%20your%20services."
        class="whatsapp-float" target="_blank" aria-label="Chat on WhatsApp">
        <img src="{{ asset('img/whatsApp.webp') }}" alt="WhatsApp" />
    </a>


    <!-- Search Modal -->
    <div class="uk-modal-full uk-modal" id="modal-search" data-uk-modal>
        <div class="uk-modal-dialog uk-flex uk-flex-center uk-flex-middle" data-uk-height-viewport>
            <button class="uk-modal-close-full" type="button" data-uk-close></button>
            <form class="uk-search uk-search-large">
                <input class="uk-search-input uk-text-center" type="search" placeholder="Search" autofocus>
            </form>
        </div>
    </div>
</footer>
