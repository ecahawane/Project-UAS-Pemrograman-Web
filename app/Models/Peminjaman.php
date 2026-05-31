<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjamen';

    protected $fillable = [

        'user_id',
        'infokus_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
        'nama_dosen',
        'mata_kuliah',
        'ruangan',
        'jam_pinjam'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function infokus()
    {
        return $this->belongsTo(Infokus::class);
    }
}
