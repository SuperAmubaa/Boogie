<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Katalog;
use App\Models\Warna;  
use Illuminate\Support\Facades\DB;

class BarangKeluarController extends Controller
{
    // BarangMasukController.php
    public function index()
    {
        $barang_keluar = BarangKeluar::join('users', 'users.id', '=', 'barang_keluar.users_id')
        ->join('kategori', 'kategori.id', '=', 'barang_keluar.kategori_id')
        ->join('warna', 'warna.id', '=', 'barang_keluar.warna_id')  // Menambahkan join untuk warna
        ->join('katalog', 'katalog.id', '=', 'barang_keluar.katalog_id')  // Menambahkan join untuk katalog
        ->select(
            'barang_keluar.*', 
            'users.name AS user_name', 
            'kategori.nama_kategori AS kategori_name',
            'warna.kode_warna AS warna_name',  // Menambahkan kolom warna
            'katalog.nama_katalog AS katalog_name'  // Menambahkan kolom katalog
        )
        ->get();
    
        
        // Mengirim data ke view
        return view('barang_keluar.index', ['barang_keluar' => $barang_keluar]);
    }

    public function create()
    {
         // Mengambil data katalog dan kategori
    $katalogs = Katalog::all(); // Ambil semua data katalog
    $kategoris = Kategori::all(); // Ambil semua data kategori
    $userss = User::all(); // Ambil semua data kategori

        return view('barang_keluar.create',  compact('katalogs', 'kategoris', 'userss'));
    }

    public function store(Request $request)
    {
        // Validation logic here
       // Validation logic here
       $request->validate([
        // 'users_id' => 'required',
        // 'nama_produk' => 'required',
        // 'kategori_id' => 'required',
        // 'stok_keluar' => 'required|integer',
        // 'tanggal_keluar' => 'required|date',
        // 'keterangan' => 'required',
    ]);

    $warnaId = $request->warna_id;
    $stokMasuk = DB::table('barang_masuk')
        ->where('warna_id', $warnaId)
        ->sum('stok_masuk');
    
    $stokKeluar = DB::table('barang_keluar')
        ->where('warna_id', $warnaId)
        ->sum('stok_keluar');
    
    $sisaStok = $stokMasuk - $stokKeluar;

    // Cek apakah stok keluar melebihi sisa stok
    if ($request->stok_keluar > $sisaStok) {
        return redirect()->back()->withErrors(['stok_keluar' => 'Stok keluar melebihi sisa stok!']);
    }

      $barang_keluar = new BarangKeluar;

        $barang_keluar->users_id = $request->input('users_id');
        $barang_keluar->katalog_id = $request->input('katalog_id');
        $barang_keluar->warna_id = $request->input('warna_id');
        $barang_keluar->kategori_id = $request->input('kategori_id');
        $barang_keluar->stok_keluar = $request->input('stok_keluar');
        $barang_keluar->satuan = $request->input('satuan');
        $barang_keluar->tanggal_keluar = $request->input('tanggal_keluar');
        $barang_keluar->keterangan = $request->input('keterangan');

        $barang_keluar->save();

    return redirect('/barang_keluar');
      
    }

    public function edit($id)
    {
        $barang_keluar = BarangKeluar::findOrFail($id);
        $userss = User::all(); // Data pegawai
        $katalogs = Katalog::all(); // Data katalog
        $warnas = Warna::all(); // Data warna
        $kategoris = Kategori::all(); // Data kategori
    
        return view('barang_keluar.edit', compact('barang_keluar', 'userss', 'katalogs', 'warnas', 'kategoris'));
    }
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'users_id' => 'required',
        //     'nama_produk' => 'required',
        //     'kategori_id' => 'required',
        //     'stok_masuk' => 'required|integer',
        //     'tanggal_masuk' => 'required|date',
        //     'keterangan' => 'required',
        // ]);

        // Mengambil data barang masuk
    $barang_keluar = BarangKeluar::findOrFail($id);

    // Update data menggunakan mass assignment
    $barang_keluar->update([
        'users_id' => $request->users_id,
        'katalog_id' => $request->katalog_id,
        'warna_id' => $request->warna_id,
        'kategori_id' => $request->kategori_id,
        'stok_keluar' => $request->stok_keluar,
        'satuan' => $request->satuan,
        'tanggal_keluar' => $request->tanggal_keluar,
        'keterangan' => $request->keterangan,
    ]);

    // Redirect dengan pesan sukses
    return redirect('/barang_keluar')->with('success', 'Data Barang Keluar berhasil diperbarui.');

    }

    public function destroy($id)
    {
        BarangKeluar::find($id)->delete();
        return redirect()->route('barang_keluar.index')->with('success', 'Barang deleted successfully!');
    }

    public function getSisaStok($warnaId)
{
    try {
        // Ambil stok masuk
        $stokMasuk = BarangMasuk::where('warna_id', $warnaId)->sum('stok_masuk');

        // Ambil stok keluar
        $stokKeluar = BarangKeluar::where('warna_id', $warnaId)->sum('stok_keluar');

        // Hitung sisa stok
        $sisaStok = $stokMasuk - $stokKeluar;

        // Kembalikan data dalam format JSON
        return response()->json(['sisa_stok' => $sisaStok]);
    } catch (\Exception $e) {
        // Log error untuk debugging
        \Log::error('Error fetching sisa stok: ' . $e->getMessage());
        return response()->json(['error' => 'Gagal mengambil data sisa stok.'], 500);
    }
}

    

}
