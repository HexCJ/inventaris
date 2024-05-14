<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\DataPemakaianController;
use App\Http\Controllers\DataPembelianController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/databarang', [DataBarangController::class, 'databarang'])->name('databarang');
Route::get('/datapemakaian', [DataPemakaianController::class, 'datapemakaian'])->name('datapemakaian');
Route::get('/datapembelian', [DataPembelianController::class, 'datapembelian'])->name('datapembelian');
Route::get('/inventaris', [InventarisController::class, 'inventaris'])->name('inventaris');




require __DIR__.'/auth.php';
