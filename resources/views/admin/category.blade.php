@extends('admin.partial.base')
@section('title', 'Eccommerce')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Kategori</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data Kategori</li>
        </ol>
        @if (@session('success'))
        <script>
            alert( "{{ session('success') }}" )
        </script>
        @endif
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <div class="d-flex justify-content-start">
                    <a href="{{ route('product.create.category') }}" class="btn btn-outline-primary me-2">+ Tambah Kategori</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $num = ($categories->currentPage() - 1) * $categories->perPage() + 1; @endphp
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $num++ }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <div class="button-container">
                                        <a href="{{ route('product.edit.category', $category) }}" class="btn btn-warning">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>

                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Modal{{$num}}">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                        <div class="modal fade" id="Modal{{$num}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5 justify-content-center" id="exampleModalLabel">Apakah {{$category->name}} ingin dihapus?</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-footer justify-content-center">
                                                        <form action="{{ route('product.delete.category', $category) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">
                                                                Iya
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        {{$categories->onEachSide(1)->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
