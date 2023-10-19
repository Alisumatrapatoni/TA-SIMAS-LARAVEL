<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    use HasFactory;

    protected $table = 'mutasi';

    protected $primaryKey = 'id';

    protected $fillable = [
        'jumlah_request', 'nilai_harga_request', 'status', 'gambar', 'keterangan',
        'user_id', 'aset_id', 'aktif', 'created_at', 'updated_at'
    ];

    protected $hidden = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function aset(){
        return $this->belongsTo(Aset::class, 'aset_id', 'id');
    }
}
