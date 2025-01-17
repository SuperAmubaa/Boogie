<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
{
    $data = DB::table('warna')
        ->leftJoin('barang_masuk', 'warna.id', '=', 'barang_masuk.warna_id')
        ->leftJoin('barang_keluar', 'warna.id', '=', 'barang_keluar.warna_id')
        ->select(
            'warna.kode_warna',
            DB::raw('SUM(barang_masuk.stok_masuk) AS stok_masuk'),
            DB::raw('SUM(barang_keluar.stok_keluar) AS stok_keluar'),
            DB::raw('SUM(barang_masuk.stok_masuk) - SUM(barang_keluar.stok_keluar) AS sisa_stok')
        )
        ->groupBy('warna.kode_warna')
        ->get();

    return view('dashboard', compact('data'));
}

}
