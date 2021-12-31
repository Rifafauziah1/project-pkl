@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    Halaman Buku

@stop

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Pembeli
                    <a href="{{ route('pembeli.create') }}" class="btn btn-sm btn-outline-primary float-right">Tambah
                        Pembeli</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>NO</th>
                                <th>Nama Pembeli</th>
                                <th>Alamat</th>
                                <th>No Handphone</th>
                                <th>Tanggal Beli</th>
                                <th>Aksi</th>
                            </tr>
                            @php $no=1; @endphp
                            @foreach ($pembeli as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->nama_pembeli }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td>{{ $data->no_hp }}</td>
                                    <td>{{ $data->tgl_beli }}</td>
                                    <td>
                                        <form action="{{ route('pembeli.destroy', $data->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{ route('pembeli.edit', $data->id) }}"
                                                class="btn btn-outline-info">Edit</a>
                                            <a href="{{ route('pembeli.show', $data->id) }}"
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
