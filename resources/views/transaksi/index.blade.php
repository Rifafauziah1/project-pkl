@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    Halaman Transaksi

@stop

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Transaksi
                    <a href="{{ route('transaksi.create') }}" class="btn btn-sm btn-outline-primary float-right">Tambah
                        Transaksi</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>NO</th>
                                <th>ID Buku</th>
                                <th>ID Pembeli</th>
                                <th>Nama Pembeli</th>
                                <th>Judul</th>
                                <th>Tanggal Beli</th>
                                <th>Jumlah Buku</th>
                                <th>Alamat</th>
                                <th>Harga</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                            @php $no=1; @endphp
                            @foreach ($transaksi as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->id_buku}}</td>
                                    <td>{{ $data->id_pembeli}}</td>
                                    <td>{{ $data->judul }}</td>
                                    <td>{{ $data->nama_pembeli }}</td>
                                    <td>{{ $data->tgl_buku }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td>{{ $data->harga }}</td>
                                    <td>{{ $data->total }}</td>
                                    <td>
                                        <form action="{{ route('transaksi.destroy', $data->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{ route('transaksi.edit', $data->id) }}"
                                                class="btn btn-outline-info">Edit</a>
                                            <a href="{{ route('transaksi.show', $data->id) }}"
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


@stop

@section('css')

@stop

@section('js')

@stop
