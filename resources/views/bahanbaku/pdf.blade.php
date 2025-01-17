<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hpp Data PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Hpp Hasil</h1>

    <p>Tanggal: {{ date('Y-m-d') }}</p>

    <table>
        <thead>
            <tr>
                <th>komponen biaya</th>
                <th>Kebutuhan Per Produksi</th>
                <th>Satuan</th>
                <th>Biaya Persatuan</th>
                <th>Total Biaya</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bahanbakus as $bahanbaku)
            <tr>
                <td>{{ $bahanbaku->komponen_biaya_id }}</td>
                <td>{{ $bahanbaku->kebutuhan_per_produksi }}</td>
                <td>{{ $bahanbaku->satuan }}</td>
                <td>Rp.{{ $bahanbaku->biaya_persatuan }}</td>
                <td>Rp.{{ $bahanbaku->biaya_persatuan *  $bahanbaku->kebutuhan_per_produksi}}</td>
            </tr>
            <tr>
                <td colspan="4">Total {{ $bahanbaku->komponen_biaya_id }} adalah :</td>
                <td>Rp.{{ $bahanbaku->biaya_persatuan *  $bahanbaku->kebutuhan_per_produksi}} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
