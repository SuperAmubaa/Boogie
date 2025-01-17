<?php

// app/Models/BahanBaku.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    use HasFactory;

    protected $fillable = [
        'komponen_biaya_id',
        'subkomponen_biaya_id',
        'jenis',
        'kebutuhan_per_produksi',
        'satuan',
        'biaya_persatuan',
    ];
}
