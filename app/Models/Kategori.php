<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $fillable = ['nama_kategori'];

    public function barang_masuk()
    {
        return $this->hasMany(BarangMasuk::class);
    }
   
    public function barang_keluar()
    {
        return $this->hasMany(BarangKeluar::class);
    }
}
