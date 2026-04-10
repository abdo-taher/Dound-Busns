<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- العنوان مع الأيقونة -->
        <h3 class="mb-0">
            <i class="@yield('header__icon') fs-2"></i> @yield('header__title')
        </h3>


        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Lock Screen Button -->
            <li class="nav-item me-3">
                <a href="#" class="btn btn-outline-primary d-flex align-items-center">
                    <i class="fa fa-lock me-2"></i>
                    <span>{{ __('home.Lock Screen') }}</span>
                </a>
            </li>

            <!-- Notes Button -->
            <li class="nav-item me-3">
                <button class="btn btn-outline-primary d-flex align-items-center" id="kt_quick_cart_toggle">
                    <i class="fa fa-paragraph me-2"></i>
                    <span>{{ __('home.Notes') }}</span>
                </button>
            </li>

            <!-- Language Switcher -->
            @php
                $lang = config('app.locale');
            @endphp
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ $lang != 'ar' ? asset('assets/img/us.svg') : asset('assets/img/sa.svg') }}"
                        alt="" class="img-fluid rounded-circle me-2" width="20" height="20">
                    <span>{{ $lang != 'ar' ? __('home.en') : __('home.ar') }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('language', 'ar') }}">
                            <img src="{{ asset('assets/img/sa.svg') }}" alt=""
                                class="img-fluid rounded-circle me-2" width="20" height="20">
                            <span>{{ __('home.ar') }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('language', 'en') }}">
                            <img src="{{ asset('assets/img/us.svg') }}" alt=""
                                class="img-fluid rounded-circle me-2" width="20" height="20">
                            <span>{{ __('home.en') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Currency Switcher -->
            @php
                $currency = session('currency', 'SAR');
            @endphp
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="currencyDropdown"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-money-bill me-2"></i>
                    <span>{{ $currency == __('home.$') ? __('home.$') : __('home.sar') }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="currencyDropdown">
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="">
                            <i class="fa-solid fa-money-bill me-2"></i>
                            <span>{{ __('home.sar') }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="">
                            <i class="fa-solid fa-money-bill me-2"></i>
                            <span>{{ __('home.$') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Notifications -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="notificationDropdown"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-bell me-2"></i>
                    <span>{{ __('home.notifications') }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown">
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <i class="fa-solid fa-bell me-2"></i>
                            <span>{{ __('home.no_notifications') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            @if (auth('admin')->check() || auth('club')->check() || auth('vendor')->check())
                <!-- User Profile -->
                <li class="nav-item dropdown">
                    @php
                        $user = null;
                        if (auth('admin')->check()) {
                            $user = auth('admin')->user();
                        } elseif (auth('club')->check()) {
                            $user = auth('club')->user();
                        } elseif (auth('vendor')->check()) {
                            $user = auth('vendor')->user();
                        }
                    @endphp

                    @if ($user) <!-- Ensure user is not null -->
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="javascript:void(0);"
                            data-bs-toggle="dropdown">
                            <div class="avatar avatar-online">
                                <img src="{{ image_url($user->img) }}" alt="User Image"
                                    class="w-px-40 h-auto rounded-circle" />
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-online me-3">
                                            <img src="{{ image_url($user->img) }}" alt="User Image"
                                                class="w-px-40 h-auto rounded-circle" />
                                        </div>
                                        <div>
                                            <span class="fw-semibold d-block">{{ $user->name }}</span>
                                            <small class="text-muted">
                                                @if (auth('admin')->check())
                                                    Admin
                                                @elseif (auth('club')->check())
                                                    Club
                                                @elseif (auth('vendor')->check())
                                                    Vendor
                                                @endif
                                            </small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('settings.index') }}">
                                    <i class="bx bx-user me-2"></i>
                                    <span>My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('settings.index') }}">
                                    <i class="bx bx-cog me-2"></i>
                                    <span>Settings</span>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>



                            @if (auth('admin')->check())
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span>Log Out</span>
                                    </a>
                                </li>
                            @elseif (auth('club')->check())
                                <li>
                                    <a class="dropdown-item" href="{{ route('club.logout') }}">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span>Log Out</span>
                                    </a>
                                </li>
                            @elseif (auth('vendor')->check())
                                <li>
                                    <a class="dropdown-item" href="{{ route('vendor.logout') }}">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span>Log Out</span>
                                    </a>
                                </li>
                            @endif

                        </ul>
                    @endif
                </li>
            @endif


        </ul>

    </div>
</nav>
