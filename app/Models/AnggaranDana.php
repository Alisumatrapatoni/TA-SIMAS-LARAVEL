<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggaranDana extends Model
{
    use HasFactory;
    protected $table = 'anggaran_dana';

    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'aktif'];

    protected $hidden = [];
}
