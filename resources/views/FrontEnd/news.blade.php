@extends('FrontEnd.partial.base')
@section('title', 'News')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/news.css')}}">
     <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('assets/img/site.webmanifest') }}">
<link rel="mask-icon" href="{{ asset('assets/img/safari-pinned-tab.svg') }}" color="#5bbad5">
<link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}">
@endsection

@section('content')
    <div class="header" style="background-color: #1c1e53;">
        <div class="container">
            <div class="row align-items-center justify-content-center" style="margin-top: 30px;">
                <div class="col-md-6 text-left">

                        <h1>Catalog News</h1>

                </div>
                <div class="col-md-6" id="kol2">
                    <center>
                        <form id="example" action="{{ route('main.news.search') }}" method="GET">
                            @csrf
                            <input type="text" style="padding-left: 1em;" placeholder="Cari..." name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <!-- mycodegoeshere -->
    <div class="container py-5">
        <div class="row row-cols-1 row-cols-md-3 g-4 py-5">
            @php $num = 0 @endphp
            @foreach ($news as $new)
            <div class="col">
            @php $num++ @endphp
                    <div class="kartu">
                        <div class="card h-100" >
                        <img src="{{$new->image ? asset('img/' . $new->image) : 'https://placehold.co/400/orange/white?text=Food' }}" class="card-img-top" name="c-{{$num}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$new->judul}}</h5>
                            <div class="deskripsi" > {!! Str::limit($new->description, 50) !!} </div>
                            <center>
                            <a href=" {{route('main.news.artikel', $new)}}" class="tombol" style="text-decoration: none;"><img src="{{ asset('assets/img/tombol.png') }}"></a>
                            </center>
                        </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
@endsection

@section('script')
    <script>
    //side bar click interaction
    const burger = document.querySelector('.burger');
        const sidebar = document.querySelector('.sidebar');

        burger.onclick = function() {
            console.log("Burger clicked!");
            sidebar.classList.toggle('active');
            burger.classList.add('active');

        }

        document.onclick=function(e){
            if(!sidebar.contains(e.target) && !burger.contains(e.target)){
                sidebar.classList.remove('active');
                burger.classList.remove('active');
            }
        }
    </script>
@endsection
