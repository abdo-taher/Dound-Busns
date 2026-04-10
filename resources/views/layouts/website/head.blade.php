<title>Sportat</title>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!-- Sites meta Data -->
<meta name="application-name" content="Forex" />
<meta name="author" content="thetork" />
<meta name="keywords" content="EForex" />
<meta name="description" content="Forex." />

<!-- OG meta data -->
<meta property="og:title" content="Forex" />
<meta property="og:site_name" content="Forex" />
<meta property="og:url" content="" />
<meta property="og:description" content="Forex" />
<meta property="og:type" content="Forex" />
<meta property="og:image" content="assets/images/og.png" />

<!-- Favicon -->
<link href="img/favicon.ico" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Jost:wght@500;600;700&display=swap"
    rel="stylesheet">

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href={{ asset('assets/lib/animate/animate.min.css') }} rel="stylesheet">
<link href={{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }} rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href={{ asset('assets/css/bootstrap.min.css') }} rel="stylesheet">

<!-- Template Stylesheet -->
{{-- <link href={{ asset('assets/css/style.css') }} rel="stylesheet"> --}}

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
@php
    $lang = config('app.locale');
@endphp

<link rel="stylesheet"
    href="{{ $lang == 'ar' ? asset('assets/css/style.rtl.css') : asset('assets/css/style.css') }}" />

<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
    href="https://fonts.googleapis.com/css2?family=Arvo:ital,wght@0,400;0,700;1,400;1,700&family=Cairo:wght@200..1000&family=Inter:wght@100..900&family=Manrope:wght@300;400;500;600;700;800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
    rel="stylesheet" />
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
{{-- <link rel="stylesheet" href="styles.css" /> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .image-preview {
        /* display: none; */
        width: 300px;
        height: auto;
        margin-top: 10px;
    }
</style>
<!-- toastr CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
