<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\DataPemakaianController;
use App\Http\Controllers\DataPembelianController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\ProfileController;
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
Route::get('/user', [UserController::class, 'viewuser'])->name('user');
Route::get('/useradd', [UserController::class, 'create'])->name('useradd');
Route::post('/user/add', [UserController::class, 'store'])->name('tambah_user');
Route::get('/useredit{id}', [UserController::class, 'edit'])->name('useredit');
Route::put('/user/update{id}', [UserController::class, 'update'])->name('update_user');
Route::delete('/user/hapus/{id}',[UserController::class, 'destroy'])->name('userhapus');

Route::get('/databarang', [DataBarangController::class, 'databarang'])->name('databarang');
Route::get('/databarangadd', [DataBarangController::class, 'create'])->name('databarangadd');
Route::post('/databarang/add', [DataBarangController::class, 'store'])->name('tambah_databarang');
Route::get('/databarangedit{id}', [DataBarangController::class, 'edit'])->name('databarangedit');
Route::put('/databarang/update{id}', [DataBarangController::class, 'update'])->name('update_databarang');
Route::delete('/databarang/hapus/{id}',[DataBarangController::class, 'destroy'])->name('databaranghapus');

Route::get('/datapemakaian', [DataPemakaianController::class, 'datapemakaian'])->name('datapemakaian');
Route::get('/datapemakaianadd', [DataPemakaianController::class, 'create'])->name('datapemakaianadd');
Route::post('/datapemakaian/add', [DataPemakaianController::class, 'store'])->name('tambah_datapemakaian');
Route::get('/datapemakaianedit{id}', [DataPemakaianController::class, 'edit'])->name('datapemakaianedit');
Route::put('/datapemakaian/update{id}', [DataPemakaianController::class, 'update'])->name('update_datapemakaian');
Route::delete('/datapemakaian/hapus/{id}',[DataPemakaianController::class, 'destroy'])->name('datapemakaianhapus');

// data pembelian
Route::get('/datapembelian', [DataPembelianController::class, 'datapembelian'])->name('datapembelian');
Route::get('/datapembelianadd', [DataPembelianController::class, 'create'])->name('datapembelianadd');
Route::post('/datapembelian/add', [DataPembelianController::class, 'store'])->name('tambah_datapembelian');
Route::get('/datapembelianedit{id}', [DataPembelianController::class, 'edit'])->name('datapembelianedit');
Route::put('/datapembelian/update{id}', [DataPembelianController::class, 'update'])->name('update_datapembelian');
Route::delete('/datapembelian/hapus/{id}',[DataPembelianController::class, 'destroy'])->name('datapembelianhapus');


Route::get('/inventaris', [InventarisController::class, 'inventaris'])->name('inventaris');




require __DIR__.'/auth.php';
