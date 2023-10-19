<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'supplier';

    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'alamat', 'deskripsi', 'aktif'];

    protected $hidden = [];
}
