<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warna extends Model
{
    use HasFactory;
    protected $table = 'warna';
    protected $fillable = ['kode_warna', 'katalog_id'];

    public function katalog()
    {
        return $this->belongsTo(Katalog::class);
    }
}
