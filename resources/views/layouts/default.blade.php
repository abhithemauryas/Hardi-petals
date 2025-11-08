<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>{{env("APP_NAME")}}</title>
    <meta content="Chernyh Mihail" name="author">
    <meta content="Ecata - City Portal" name="description">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="HandheldFriendly" content="true">
    <meta name="format-detection" content="telephone=no">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/libs.min.css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}?sdakfh">
    <link rel="stylesheet" href="/css/showcase.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

    @vite(['resources/js/react.jsx'])
</head>
<body class="page-home">
    <div id="page-preloader"><span class="spinner border-t_second_b border-t_prim_a"></span></div>

    <div class="page-wrapper">
        @include('layouts.header')
            @yield('content')
        @include('layouts.footer')
    </div>
    @if(session('success'))
        <div id="toast-message" data-type='success' data-message="{{ session('success') }}"></div>
    @endif
    @if(session('error'))
        <div id="toast-message" data-type="error" data-message="{{ session('error') }}"></div>
    @endif
   <div id="toast-root"></div>

    <script src="/js/libs.js"></script>
    <script src="/js/main.js"></script>
        <script type="text/javascript">
        (function(m, e, t, r, i, k, a) {
            m[i] = m[i] || function() {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(82984270, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });

    </script>
   <noscript>
        <div><img src="https://mc.yandex.ru/watch/82984270" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->

</body>

</html>
