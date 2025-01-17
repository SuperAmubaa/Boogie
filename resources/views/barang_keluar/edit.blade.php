@extends('layouts.app')

@section('content')
@php
$rs1 = App\Models\Kategori::all();   
$rs2 = App\Models\User::all();   
@endphp
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/beranda">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/kategori')}}">Kategori Barang</a></li>
    <li class="breadcrumb-item">Edit Kategori</li>
</ol>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tambah Barang</h1>

    <form method="POST" action="/barang_keluar/{{ $barang_keluar->id }}">
        @method('put')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @csrf
    
        <div class="form-group">
            <label>Nama Pegawai</label>
            <select class="form-control @error('users_id') is-invalid @enderror" name="users_id" >
                <option value="">--- Pilih Pegawai ---</option>
                @foreach($rs2 as $us)
                <option value="{{$us->id}}">{{$us->name}}</option>
                @endforeach
              </select>
              @error('kategori_id')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
        </div>
        <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" value="{{ $barang_keluar->nama_produk }}" class="form-control @error('nama_produk') is-invalid @enderror">
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <select class="form-control @error('kategori_id') is-invalid @enderror" name="kategori_id" >
                <option value="">--- Pilih Kategori ---</option>
                @foreach($rs1 as $kat)
                <option value="{{$kat->id}}">{{$kat->nama_kategori}}</option>
                @endforeach
              </select>
              @error('kategori_id')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
        </div> 
        <div class="form-group">
            <label>Jumlah Stok Keluar</label>
            <input type="number" name="stok_masuk" value="{{ $barang_keluar->stok_keluar }}" class="form-control">
        </div>
        <div class="form-group">
            <label>Tanggal Keluar</label>
            <input type="date" name="tanggal_masuk" value="{{ $barang_keluar->tanggal_keluar }}" class="form-control">
        </div>
        
        <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" cols="30" rows="10" class="form-control">{{ $barang_keluar->keterangan }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection