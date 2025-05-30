@extends('FrontEnd.partial.base')
@section('title', 'Archive')


@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('css/archive.css')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tangerine:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
     <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('assets/img/site.webmanifest') }}">
<link rel="mask-icon" href="{{ asset('assets/img/safari-pinned-tab.svg') }}" color="#5bbad5">
<link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}">
@endsection

@section('content')
    <!-- header -->
    <section class="text-center p-2" style="margin-top: 130px;">
        <div class="container d-flex justify-content-center">
            <div id="header-title">
                <p class="rounded-pill" style="background-color: #14213d; font-family: 'Italianno">Archive</p>
            </div>
        </div>
    </section>

    @if ($archives->currentPage() == 1)
        <!-- content -->
        <section class="py-4">
            <div class="container px-5">
                <div class="d-flex align-items-center justify-content-center flex-column flex-lg-row">
                    <img class="img-fluid p-3" style="width: 450px; aspect-ratio:16/9; object-fit:cover;" src="{{ ($firstImage->stone) ? asset('img/' . $firstImage->stone) : 'https://placehold.co/450x350/orange/white?text=Food'}}" alt="header">

                    <div>
                        <p class="lead" id="content-photo-caption" style ="font-weight:300">{!!$firstImage->description!!}</p>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-center flex-column flex-lg-row pt-3">
                    <video class="img-fluid p-3" style="width: 450px; aspect-ratio:16/9; object-fit:cover;" src="{{ asset('videos/' . $firstVideo->stone)}}" poster="{{ ($firstVideo->gambar) ? asset('img/' . $firstVideo->gambar) : 'https://placehold.co/450x350/orange/white?text=Food'}}" loop preload="auto" controls></video>

                    <div>
                        <p class="lead" id="content-photo-caption" style = "font-wight:400">{!!$firstVideo->description!!}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- divider -->
        <section>
            <hr class="border border-warning border-5 p-3 opacity-100 m-0" id="divider1"/>
            <hr class="border border-success border-5 p-3 opacity-100 m-0" id="divider2"/>
        </section>
    @endif


    <!-- grid -->
    <section class="pt-5 pb-1">
        <div class="container text-center grid-container">
            <div class="container-vertical-grid">
                @php $num = 0 @endphp
                @foreach ($archives as $archive)
                    @php $num++ @endphp

                    @if ($archive->type === 'image')
                        <img src="{{asset('img/' . $archive->stone)}}" class="image-button mx-1 my-1" alt="image1" data-bs-toggle="modal" data-bs-target="#modal{{$num}}">
                    @elseif ($archive->type === 'video')
                        <span class="thumbnail-container mx-1 my-1" data-bs-toggle="modal" data-bs-target="#modal{{$num}}">
                            <img src="{{ $archive->gambar ? asset('img/' . $archive->gambar) : 'https://placehold.co/270/orange/white?text=Food' }}" class="image-button" alt="video1" data-bs-toggle="modal" data-bs-target="#modal{{$num}}">
                            <i class="bi bi-play-circle-fill video-icon"></i>
                        </span>
                    @endif
                    <!-- Modal -->
                    <section>
                        <div class="modal fade" id="modal{{$num}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body justify-content-center" style="width:100%">

                                        @if ($archive->type === 'image')
                                            <img src="{{ $archive->stone ? asset('img/' . $archive->stone) : 'https://placehold.co/270/orange/white?text=Food' }}" alt="image1" class="image-popup" style="width: 100%; object-fit:cover;">
                                        @elseif ($archive->type === 'video')
                                            <video src="{{ $archive->stone ? asset('videos/' . $archive->stone) : 'https://placehold.co/270/orange/white?text=Food' }}" class="video-popup"controls preload="auto" style="width: 100%; height:100%; "></video>
                                        @endif
                                        <br>
                                        <br>
                                        {!! $archive->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endforeach
            </div>
        </div>
    </section>


<!-- page -->
<section class="py-2">
    <div class="container text-center">
        <div class="pagination-wrapper">
            <div class="pagination">
                {{-- Previous Page Link --}}
                @if ($archives->onFirstPage())
                    <a class="prev page-numbers disabled">Prev</a>
                @else
                    <a class="prev page-numbers" href="{{ $archives->previousPageUrl() }}">Prev</a>
                @endif

                {{-- Pagination Elements --}}
                @for ($i = 1; $i <= $archives->lastPage(); $i++)
                    @if ($i == $archives->currentPage())
                        <span aria-current="page" class="page-numbers current">{{ $i }}</span>
                    @else
                        <a class="page-numbers" href="{{ $archives->url($i) }}">{{ $i }}</a>
                    @endif
                @endfor

                {{-- Next Page Link --}}
                @if ($archives->hasMorePages())
                    <a class="next page-numbers" href="{{ $archives->nextPageUrl() }}">Next</a>
                @else
                    <a class="next page-numbers disabled">Next</a>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection
