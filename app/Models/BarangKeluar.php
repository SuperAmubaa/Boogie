<?php

// app\Models\BarangKeluar.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BarangKeluar extends Model
{
    use HasFactory;
    public $timestamps = false; 
    protected $table = 'barang_keluar';
    protected $fillable = ['users_id', 'katalog_id', 'warna_id', 'kategori_id', 'stok_keluar', 'tanggal_keluar', 'keterangan'];
    
    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
    
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }  
    public function katalog()
    {
        return $this->belongsTo(Katalog::class);
    }

    public function warna()
    {
        return $this->belongsTo(Warna::class);
    }
}
