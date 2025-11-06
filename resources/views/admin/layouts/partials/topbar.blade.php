<header class="topbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <div class="d-flex align-items-center">
                <!-- Menu Toggle Button -->
                <div class="topbar-item">
                    <button type="button" class="button-toggle-menu me-2">
                        <iconify-icon icon="solar:hamburger-menu-broken" class="fs-24 align-middle"></iconify-icon>
                    </button>
                </div>

                <!-- Menu Toggle Button -->
                <div class="topbar-item">
                    <h4 class="fw-bold topbar-button pe-none text-uppercase mb-0">{{ $title ?? 'XS' }}</h4>
                </div>
            </div>

            <div class="d-flex align-items-center gap-1">
            <?php
                $notifications = auth()->guard('admin')->user()->notifications;
            ?>
                <!-- Theme Color (Light/Dark) -->
                <div class="topbar-item">
                    <button type="button" class="topbar-button" id="light-dark-mode">
                        <iconify-icon icon="solar:moon-bold-duotone" class="fs-24 align-middle"></iconify-icon>
                    </button>
                </div>

                <!-- Notification -->
                <div class="dropdown topbar-item">
                    <button type="button" class="topbar-button position-relative"
                            id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                        <iconify-icon icon="solar:bell-bing-bold-duotone" class="fs-24 align-middle"></iconify-icon>
                        <span
                            class="position-absolute fs-10 translate-middle bg-danger rounded-pill {{ $notifications->count() ? 'badge':'' }}">
                            {{$notifications->count()}}
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </button>
                    <div class="dropdown-menu py-0 dropdown-lg dropdown-menu-end"
                         aria-labelledby="page-header-notifications-dropdown">
                        <div class="p-3 border-top-0 border-start-0 border-end-0 border-dashed border">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0 fs-16 fw-semibold"> Notifications</h6>
                                </div>
                                <div class="col-auto">
                                    <a href="javascript: void(0);" class="text-dark text-decoration-underline">
                                        <small>Clear All</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-simplebar style="max-height: 280px;">
                            @foreach ($notifications as $msg)
                            <a href="javascript:void(0);" class="dropdown-item py-3 border-bottom text-wrap">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="mb-0">
                                            <span>
                                                {{ $msg->data['message'] }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                            @if(count($notifications)===0)
                            <a href="javascript:void(0);" class="dropdown-item py-3 border-bottom text-wrap">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="mb-0">
                                            <span>
                                                No notifications
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                            @endif
                        </div>
                        @if(count($notifications))
                        <div class="text-center py-3">
                            <a href="javascript:void(0);" class="btn btn-primary btn-sm">
                                View All Notification <i class="bx bx-right-arrow-alt ms-1"></i>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Theme Setting -->
                <div class="topbar-item d-none d-md-flex">
                    <button type="button" class="topbar-button" id="theme-settings-btn" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
                        <iconify-icon icon="solar:settings-bold-duotone" class="fs-24 align-middle"></iconify-icon>
                    </button>
                </div>

                <!-- User -->
                <div class="dropdown topbar-item">
                    <a type="button" class="topbar-button" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle" width="32" src="/images/users/avatar-1.jpg" alt="avatar-3">
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <div class="dropdown-divider my-1"></div>
                        <a class="dropdown-item text-danger" href="{{route('admin.logout')}}">
                            <i class="bx bx-log-out fs-18 align-middle me-1"></i>
                            <span class="align-middle">Logout</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
