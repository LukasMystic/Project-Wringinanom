@extends('FrontEnd.partial.base')
@section('title', ' E-Commerce')

    @section('css')
        <link rel ="stylesheet" href = "{{asset('css/e_commerce_style.css')}}">
     <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('assets/img/site.webmanifest') }}">
<link rel="mask-icon" href="{{ asset('assets/img/safari-pinned-tab.svg') }}" color="#5bbad5">
<link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}">
    @endsection

    @section('content')

        <!--HOMESCREEN-->
            <div id = "mainhead"></div>
            <div id="ceso" class="carousel slide carousel-fade" data-bs-ride="carousel">

                <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval = "3000">
                    <img src = "{{asset('assets/img/SlideShow/img-bg1.jpg')}}" height = "100%", width = "100%" style="object-fit: cover; aspect-ratio:16/9">
                    <div class="carousel-caption d-flex flex-column h-100 justify-content-center bottom-0" id="caption-container">
                        <h3 class="bg-opacity-10 p-2" id="caption-top">Belanja Di</h3>
                        <h1 class="bg-opacity-10 p-2" id="caption-mid">Dewi Anom</h1>
                        <h3 class="bg-opacity-10 p-2" id="caption-bot">Desa Wisata Wringinanom</h3>
                    </div>
                </div>
                    <div class="carousel-item" data-bs-interval = "3000">
                    <img src = "{{asset('assets/img/SlideShow/img-bg2.jpg')}}" height = "100%", width = "100%" style="object-fit: cover; aspect-ratio:16/9">
                    <div class="carousel-caption d-flex flex-column h-100 justify-content-center bottom-0" id="caption-container">
                        <h3 class="bg-opacity-10 p-2" id="caption-top">Belanja Di</h3>
                        <h1 class="bg-opacity-10 p-2" id="caption-mid">Dewi Anom</h1>
                        <h3 class="bg-opacity-10 p-2" id="caption-bot">Desa Wisata Wringinanom</h3>
                    </div>
                    </div>

                    <div class="carousel-item" data-bs-interval = "3000">
                    <img src = "{{asset('assets/img/SlideShow/img-bg3.JPG')}}" height = "100%", width = "100%" style="object-fit: cover; aspect-ratio:16/9">
                    <div class="carousel-caption d-flex flex-column h-100 justify-content-center bottom-0" id="caption-container">
                        <h3 class="bg-opacity-10 p-2" id="caption-top">Belanja Di</h3>
                        <h1 class="bg-opacity-10 p-2" id="caption-mid">Dewi Anom</h1>
                        <h3 class="bg-opacity-10 p-2" id="caption-bot">Desa Wisata Wringinanom</h3>
                    </div>
                    </div>
                </div>
                </div>
            </div>



        <!--MENU SECTION (OUR PRODUCTS) untuk kategori pertama-->
    <section id = "firstMenu">
        <div class = "container-fluid py-3" id = "prohead">
            <h1 class = "display-1 fw-bolder text-center">PRODUK KAMI</h1>
        </div>

        <div class="search-bar mt-5">
          <form class="d-flex" method="GET" action="{{ route('main.ecommerce.search') }}">
            @csrf
            <input class="form-control mx-2" type="text" placeholder="Cari barangmu di sini..." aria-label="Search" name="search">
            <button class="btn" type="submit" id="sebut">
              <span class="d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                </svg>
              </span>
            </button>
          </form>
        </div>

        @php $productIndex = 0 @endphp
        @foreach ($categories as $category)

            <div class = "container mt-5 mb-3 text-center" id="cat1">
                <h1 class = "display-5 fw-bold"> {{$category->name}} Catalogue</h1>
            </div>

            <div class = "container-lg align-items-center" style="margin-top: 3%; margin-bottom: 5%;" id="eta1">
                <div class = "row flex-nowrap overflow-x-auto gx-2">
                    @foreach ($category->products as $product)

                        @php $productIndex++; @endphp

                        <div class="col-4 product-card">
                            <div class="card border-warning text-center">
                                <img src="{{ $product->image ? asset('img/' . $product->image) : 'https://placehold.co/400/orange/white?text=Food' }}" class="card-img-top centered-image" style="max-height: 200px; object-fit:cover; aspect-ratio: 2/3">
                                <div class="card-body" style="min-height:200px; max-height:300px; overflow:hidden">
                                    <ul class="list-group" >
                                        <li class="list-group-item" style="border: none;">
                                            <h5 class="card-title">{{$product->name}}</h5>
                                        </li>
                                        <li class="list-group-item" style="border: none;">
                                            <p class="card-text"> {{ 'Rp. '. number_format($product->price, 0, ',', '.') }} </p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer" style="border: none;background-color: var(--bs-card-color);padding-bottom: 15px;">
                                    <a class="btn" id ="ebut" data-bs-toggle="modal" data-bs-target ="#MC{{$productIndex}}">Details</a>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="MC{{$productIndex}}" tabindex="-1" data-bs-backdrop="static" aria-hidden="true" data-bs-keyboard="false">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{$product->name}}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ $product->image ? asset('img/' . $product->image) : 'https://placehold.co/400/orange/white?text=Food' }}" class="centered-image" style="width: 80%; object-fit: cover;">
                                        <!-- Product Description -->
                                        <div class="mt-3">
                                            <h5 style="text-align: center; font-weight:600">{{$product->name}}</h5>
                                            {!! $product->description !!}
                                        </div>
                                    </div>

                                    <div class="modal-footer justify-content-center">
                                        <!-- Calculate the total count of products in previous categories -->
                                        @php
                                            $previousProductCount = 0;
                                            foreach ($categories as $index => $prevCategory) {
                                                if ($prevCategory->id !== $category->id) {
                                                    $previousProductCount += count($prevCategory->products);
                                                } else {
                                                    break; // Stop counting when we reach the current category
                                                }
                                            }
                                            // Calculate the index of the first product in the current category
                                            $firstProductIndex = $previousProductCount + 1;
                                            // Check if the current product is the first product in its category
                                            $isFirstProduct = $productIndex === $firstProductIndex;
                                        @endphp

                                        <!-- Display the previous button if the current product is not the first product -->
                                        @if ($productIndex > 1 && !$isFirstProduct)
                                            <button class="btn pb-2" data-bs-target="#MC{{ $productIndex - 1 }}" data-bs-toggle="modal" data-bs-dismiss="modal" id="magicButton">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                                                </svg>
                                            </button>
                                        @endif

                                        <!-- Buy Now button -->
                                        <a href="{{route('contact.main')}}#kontak" class="btn" id="magicButton">Beli</a>


                                        <!-- Display the next button if the current product is not the last product -->
                                        @if ($productIndex < count($category->products) + $previousProductCount)
                                            <button class="btn pb-2" data-bs-target="#MC{{ $productIndex + 1 }}" data-bs-toggle="modal" data-bs-dismiss="modal" id="magicButton">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                                                </svg>
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

    </section>
    @endsection

@section('script')
    <script src="{{asset('js/e_commerce_js.js')}}"></script>

    <script>
        //fixed-navbar check
        document.addEventListener('DOMContentLoaded', function() {
            const slideshow = document.querySelector('#ceso');
            const navbar = document.querySelector('.nav-bar');

            // Define the height for the intersection area (adjust as needed)
            const intersectionHeight = '450px';

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        navbar.classList.remove('active');
                    } else {
                        navbar.classList.add('active');
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
        function adjustCardClasses() {
            var productCards = document.querySelectorAll('.product-card');
            productCards.forEach(function(card) {
                if (window.innerWidth >= 700) { // 992px is a common breakpoint for large screens
                    card.classList.remove('col-12');
                    card.classList.add('col-4');
                } else {
                    card.classList.remove('col-4');
                    card.classList.add('col-12');
                }
            });
        }

        // Run on page load
        adjustCardClasses();

        // Run on window resize
        window.onresize = adjustCardClasses;

</script>

@endsection
