<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    use HasFactory;
    protected $table = 'katalog';
    protected $fillable = ['nama_katalog'];

    public function warnas()
    {
        return $this->hasMany(Warna::class);
    }
}
