@extends('layouts.website.app')
@section('content')
    <!-- About Start -->
    <div class="container-xxl py-5" id="about">
        <div class="container py-5 px-lg-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="text-primary-gradient fw-medium">About App</h5>
                    <h1 class="mb-4">#1 App For Your Fitness</h1>
                    <p class="mb-4">
                        Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos
                        labore. Clita erat ipsum et lorem et sit, sed stet no labore
                        lorem sit clita duo justo eirmod magna dolore erat amet
                    </p>
                    <div class="row g-4 mb-4">
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                            <div class="d-flex">
                                <i class="fa fa-cogs fa-2x text-primary-gradient flex-shrink-0 mt-1"></i>
                                <div class="ms-3">
                                    <p class="text-primary-gradient mb-0">Active Install</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.7s">
                            <div class="d-flex">
                                <i class="fa fa-comments fa-2x text-secondary-gradient flex-shrink-0 mt-1"></i>
                                <div class="ms-3">
                                    <h2 class="mb-0" data-toggle="counter-up">1234</h2>
                                    <p class="text-secondary-gradient mb-0">
                                        Clients Reviews
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="" class="btn btn-primary-gradient py-sm-3 px-4 px-sm-5 rounded-pill mt-3">Read More</a>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid wow fadeInUp" data-wow-delay="0.5s" src={{ asset('assets/img/about.png') }} />
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Features Start -->
    <div class="container-xxl py-5" id="feature">
        <div class="container py-5 px-lg-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="text-primary-gradient fw-medium">App Features</h5>
                <h1 class="mb-5">Awesome Features</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="feature-item bg-light rounded p-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary-gradient rounded-circle mb-4"
                            style="width: 60px; height: 60px">
                            <i class="fa fa-eye text-white fs-4"></i>
                        </div>
                        <h5 class="mb-3">High Resolution</h5>
                        <p class="m-0">
                            Erat ipsum justo amet duo et elitr dolor, est duo duo eos
                            lorem sed diam stet diam sed stet lorem.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="feature-item bg-light rounded p-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-secondary-gradient rounded-circle mb-4"
                            style="width: 60px; height: 60px">
                            <i class="fa fa-layer-group text-white fs-4"></i>
                        </div>
                        <h5 class="mb-3">Retina Ready</h5>
                        <p class="m-0">
                            Erat ipsum justo amet duo et elitr dolor, est duo duo eos
                            lorem sed diam stet diam sed stet lorem.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="feature-item bg-light rounded p-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary-gradient rounded-circle mb-4"
                            style="width: 60px; height: 60px">
                            <i class="fa fa-edit text-white fs-4"></i>
                        </div>
                        <h5 class="mb-3">Editable Data</h5>
                        <p class="m-0">
                            Erat ipsum justo amet duo et elitr dolor, est duo duo eos
                            lorem sed diam stet diam sed stet lorem.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="feature-item bg-light rounded p-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-secondary-gradient rounded-circle mb-4"
                            style="width: 60px; height: 60px">
                            <i class="fa fa-shield-alt text-white fs-4"></i>
                        </div>
                        <h5 class="mb-3">Fully Secured</h5>
                        <p class="m-0">
                            Erat ipsum justo amet duo et elitr dolor, est duo duo eos
                            lorem sed diam stet diam sed stet lorem.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="feature-item bg-light rounded p-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary-gradient rounded-circle mb-4"
                            style="width: 60px; height: 60px">
                            <i class="fa fa-cloud text-white fs-4"></i>
                        </div>
                        <h5 class="mb-3">Cloud Storage</h5>
                        <p class="m-0">
                            Erat ipsum justo amet duo et elitr dolor, est duo duo eos
                            lorem sed diam stet diam sed stet lorem.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="feature-item bg-light rounded p-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-secondary-gradient rounded-circle mb-4"
                            style="width: 60px; height: 60px">
                            <i class="fa fa-mobile-alt text-white fs-4"></i>
                        </div>
                        <h5 class="mb-3">Fully Responsive</h5>
                        <p class="m-0">
                            Erat ipsum justo amet duo et elitr dolor, est duo duo eos
                            lorem sed diam stet diam sed stet lorem.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->

    <!-- Screenshot Start -->
    <div class="container-xxl py-5">
        <div class="container py-5 px-lg-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="text-primary-gradient fw-medium">Screenshot</h5>
                    <h1 class="mb-4">
                        User Friendly interface And Very Easy To Use Fitness App
                    </h1>
                    <p class="mb-4">
                        Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos
                        labore. Clita erat ipsum et lorem et sit, sed stet no labore
                        lorem sit clita duo justo eirmod magna dolore erat amet
                    </p>
                    <p>
                        <i class="fa fa-check text-primary-gradient me-3"></i>Diam dolor
                        diam ipsum et tempor sit
                    </p>
                    <p>
                        <i class="fa fa-check text-primary-gradient me-3"></i>Aliqu diam
                        amet diam et eos labore
                    </p>
                    <p class="mb-4">
                        <i class="fa fa-check text-primary-gradient me-3"></i>Clita erat
                        ipsum et lorem et sit
                    </p>
                    <a href="" class="btn btn-primary-gradient py-sm-3 px-4 px-sm-5 rounded-pill mt-3">Read More</a>
                </div>
                <div class="col-lg-4 d-flex justify-content-center justify-content-lg-end wow fadeInUp"
                    data-wow-delay="0.3s">
                    <div class="owl-carousel screenshot-carousel">
                        <img class="img-fluid" src={{ asset('assets/img/screenshot-1.png') }} alt="" />
                        <img class="img-fluid" src={{ asset('assets/img/screenshot-2.png') }} alt="" />
                        <img class="img-fluid" src={{ asset('assets/img/screenshot-3.png') }} alt="" />
                        <img class="img-fluid" src={{ asset('assets/img/screenshot-4.png') }} alt="" />
                        <img class="img-fluid" src={{ asset('assets/img/screenshot-5.png') }} alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Screenshot End -->

    <!-- Process Start -->
    <div class="container-xxl py-5">
        <div class="container py-5 px-lg-5">
            <div class="text-center pb-4 wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="text-primary-gradient fw-medium">How It Works</h5>
                <h1 class="mb-5">3 Easy Steps</h1>
            </div>
            <div class="row gy-5 gx-4 justify-content-center">
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative bg-light rounded pt-5 pb-4 px-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary-gradient rounded-circle position-absolute top-0 start-50 translate-middle shadow"
                            style="width: 100px; height: 100px">
                            <i class="fa fa-cog fa-3x text-white"></i>
                        </div>
                        <h5 class="mt-4 mb-3">Install the App</h5>
                        <p class="mb-0">
                            Tempor erat elitr rebum clita dolor diam ipsum sit diam amet
                            diam eos erat ipsum et lorem et sit sed stet
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="position-relative bg-light rounded pt-5 pb-4 px-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-secondary-gradient rounded-circle position-absolute top-0 start-50 translate-middle shadow"
                            style="width: 100px; height: 100px">
                            <i class="fa fa-address-card fa-3x text-white"></i>
                        </div>
                        <h5 class="mt-4 mb-3">Setup Your Profile</h5>
                        <p class="mb-0">
                            Tempor erat elitr rebum clita dolor diam ipsum sit diam amet
                            diam eos erat ipsum et lorem et sit sed stet
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="position-relative bg-light rounded pt-5 pb-4 px-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary-gradient rounded-circle position-absolute top-0 start-50 translate-middle shadow"
                            style="width: 100px; height: 100px">
                            <i class="fa fa-check fa-3x text-white"></i>
                        </div>
                        <h5 class="mt-4 mb-3">Enjoy The Features</h5>
                        <p class="mb-0">
                            Tempor erat elitr rebum clita dolor diam ipsum sit diam amet
                            diam eos erat ipsum et lorem et sit sed stet
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Process Start -->

    <!-- Download Start -->
    <div class="container-xxl py-5">
        <div class="container py-5 px-lg-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <img class="img-fluid wow fadeInUp" data-wow-delay="0.1s" src={{ asset('assets/img/about.png') }} />
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h5 class="text-primary-gradient fw-medium">Download</h5>
                    <h1 class="mb-4">Download The Latest Version Of Our App</h1>
                    <p class="mb-4">
                        Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos
                        labore. Clita erat ipsum et lorem et sit, sed stet no labore
                        lorem sit clita duo justo eirmod magna dolore erat amet
                    </p>
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
            </div>
        </div>
    </div>
    <!-- Download End -->



    <!-- Testimonial Start -->
    <div class="container-xxl py-5" id="review">
        <div class="container py-5 px-lg-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="text-primary-gradient fw-medium">Testimonial</h5>
                <h1 class="mb-5">What Say Our Clients!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="img-fluid bg-white rounded flex-shrink-0 p-1" src={{ asset('assets/img/testimonial-1.jpg') }}
                            style="width: 85px; height: 85px" />
                        <div class="ms-4">
                            <h5 class="mb-1">Client Name</h5>
                            <p class="mb-1">Profession</p>
                            <div>
                                <small class="fa fa-star text-warning"></small>
                                <small class="fa fa-star text-warning"></small>
                                <small class="fa fa-star text-warning"></small>
                                <small class="fa fa-star text-warning"></small>
                                <small class="fa fa-star text-warning"></small>
                            </div>
                        </div>
                    </div>
                    <p class="mb-0">
                        Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                        amet diam et eos. Clita erat ipsum et lorem et sit.
                    </p>
                </div>
                <div class="testimonial-item rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="img-fluid bg-white rounded flex-shrink-0 p-1" src={{ asset('assets/img/testimonial-2.jpg') }}
                            style="width: 85px; height: 85px" />
                        <div class="ms-4">
                            <h5 class="mb-1">Client Name</h5>
                            <p class="mb-1">Profession</p>
                            <div>
                                <small class="fa fa-star text-warning"></small>
                                <small class="fa fa-star text-warning"></small>
                                <small class="fa fa-star text-warning"></small>
                                <small class="fa fa-star text-warning"></small>
                                <small class="fa fa-star text-warning"></small>
                            </div>
                        </div>
                    </div>
                    <p class="mb-0">
                        Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                        amet diam et eos. Clita erat ipsum et lorem et sit.
                    </p>
                </div>
                <div class="testimonial-item rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="img-fluid bg-white rounded flex-shrink-0 p-1" src={{ asset('assets/img/testimonial-3.jpg') }}
                            style="width: 85px; height: 85px" />
                        <div class="ms-4">
                            <h5 class="mb-1">Client Name</h5>
                            <p class="mb-1">Profession</p>
                            <div>
                                <small class="fa fa-star text-warning"></small>
                                <small class="fa fa-star text-warning"></small>
                                <small class="fa fa-star text-warning"></small>
                                <small class="fa fa-star text-warning"></small>
                                <small class="fa fa-star text-warning"></small>
                            </div>
                        </div>
                    </div>
                    <p class="mb-0">
                        Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                        amet diam et eos. Clita erat ipsum et lorem et sit.
                    </p>
                </div>
                <div class="testimonial-item rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="img-fluid bg-white rounded flex-shrink-0 p-1" src={{ asset('assets/img/testimonial-4.jpg') }}
                            style="width: 85px; height: 85px" />
                        <div class="ms-4">
                            <h5 class="mb-1">Client Name</h5>
                            <p class="mb-1">Profession</p>
                            <div>
                                <small class="fa fa-star text-warning"></small>
                                <small class="fa fa-star text-warning"></small>
                                <small class="fa fa-star text-warning"></small>
                                <small class="fa fa-star text-warning"></small>
                                <small class="fa fa-star text-warning"></small>
                            </div>
                        </div>
                    </div>
                    <p class="mb-0">
                        Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                        amet diam et eos. Clita erat ipsum et lorem et sit.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Contact Start -->
    <div class="container-xxl py-5" id="contact">
        <div class="container py-5 px-lg-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="text-primary-gradient fw-medium">Contact Us</h5>
                <h1 class="mb-5">Get In Touch!</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="wow fadeInUp" data-wow-delay="0.3s">
                        <p class="text-center mb-4">
                            The contact form is currently inactive. Get a functional and
                            working contact form with Ajax & PHP in a few minutes. Just
                            copy and paste the files, add a little code and you're done.
                            <a href="https://htmlcodex.com/contact-form">Download Now</a>.
                        </p>
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Your Name" />
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Your Email" />
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject"
                                            placeholder="Subject" />
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <button class="btn btn-primary-gradient rounded-pill py-3 px-5" type="submit">
                                        Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->



    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up text-white"></i></a>
    {{-- <div class="section">
        <div class="section-header text-center mb-3 d-flex align-items-center flex-column justify-content-center">
            <h2 class="mt-minus-5 title__profile bottom mb-5">{{ __('home.esports') }}</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="d-flex flex-wrap align-items-center justify-content-between">
                    <h3 class="text-center d-flex flex-column align-items-center justify-content-center mb-4">
                        <div class="number">+ <span class="mb-0" data-toggle="counter-up">110</span></div>
                        <span class="name__partners">{{ __('home.tournaments') }}</span>
                    </h3>
                    <h3 class="text-center d-flex flex-column align-items-center justify-content-center mb-4">
                        <div class="number">+ <span class="mb-0" data-toggle="counter-up">110</span></div>
                        <span class="name__partners">{{ __('home.bookings') }}</span>
                    </h3>
                    <h3 class="text-center d-flex flex-column align-items-center justify-content-center mb-4">
                        <div class="number">+ <span class="mb-0" data-toggle="counter-up">110</span></div>
                        <span class="name__partners">{{ __('home.clubs') }}</span>
                    </h3>
                    <h3 class="text-center d-flex flex-column align-items-center justify-content-center mb-4">
                        <div class="number">+ <span class="mb-0" data-toggle="counter-up">110</span></div>
                        <span class="name__partners">{{ __('home.sports') }}</span>
                    </h3>
                    <h3 class="text-center d-flex flex-column align-items-center justify-content-center mb-4">
                        <div class="number">+ <span class="mb-0" data-toggle="counter-up">110</span></div>
                        <span class="name__partners">{{ __('home.downloads') }}</span>
                    </h3>

                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container py-5 px-lg-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="text-primary-gradient fw-medium">Screenshot</h5>
                    <h1 class="mb-4">{{ __('home.online_booking_system_for_your_sport') }}</h1>
                    <p><i
                            class="fa fa-check text-primary-gradient me-3"></i>{{ __('home.sports_facility_management_whether_tennis_basketball_soccer') }}
                    </p>
                    <p class="mb-4"><i class="fa fa-check text-primary-gradient me-3"></i>
                        {{ __('home.transparent_organization_all_training_sessions_tournaments_events_stored') }}
                    </p>
                    <p><i
                            class="fa fa-check text-primary-gradient me-3"></i>{{ __('home.always_up_to_date_club_members_see_all_updates_on_their_smartphones') }}
                    </p>

                </div>
                <div class="col-lg-4 d-flex justify-content-center justify-content-lg-end wow fadeInUp"
                    data-wow-delay="0.3s">
                    <div class="owl-carousel screenshot-carousel">
                        <img class="img-fluid" src={{asset("img/screenshot-1.png")}} alt="">
                        <img class="img-fluid" src={{asset("img/screenshot-2.png")}} alt="">
                        <img class="img-fluid" src={{asset("img/screenshot-3.png")}} alt="">
                        <img class="img-fluid" src={{asset("img/screenshot-4.png")}} alt="">
                        <img class="img-fluid" src={{asset("img/screenshot-5.png")}} alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- <div class="container-xxl py-5">
        <div class="container py-5 px-lg-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <img class="img-fluid wow fadeInUp" data-wow-delay="0.1s"
                        src="{{ asset('assets/img/iPhone 13.png') }}">
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="mb-4">{{ __('home.collect_contact_data') }}</h1>
                    <p class="mb-4">
                        {{ __('home.access_registration_via_quick_response_code_guests_and_viewers_can_also_check_in_and_out_on_site_without_downloading_the_playsports_app_via_quick_response_code') }}
                    </p>

                </div>
            </div>
        </div>
    </div> --}}
    {{-- <div class="container-xxl py-5">
        <div class="container py-5 px-lg-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="text-primary-gradient fw-medium">{{ __('home.member_communication') }}</h5>
                    <h1 class="mb-4">{{ __('home.member_communication') }}</h1>
                    <p><i class="fa fa-check text-primary-gradient me-3"></i>
                        {{ __('home.news_feed_is_your_private_channel_for_social_club_communication_you_can_directly_address_members') }}
                    </p>
                    <p class="mb-4"><i class="fa fa-check text-primary-gradient me-3"></i>
                        {{ __('home.information_whats_new_in_the_association_all_members_are_permanently_informed') }}
                    </p>
                    <p><i class="fa fa-check text-primary-gradient me-3"></i>
                        {{ __('home.digital_club_life_who_is_on_the_field_now_who_is_commenting_instead_of_sweating_interact_with_each_other_in_social_media_style') }}
                    </p>

                </div>
                <div class="col-lg-6">
                    <img class="img-fluid wow fadeInUp" data-wow-delay="0.1s"
                        src="{{ asset('assets/img/iPhone 13.png') }}">
                </div>
            </div>
        </div>
    </div> --}}
@endsection
@section('scripts')
@endsection
@section('title__page')
    <h1 class="text-white mb-4 animated slideInDown">{{ __('home.super_sports_community_app') }}</h1>
    <p class="text-white pb-3 animated slideInDown">
        {{ __('home.organize_activities_and_meet_people') }}
        {{ __('home.manage_responses_bookings_and_payments') }}
        {{ __('home.be_active_and_get_rewards') }}</p>
@endsection
