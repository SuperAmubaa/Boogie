<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    public $timestamps = false; 
    protected $table = 'barang_masuk';
    protected $fillable = ['users_id', 'katalog_id', 'warna_id', 'kategori_id', 'stok_masuk', 'tanggal_masuk', 'keterangan'];
    
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
