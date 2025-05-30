@extends('admin.partial.base')
@section('title', 'Eccommerce')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4 mb-4">Edit News</h1>
        <div class="card mb-4">
            <form action="{{ route('news.update', $news) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card-header d-flex justify-content-end">
                    <Button class="btn btn-primary" type="submit">Simpan</Button>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <img id="previewImage" src="{{ $news->image ? asset('img/' . $news->image) : 'https://placehold.co/300/orange/white?text=Food' }}" style="width: 30%; height: 30%;">
                    </div>

                    <div class="mb-4">
                        <h4>Gambar</h4>
                        <input id="imageInput" class="form-control {{ $errors->has('image') ? ' border-danger' : '' }}" type="file" name="image">
                        @error('image')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <h4>Judul</h4>
                        <input type="text" class="form-control {{ $errors->has('judul') ? ' border-danger' : '' }}" name="judul" value="{{$news->judul}}">
                        @error('judul')
                            <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <h4 class="form-h4">Penulis</h4>

                        <input type="text" class="form-control {{ $errors->has('penulis') ? ' border-danger' : '' }}" name="penulis" value="{{ $news->penulis }}">
                        @error('penulis')
                            <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <h4>Deskripsi</h4>
                        <textarea class="mySummernote" id="description" name="description"> {{$news->description}}</textarea>
                        @error('description')
                            <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".mySummernote").summernote({
                height: 300
            });
            $('.dropdown-toggle').dropdown();
        });
    </script>

    <script>
        const imageInput = document.getElementById('imageInput');
        const previewImage = document.getElementById('previewImage');

        imageInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    previewImage.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
