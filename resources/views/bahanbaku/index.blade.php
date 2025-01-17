@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h3 mb-4 text-gray-800">Hpp Hasil</h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <a href="{{ route('hpp-data.pdf') }}" class="btn btn-primary">Download PDF</a>


    <table class="table">

        <thead>
            <tr>
                <th>komponen biaya</th>
                <th>Kebutuhan Per Produksi</th>
                <th>Satuan</th>
                <th>Biaya Persatuan</th>
                <th>Total Biaya</th>
            </tr>
        </thead>
        @foreach($bahanbakus as $bahanbaku)
        <tr>
            <th>{{ $bahanbaku->komponen_biaya_id }}</th>
        </tr>
        <tr>
            <td>{{ $bahanbaku->subkomponen_biaya_id }}</td>
        </tr>

        <tbody>
            <tr>

                <td>{{ $bahanbaku->jenis }}</td>
                <td>{{ $bahanbaku->kebutuhan_per_produksi }}</td>
                <td>{{ $bahanbaku->satuan }}</td>
                <td>Rp.{{ $bahanbaku->biaya_persatuan }}</td>
                <td>Rp.{{ $bahanbaku->biaya_persatuan *  $bahanbaku->kebutuhan_per_produksi}}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Total {{ $bahanbaku->komponen_biaya_id }} adalah : Rp.{{ $bahanbaku->biaya_persatuan *  $bahanbaku->kebutuhan_per_produksi}} </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection