<style>
    .menu-vertical .menu-sub .menu-link {
        padding-left: 3rem !important;
    }
</style>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo" style="height: 100px">
        <a href="{{ route('dashboard.index') }}" class="app-brand-link d-flex align-items-center gap-2">
            <img src="{{ asset('image/logo/logo.svg') }}"alt="">
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 pt-5">
        <!-- Dashboard -->
        <li class="menu-item {{ isActiveRoute(['dashboard.index']) }}">
            <a href="{{ route('dashboard.index') }}" class="menu-link d-flex align-items-center gap-2">
                <i class="fa-solid fa-house"></i>
                <div data-i18n="Analytics">{{ __('home.Dashboard') }}</div>
            </a>
        </li>

        <!-- Users -->
        <li
            class="menu-item {{ isActiveRoute(['admins.index', 'admins.create', 'admins.edit', 'users.index', 'users.create', 'users.edit', 'clubs.index', 'clubs.create', 'clubs.edit', 'vendors.index', 'vendors.create', 'vendors.edit']) }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle d-flex align-items-center gap-2">
                <i class="fa-solid fa-users"></i>
                <div data-i18n="Layouts">{{ __('home.Users') }}</div>
            </a>

            <ul class="menu-sub" >
                <li class="menu-item {{ isActiveRoute(['admins.index', 'admins.create', 'admins.edit']) }}">
                    <a href="{{ route('admins.index') }}" class="menu-link ">
                        <div data-i18n="Without menu">{{ __('home.Admins') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ isActiveRoute(['clubs.index', 'clubs.create', 'clubs.edit']) }}">
                    <a href="{{ route('clubs.index') }}" class="menu-link">
                        <div data-i18n="Without navbar">{{ __('home.clubs') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ isActiveRoute(['vendors.index', 'vendors.create', 'vendors.edit']) }}">
                    <a href="{{ route('vendors.index') }}" class="menu-link">
                        <div data-i18n="Without navbar">{{ __('home.vendors') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ isActiveRoute(['user.index', 'user.create', 'user.edit']) }}">
                    <a href="{{ route('users.index') }}" class="menu-link">
                        <div data-i18n="Without navbar">{{ __('home.Users') }}</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- payment -->
        <li class="menu-item {{ isActiveRoute(['payment.index']) }}">
            <a href="{{ route('payment.index') }}" class="menu-link d-flex align-items-center gap-2">
                <i class="fa-brands fa-paypal"></i>
                <div data-i18n="Analytics">{{ __('home.Payments') }}</div>
            </a>
        </li>
        <!-- Payments of money -->
        <li class="menu-item {{ isActiveRoute(['payment.pay', 'payment.pay_vendor']) }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle d-flex align-items-center gap-2">
                <i class="fa-solid fa-money-bill-wave"></i>
                <div data-i18n="Layouts">{{ __('home.payments_of_money') }}</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ isActiveRoute(['payment.pay']) }}">
                    <a href="{{ route('payment.pay') }}" class="menu-link ">
                        <div data-i18n="Without menu">{{ __('home.AdminToClubPayment') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ isActiveRoute(['payment.pay_vendor']) }}">
                    <a href="{{ route('payment.pay_vendor') }}" class="menu-link">
                        <div data-i18n="Without navbar">{{ __('home.AdminToVendorPayment') }}</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- orders -->
        <li class="menu-item {{ isActiveRoute(['orders.index', 'orders.show', 'orders.order_admins']) }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle d-flex align-items-center gap-2">
                <i class="fa-solid fa-box"></i>
                <div data-i18n="Layouts">{{ __('home.orders') }}</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item  {{ isActiveRoute(['orders.index', 'orders.show']) }}">
                    <a href="{{ route('orders.index') }}" class="menu-link ">
                        <div data-i18n="Without menu">{{ __('home.orders') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ isActiveRoute(['orders.order_admins']) }}">
                    <a href="{{ route('orders.order_admins') }}" class="menu-link">
                        <div data-i18n="Without navbar">{{ __('home.order_admins') }}</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- sliders -->
        <li class="menu-item {{ isActiveRoute(['sliders.index', 'sliders.create', 'sliders.edit']) }}">
            <a href="{{ route('sliders.index') }}" class="menu-link d-flex align-items-center gap-2">
                <i class="fa fa-sliders-h"></i>
                <div data-i18n="Analytics">{{ __('home.sliders') }}</div>
            </a>
        </li>
        <!-- categories Plays -->
        <li class="menu-item {{ isActiveRoute(['categories.index', 'categories.create', 'categories.edit']) }}">
            <a href="{{ route('categories.index') }}" class="menu-link d-flex align-items-center gap-2">
                <i class="fa fa-basketball-ball"></i>
                <div data-i18n="Analytics">{{ __('home.sports_categories') }}</div>
            </a>
        </li>
        <!-- category_products -->
        <li
            class="menu-item {{ isActiveRoute(['category_products.index', 'category_products.create', 'category_products.edit', 'products.index', 'products.create', 'products.edit', 'offers.index', 'offers.create', 'offers.edit']) }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle d-flex align-items-center gap-2">
                <i class="fa fa-th-large"></i>
                <div data-i18n="Layouts">{{ __('home.category_products') }}</div>
            </a>

            <ul class="menu-sub">
                <li
                    class="menu-item {{ isActiveRoute(['category_products.index', 'category_products.create', 'category_products.edit']) }}">
                    <a href="{{ route('category_products.index') }}" class="menu-link d-flex align-items-center gap-2">
                        <i class="fa fa-tags"></i>
                        <div data-i18n="Without navbar">{{ __('home.category_products') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ isActiveRoute(['products.index', 'products.create', 'products.edit']) }}">
                    <a href="{{ route('products.index') }}" class="menu-link d-flex align-items-center gap-2">
                        <i class="fa fa-cube"></i>
                        <div data-i18n="Without navbar">{{ __('home.products') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ isActiveRoute(['offers.index', 'offers.create', 'offers.edit']) }}">
                    <a href="{{ route('offers.index') }}" class="menu-link d-flex align-items-center gap-2">
                        <i class="fa fa-gift"></i>
                        <div data-i18n="Without navbar">{{ __('home.offers') }}</div>
                    </a>
                </li>
            </ul>
        </li>


        <li class="menu-item {{ isActiveRoute(['reviews.index']) }}">
            <a href="{{ route('reviews.index') }}" class="menu-link d-flex align-items-center gap-2">
                <i class="fa-solid fa-ranking-star"></i>
                <div data-i18n="Analytics">{{ __('home.Reviews') }}</div>
            </a>
        </li>

        <li class="menu-item {{ isActiveRoute(['posts.index']) }}">
            <a href="{{ route('posts.index') }}" class="menu-link d-flex align-items-center gap-2">
                <i class="fa-solid fa-share"></i>
                <div data-i18n="Analytics">{{ __('home.posts') }}</div>
            </a>
        </li>

        <!-- packages -->
        <li class="menu-item {{ isActiveRoute(['packages.index', 'packages.create', 'packages.edit']) }}">
            <a href="{{ route('packages.index') }}" class="menu-link d-flex align-items-center gap-2">
                <i class="fa fa-box"></i>
                <div data-i18n="Analytics">{{ __('home.packages') }}</div>
            </a>
        </li>
        <!-- Layouts -->
        <li class="menu-item {{ isActiveRoute(['reports.booking', 'reports.order']) }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle d-flex align-items-center gap-2">
                <i class="fa-solid fa-paste"></i>
                <div data-i18n="Layouts">{{ __('home.reports') }}</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ isActiveRoute(['reports.booking']) }}">
                    <a href="{{ route('reports.booking') }}" class="menu-link">
                        <div data-i18n="Without menu">{{ __('home.bookings') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ isActiveRoute(['reports.order']) }}">
                    <a href="{{ route('reports.order') }}" class="menu-link">
                        <div data-i18n="Without menu">{{ __('home.orders') }}</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-item {{ isActiveRoute(['support.index']) }}">
            <a href="{{ route('support.index') }}" class="menu-link d-flex align-items-center gap-2">
                <i class="fa-solid fa-headset"></i>
                <div data-i18n="Analytics">{{ __('home.system_support') }}</div>
            </a>
        </li>

        {{-- <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle d-flex align-items-center gap-2">
                <i class="fa-solid fa-paste"></i>
                <div data-i18n="Account Settings">التقارير</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="pages-account-settings-account.html" class="menu-link">
                        <div data-i18n="Account">Account</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="pages-account-settings-notifications.html" class="menu-link">
                        <div data-i18n="Notifications">Notifications</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="pages-account-settings-connections.html" class="menu-link">
                        <div data-i18n="Connections">Connections</div>
                    </a>
                </li>
            </ul>
        </li> --}}
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle d-flex align-items-center gap-2">
                <i class="fa-solid fa-earth-americas"></i>
                <div data-i18n="Account Settings">{{ __('home.External site') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ isActiveRoute(['contacts.index']) }}">
                    <a href="{{ route('contacts.index') }}" class="menu-link">
                        <div data-i18n="Notifications">{{ __('home.become_partner') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ isActiveRoute(['championship.index']) }}">
                    <a href="{{ route('championship.index') }}" class="menu-link">
                        <div data-i18n="Connections">{{ __('home.host_tournament') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ isActiveRoute(['contacts.index']) }}">
                    <a href="{{ route('contacts.index') }}" class="menu-link">
                        <div data-i18n="Connections">{{ __('home.contact_us') }}</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle d-flex align-items-center gap-2">
                <i class="fa-solid fa-gear"></i>
                <div data-i18n="Authentications">{{ __('home.Settings') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ isActiveRoute(['settings.index']) }}">
                    <a href="{{ route('settings.index') }}" class="menu-link">
                        <div data-i18n="Authentications">الإعدادات</div>
                    </a>
                </li>
                <li class="menu-item {{ isActiveRoute(['settings-website']) }}">
                    <a href="{{ route('settings-website') }}" class="menu-link">
                        <div data-i18n="Authentications">{{ 'home.setting_website' }}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="auth-forgot-password-basic.html" class="menu-link" target="_blank">
                        <div data-i18n="Basic">Forgot Password</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="{{ route('dashboard.index') }}" class="menu-link d-flex align-items-center gap-2">
                <i class="fa-solid fa-shield-halved"></i>
                <div data-i18n="Analytics">الشروط والاحكام</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('dashboard.index') }}" class="menu-link d-flex align-items-center gap-2">
                <i class="fa-solid fa-address-book"></i>
                <div data-i18n="Analytics">طلبات التواصل معنا</div>
            </a>
        </li>
    </ul>
</aside>
