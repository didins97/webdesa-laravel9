<?php

use Illuminate\Support\Facades\Route;

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

// BE
Route::prefix('admin')->group(function () {
    Route::middleware('role:admin')->group(function() {
        Route::resource('user', App\Http\Controllers\UserController::class);
        Route::get('profile', [App\Http\Controllers\ProfileDesaController::class, 'index'])->name('profile.index');
        Route::patch('profile/{id}/update', [App\Http\Controllers\ProfileDesaController::class, 'update'])->name('profile.update');
        Route::resource('pengaturan', App\Http\Controllers\PengaturanController::class);
    });
    Route::middleware('role:admin&operator')->group(function() {
        Route::resource('produk', App\Http\Controllers\ProdukController::class);
        Route::resource('artikel', App\Http\Controllers\ArtikelController::class);
        Route::resource('potensi_desa', App\Http\Controllers\PotensiDesaController::class);
        Route::get('dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('pengumuman', [App\Http\Controllers\PengumumanController::class, 'index'])->name('pengumuman.index');
        Route::post('pengumuman', [App\Http\Controllers\PengumumanController::class, 'store'])->name('pengumuman.store');
        Route::get('pengumuman/{id}/edit', [App\Http\Controllers\PengumumanController::class, 'edit'])->name('pengumuman.edit');
        Route::patch('pengumuman/update', [App\Http\Controllers\PengumumanController::class, 'update'])->name('pengumuman.update');
        Route::delete('pengumuman/{id}', [App\Http\Controllers\PengumumanController::class, 'delete'])->name('pengumuman.delete');

        Route::patch('artikel/{id}/status', [App\Http\Controllers\ArtikelController::class, 'update_status'])->name('status.artikel');
        Route::patch('potensi/{id}/status', [App\Http\Controllers\PotensiDesaController::class, 'update_status'])->name('status.potensi');
        Route::patch('produk/{id}/status', [App\Http\Controllers\ProdukController::class, 'update_status'])->name('status.produk');
    });
});

// FE
Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('beranda.index');
Route::get('/berita', [App\Http\Controllers\FrontendController::class, 'get_berita'])->name('berita.index');
Route::get('/potensi', [App\Http\Controllers\FrontendController::class, 'get_potensi'])->name('potensi.index');
Route::get('/produk', [App\Http\Controllers\FrontendController::class, 'get_produk'])->name('produk.list');
Route::get('/tentang', [App\Http\Controllers\FrontendController::class, 'get_tentang'])->name('tentang.index');
Route::get('/berita/{slug}', [App\Http\Controllers\FrontendController::class, 'get_beritaBySlug'])->name('berita.detail');
Route::get('/potensi/{slug}', [\App\Http\Controllers\FrontendController::class, 'get_potensiBySlug'])->name('potensi.detail');
Route::get('/produk/{slug}', [App\Http\Controllers\FrontendController::class, 'get_productBySlug'])->name('produk.detail');

// AUTH
Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login_post'])->name('login.post');
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
