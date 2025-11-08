<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.partials/title-meta', ['title' => "Hardi-Petals"])
    @yield('css')
    @include('admin.layouts.partials/head-css')
    @vite(['resources/js/react.jsx'])
</head>

<body>

<div class="wrapper">

    @include("admin.layouts.partials/topbar", ['title' => $title])
    @include('admin.layouts.partials/main-nav')

    <div class="page-content">

        <div class="container-fluid">
            <div id="messageBox">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong> Success! </strong> {{ session('success') }}
                        <button type="button" class="btn btn-close btn-sm" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"></span>
                        </button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-error alert-dismissible fade show" role="alert">
                    <strong> Error!</strong> {{ session('error') }}
                    <button type="button" class="btn btn-close btn-sm" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                    </div>
                @endif

            </div>
            @yield('content')
        </div>

        @include("admin.layouts.partials/footer")

    </div>

    @if(session('success'))
        <div id="toast-message" data-message="{{ session('success') }}"></div>
    @endif
    @if(session('error'))
        <div id="toast-message" data-message="{{ session('error') }}"></div>
    @endif
   <div id="toast-root"></div>

</div>

@include("admin.layouts.partials/right-sidebar")
@include("admin.layouts.partials/footer-scripts")
@vite(['resources/js/app.js','resources/js/layout.js'])

</body>

</html>
