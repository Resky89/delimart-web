<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PrefixController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\PulsaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;

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





Route::get('/', function () {
	return view('auth.login');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAksi')->name('login.aksi');
    Route::post('logout', 'logout')->middleware('auth')->name('logout');
});

// Route::middleware('auth.custom')->group(function () {
//     Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
// });
Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
   

    Route::get('barang/search', [SearchController::class, 'searchBarang'])->name('search.barang');
    Route::get('pegawai/search', [SearchController::class, 'searchPegawai'])->name('search.pegawai');
    Route::get('user/search', [SearchController::class, 'searchUser'])->name('search.user');
    Route::get('pulsa/search', [SearchController::class, 'searchPulsa'])->name('search.pulsa');
    Route::get('kategori/search', [SearchController::class, 'searchKategori'])->name('search.kategori');
    Route::get('supplier/search', [SearchController::class, 'searchSupplier'])->name('search.supplier');

	Route::controller(BarangController::class)->prefix('barang')->group(function () {
		Route::get('', 'index')->name('barang');
		Route::get('tambah', 'tambah')->name('barang.tambah');
		Route::post('tambah', 'simpan')->name('barang.tambah.simpan');
		Route::get('edit/{kd_barang}', 'edit')->name('barang.edit');
		Route::post('edit/{kd_barang}', 'update')->name('barang.tambah.update');
		Route::get('hapus/{kd_barang}', 'hapus')->name('barang.hapus');
	});

	Route::controller(KategoriController::class)->prefix('kategori')->group(function () {
        Route::get('', 'index')->name('kategori');
        Route::get('tambah', 'tambah')->name('kategori.tambah');
        Route::post('tambah', 'simpan')->name('kategori.tambah.simpan');
        Route::get('edit/{kd_kategori}', 'edit')->name('kategori.edit');
        Route::post('edit/{kd_kategori}', 'update')->name('kategori.tambah.update');
        Route::get('hapus/{kd_kategori}', 'hapus')->name('kategori.hapus');
    });

    Route::controller(SupplierController::class)->prefix('supplier')->group(function () {
        Route::get('', 'index')->name('supplier');
        Route::get('tambah', 'tambah')->name('supplier.tambah');
        Route::post('tambah', 'simpan')->name('supplier.tambah.simpan');
        Route::get('edit/{kd_supplier}', 'edit')->name('supplier.edit');
        Route::post('edit/{kd_supplier}', 'update')->name('supplier.tambah.update');
        Route::get('hapus/{kd_supplier}', 'hapus')->name('supplier.hapus');
    });

    Route::controller(ProviderController::class)->prefix('provider')->group(function () {
        Route::get('', 'index')->name('provider');
        Route::get('tambah', 'tambah')->name('provider.tambah');
        Route::post('tambah', 'simpan')->name('provider.tambah.simpan');
        Route::get('edit/{kd_provider}', 'edit')->name('provider.edit');
        Route::post('edit/{kd_provider}', 'update')->name('provider.tambah.update');
        Route::get('hapus/{kd_provider}', 'hapus')->name('provider.hapus');
    });

    Route::controller(PrefixController::class)->prefix('prefix')->group(function () {
        Route::get('', 'index')->name('prefix');
        Route::get('tambah', 'tambah')->name('prefix.tambah');
        Route::post('tambah', 'simpan')->name('prefix.tambah.simpan');
        Route::get('edit/{kd_prefix}', 'edit')->name('prefix.edit');
        Route::post('edit/{kd_prefix}', 'update')->name('prefix.tambah.update');
        Route::get('hapus/{kd_prefix}', 'hapus')->name('prefix.hapus');
    });

    Route::controller(PulsaController::class)->prefix('pulsa')->group(function () {
        Route::get('', 'index')->name('pulsa');
        Route::get('tambah', 'tambah')->name('pulsa.tambah');
        Route::post('tambah', 'simpan')->name('pulsa.tambah.simpan');
        Route::get('edit/{kd_pulsa}', 'edit')->name('pulsa.edit');
        Route::post('edit/{kd_pulsa}', 'update')->name('pulsa.tambah.update');
        Route::get('hapus/{kd_pulsa}', 'hapus')->name('pulsa.hapus');
    });

    Route::controller(RoleController::class)->prefix('role')->group(function () {
        Route::get('', 'index')->name('role');
        Route::get('tambah', 'tambah')->name('role.tambah');
        Route::post('tambah', 'simpan')->name('role.tambah.simpan');
        Route::get('edit/{kd_role}', 'edit')->name('role.edit');
        Route::post('edit/{kd_role}', 'update')->name('role.tambah.update');
        Route::get('hapus/{kd_role}', 'hapus')->name('role.hapus');
    });

    Route::controller(PegawaiController::class)->prefix('pegawai')->group(function () {
        Route::get('', 'index')->name('pegawai');
        Route::get('tambah', 'tambah')->name('pegawai.tambah');
        Route::post('tambah', 'simpan')->name('pegawai.tambah.simpan');
        Route::get('edit/{kd_pegawai}', 'edit')->name('pegawai.edit');
        Route::post('edit/{kd_pegawai}', 'update')->name('pegawai.tambah.update');
        Route::get('hapus/{kd_pegawai}', 'hapus')->name('pegawai.hapus');
    });

    Route::controller(UserController::class)->prefix('user')->group(function () {
        Route::get('', 'index')->name('user');
        Route::get('tambah', 'tambah')->name('user.tambah');
        Route::post('tambah', 'simpan')->name('user.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('user.edit');
        Route::post('edit/{id}', 'update')->name('user.tambah.update');
        Route::get('hapus/{id}', 'hapus')->name('user.hapus');
    });

});
