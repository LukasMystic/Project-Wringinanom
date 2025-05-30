@extends('admin.partial.base')
@section('title', 'Archive')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4 mb-4">Tambah Archive</h1>
        <div class="card mb-4">
            <form id="archiveForm" action="{{ route('archive.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card-header d-flex justify-content-end">
                    <Button class="btn btn-primary" type="submit" id="submitButton">Simpan</Button>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <img id="previewImage" src="holder.js/300x200?text=Image">
                    </div>

                    <div class="mb-4">
                        <h4>File Gambar</h4>
                        <input id="fileInput" class="form-control {{ $errors->has('stone') ? ' border-danger' : '' }}" type="file" name="stone">
                        @error('stone')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <span id="sizeWarning" class="text-danger" style="display: none;">Ukuran file melebihi 40 MB</span>
                    </div>

                    <div class="mb-2">
                        <h4>Deskripsi</h4>
                        <textarea class="mySummernote" id="description" name="description"> {{ old('description') }}</textarea>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.8/holder.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".mySummernote").summernote({
                height: 300
            });
            $('.dropdown-toggle').dropdown();
        });

        const fileInput = document.getElementById('fileInput');
        const previewImage = document.getElementById('previewImage');
        const sizeWarning = document.getElementById('sizeWarning');
        const submitButton = document.getElementById('submitButton');

        fileInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                if (file.size > 40 * 1024 * 1024) {
                    sizeWarning.style.display = 'block';
                    submitButton.disabled = true;
                } else {
                    sizeWarning.style.display = 'none';
                    submitButton.disabled = false;
                    if (file.type.startsWith('image')) {
                        previewImage.src = URL.createObjectURL(file);
                    } else if (file.type.startsWith('video')) {
                        previewImage.src = '';
                        previewImage.poster = URL.createObjectURL(file);
                    }
                }
            }
        });
    </script>
@endsection
