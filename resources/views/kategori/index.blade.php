@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">Kategori Barang</li>
    </ol>
  
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="/kategori/create" class="btn btn-sm btn-primary">Tambah Kategori</a>
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Action</th>
        </tr>
        <tbody>
            @forelse ($kategori as $key => $item)
            <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td>{{ $item->nama_kategori }}</td>
                <td>
                    <form method="post" action="/kategori/{{ $item->id }}">
                        @csrf
                        @method('delete')
                        <a href="/kategori/{{ $item->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
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
@endsection