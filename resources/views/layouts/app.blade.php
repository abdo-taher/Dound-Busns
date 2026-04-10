<!DOCTYPE html>
<html lang="@lang('constants.language')" direction="@lang('constants.direction')" dir="@lang('constants.direction')" style="direction: @lang('constants.direction')">
@include('layouts.head')

<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" data-theme="light" data-kt-name="metronic" class="header-tablet-and-mobile-fixed aside-enabled">
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @if (auth('admin')->check())
                @include('layouts.sidebar.admin')
            @elseif (auth('club')->check())
                @include('layouts.sidebar.club')
            @elseif (auth('vendor')->check())
                @include('layouts.sidebar.vendor')
            @endif

            <!-- / Menu -->
            <div class="layout-page">
                @include('layouts.header')

                @yield('main')
            </div>
            <!-- Layout container -->

            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <!--end::Wrapper-->

    @include('layouts.scripts')

</body>

</html>
