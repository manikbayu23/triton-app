<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Triton Denpasar | {{ $title }} </title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/fontawesome.css') }}">
    <link href="{{ asset('assets/fontawesome/css/brands.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fontawesome/css/solid.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;1,500;1,600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/gambar/logo.png') }}">

    @stack('css')
</head>

<body>

    @include('user.components.navbar')
    @yield('content')
    @include('user.components.footer')

    <div class="link-kanan d-block text-center ">
        <div class="circle-link">
            <button type="button" data-bs-toggle="modal" data-bs-target="#modalDaftar"
                class="link-pesan-sekarang-side bg-warning animate-titron" title="Klik untuk memilih program"><i
                    class="fa-solid fa-cart-plus"></i></button>
        </div>
        <div class="circle-link">
            <a href="https://wa.me/6282146434314?text=Hii%20Triton%20Denpasar..." target="_blank"
                class="link-whatsapp animate-titron" title="Klik untuk chat via wahtsapp"><i
                    class="fa-brands fa-whatsapp"></i></a>
        </div>
    </div>

    {{-- <div id="triton-loader" class="show fullscreen">
        <div class="ping"></div>
    </div> --}}
    @stack('scripts')
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/fontawesome/js/fontawesome.js') }}"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script>
        $(document).ready(function() {
            $(window).scroll(function() {
                $('.animate-triton').each(function() {
                    var elementPosition = $(this).offset().top;
                    var screenPosition = $(window).scrollTop() + $(window).height();
                    if (elementPosition < screenPosition) {
                        $(this).addClass('animate__animated animate__fadeInUp');
                        $(this).css('opacity', '1');
                        $(this).css('transform', 'translateY(0)');
                    }
                });
            });
        });

        $(document).ready(function() {
            $(window).scroll(function() {
                $('.animate-triton-left').each(function() {
                    var elementPosition = $(this).offset().top;
                    var screenPosition = $(window).scrollTop() + $(window).height();
                    if (elementPosition < screenPosition) {
                        $(this).addClass('animate__animated animate__fadeInLeft');
                        $(this).css('opacity', '1');
                        $(this).css('transform', 'translateY(0)');
                    }
                });
            });
        });

        $(document).ready(function() {
            $('.single-item').slick({
                dots: true,
                autoplay: true,
                speed: 600,
                arrows: false,
                infinite: true,
                speed: 500,
                fade: true,
                cssEase: 'linear'

            });
        });



        $('.new-over').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }

            ]
        });

        //fungsi untuk menambah class show saat toggle di klik
        let navbar = document.getElementById('header')
        let navbarToggle = document.getElementById('navbar-toggler');
        let isOpen = false; //digunakan untuk melacak status
        //klik button
        navbarToggle.addEventListener('click', function() {
            isOpen = !isOpen;
            if (isOpen) {
                navbar.classList.add('show');
            } else {
                navbar.classList.remove('show');
            }
        });
    </script>
</body>

</html>
