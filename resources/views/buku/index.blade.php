@extends('adminlte::page')
@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Data Buku</h1>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data Buku
                        <a href="{{ route('buku.create') }}" class="btn btn-sm btn-outline-primary float-right">Tambah
                            Buku</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Judul</th>
                                    <th>Nama Kategori</th>
                                    <th>Nama Pengarang</th>
                                    <th>Nama Penerbit</th>
                                    <th>Deskripsi</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Cover</th>
                                    <th>Aksi</th>
                                </tr>
                                @php $no=1; @endphp
                                @foreach ($buku as $data)
                                    <tr>
                                        <td>{{$data->judul}}</td>
                                        <td>{{$data->nama_kategori }}</td>
                                        <td>{{$data->nama_pengarang}}</td>
                                        <td>{{$data->nama_penerbit}}</td>
                                        <td>{{$data->deskripsi}}</td>
                                        <td>{{$data->nama_stok}}</td>
                                        <td>{{$data->nama_harga}}</td>
                                        <td>{{$data->cover}}</td>

                                        <td><img src="{{$data->image()}}" alt="" style="width:150px; height:150px;" alt="Cover"></td>
                                        <td>
                                            <form action="{{ route('buku.destroy', $data->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <a href="{{ route('buku.edit', $data->id) }}"
                                                    class="btn btn-outline-info">Edit</a>
                                                <a href="{{ route('buku.show', $data->id) }}"
                                                    class="btn btn-outline-warning">Show</a>
                                                <button type="submit" class="btn btn-outline-danger"
                                                    onclick="return confirm('Apakah anda yakin menghapus ini?');">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
