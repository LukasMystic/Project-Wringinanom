@extends('admin.partial.base')
@section('title', 'Eccommerce')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4 mb-4">+ Tambah Kategori</h1>
        <div class="card mb-4">
            <form action="{{ route('product.store.category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-header d-flex justify-content-end">
                    <Button class="btn btn-primary">Simpan</Button>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h4 for="" class="form-h4">Kategori</h4>
                        <input type="text" class="form-control {{ $errors->has('category') ? ' border-danger' : '' }}" name="category" value="{{ old('name') }}">
                        @error('category')
                            <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
