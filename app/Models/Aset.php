<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aset extends Model
{
    use HasFactory, Searchable;

    protected $table = 'aset';

    protected $primaryKey = 'id';

    protected $fillable = [
        'kode', 'nama', 'jumlah', 'satuan', 'tanggal_pembelian', 'nilai_harga', 'brand', 'aktif',
        'tempat', 'kondisi', 'gambar', 'tanggal_akhir_garansi', 'nama_penerima', 'deskripsi',
        'kategori_id', 'anggaran_dana_id', 'jenis_pemeliharaan_id', 'ruang_id', 'supplier_id'
    ];

    protected $rules = [
            'kode'                  => 'required|unique:aset|min:7|max:7',
            'nama'                  => 'required|min:3',
            'jumlah'                => 'required',
            'satuan'                => 'required',
            'gambar'                => 'required|mimes:png,jpg,jpeg,jfif',
            'nilai_harga'           => 'required|min:3',
            'brand'                 => 'required|min:3',
            'nama_penerima'         => 'required|min:3',
            'tempat'                => 'required|min:3',
            'kondisi'               => 'required',
            'tanggal_pembelian'     => 'required',
            'tanggal_akhir_garansi' => 'required',
            'kategori_id'           => 'required',
            'anggaran_dana_id'      => 'required',
            'jenis_pemeliharaan_id' => 'required',
            'ruang_id'              => 'required',
            'supplier_id'           => 'required'
    ];

    protected $hidden = [];

    public function toSearchableArray()
    {
        return [
            'kode' => $this->kode
        ];
    }



    public function kategori(){
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function anggaran_dana(){
        return $this->belongsTo(AnggaranDana::class, 'anggaran_dana_id', 'id');
    }

    public function jenis_pemeliharaan(){
        return $this->belongsTo(JenisPemeliharaan::class, 'jenis_pemeliharaan_id', 'id');
    }

    public function ruang(){
        return $this->belongsTo(Ruang::class, 'ruang_id', 'id');
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
}
