@extends('FrontEnd.partial.base')
@section('title', 'Homepage')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/HomepageStyle.css') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/img/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('assets/img/safari-pinned-tab.svg') }}" color="#5bbad5">
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}">
@endsection

@section('content')
    <div id="Carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#Carousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#Carousels" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#Carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#Carousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#Carousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="2000">
                <img src="{{ asset('assets/img/SlideShow/img-bg1.jpg') }}" class="d-block w-100" width="100%"
                    height="100%" alt="#" style="aspect-ratio:16/9; object-fit:cover">
                <div class="carousel-caption d-flex flex-column h-100 justify-content-center bottom-0"
                    id="caption-container">
                    <h3 class="bg-opacity-10 p-2" id="caption-top">Selamat Datang Di</h3>
                    <h1 class="bg-opacity-10 p-2" id="caption-mid">Dewi Anom</h1>
                    <h3 class="bg-opacity-10 p-2" id="caption-bot">Desa Wisata Wringianom</h3>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="{{ asset('assets/img/SlideShow/img-bg2.jpg') }}" class="d-block w-100" width="100%"
                    height="100%" alt="#" style="aspect-ratio:16/9; object-fit:cover">
                <div class="carousel-caption d-flex flex-column h-100  justify-content-center bottom-0">
                    <h3 class="bg-dark bg-opacity-10 p-2" id="caption-top">Selamat Datang Di</h3>
                    <h1 class="bg-dark bg-opacity-10 " id="caption-mid">Dewi Anom</h1>
                    <h3 class="bg-dark bg-opacity-10 p-2" id="caption-bot">Desa Wisata Wringianom</h3>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="{{ asset('assets/img/SlideShow/img-bg3.JPG') }}" class="d-block w-100" width="100%"
                    height="100%" alt="#" style="aspect-ratio:16/9; object-fit:cover">
                <div class="carousel-caption d-flex flex-column h-100  justify-content-center bottom-0">
                    <h3 class="bg-dark bg-opacity-10 p-2" id="caption-top">Selamat Datang Di</h3>
                    <h1 class="bg-dark bg-opacity-10 " id="caption-mid">Dewi Anom</h1>
                    <h3 class="bg-dark bg-opacity-10 p-2" id="caption-bot">Desa Wisata Wringianom</h3>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="{{ asset('assets/img/SlideShow/img-bg4.JPG') }}" class="d-block w-100" width="100%"
                    height="100%" alt="#" style="aspect-ratio:16/9; object-fit:cover">
                <div class="carousel-caption d-flex flex-column h-100  justify-content-center bottom-0">
                    <h3 class="bg-dark bg-opacity-10 p-2" id="caption-top">Selamat Datang Di</h3>
                    <h1 class="bg-dark bg-opacity-10 " id="caption-mid">Dewi Anom</h1>
                    <h3 class="bg-dark bg-opacity-10 p-2" id="caption-bot">Desa Wisata Wringianom</h3>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="{{ asset('assets/img/SlideShow/img-bg5.JPG') }}" class="d-block w-100" width="100%"
                    height="100%" alt="#" style="aspect-ratio:16/9; object-fit:cover">
                <div class="carousel-caption d-flex flex-column h-100  justify-content-center bottom-0">
                    <h3 class="bg-dark bg-opacity-10 p-2" id="caption-top">Selamat Datang Di</h3>
                    <h1 class="bg-dark bg-opacity-10 " id="caption-mid">Dewi Anom</h1>
                    <h3 class="bg-dark bg-opacity-10 p-2" id="caption-bot">Desa Wisata Wringianom</h3>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev " type="button" data-bs-target="#Carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon-hidden" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#Carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon-hidden" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="about-us">

        <div class="title">
            <h> <span class="normal-text">Tentang</span> <span class="golden-text">Kami</span></h>
        </div>

        <div class="content-container">

            <div class="logo">
                <img src="{{ asset('assets/img/Dewi Anom Logo.png') }}">
            </div>

            <div class="content">
                {{-- {!! Str::limit($contacts->description, 500) !!} --}}
            </div>

        </div>

        <div class="more">
            <a href="{{ route('contact.main') }}"> more <i class="fa-solid fa-circle-arrow-right"></i></a>
        </div>

    </div>

    <div class="atraction">

        <div class="title hidden moveInLeft">
            <h>Jelajah Wisata</h>
        </div>

        <div class="flash-card">

            <div class="flash-card-1 hidden moveInLeft">

                <div class="img-fc1">
                    <img src="{{ asset('assets/img/bromo(google).jpg') }}" style="object-fit:cover; aspect-ratio:3/4;">
                </div>

                <div class="title-fc1 py-3">
                    <h>Wisata ke Bromo</h>
                </div>

                <div class="content-fc1">
                    <p>Nikmati indahnya pemandangan Bromo dalam petualangan misterius di balik kabut.</p>
                </div>

            </div>

            <div class="flash-card-2 hidden moveInLeft">

                <div class="img-fc2">
                    <img src="{{ asset('assets/img/offroad-home.jpg') }}" style="object-fit:cover; aspect-ratio:3/4;">
                </div>

                <div class="title-fc2 py-3">
                    <h>Fun offroad & Tracking</h>
                </div>

                <div class="content-fc2">
                    <p>Rasakan sensasi petualangan yang memacu adrenalin dengan mengeksplorasi jalur offroad yang menantang
                        dan trekking melintasi hutan yang memikat.</p>
                </div>

            </div>

            <div class="flash-card-3 hidden moveInLeft">

                <div class="img-fc3">
                    <img src="{{ asset('assets/img/Tubing.jpg') }}" style="object-fit:cover; aspect-ratio:3/4;">
                </div>

                <div class="title-fc3 py-3">
                    <h>Tubing</h>
                </div>

                <div class="content-fc3">
                    <p>Sempurnakan liburan Anda dengan tubing seru di sungai yang jernih dan menyejukkan, menambahkan
                        keseruan yang tak terlupakan dari perjalanan Anda.</p>
                </div>

            </div>

        </div>

        <div class="sub-title containers">

            <div class="sub-title hidden fade">
                <h>Pengen tahu lebih banyak ?</h>
            </div>

            <div class="link hidden moveInRight">
                <a href="{{ route('package_river.main') }}"><button class="btn package-btn"> CLICK DISINI <i
                            class="fa-solid fa-computer-mouse"></i></a>
            </div>

        </div>

    </div>

    <div class="article">

        <div class="title hidden pop">

            <h><span class="word-1">Berita</span> <span class="word-2">Artikel</span> </h>

        </div>

        @php $num = 0; @endphp
        @foreach ($news as $new)
            @php $num++; @endphp
            <div class="board-{{ $num }}">

                @if ($num !== 2)
                    <div class="img-b{{ $num }}">
                        <img src="{{ $new->image ? asset('img/' . $new->image) : 'https://placehold.co/400/orange/white?text=Food' }}"
                            style="object-fit:cover; aspect-ratio:16/9;">
                    </div>
                @endif

                <div class="board-container">

                    <div class="title-p{{ $num }}">
                        <h4>{!! Str::limit($new->judul, 35) !!}</h4>
                    </div>

                    <div class="content-p{{ $num }}">
                        {!! Str::limit($new->description, 100) !!}
                    </div>

                    <div class="next{{ $num === 2 ? $num : '' }}">
                        <div class="logo">
                            <a href="{{ route('main.news.artikel', $new) }}"><i
                                    class="fa-solid fa-circle-arrow-right fa-xl"></i></a>
                            <a href ="{{ route('main.news.artikel', $new) }}" class="text">Learn More</a>
                        </div>
                    </div>

                </div>

                @if ($num === 2)
                    <div class="img-b{{ $num }}">
                        <img src="{{ $new->image ? asset('img/' . $new->image) : 'https://placehold.co/400/orange/white?text=Food' }}"
                            style="object-fit:cover; aspect-ratio:16/9;">
                    </div>
                @endif

            </div>
        @endforeach

        <div class="learn-more hidden pop">
            <a href="{{ route('news.main') }}"><button class="btn learn-more">Learn More </a>
        </div>

    </div>

    <div class="product">

        <div class="title">

            <div class="t1">
                <h>Produk</h>
            </div>

            <div class="t2">
                <h>Dewi Anom</h>
            </div>

        </div>

        <div class="product-board">

            @foreach ($products as $product)
                <div class="board-1">

                    <div class="img">
                        <img src="{{ $product->image ? asset('img/' . $product->image) : 'https://placehold.co/400/orange/white?text=Food' }}"
                            style="object-fit:cover; aspect-ratio:16/9; width: 100%%; height:100%;">
                    </div>

                    <div class="contain">

                        <div class="title py-3">
                            <h3> {{ $product->name }} </h3>
                        </div>

                        <div class="content py-2">
                            <p> {!! $product->description !!}</p>
                        </div>

                        <div class="link py-3">
                            <a href="{{ route('contact.main') }}#kontak"><button class="btn buy-now"> <i
                                        class="fa-solid fa-cart-plus fa-x1"></i> Beli Sekarang </a>
                        </div>

                    </div>


                </div>
            @endforeach
        </div>

        <div class="learn-more hidden pop">
            <a href="{{ route('ecommerce.main') }}"><button class="btn learn-more">See More </a>
        </div>

    </div>

    <div class="partner">

        <div class="title hidden moveInLeft">
            <h><span class="golden-text">Partner </span><span class="normal-text">Kami</span> </h>
        </div>

        <div class="partner-container">

            <div class="logo hidden moveInLeft">
                <img src="{{ asset('assets/img/Pioneer Logo.jpeg') }}">
            </div>

            <div class="content hidden moveInRight">
                <p>Pioneer adalah inisiatif luar biasa yang memadukan kekuatan tiga organisasi yang berbeda, yakni HIMPRE
                    (Himpunan Mahasiswa Entrepreneur), BNCC (Bina Nusantara Computer Club), dan TFI (Teach For Indonesia),
                    di bawah payung Binus Malang. Dengan fokus pada kontribusi kepada masyarakat umum, Piooner muncul
                    sebagai kekuatan yang menginspirasi dalam memberikan dampak positif. Melalui sinergi antara
                    kewirausahaan, teknologi informasi, dan pendidikan, Piooner bertekad untuk menciptakan perubahan yang
                    signifikan dan berkelanjutan dalam masyarakat, menggalang inovasi, memberdayakan individu, dan membangun
                    komunitas yang inklusif. Dengan semangat kolaboratif dan visi yang jelas, Piooner menjadi contoh nyata
                    bagaimana kerjasama lintas disiplin dapat membawa perubahan yang berarti bagi kebaikan bersama.</p>
            </div>

        </div>


    </div>

    <div class="contact">

        <div class="contact-title">

            <h2>Lokasi Kami</h2>

        </div>

        <div class="box">


            <div class="address-box">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3950.6782125713476!2d112.79517571032201!3d-8.032074991961334!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd625c9cb6a871f%3A0xd00f2aee0c52cd22!2sDesa%20Wisata%20Wringinanom!5e0!3m2!1sen!2sid!4v1712902103432!5m2!1sen!2sid"
                    class="google-map" width="100%" height="100%" style="border:0;" allowfullscreen=""
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>

    </div>
@endsection

@section('script')
    <script src="{{ asset('js/HomepageScript.js') }}"></script>

    <script>
        //fixed-navbar check
        document.addEventListener('DOMContentLoaded', function() {
            const slideshow = document.querySelector('#Carousel');
            const navbar = document.querySelector('#navBar');

            // Define the height for the intersection area (adjust as needed)
            const intersectionHeight = '10px';

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        navbar.classList.remove('fixed');
                    } else {
                        navbar.classList.add('fixed');
                    }
                });
            }, {
                // Specify the margin for the intersection area
                rootMargin: `-${intersectionHeight} 0px -${intersectionHeight} 0px`
            });

            observer.observe(slideshow);
        });
    </script>


    <script>
        //animation
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                } else {
                    entry.target.classList.remove('show');
                }
            });
        });

        const hiddenElements = document.querySelectorAll('.hidden');
        hiddenElements.forEach((el) => observer.observe(el));
    </script>
@endsection
