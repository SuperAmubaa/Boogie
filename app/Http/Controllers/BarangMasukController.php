<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\BarangMasuk;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Katalog;
use App\Models\Warna;  

class BarangMasukController extends Controller
{
    public function index()
    {
        // Mengambil data barang_masuk dengan join ke tabel users dan kategori
        $barang_masuk = BarangMasuk::join('users', 'users.id', '=', 'barang_masuk.users_id')
        ->join('kategori', 'kategori.id', '=', 'barang_masuk.kategori_id')
        ->join('warna', 'warna.id', '=', 'barang_masuk.warna_id')  // Menambahkan join untuk warna
        ->join('katalog', 'katalog.id', '=', 'barang_masuk.katalog_id')  // Menambahkan join untuk katalog
        ->select(
            'barang_masuk.*', 
            'users.name AS user_name', 
            'kategori.nama_kategori AS kategori_name',
            'warna.kode_warna AS warna_name',  // Menambahkan kolom warna
            'katalog.nama_katalog AS katalog_name'  // Menambahkan kolom katalog
        )
        ->get();
    
        
        // Mengirim data ke view
        return view('barang_masuk.index', ['barang_masuk' => $barang_masuk]);
    }
    

    public function create()
    {
    // Mengambil data katalog dan kategori
    $katalogs = Katalog::all(); // Ambil semua data katalog
    $kategoris = Kategori::all(); // Ambil semua data kategori
    $userss = User::all(); // Ambil semua data kategori

    // Kirim data ke view
    return view('barang_masuk.create', compact('katalogs', 'kategoris'));

    }

    public function store(Request $request)
    {
        // Validation logic here
        // $request->validate([
        //     'users_id' => 'required',
        //     'nama_produk' => 'required',
        //     'kategori_id' => 'required',
        //     'stok_masuk' => 'required|integer',
        //     'tanggal_masuk' => 'required|date',
        //     'keterangan' => 'required',
        // ]);

        $barang_masuk = new BarangMasuk;

        $barang_masuk->users_id = $request->input('users_id');
        $barang_masuk->katalog_id = $request->input('katalog_id');
        $barang_masuk->warna_id = $request->input('warna_id');
        $barang_masuk->kategori_id = $request->input('kategori_id');
        $barang_masuk->stok_masuk = $request->input('stok_masuk');
        $barang_masuk->satuan = $request->input('satuan');
        $barang_masuk->tanggal_masuk = $request->input('tanggal_masuk');
        $barang_masuk->keterangan = $request->input('keterangan');

        $barang_masuk->save();

        // BarangMasuk::create([
        //     'users_id' => $request->users_id,
        //     'nama_produk' => $request->nama_produk,
        //     'kategori_id' => $request->kategori_id,
        //     'stok_masuk' => $request->stok_masuk,
        //     'tanggal_masuk' => $request->tanggal_masuk,
        //     'keterangan' => $request->keterangan,
            
        // ]);

        return redirect('/barang_masuk');
    }

    public function edit($id)
    {
        $barang_masuk = BarangMasuk::find($id);
        return view('barang_masuk.edit', compact('barang_masuk'));
    }
    

    public function update(Request $request, $id)
    {
        // Validation logic here
        $request->validate([
            'users_id' => 'required',
            'nama_produk' => 'required',
            'kategori_id' => 'required',
            'stok_masuk' => 'required|integer',
            'tanggal_masuk' => 'required|date',
            'keterangan' => 'required',
        ]);

        $barang_masuk = BarangMasuk::find($id);
        $barang_masuk->users_id = $request->users_id;
        $barang_masuk->katalog_id = $request->katalog_id;
        $barang_masuk->warna_id = $request->warna_id;
        $barang_masuk->kategori_id = $request->kategori_id;
        $barang_masuk->stok_masuk = $request->stok_masuk;
        $barang_masuk->satuan = $request->satuan;
        $barang_masuk->tanggal_masuk = $request->tanggal_masuk;
        $barang_masuk->keterangan = $request->keterangan;
        $barang_masuk->update();
        return redirect('/barang_masuk');
    }

    public function destroy($id)
    {
        BarangMasuk::find($id)->delete();
        return redirect()->route('barang_masuk.index')->with('success', 'Barang deleted successfully!');
    }

    public function getWarna($katalogId)
{
    // Mengambil data warna berdasarkan katalog_id
    $warnas = Warna::where('katalog_id', $katalogId)->get();

    return response()->json($warnas);
}
}