<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Aset;
use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JadwalPemeliharaan extends Model
{
    use HasFactory;
    protected $table = 'jadwal_pemeliharaan';

    protected $primary = 'id';
    protected $fillable = ['aktif', 'aset_id','tanggal_mulai', 'tanggal_selesai', 'status'];

    // public function getReminders()
    // {
    //     return self::where('tanggal_selesai', Carbon::today())
    //                ->where('tanggal_mulai', '>', Carbon::today())
    //                ->get();
    // }

    protected $hidden = [];

    public function aset()
    {
        return $this->belongsTo(Aset::class, 'aset_id', 'id');
    }
}
