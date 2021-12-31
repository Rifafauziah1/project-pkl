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
                    <div class="card-header">Data Transaksi</div>
                    <div class="card-body">
                       <form action="{{route('transaksi.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Masukan ID Buku</label>
                                <select name="id_buku" class="form-control @error('id_buku') is-invalid @enderror">
                                    @foreach($buku as $data)
                                    <option value="{{$data->id}}">{{$data->id}}</option>
                                    @endforeach
                                </select>
                                @error('id_buku')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                            <label for="">Masukan ID Pembeli</label>
                            <select name="id" class="form-control @error('id') is-invalid @enderror">
                                @foreach($pembeli as $data)
                                <option value="{{$data->id}}">{{$data->id}}</option>
                                @endforeach
                            </select>
                            @error('id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Nama Pembeli</label>
                            <select name="nama_pembeli" class="form-control @error('nama_pembeli') is-invalid @enderror">
                                @foreach($pembeli as $data)
                                <option value="{{$data->id}}">{{$data->nama_pembeli}}</option>
                                @endforeach
                            </select>
                           @error('nama_pembeli')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Judul</label>
                            <select name="judul" class="form-control @error('judul') is-invalid @enderror">
                                @foreach($buku as $data)
                                <option value="{{$data->id}}">{{$data->judul}}</option>
                                @endforeach
                            </select>
                            @error('judul')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                                <label for="">Masukan Tanggal Beli</label>
                                <select name="tgl_beli" class="form-control @error('tgl_beli') is-invalid @enderror">
                                    @foreach($pembeli as $data)
                                    <option value="{{$data->id}}">{{$data->tgl_beli}}</option>
                                    @endforeach
                                </select>
                               @error('tgl_beli')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Masukan Jumlah Buku</label>
                                <input type="number" name="jumlah_buku" class="form-control @error('jumlah_buku') is-invalid @enderror">
                                 @error('jumlah_buku')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Masukan Alamat</label>
                                <select name="alamat" class="form-control @error('alamat') is-invalid @enderror">
                                    @foreach($buku as $data)
                                    <option value="{{$data->id}}">{{$data->alamat}}</option>
                                    @endforeach
                                </select>
                               @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
                            <div class="form-group">
                                <label for="">Masukan Harga</label>
                                <select name="harga" class="form-control @error('harga') is-invalid @enderror">
                                    @foreach($buku as $data)
                                    <option value="{{$data->id}}">{{$data->harga}}</option>
                                    @endforeach
                                </select>
                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Masukan Jumlah Buku</label>
                                <input type="number" name="total" class="form-control @error('total') is-invalid @enderror">
                                 @error('total')
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

@stop

@section('css')

@stop

@section('js')

@stop
