<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Infokus extends Model
{
    use HasFactory;

    // NAMA TABEL
    protected $table = 'infokuses';

    protected $fillable = [
        'nama_infokus',
        'kode_infokus',
        'lokasi',
        'status'
    ];

    // RELASI
    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class);
    }
}