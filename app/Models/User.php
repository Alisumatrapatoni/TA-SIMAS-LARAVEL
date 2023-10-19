<?php

namespace App\Models;

use App\Models\Divisi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nip', 'nama', 'jenis_kelamin',
        'no_telepon', 'alamat', 'status',
        'aktif', 'username', 'email',
        'gambar','password', 'divisi_id',
    ];

    protected $hidden = [];

    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'divisi_id', 'id');
    }
}
