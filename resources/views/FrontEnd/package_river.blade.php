@extends('FrontEnd.partial.base')
@section('title', 'Package')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/package-page-style.css') }}">
 <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('assets/img/site.webmanifest') }}">
<link rel="mask-icon" href="{{ asset('assets/img/safari-pinned-tab.svg') }}" color="#5bbad5">
<link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}">
@endsection

@section('content')
    <!--Container Button Paket-->
    <div id="container_Button" style="padding-top: 80px">
        <form action="{{route('package_river.main')}}">
            <button id="category_Button_Tubing" class="active">Paket River Tubing</button>
        </form>
        <form action="{{route('package_adventure.main')}}">
            <button id="category_Button_Eksplorasi">Paket Eksplorasi</button>
        </form>
        <form action="{{route('package_education.main')}}">
            <button id="category_Button_Edukasi">Paket Edukasi</button>
        </form>
    </div>

    <!--Item-->
    <div class="item_semua">
        <button type="button" class="btn btn-lg" id="prev"> < </button>

        <!--Data Package 1-5-->
        @foreach ($rivers as $river)
            <div class="container" id="container_Image">
                <img src="{{$river->image ? asset('img/' . $river->image) : 'https://placehold.co/400/orange/white?text=Food'}}" class="img-fluid">
            </div>

            <div class="container" id="container_Info">
                <h4>{{$river->name}}</h4>
                <p id="harga"> Harga(per orang): {{'Rp. '. number_format($river->price, 0, ',', '.')}}</p>
                <p id="orang"> Minimal orang: {{$river->people . ' orang'}}</p>
                <div class="fasilitas">
                    <p>
                        {!!$river->description!!}
                    </p>
                </div>

                <div class="container_Purchase">
                    <a href="{{route('contact.main')}}#kontak" class="btn btn-lg" id="purchase_Button">Beli Sekarang!</a>
                </div>
            </div>
        @endforeach

        <button type="button" class="btn btn-lg" id="next"> > </button>
    </div>
@endsection

@section('script')
    {{-- <script src="{{ asset('js/package-page-script.js') }}"></script> --}}
    <script>
        const items_Picture = document.querySelectorAll('.item_semua #container_Image');
        const items_Desc = document.querySelectorAll('.item_semua #container_Info');

        let active = 0;
        let batas_atas = {{$count}} - 1;
        let batas_bawah = 0;

        // Function LoadShow
        function loadShow() {
            items_Picture.forEach(image => image.style.display = 'none');
            items_Desc.forEach(info => info.style.display = 'none');

            items_Picture[active].style.display = 'block';
            items_Desc[active].style.display = 'block';
        }
        loadShow();

        // Button Next-Prev
        const nextBtn = document.getElementById('next');
        const prevBtn = document.getElementById('prev');

        // Event listeners for next and previous buttons
        nextBtn.addEventListener('click', () => {
            active = (active === batas_atas) ? batas_bawah : active + 1;
            loadShow();
        });

        prevBtn.addEventListener('click', () => {
            active = (active === batas_bawah) ? batas_atas : active - 1;
            loadShow();
        });

        /*
        Total slide ada 15;
        Paket River Tubing = 6 slide
        Paket Adventure    = 5 slide
        Paket Edukasi      = 4 slide
        */
        // const button1 = document.getElementById('category_Button_Tubing');
        // const button2 = document.getElementById('category_Button_Eksplorasi');
        // const button3 = document.getElementById('category_Button_Edukasi');
        // const button4 = document.querySelectorAll('#container_Button button');

        // //Untuk nentuin batas atas + batas bawah tiap paket
        // // button1 = Paket River Tubing
        // button1.onclick = function () {
        //     active = 0;
        //     batas_atas = 5;
        //     batas_bawah = 0;
        //     loadShow();
        // };

        // // button2 = Paket Eksplorasi
        // button2.onclick = function () {
        //     active = 6;
        //     batas_atas = 10;
        //     batas_bawah = 6;
        //     loadShow();
        // };

        // // button3 = Paket Edukasi
        // button3.onclick = function () {
        //     active = 11;
        //     batas_atas = 14;
        //     batas_bawah = 11;
        //     loadShow();
        // };

        // button4 = Purchase
        button4.forEach(button => {
            button.addEventListener('click', function() {
                button4.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
            });
            //tolong di routing
            // window.location.href = 'contact_us.php';
        });
    </script>
@endsection
