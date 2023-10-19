<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Divisi extends Model
{
    use HasFactory;
    protected $table = 'divisi';

    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'aktif'];

    protected $hidden = [];



}
