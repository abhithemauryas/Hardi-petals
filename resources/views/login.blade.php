@extends('layouts.default')

@section('content')

    <main class="page-main">
        <div class="section-hero">
            <div class="section-hero__bg"><img src="img/login-hero.png" alt="home-hero"></div>
            <div class="section-hero__content"
                data-uk-scrollspy="target: &gt; *; cls: uk-animation-slide-bottom-small; delay: 500">
                {{-- <h1 class="section-hero__title section-hero__top_padding">My Account</h1> --}}
            </div>
        </div>
        <div class="page-content">
            <div class="uk-section-large uk-container uk-container-small">
                <div class="uk-h2">Sign In</div>
                {{-- ✅ Show Success or Error Messages --}}
                @if (session('success'))
                    <div class="uk-alert-success" uk-alert>
                        <p>{{ session('success') }}</p>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="uk-alert-danger" uk-alert>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="uk-form-stacked" action="{{ route('login.post') }}" method ="POST">
                    @csrf
                    <!-- Hidden Required Fields -->
                    <input type="hidden" name="project_name" value="Viasun">
                    <input type="hidden" name="admin_email" value="test@gmail.com">
                    <input type="hidden" name="form_subject" value="Login">
                    <!-- END Hidden Required Fields -->
                    <div class="uk-margin">
                        <div class="uk-form-label">Username or Email <span class="accent-text">*</span></div>
                        <div class="uk-form-controls"><input class="uk-input uk-form-large" type="email" name="email">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <div class="uk-form-label">Password <span class="accent-text">*</span></div>
                        <div class="uk-form-controls"><input class="uk-input uk-form-large" type="password" name="password">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <div class="checkbox-custome path"><label><input type="checkbox" checked="checked" /><svg
                                    viewBox="0 0 21 21">
                                    <path
                                        d="M5,10.75 L8.5,14.25 L19.4,2.3 C18.8333333,1.43333333 18.0333333,1 17,1 L4,1 C2.35,1 1,2.35 1,4 L1,17 C1,18.65 2.35,20 4,20 L17,20 C18.65,20 20,18.65 20,17 L20,7.99769186">
                                    </path>
                                </svg><span>Remember me</span></label></div>
                    </div>
                    <div class="uk-margin"><button class="uk-button uk-button-danger uk-button-large" type="submit">Sign
                            In</button></div>
                    <div class="uk-margin"><a href="10_reset-password.html">Forgot Your Password? </a></div>
                    <div class="uk-margin">
                        <span>Don't have an account?</span>
                        <a href="{{ route('register') }}"> Register here</a>
                    </div>

                </form>
            </div>
        </div>
    </main>

@endsection
