@extends('FrontEnd.partial.base')
@section('title', 'Package')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/package-page-style.css') }}">
@endsection

@section('content')
    <!--Container Button Paket-->
    <div id="container_Button" style="padding-top: 80px">
        <form action="{{route('package_river.main')}}">
            <button id="category_Button_Tubing">Paket River Tubing</button>
        </form>
        <form action="{{route('package_adventure.main')}}">
            <button id="category_Button_Eksplorasi" class="active">Paket Eksplorasi</button>
        </form>
        <form action="{{route('package_education.main')}}">
            <button id="category_Button_Edukasi">Paket Edukasi</button>
        </form>
    </div>

    <!--Item-->
    <div class="item_semua">
        <button type="button" class="btn btn-lg" id="prev"> < </button>

        <!--Data Package 1-5-->
        @foreach ($adventures as $adventure)
            <div class="container" id="container_Image">
                <img src="{{$adventure->image ? asset('img/' . $adventure->image) : 'https://placehold.co/400/orange/white?text=Food'}}" class="img-fluid">
            </div>

            <div class="container" id="container_Info">
                <h4>{{$adventure->name}}</h4>
                <p id="harga">Harga(per orang): {{'Rp. '. number_format($adventure->price, 0, ',', '.')}}<p>
                <p id="orang">Minimal orang: {{$adventure->people . ' orang'}}<p>
                <div class="fasilitas">
                    {!! $adventure->description !!}
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
