<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPemeliharaan extends Model
{
    use HasFactory;
    protected $table = 'jenis_pemeliharaan';

    protected $primary = 'id';
    protected $fillable = ['nama', 'aktif'];

    protected $hidden = [];
}
