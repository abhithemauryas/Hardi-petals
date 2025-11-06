<div class="main-nav">
    <!-- Sidebar Logo -->
    <div class="logo-box">
        <a href="{{ route('admin.dashboard') }}" class="logo-dark">
            <img src="{{asset('images/logo-sm.png')}}?a" class="logo-sm" alt="logo sm">
            <img src="{{asset('images/logo-light.png')}}?a" class="logo-lg" alt="logo light">
        </a>

        <a href="{{ route('admin.dashboard') }}" class="logo-light">
            <img src="{{asset('images/logo-sm.png')}}" class="logo-sm" alt="logo sm">
            <img src="{{asset('images/logo-light.png')}}" class="logo-lg" alt="logo light" style="width:160px;height:auto">
        </a>
    </div>

    <button type="button" class="button-sm-hover" aria-label="Show Full Sidebar">
        <iconify-icon icon="solar:double-alt-arrow-right-bold-duotone" class="button-sm-hover-icon"></iconify-icon>
    </button>

    <div class="scrollbar" data-simplebar>
        <ul class="navbar-nav" id="navbar-nav">

            <li class="menu-title">General</li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                         <span class="nav-icon">
                              <iconify-icon icon="solar:widget-5-bold-duotone"></iconify-icon>
                         </span>
                    <span class="nav-text"> Dashboard </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/products')}}">
                        <span class="nav-icon">
                            <iconify-icon icon="solar:t-shirt-bold-duotone"></iconify-icon>
                        </span>
                    <span class="nav-text"> Products </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.orders')}}">
                        <span class="nav-icon">
                            <iconify-icon icon="solar:bag-smile-bold-duotone"></iconify-icon>
                        </span>
                    <span class="nav-text"> Orders </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.invoices')}}">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:bill-list-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Invoices </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.blogs.index')}}">
                    <span class="nav-icon"><iconify-icon icon="mdi:blogger"></iconify-icon></span>
                    <span class="nav-text"> Blogs </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.settings')}}">
                         <span class="nav-icon">
                              <iconify-icon icon="solar:settings-bold-duotone"></iconify-icon>
                         </span>
                    <span class="nav-text"> Settings </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.logout')}}">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:logout-broken"></iconify-icon>
                    </span>
                    <span class="nav-text"> Logout </span>
                </a>
            </li>
        </ul>
    </div>
</div>
