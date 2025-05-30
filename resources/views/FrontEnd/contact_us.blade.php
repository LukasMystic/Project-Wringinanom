@extends('FrontEnd.partial.base')
@section('title', 'About Us')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/caStyle.css') }}">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
     <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('assets/img/site.webmanifest') }}">
<link rel="mask-icon" href="{{ asset('assets/img/safari-pinned-tab.svg') }}" color="#5bbad5">
<link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}">
@endsection

@section('content')
    <div id="backdrop" class="carousel slide" data-bs-ride="carousel" style="margin-top:90px;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#backdrop" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#backdrop" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#backdrop" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="2000">
                <img src="{{asset('assets/img/OffRoad.jpg')}}" width="100%" height="100%" style="aspect-ratio:16/9; object-fit:cover">
                <div class="container">
                    <div class="carousel-caption text-start fonter">
                        <h5>Menyelami Keindahan Alam Tersembunyi</h5>
                        <p>Temukan Keunikan Desa Wisata Wringianom yang Memikat</p>
                    </div>
                </div>
            </div>

            <div class="carousel-item" data-bs-interval="2000">
                <img src="{{asset('assets/img/RiverTubing2.jpg')}}" width="100%" height="100%" style="aspect-ratio:16/9; object-fit:cover">
                <div class="container">
                    <div class="carousel-caption fonter">
                        <h5>Mengungkap Warisan Budaya yang Memukau</h5>
                        <p>Tersembunyi di Desa Wisata Wringianom: Perjalanan Sejarah dan Budaya</p>
                    </div>
                </div>
            </div>

            <div class="carousel-item" data-bs-interval="2000">
                <img src="{{asset('assets/img/RiverTubing.jpg')}}" width="100%" height="100%" style="aspect-ratio:16/9; object-fit:cover">
                <div class="container">
                    <div class="carousel-caption text-end fonter">
                        <h5>Menyegarkan Jiwa di Destinasi Tersembunyi</h5>
                        <p>Temukan Oase Ketenangan di Desa Wisata Wringianom</p>
                    </div>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#backdrop" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#backdrop" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

            <div class="container-fluid">
                <div class="row my-5 mx-5">
                    <div class="col-md-2 align-content-center">
                        <div class="logo">
                            <img src="{{ asset('assets/img/DewiAnom2.jpg') }}" class="mx-auto d-block">
                        </div>
                    </div>
                    <div class="col-md-8 p-1">
                        <div class="title">
                            <h1 class="text-left mb-2">Tentang Kami</h1>
                            <h3 class="text-left mb-4">Desa Wisata Wringianom</h3>
                            <p>{!! $contacts->description !!}</p>
                            <style>
                                .title ul,
                                .title li,
                                .title ol {
                                    font-family:"Montserrat";
                                    font-size: 1.1em;
                                     font-weight: 400;
                                }
                            </style>
                        </div>
                    </div>
                </div>

                <div class="bg" >

                    <div class="parent" id="hexa1">
                        <div class="container-hex" onclick="changeText('mountain');">
                            <div class="hexagon align-content-center text-center">
                                <img src="{{ asset('assets/img/icon/mountains.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="parent" id="hexa2">
                        <div class="container-hex" onclick="changeText('shoe');" id="target">
                            <div class="hexagon align-content-center text-center">
                                <img src="{{ asset('assets/img/icon/spatu.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="parent" id="hexa3">
                        <div class="container-hex" onclick="changeText('wheat');">
                            <div class="hexagon align-content-center text-center">
                                <img src="{{ asset('assets/img/icon/wheat.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="caption" id="middleText">
                        <h5> Selamat datang di Wringianom  </h5>
                        <p> klik pada icon yang tersedia</p>
                    </div>
                    <div class="parent" id="hexa4">
                        <div class="container-hex" onclick="changeText('paintbrush'), scrollToAnchor()">
                            <div class="hexagon align-content-center text-center">
                                <img src="{{ asset('assets/img/icon/brush.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="parent" id="hexa5">
                        <div class="container-hex" onclick="changeText('hiking'), scrollToAnchor()">
                            <div class="hexagon align-content-center text-center">
                                <img src="{{ asset('assets/img/icon/hiking.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="parent" id="hexa6">
                        <div class="container-hex" onclick="changeText('utensils'), scrollToAnchor()">
                            <div class="hexagon align-content-center text-center">
                                <img src="{{ asset('assets/img/icon/uten.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <style>
                        .hexagon.align-content-center.text-center.active{
    background-color: #4f42b5 ;
}
                    </style>
                </div>

            </div>


    <div class="container-testimonial">
        <div class="testiomonial-title text-center m-5">
            <h1>From our Customer</h1>
        </div>
        <div id="testimonialCarousel" class="carousel">
            <div class="carousel-inner">
                <!-- *note: baru gambaran kasar -->
                @foreach ($testimonies as $testimony)
                   <div class="carousel-item {{$loop->first ? 'active' : ' '}}">
                        <div class="card shadow-sm rounded-3 p-2 m-3">
                            <div class="card-body d-flex flex-column align-items-center text-center">

                                <div class="img-wrapper">
                                    <img src="{{$testimony->image ? asset('img/' . $testimony->image) : 'https://placehold.co/400/orange/white?text=Food'}}" style="object-fit: cover; aspect-ratio:1/1;">
                                </div>

                                <h5>{{$testimony->name}}</h5>
                                <div class="text-justify tinggikartu" style="font-family:'Montserrat'">{!! $testimony->description !!}</div>
                                <style>
                                    .tinggikartu {
                                        height:350px;
                                    }
                                    @media screen and (min-width:1300px) and (max-width: 1440px) {
                                        .tinggikartu {
                                            height:450px;
                                        }
                                    }
                                    @media screen and  (min-width:1200px) and (max-width: 1300px) {
                                        .tinggikartu {
                                            height:600px;
                                        }
                                    }
                                    @media screen and  (min-width:1024px) and (max-width: 1200px) {
                                        .tinggikartu {
                                            height:700px;
                                        }
                                    }
                                    @media screen and  (min-width:900px) and (max-width: 1023px) {
                                        .tinggikartu {
                                            height:500px;
                                        }
                                    }
                                    @media screen and  (min-width:700px) and (max-width: 900px) {
                                        .tinggikartu {
                                            height:600px;
                                        }
                                    }
                                    @media screen and  (min-width:577px) and (max-width: 700px) {
                                        .tinggikartu {
                                            height:750px;
                                        }
                                    }
                                    @media screen and  (min-width:425px) and (max-width: 577px) {
                                        .tinggikartu {
                                            height:580px;
                                        }
                                    }
                                    @media screen and  (min-width:375px) and (max-width: 425px) {
                                        .tinggikartu {
                                            height:630px;
                                        }
                                    }
                                    @media screen and  (max-width:375px)  {
                                        .tinggikartu {
                                            height:750px;
                                        }
                                    }
                                </style>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container-contact-us" id="kontak">
        <div class="title text-center">
            <h1>Contact Us</h1>
        </div>
        <div class="title mb-0 text-center"><h5>Hubungi Kontak dibawah untuk Pemesanan dan Pembelian</h5></div>
            <div class="container my-5">
                <div class="row align-items-center justify-content-center" id="thio">
                    <div class="col-6 align-item-center justify-content-center" id="kuda">
                        <div class="contact-person" id="mirekel">
                            <img src="{{asset('assets/img/DewiAnom2.jpg')}}"  class="mx-auto d-block">
                        </div>
                    </div>

                    <div class="col-6" id="lumping">
                        <!-- Batas jumlah sosial media adalah 6 -->
                        <div class="col-12 d-flex flex-row align-items-center my-3">
                            <div class="icon">
                                <a href="{{$contacts->whatsapp}}" target="_blank" class="clickable-cell">
                                    <img src="{{asset('assets/img/Whatsapp.jpg')}}" alt="" style="width: 60px; height:60px" >
                                    <!-- <i class="fa-brands fa-whatsapp" style="font-size: 60px;" id="wai"></i> -->
                                </a>
                            </div>
                            <div class="deskrip text-center px-3 align-content-center pt-3 h6">
                                <a href="{{$contacts->whatsapp}}" target="_blank" class="clickable-cell">
                                <p>Contact Us Personally</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-12 d-flex flex-row align-items-center my-3">
                            <div class="icon">
                                <a href="{{$contacts->instagram}}" target="_blank" class="clickable-cell">
                                    <img src="{{asset('assets/img/Instagram.jpg')}}" alt="" style="width: 60px; height:60px">
                                </a>
                            </div>
                            <div class="deskrip text-center px-3 align-content-center pt-3 h6">
                                <a href="{{$contacts->instagram}}" target="_blank" class="clickable-cell">
                                <p>Follow Our Instagram</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-12 d-flex flex-row align-content-center my-3">
                            <div class="icon">
                                <a href="{{$contacts->facebook}}" target="_blank" class="clickable-cell">
                                <img src="{{asset('assets/img/Facebook.jpg')}}" alt="" style="width: 60px; height:60px">
                                </a>
                            </div>
                            <div class="deskrip text-center px-3 align-content-center pt-3 h6">
                                <a href="{{$contacts->facebook}}" target="_blank" class="clickable-cell">
                                <p>Follow Our Facebook</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-12 d-flex flex-row align-content-center my-3">
                            <div class="icon">
                                <a href="{{$contacts->tiktok}}" target="_blank" class="clickable-cell">
                                <img src="{{asset('assets/img/Tiktok.jpg')}}" alt="" style="width: 60px; height:60px">
                                </a>
                            </div>
                            <div class="deskrip text-center px-3 align-content-center pt-3 h6">
                                <a href="{{$contacts->tiktok}}" target="_blank" class="clickable-cell">
                                <p>Follow Our Tik Tok</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script src="https://kit.fontawesome.com/43c9ab6ad0.js" crossorigin="anonymous"></script>

    <script>

        function changeText(icon) {
            // Replace the text based on the clicked icon
            var text = "";
            switch (icon) {
                case 'mountain':
                    text = "Pesona Alam yang Memukau";
                    break;
                case 'shoe':
                    text = "Kehidupan Budaya Autentik";
                    break;
                case 'wheat':
                    text = "Pengalaman Pertanian yang Menyenangkan";
                    break;
                case 'paintbrush':
                    text = "Kreativitas dan Seni Tradisional";
                    break;
                case 'hiking':
                    text = "Petualangan Alam yang Seru";
                    break;
                case 'utensils':
                    text = "Kuliner Tradisional yang Menggugah Selera";
                    break;
                default:
                    text = "Apa yang membuat kita berbeda?";
            }
            document.getElementById("middleText").innerHTML = "<h4>" + text + "</h4>";

        }

        document.addEventListener("DOMContentLoaded", function() {
            const divs = document.querySelectorAll('.container-hex .hexagon');

            divs.forEach(div => {
                div.addEventListener('click', function() {
                    // Remove 'active' class from all divs
                    divs.forEach(d => d.classList.remove('active'));

                    // Add 'active' class to the clicked div
                    this.classList.add('active');
                });

                div.addEventListener('touchstart', function() {
                    // Remove 'active' class from all divs
                    divs.forEach(d => d.classList.remove('active'));
                    // Add 'active' class to the clicked div
                    this.classList.add('active');
                });
            });
        });
    </script>

<script>
        const multipleItemCarousel = document.querySelector("#testimonialCarousel");

        if (window.matchMedia("(min-width:576px)").matches) {
            const carousel = new bootstrap.Carousel(multipleItemCarousel, {
                interval: false,
            });

            const carouselInner = document.querySelector("#testimonialCarousel .carousel-inner");

            const carouselWidth = carouselInner.scrollWidth;
            const cardWidth = document.querySelector("#testimonialCarousel .carousel-item").offsetWidth;
            const visibleCarouselWidth = multipleItemCarousel.offsetWidth;
            const visibleCards = Math.floor(visibleCarouselWidth / cardWidth);

            let scrollPosition = 0;

            document.querySelector("#testimonialCarousel .carousel-control-next").addEventListener("click", function () {
                if (scrollPosition/cardWidth < carouselWidth/cardWidth - visibleCards) {
                    scrollPosition += cardWidth;
                }
                else {
                    scrollPosition = 0;
                }

                carouselInner.scrollTo({
                    left: scrollPosition,
                    behavior: "smooth"
                });


            });

            document.querySelector("#testimonialCarousel .carousel-control-prev").addEventListener("click", function () {
                if (scrollPosition/cardWidth > 0) {
                    scrollPosition -= cardWidth;
                }
                else {
                    scrollPosition = carouselWidth - cardWidth * visibleCards;
                }

                carouselInner.scrollTo({
                        left: scrollPosition,
                        behavior: "smooth"
                    });
            });

        } else {
            multipleItemCarousel.classList.add("slide");
        }

    </script>


    <script>
        //event listener for button
        document.addEventListener('DOMContentLoaded', function() {
            var pageTitle = document.title; // Get the title of the webpage

            var buttons = document.querySelectorAll('.btn.nav');

            buttons.forEach(function(button) {
                // Extract button text content and remove leading/trailing whitespace
                var buttonText = button.textContent.trim();

                // Compare page title with button text content
                if (buttonText === pageTitle) {
                    button.classList.add('active'); // Add active class to button whose text matches page title
                }

            });
        });
    </script>


    <script>
        // <!-- Script to handle scrolling -->
        function scrollToAnchor() {
            // Get the viewport dimensions
            const viewportWidth = window.innerWidth;

            // Check if viewport width is under 789 pixels
            if (viewportWidth < 701) {
                // Get the target element by its ID
                const targetElement = document.getElementById('target');

                // Scroll to the target element
                targetElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
            } else {
                console.log('Viewport width is greater than or equal to 789 pixels. Scroll not triggered.');
            }
        }
    </script>



@endsection
