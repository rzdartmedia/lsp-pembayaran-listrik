<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pelanggan extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'pelanggan';
    protected $fillable = [
        'id_pelanggan',
        'username',
        'password',
        'nomor_kwh',
        'nama',
        'alamat',
        'id_tarif'
    ];

    protected $hidden = [
        'password',
    ];
}
