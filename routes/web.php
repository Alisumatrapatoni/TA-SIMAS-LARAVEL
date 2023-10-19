<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\ReportController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\AnggaranDanaController;
use App\Http\Controllers\JenisPemeliharaanController;
use App\Http\Controllers\JadwalPemeliharaanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//authentikasi
Route::get('/login', [AuthController::class, 'login'])->middleware('ceksesi')->name('login');
Route::post('/login', [AuthController::class, 'check'])->middleware('ceksesi');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('ceksesi')->name('logout');
Route::get('/', [DashboardController::class, 'admin'])->middleware('ceksesi', 'cekuserstatus')->name('dashboard.admin');
Route::get('/dashboard', [DashboardController::class, 'user'])->middleware('ceksesi')->name('dashboard.user');

//divisi
Route::get('/divisi', [DivisiController::class, 'index'])->middleware('ceksesi', 'cekuserstatus')->name('divisi.index');
Route::post('/divisi/create', [DivisiController::class, 'store'])->middleware('ceksesi', 'cekuserstatus')->name('divisi.store');
Route::get('/divisi/show/{id}', [DivisiController::class, 'show'])->middleware('ceksesi', 'cekuserstatus')->name('divisi.show');
Route::put('/divisi/update/{id}', [DivisiController::class, 'update'])->middleware('ceksesi', 'cekuserstatus')->name('divisi.update');
Route::get('/divisi/delete/{id}', [DivisiController::class, 'destroy'])->middleware('ceksesi', 'cekuserstatus')->name('divisi.destroy');

//user pengguna
Route::get('/user', [UserController::class, 'index'])->middleware('ceksesi', 'cekuserstatus')->name('user.index');
Route::post('/user/create', [UserController::class, 'store'])->middleware('ceksesi', 'cekuserstatus')->name('user.store');
Route::get('/user/show/{id}', [UserController::class, 'show'])->middleware('ceksesi', 'cekuserstatus')->name('user.show');
Route::put('/user/update/{id}', [UserController::class, 'update'])->middleware('ceksesi', 'cekuserstatus')->name('user.update');
Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->middleware(['ceksesi', 'cekuserstatus'])->name('user.destroy');

//kategori
Route::get('/kategori', [KategoriController::class, 'index'])->middleware('ceksesi', 'cekuserstatus')->name('kategori.index');
Route::post('/kategori/create', [KategoriController::class, 'store'])->middleware('ceksesi', 'cekuserstatus')->name('kategori.store');
Route::get('/kategori/show/{id}', [KategoriController::class, 'show'])->middleware('ceksesi', 'cekuserstatus')->name('kategori.show');
Route::put('/kategori/update/{id}', [KategoriController::class, 'update'])->middleware('ceksesi', 'cekuserstatus')->name('kategori.update');
Route::get('/kategori/delete/{id}', [KategoriController::class, 'destroy'])->middleware(['ceksesi', 'cekuserstatus'])->name('kategori.destroy');

//ruang
Route::get('/ruang', [RuangController::class, 'index'])->middleware('ceksesi', 'cekuserstatus')->name('ruang.index');
Route::post('/ruang/create', [RuangController::class, 'store'])->middleware('ceksesi', 'cekuserstatus')->name('ruang.store');
Route::get('/ruang/show/{id}', [RuangController::class, 'show'])->middleware('ceksesi', 'cekuserstatus')->name('ruang.show');
Route::put('/ruang/update/{id}', [RuangController::class, 'update'])->middleware('ceksesi', 'cekuserstatus')->name('ruang.update');
Route::get('/ruang/delete/{id}', [RuangController::class, 'destroy'])->middleware(['ceksesi', 'cekuserstatus'])->name('ruang.destroy');

//jenis_pemeliharaan
Route::get('/jenis_pemeliharaan', [JenisPemeliharaanController::class, 'index'])->middleware('ceksesi', 'cekuserstatus')->name('jenis_pemeliharaan.index');
Route::post('/jenis_pemeliharaan/create', [JenisPemeliharaanController::class, 'store'])->middleware('ceksesi', 'cekuserstatus')-> name('jenis_pemeliharaan.store');
Route::get('/jenis_pemeliharaan/show/{id}', [JenisPemeliharaanController::class, 'show'])->middleware('ceksesi', 'cekuserstatus')->name('jenis_pemeliharaan.show');
Route::put('/jenis_pemeliharaan/update/{id}', [JenisPemeliharaanController::class, 'update'])->middleware('ceksesi', 'cekuserstatus')->name('jenis_pemeliharaan.update');
Route::get('jenis_pemeliharaan/delete/{id}', [  JenisPemeliharaanController::class, 'destroy'])->middleware('ceksesi', 'cekuserstatus')->name('jenis_pemeliharaan.destroy');

//anggaran dana
Route::get('/anggaran_dana', [AnggaranDanaController::class, 'index'])->middleware('ceksesi', 'cekuserstatus')->name('anggaran_dana.index');
Route::post('/anggaran_dana/create', [AnggaranDanaController::class, 'store'])->middleware('ceksesi', 'cekuserstatus')->name('anggaran_dana.store');
Route::get('/anggaran_dana/show/{id}', [AnggaranDanaController::class, 'show'])->middleware('ceksesi', 'cekuserstatus')->name('anggaran_dana.show');
Route::put('/anggaran_dana/update/{id}', [AnggaranDanaController::class, 'update'])->middleware('ceksesi', 'cekuserstatus')->name('anggaran_dana.update');
Route::get('/anggaran_dana/delete/{id}', [AnggaranDanaController::class, 'destroy'])->middleware('ceksesi', 'cekuserstatus')->name('anggaran_dana.destroy');

//supplier
Route::get('/supplier', [SupplierController::class, 'index'])->middleware('ceksesi', 'cekuserstatus')->name('supplier.index');
Route::post('/supplier/create', [SupplierController::class, 'store'])->middleware('ceksesi', 'cekuserstatus')->name('supplier.store');
Route::get('/supplier/show/{id}', [SupplierController::class, 'show'])->middleware('ceksesi', 'cekuserstatus')->name('supplier.show');
Route::put('/supplier/update/{id}', [SupplierController::class, 'update'])->middleware('ceksesi', 'cekuserstatus')->name('supplier.update');
Route::get('/supplier/delete/{id}', [SupplierController::class, 'destroy'])->middleware('ceksesi', 'cekuserstatus')->name('supplier.destroy');

//aset
Route::get('/aset', [AsetController::class, 'index'])->middleware('ceksesi', 'cekuserstatus')->name('aset.index');
Route::post('/aset/create', [AsetController::class, 'store'])->middleware('ceksesi', 'cekuserstatus')->name('aset.store');
Route::get('/aset/show/{id}', [AsetController::class, 'show'])->middleware('ceksesi', 'cekuserstatus')->name('aset.show');
Route::put('/aset/update/{id}', [AsetController::class, 'update'])->middleware('ceksesi', 'cekuserstatus')->name('aset.update');
Route::get('/aset/delete/{id}', [AsetController::class, 'destroy'])->middleware('ceksesi', 'cekuserstatus')->name('aset.destroy');

Route::get('/aset/qrcode/{id}', [AsetController::class, 'qrcode'])->middleware('ceksesi', 'cekuserstatus')->name('aset.qrcode');
Route::get('/aset/scan_qrcode', [AsetController::class, 'scan_qrcode'])->middleware('ceksesi', 'cekuserstatus')->name('aset.scan_qrcode');
Route::get('/aset/cetakqrcode/{id}', [AsetController::class, 'cetakqrcode'])->middleware('ceksesi', 'cekuserstatus')->name('aset.cetakqrcode');

Route::get('/aset/history', [AsetController::class, 'history'])->middleware('ceksesi', 'cekuserstatus')->name('aset.history');
Route::get('/aset/history/restore/{id}', [AsetController::class, 'restore'])->middleware('ceksesi', 'cekuserstatus')->name('aset.restore');
Route::get('/aset/history_delete/{id}', [AsetController::class, 'destroy_history'])->middleware('ceksesi', 'cekuserstatus')->name('aset.destroy_history');

//mutasi aset
Route::get('/aset/mutasi', [MutasiController::class, 'index'])->middleware('ceksesi', 'cekuserstatus')->name('mutasi.index');
Route::post('/aset/mutasi/create', [MutasiController::class, 'store_tambah'])->middleware('ceksesi')->name('mutasi.store_tambah');
Route::post('/aset/mutasi/reduce', [MutasiController::class, 'store_kurang'])->middleware('ceksesi')->name('mutasi.store_kurang');
Route::get('/aset/mutasi/data', [MutasiController::class, 'data'])->middleware('ceksesi', 'cekuserstatus')->name('mutasi.data');
Route::get('/aset/mutasi/{id}', [MutasiController::class, 'destroy'])->middleware('ceksesi', 'cekuserstatus')->name('mutasi.destroy');

//export & import data aset
Route::get('/export-data-aset', [AsetController::class, 'aset_export'])->middleware('ceksesi', 'cekuserstatus')->name('aset.export');
Route::post('/import-data-aset', [AsetController::class, 'aset_import'])->middleware('ceksesi', 'cekuserstatus')->name('aset.import');

//jadwal pemeliharaan (maintenance)
Route::get('/jadwal_pemeliharaan', [JadwalPemeliharaanController::class, 'index'])->middleware('ceksesi', 'cekuserstatus')->name('jadwal_pemeliharaan.index');
Route::post('/jadwal_pemeliharaan/create', [JadwalPemeliharaanController::class, 'store'])->middleware('ceksesi', 'cekuserstatus')-> name('jadwal_pemeliharaan.store');
Route::get('/jadwal_pemeliharaan/show/{id}', [JadwalPemeliharaanController::class, 'show'])->middleware('ceksesi', 'cekuserstatus')->name('jadwal_pemeliharaan.show');
Route::put('/jadwal_pemeliharaan/update/{id}', [JadwalPemeliharaanController::class, 'update'])->middleware('ceksesi', 'cekuserstatus')->name('jadwal_pemeliharaan.update');
Route::get('jadwal_pemeliharaan/delete/{id}', [JadwalPemeliharaanController::class, 'destroy'])->middleware('ceksesi', 'cekuserstatus')->name('jadwal_pemeliharaan.destroy');

//report
Route::get('/report', [ReportController::class, 'index'])->middleware('ceksesi', 'cekuserstatus')->name('report.index');
Route::get('/report/ruang', [ReportController::class, 'report_ruang'])->middleware('ceksesi', 'cekuserstatus')->name('report.ruang');
Route::get('/report/user', [ReportController::class, 'report_pengguna'])->middleware('ceksesi', 'cekuserstatus')->name('report.pengguna');
Route::get('/report/supplier', [ReportController::class, 'report_supplier'])->middleware('ceksesi', 'cekuserstatus')->name('report.supplier');
Route::get('/report/aset', [ReportController::class, 'report_aset'])->middleware('ceksesi', 'cekuserstatus')->name('report.aset');
Route::get('/report/peminjaman', [ReportController::class, 'report_peminjaman'])->middleware('ceksesi', 'cekuserstatus')->name('report.peminjaman');
Route::get('/report/history_peminjaman', [ReportController::class, 'report_history_peminjaman'])->middleware('ceksesi', 'cekuserstatus')->name('report.history_peminjaman');

//admin & user
Route::get('/peminjaman', [PeminjamanController::class, 'index'])->middleware('ceksesi')->name('peminjaman.index');

//admin peminjaman
Route::post('/peminjaman/create', [PeminjamanController::class, 'store'])->middleware('ceksesi')->name('peminjaman.store');
Route::get('/peminjaman/show/{id}', [PeminjamanController::class, 'show'])->middleware('ceksesi')->name('peminjaman.show');
Route::get('/peminjaman/update', [PeminjamanController::class, 'update'])->middleware('ceksesi')->name('peminjaman.update');
Route::get('/peminjaman/data', [PeminjamanController::class, 'data_peminjaman'])->middleware('ceksesi', 'cekuserstatus')->name('peminjaman.data');
Route::get('/peminjaman/data/history', [PeminjamanController::class, 'history_data_peminjaman'])->middleware('ceksesi', 'cekuserstatus')->name('peminjaman.data-history');
Route::get('/peminjaman/data_history_peminjaman/{id}', [PeminjamanController::class, 'destroy_history'])->middleware('ceksesi')->name('peminjaman.destroy_history');

//user peminjaman
Route::get('/peminjaman/scan_qrcode', [PeminjamanController::class, 'qrcode'])->middleware('ceksesi')->name('peminjaman.qrcode');
Route::get('/peminjaman/history', [PeminjamanController::class, 'history_peminjaman_user'])->middleware('ceksesi')->name('peminjaman.user-history');

