@extends('admin.partial.base')
@section('title', 'Homepage News')
<style>

    img{
        width: 100%;
        aspect-ratio: 1/1;
        object-fit: cover;
        padding-top: 1em;
    }
    .big-header {
        text-align: center;
        font-size: 3em;
        margin-top: 30px;
    }
    .save-button-container {
        display: flex;
        justify-content: center;
        margin-top: 50px; /* Adjust the margin as needed */
    }
    @media only screen and (max-width:760px){
        .kartu{
            margin:auto;
        }
    }
    .cak{
        color:white;
    }
</style>

@section('content')
<div class="container-fluid px-3">
    <div class="row">
        <div class="col-md-12">
            <div class="big-header">
                Homepage News
            </div>
        </div>
    </div>
    @if (@session('notif'))
    <script>
        alert( "{{ session('notif') }}" )
    </script>
    @endif

    <form action="{{route('homepage.storeNews')}}" method="POST">
        @csrf
        <div class="row">
            @foreach ($news as $new)
                <div class="col-md-6 col-lg-2 my-4 cak">
                    <div class="card kartu"
                            style="max-width: 20rem; background-color:#14213D; padding-top:1em; height:30rem">
                        <input type="checkbox" class="card-checkbox" id="checkbox1"style="margin: auto; width:1.7em;height:1.7em" name="selectedNews[]" value="{{$new->id}}">
                        <img src="{{ $new->image ? asset('img/' . $new->image) : 'https://placehold.co/400/orange/white?text=Food' }}" class="card-img-top" alt="Image 1">
                        <div class="card-body"style="min-height: 10em">
                            <h5 class="card-title" style="color:white;"> {!! Str::limit($new->judul, 30) !!}</h5>
                            <p class="card-text" style="max-height: 4em; overflow: hidden; color:white;">  {!! Str::limit($new->description, 40) !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- Repeat for other cards -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="save-button-container">
                    <button class="btn btn-primary btn-lg">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
