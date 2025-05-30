@extends('FrontEnd.partial.base')
@section('title', 'News')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/artikel.css')}}">
     <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('assets/img/site.webmanifest') }}">
<link rel="mask-icon" href="{{ asset('assets/img/safari-pinned-tab.svg') }}" color="#5bbad5">
<link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}">
@endsection

@section('content')
    <div class="judulBesar" style="padding-top: 120px">
        <br>
        <CENTER>
            <img src="{{asset('assets/img/Judul.png')}}" style="width: 30vw; min-width: 200px;">
        </CENTER>
        <br><br><br>
    </div>
    <center>
        <div class="artikel">
            <div class="gambar">
                <center>
                    <img src="{{$news->image ? asset('img/' . $news->image) : 'https://placehold.co/400/orange/white?text=Food' }}">
                </center>
            </div>
            <div class="judulGambar" style="margin-top: 10px; z-index: 0;">
                <h1>{{$news->judul}}</h1><b>
                    <p class="meta-info">{{\Carbon\Carbon::parse($news->tanggal)->format('F d, Y')}} | Oleh: {{$news->penulis}}</p>
                </b>
            </div>
            <div class="teks">
                <section>
                    <p>
                        {!! $news->description !!}
                    </p>
                </section>
            </div>
        </div>
    </center>


@endsection
