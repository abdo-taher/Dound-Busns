<div class="container-fluid bg-primary text-light footer wow fadeIn" data-wow-delay="0.1s">
    <div class="container  px-lg-5">
        <div class="row g-5">
            <div class="col-md-6 col-lg-4">
                <h2 class="text-white mb-4">{{ __('home.product') }}</h2>

                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <h4 class="text-white mb-4"></h4>

                <a href="" class="btn btn-link d-flex">

                    <p>
                        <i class="fa fa-map-marker-alt me-3"></i>{{ __('home.location') }}

                    </p>
                </a>
                <a href="" class="btn btn-link d-flex">


                    <p><i class="fa fa-phone-alt me-3"></i>(+996) 50120268</p>
                </a>
                <a href="" class="btn btn-link d-flex">

                    <p><i class="fa fa-envelope me-3"></i>info@sportat.net </p>
                </a>
            </div>

            <div class="col-md-6 col-lg-4">
                <h4 class="text-white mb-4">{{ __('home.subscribe') }}</h4>

                <div class="position-relative w-100 mt-3">
                    <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text"
                        placeholder="Your Email" style="height: 48px" />
                    <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2">
                        <i class="fa fa-paper-plane text-primary-gradient fs-4"></i>
                    </button>
                </div><span class="mt-2 " style="font-size: 12px; color:gray">{{ __('home.subscribe_agree') }}</span>
            </div>
        </div>
    </div>
    <div class="d-flex align-items-center justify-content-center flex-wrap pb-3">
        <div>
            <a href="https://tek-part.com/" class="text-white" target="_blank" rel="noopener noreferrer">
                {{ __('home.all_rights') }} © 2023 {{ __('home.tech_part') }}.
            </a>
        </div>
    </div>
</div>
