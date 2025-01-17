@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/beranda">Dashboard</a></li>
        <li class="breadcrumb-item">Katalog Warna</li>
    </ol>
  
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="/katalog/create" class="btn btn-sm btn-primary">Tambah Katalog</a>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
            <th>No</th>
            <th>Nama Katalog</th>
            <th>Action</th>
        </tr>
        <tbody>
            @forelse ($katalog as $key => $item)
            <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td>{{ $item->nama_katalog }}</td>
                <td>
                    <form method="post" action="/katalog/{{ $item->id }}">
                        @csrf
                        @method('delete')
                        <a href="/katalog/{{ $item->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                        <button class="btn btn-sm btn-danger "  onclick="return confirm('Anda Yakin Data di Hapus?')">Delete</button>
                    </form>
            </td>
            </tr>
            @endforeach
        </tbody>
    </thead>
</table>
</div>
        </div>
    </div>
</div>
@endsection