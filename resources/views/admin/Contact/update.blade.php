@extends('admin.partial.base')
@section('title', 'Contact')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4 mb-4">Edit Contact</h1>
        @if (@session('success'))
        <script>
            alert( "{{ session('success') }}" )
        </script>
        @endif
        <div class="card mb-4">
            <form action="{{ route('contact.update', $contact) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card-header d-flex justify-content-end">
                    <Button class="btn btn-primary" type="submit">Simpan</Button>
                </div>
                <div class="card-body">

                    <div class="mb-4">
                        <h4>Tautan Whatsapp</h4>
                        <input type="text" class="form-control {{ $errors->has('whatsapp') ? ' border-danger' : '' }}" name="whatsapp" value="{{$contact->whatsapp}}">
                        @error('whatsapp')
                            <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <h4>Tautan Instagram</h4>
                        <input type="text" class="form-control {{ $errors->has('instagram') ? ' border-danger' : '' }}" name="instagram" value="{{$contact->instagram}}">
                        @error('instagram')
                            <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <h4>Tautan Facebook</h4>
                        <input type="text" class="form-control {{ $errors->has('facebook') ? ' border-danger' : '' }}" name="facebook" value="{{$contact->facebook}}">
                        @error('facebook')
                            <span class="text-danger"> {{$facebook}} </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <h4> Tautan Tiktok</h4>
                        <input type="text" class="form-control {{ $errors->has('tiktok') ? ' border-danger' : '' }}" name="tiktok" value="{{$contact->tiktok}}">
                        @error('tiktok')
                            <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <h4>Deskripsi</h4>
                        <textarea class="mySummernote" id="description" name="description"> {{$contact->description}}</textarea>
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
