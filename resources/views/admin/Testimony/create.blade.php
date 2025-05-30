@extends('admin.partial.base')
@section('title', 'Testimony')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4 mb-4">Tambah Testimoni</h1>
        <div class="card mb-4">
            <form action="{{ route('testimony.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card-header d-flex justify-content-end">
                    <Button class="btn btn-primary">Simpan</Button>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <img id="previewImage" src="holder.js/300x200?text=Image">
                    </div>

                    <div class="mb-4">
                        <h4>Gambar</h4>
                        <input id="imageInput" class="form-control {{ $errors->has('image') ? ' border-danger' : '' }}" type="file" name="image">
                        @error('image')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <h4 class="form-h4">Nama</h4>
                        <input type="text" class="form-control {{ $errors->has('name') ? ' border-danger' : '' }}" name="name" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>


                    <div class="mb-2">
                        <h4>Deskripsi</h4>
                        <textarea class="mySummernote" id="description" name="description"> {{old('description')}}</textarea>
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

    {{-- SummerNote --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.8/holder.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".mySummernote").summernote({
                height: 300
            });
            $('.dropdown-toggle').dropdown();
        });
    </script>

    {{-- PreviewImage --}}
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
