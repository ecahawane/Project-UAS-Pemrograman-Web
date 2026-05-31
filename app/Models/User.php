<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Database\Factories\UserFactory;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * MASS ASSIGNABLE
     */
    protected $fillable = [

        'name',

        'nim',

        'prodi',

        'no_hp',

        'email',

        'password',

        'role'

    ];

    /**
     * HIDDEN
     */
    protected $hidden = [

        'password',

        'remember_token',

    ];

    /**
     * CASTS
     */
    protected function casts(): array
    {
        return [

            'email_verified_at' => 'datetime',

            'password' => 'hashed',

        ];
    }

    /*
    |--------------------------------------------------------------------------
    | RELASI KE PEMINJAMAN
    |--------------------------------------------------------------------------
    */

    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class);
    }
}