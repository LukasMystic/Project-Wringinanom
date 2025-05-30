@extends('admin.partial.base')
@section('title', 'River')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">River Tubing Package</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data Paket</li>
        </ol>
        @if (@session('success'))
        <script>
            alert( "{{ session('success') }}" )
        </script>
        @endif
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <a href="{{ route('river.create') }}" class="btn btn-outline-primary btn-lg">  + Tambah Data </a>

                <form class="d-flex" method="GET" action="{{ route('river.search') }}">
                    @csrf
                    <input class="form-control me-2" type="search" placeholder="Cari" name="search">
                    <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>


            <div class="card-body">
                <div class="container-fluid mb-4">
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $num = ($river->currentPage() - 1) * $river->perPage() + 1; @endphp
                        @foreach ($river as $riv)
                        <tr>
                            <td>{{ $num++ }}</td>
                            <td>
                                <img src="{{ $riv->image ? asset('img/' . $riv->image) : 'https://placehold.co/400/orange/white?text=Food' }}" style="width:100px; height:100px">
                            </td>
                            <td>{{ $riv->name }}</td>
                            <td>
                                <div class="button-container">
                                    <a href="{{ route('river.edit', $riv) }}" class="btn btn-warning">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Modal{{$num}}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                    <div class="modal fade" id="Modal{{$num}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 justify-content-center" id="exampleModalLabel">Apakah {{$riv->name}} ingin dihapus?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-footer justify-content-center">
                                              <form action="{{ route('river.delete', $riv) }}" method="POST">
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
                    {{ $river->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
