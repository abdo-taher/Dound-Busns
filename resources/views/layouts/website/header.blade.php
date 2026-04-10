<div class="container-xxl position-relative p-0" id="home">
    <nav class="navbar  navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0 d-flex align-items-center gap-3"> <img class="dark" style="width: 50px"
                src={{ asset('assets/img/Frame.png') }} alt="logo" />
            <h1 class="m-0">{{ __('home.product') }}</h1>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto py-0">
                <a href="{{ route('index') }}" class="nav-item nav-link {{ isActiveRoute(['index']) }}">{{ __('home.home') }}</a>
                <a href="{{ route('website.partener') }}" class="nav-item nav-link {{ isActiveRoute(['website.partener']) }}">{{ __('home.become_partner') }}</a>
                <a href={{ route('host') }} class="nav-item nav-link {{ isActiveRoute(['host']) }}">{{ __('home.host_tournament') }}</a>
                <a href="{{ route('contant') }}" class="nav-item nav-link {{ isActiveRoute(['contant']) }}">{{ __('home.contact_us') }}</a>
                <a href="{{ route('subscription.index') }}" class="nav-item nav-link {{ isActiveRoute(['subscription.index']) }}">{{ __('home.subscription') }}</a>

            </div>
            @php
                $lang = config('app.locale');
            @endphp
            @if ($lang == 'ar')
                <div class="">
                    <a class="dropdown-item p-2 text-start" style="text-align: start"
                        href="{{ route('language', 'en') }}">
                        <img src="{{ asset('assets/img/us.svg') }}" alt="" class="img-fluid rounded-1"
                            width="20" height="20">
                        En
                    </a>
                </div>
            @else
                <div class="">
                    <a class="dropdown-item p-2 text-start" style="text-align: start"
                        href="{{ route('language', 'ar') }}">
                        <img src="{{ asset('assets/img/sa.svg') }}" alt="" class="img-fluid rounded-1"
                            width="20" height="20">
                        AR
                    </a>
                </div>
            @endif
        </div>
    </nav>

    <div class="container-xxl bg-primary hero-header">
        <div class="container px-lg-5">
            <div class="row g-5">
                <div class="col-lg-8 text-center text-lg-start">
                    @yield('title__page')
                    <div class="row g-4">
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                            <a href="" class="d-flex bg-primary-gradient rounded py-3 px-4">
                                <i class="fab fa-apple fa-3x text-white flex-shrink-0"></i>
                                <div class="ms-3">
                                    <p class="text-white mb-0">Available On</p>
                                    <h5 class="text-white mb-0">App Store</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.7s">
                            <a href="" class="d-flex bg-secondary-gradient rounded py-3 px-4">
                                <i class="fab fa-android fa-3x text-white flex-shrink-0"></i>
                                <div class="ms-3">
                                    <p class="text-white mb-0">Available On</p>
                                    <h5 class="text-white mb-0">Play Store</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex justify-content-center justify-content-lg-end wow fadeInUp"
                    data-wow-delay="0.3s">
                    <div class="owl-carousel screenshot-carousel">
                        <img class="img-fluid" src={{ asset('assets/img/screenshot-1.png') }} alt="">
                        <img class="img-fluid" src={{ asset('assets/img/screenshot-2.png') }} alt="">
                        <img class="img-fluid" src={{ asset('assets/img/screenshot-3.png') }} alt="">
                        <img class="img-fluid" src={{ asset('assets/img/screenshot-4.png') }} alt="">
                        <img class="img-fluid" src={{ asset('assets/img/screenshot-5.png') }} alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
