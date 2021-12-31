@extends('adminlte::page')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Edit Data Kategori</h1>
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
                <div class="card-header">Data Kategori</div>
                <div class="card-body">
                   <form action="{{route('buku.update',$buku->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Masukan ID Kategori</label>
                            <input type="number" name="id_kategori" value="{{$buku->id_kategori}}" class="form-control @error('id_kategori') is-invalid @enderror">
                             @error('id_kategori')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan ID Pengarang</label>
                            <input type="number" name="id_pengarang" value="{{$buku->id_pengarang}}" class="form-control @error('id_pengarang') is-invalid @enderror">
                             @error('id_pengarang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan ID Penerbit</label>
                            <input type="number" name="id_penerbit" value="{{$buku->id_penerbit}}" class="form-control @error('id_penerbit') is-invalid @enderror">
                             @error('id_penerbit')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Judul</label>
                            <input type="text" name="judul" value="{{$buku->judul}}" class="form-control @error('judul') is-invalid @enderror">
                             @error('judul')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="">Masukan Nama Kategori</label>
                            <input type="text" name="nama_kategori" value="{{$buku->nama_kategori}}" class="form-control @error('nama_kategori') is-invalid @enderror">
                             @error('nama_kategori')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Nama Pengarang</label>
                            <input type="text" name="nama_pengarang" value="{{$buku->nama_pengarang}}" class="form-control @error('nama_kategori') is-invalid @enderror">
                             @error('nama_pengarang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Nama Penerbit</label>
                            <input type="text" name="nama_penerbit" value="{{$buku->nama_penerbit}}" class="form-control @error('nama_kategori') is-invalid @enderror">
                             @error('nama_penerbit')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Deskripsi</label>
                            <input type="text" name="nama_deskripsi" value="{{$buku->nama_deskripsi}}" class="form-control @error('nama_kategori') is-invalid @enderror">
                             @error('nama_deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Stok</label>
                            <input type="number" name="stok" value="{{$buku->stok}}" class="form-control @error('nama_kategori') is-invalid @enderror">
                             @error('stok')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Harga</label>
                            <input type="number" name="harga" value="{{$buku->harga}}" class="form-control @error('nama_kategori') is-invalid @enderror">
                             @error('harga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <button type="reset" class="btn btn-outline-warning">Reset</button>
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection