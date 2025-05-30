@extends('admin.partial.base')
@section('title', 'Eccommerce')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">E-Commerce</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data E-Commerce</li>
        </ol>
        @if (@session('success'))
            <script>
                alert( "{{ session('success') }}" )
            </script>
        @endif
        <div class="mb-2 d-flex justify-content-end">
            @foreach ($categories as $category)
                <form class="me-2" action="{{ route('product.category', $category)}}" method="GET">
                    @csrf
                    <button class="btn btn-outline-warning">{{ $category->name }}</button>
                </form>
            @endforeach
        </div>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <div class="d-flex justify-content-start">
                    <a href="{{ route('product.create') }}" class="btn btn-outline-primary me-2">+ Tambah Data</a>
                </div>
                <div class="d-flex justify-content-end">

                    <form method="GET" action="{{route('product.search')}}">
                        @csrf
                        <div class="input-group">
                            <input class="form-control" type="search" placeholder="Cari" name="search">
                            <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $num = ($products->currentPage() - 1) * $products->perPage() + 1; @endphp
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $num++ }}</td>
                                <td>
                                    <img src="{{ $product->image ? asset('img/' . $product->image) : 'https://placehold.co/400/orange/white?text=Food' }}" alt="" style="width: 100px; height: 100px;">
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>
                                    <div class="button-container">
                                        <a href="{{ route('product.edit', $product) }}" class="btn btn-warning">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>

                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Modal{{$num}}">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                        <div class="modal fade" id="Modal{{$num}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5 justify-content-center" id="exampleModalLabel">Apakah {{$product->name}} ingin dihapus?</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-footer justify-content-center">
                                                  <form action="{{ route('product.delete', $product) }}" method="POST">
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
                        {{$products->onEachSide(1)->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
