<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\DataPemakaianController;
use App\Http\Controllers\DataPembelianController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\PemakaianTanggal;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\UserController;
use App\Models\DataBarang;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');
Route::get('/navbar', [Controller::class, 'navbar'])->name('navbar');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// user
Route::get('/user', [UserController::class, 'viewuser'])->middleware(['auth', 'verified', 'role:Administrator'])->name('user');
Route::get('/useradd', [UserController::class, 'create'])->middleware(['auth', 'verified', 'role:Administrator'])->name('useradd');
Route::post('/user/add', [UserController::class, 'store'])->middleware(['auth', 'verified', 'role:Administrator'])->name('tambah_user');
Route::get('/useredit{id}', [UserController::class, 'edit'])->middleware(['auth', 'verified', 'role:Administrator'])->name('useredit');
Route::put('/user/update{id}', [UserController::class, 'update'])->middleware(['auth', 'verified', 'role:Administrator'])->name('update_user');
Route::delete('/user/hapus/{id}',[UserController::class, 'destroy'])->middleware(['auth', 'verified', 'role:Administrator'])->name('userhapus');

// databarang
Route::get('/databarang', [DataBarangController::class, 'databarang'])->middleware(['auth', 'verified', 'role:Administrator'])->name('databarang');
Route::get('/databarangadd', [DataBarangController::class, 'create'])->middleware(['auth', 'verified', 'role:Administrator'])->name('databarangadd');
// Route::post('/databarang/add', [DataBarangController::class, 'store'])->name('tambah_databarang');
// Route::get('/databarangedit{id}', [DataBarangController::class, 'edit'])->name('databarangedit');
// Route::put('/databarang/update{id}', [DataBarangController::class, 'update'])->name('update_databarang');
Route::delete('/databarang/hapus/{id}',[DataBarangController::class, 'destroy'])->middleware(['auth', 'verified', 'role:Administrator'])->name('databaranghapus');

// data pemakaian
Route::get('/datapemakaian', [DataPemakaianController::class, 'datapemakaian'])->middleware(['auth', 'verified', 'role:Administrator|Operator'])->name('datapemakaian');
Route::get('/datapemakaianadd', [DataPemakaianController::class, 'create'])->middleware(['auth', 'verified', 'role:Administrator|Operator'])->name('datapemakaianadd');
Route::post('/datapemakaian/add', [DataPemakaianController::class, 'store'])->middleware(['auth', 'verified', 'role:Administrator|Operator'])->name('tambah_datapemakaian');
Route::get('/datapemakaianedit{id}', [DataPemakaianController::class, 'edit'])->middleware(['auth', 'verified', 'role:Administrator|Operator'])->name('datapemakaianedit');
Route::put('/datapemakaian/update{id}', [DataPemakaianController::class, 'update'])->middleware(['auth', 'verified', 'role:Administrator|Operator'])->name('update_datapemakaian');
Route::delete('/datapemakaian/hapus/{id}',[DataPemakaianController::class, 'destroy'])->middleware(['auth', 'verified', 'role:Administrator|Operator'])->name('datapemakaianhapus');

// data pembelian
Route::get('/datapembelian', [DataPembelianController::class, 'datapembelian'])->middleware(['auth', 'verified', 'role:Administrator|Operator|Petugas'])->name('datapembelian');
Route::get('/datapembelianadd', [DataPembelianController::class, 'create'])->middleware(['auth', 'verified', 'role:Administrator|Operator|Petugas'])->name('datapembelianadd');
Route::post('/datapembelian/add', [DataPembelianController::class, 'store'])->middleware(['auth', 'verified', 'role:Administrator|Operator|Petugas'])->name('tambah_datapembelian');
Route::get('/datapembelianedit{id}', [DataPembelianController::class, 'edit'])->middleware(['auth', 'verified', 'role:Administrator|Operator|Petugas'])->name('datapembelianedit');
Route::put('/datapembelian/update{id}', [DataPembelianController::class, 'update'])->middleware(['auth', 'verified', 'role:Administrator|Operator|Petugas'])->name('update_datapembelian');
Route::delete('/datapembelian/hapus/{id}',[DataPembelianController::class, 'destroy'])->middleware(['auth', 'verified', 'role:Administrator|Operator|Petugas'])->name('datapembelianhapus');

// inventaris
Route::get('/inventaris', [InventarisController::class, 'inventaris'])->name('inventaris');

// data pemakaian
Route::get('/ruang', [RuangController::class, 'index'])->middleware(['auth', 'verified', 'role:Administrator'])->name('ruang');
Route::post('/ruang/add', [RuangController::class, 'store'])->middleware(['auth', 'verified', 'role:Administrator'])->name('tambah_ruang');
Route::put('/ruang/update{id}', [RuangController::class, 'update'])->middleware(['auth', 'verified', 'role:Administrator'])->name('update_ruang');
Route::delete('/ruang/hapus/{id}',[RuangController::class, 'destroy'])->middleware(['auth', 'verified', 'role:Administrator'])->name('ruanghapus');

//export
Route::get('/user/exportexcel', [UserController::class, 'export'])->name('userexport');
Route::get('/databarang/exportexcel', [DataBarangController::class, 'export'])->name('databarangexport');
Route::get('/datapembelian/exportexcel', [DataPembelianController::class, 'export'])->name('datapembelianexport');
Route::get('/datapemakaian/exportexcel', [DataPemakaianController::class, 'export'])->name('datapemakaianexport');
Route::get('/ruang/exportexcel', [RuangController::class, 'export'])->name('ruangexport');
Route::get('/multi/exportexcel', [Controller::class, 'export'])->name('multiexport');
Route::get('/inventaris/exportexcel', [InventarisController::class, 'export'])->name('inventarisexport');



Route::get('/pemakaiantanggal/exportexcel', [PemakaianTanggal::class, 'exportt'])->name('pemakaiantanggalsexport');




require __DIR__.'/auth.php';
