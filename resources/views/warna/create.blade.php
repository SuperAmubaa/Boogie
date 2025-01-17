@extends('layouts.app')

@section('content')
@php
$rs1 = App\Models\katalog::all();      
@endphp
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/beranda">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/warna')}}">Katalog Warna</a></li>
    <li class="breadcrumb-item">Tambah Warna</li>
</ol>
<div class="container-fluid">
<form method="POST" action="{{ route('warna.store')}}">
@csrf
<div class="form-group">
    <label>Kategori</label>
    <select class="form-control @error('kategori_id') is-invalid @enderror" name="katalog_id" >
        <option value="">--- Pilih Katalog ---</option>
        @foreach($rs1 as $kat)
        <option value="{{$kat->id}}">{{$kat->nama_katalog}}</option>
        @endforeach
      </select>
      @error('kategori_id')
      <div class="invalid-feedback">
          {{ $message }}
      </div>
      @enderror
</div>
<div class="form-group">
    <label>Kode Warna</label>
    <input type="text" name="kode_warna" value="" class="form-control">
</div>
<button type="submit" name="proses" value="simpan" class="btn btn-primary">Simpan</button>
<button type="reset" name="unproses" value="batal" class="btn btn-info">Batal</button>
</form>
</div>
@endsection