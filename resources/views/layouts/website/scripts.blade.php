 {{-- scripts --}}
 <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
 <script src="{{ asset('assets/js/custom.js') }}"></script>
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
 <script src={{ asset('assets/lib/wow/wow.min.js') }}></script>
 <script src={{ asset('assets/lib/easing/easing.min.js') }}></script>
 <script src={{ asset('assets/lib/waypoints/waypoints.min.js') }}></script>
 <script src={{ asset('assets/lib/counterup/counterup.min.js') }}></script>
 <script src={{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}></script>

 <!-- Template Javascript -->
 <script src={{ asset('assets/js/main.js') }}></script>
 <script></script>
 <!-- Toastr CSS and JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- Include jQuery and Toastr -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(document).ready(function() {
        $('#imageInput').on('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(file);
            }
        });
    });
</script>

@if (Session::has('success'))
<script>
    toastr.success("{{ Session::get('success') }}");
</script>
@endif
@if (Session::has('error'))
<script>
    toastr.error("{{ Session::get('error') }}");
</script>
@endif
 @yield('scripts')
