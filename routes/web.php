<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\WisataController;
use App\Http\Controllers\User\HomeController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/wisata', [HomeController::class, 'wisata'])->name('wisata');

Route::get('/detail-wisata/{slug}', [HomeController::class, 'detail_wisata'])->name('detail-wisata');

Route::get('/berita', [HomeController::class, 'berita'])->name('berita');

Route::get('/detail-berita/{slug}', [HomeController::class, 'detail_berita'])->name('detail-berita');

Route::post('/kirim-review', [HomeController::class, 'kirim_review'])->name('kirim-review');

Route::middleware(['auth'])
    ->group(function() {

        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

        Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

        Route::post('/ckeditor-upload', [DashboardController::class, 'upload'])->name('ckeditor.upload');

        Route::get('/data-wisata/{slug}/print-qr-code', [WisataController::class, 'cetak'])->name('data-wisata.print');

        Route::resource('data-wisata', WisataController::class);

        Route::resource('data-berita', BeritaController::class);

        Route::get('/data-review/set-aktif/{id}', [ReviewController::class, 'set_aktif'])->name('data-review.set-aktif');

        Route::get('/data-review/set-non-aktif/{id}', [ReviewController::class, 'set_non_aktif'])->name('data-review.set-non-aktif');

        Route::resource('data-review', ReviewController::class);

        Route::resource('data-admin', AdminController::class);

    });


require __DIR__.'/auth.php';
