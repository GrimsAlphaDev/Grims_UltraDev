<?php

use App\Http\Controllers\AdminCategoryController;
use App\Models\User;
use App\Models\Category;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DashboardMahasiswaController;

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
    return view('home',[
        "title" => "HOME"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "ABOUT",
        "name" => "Ultra Dev",
        "class" => "MFs Dangerous",
        "email" => "Fully Classified",
        "img" => "patoriku.jpg"
    ]);
});


// tampilan utama mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);

// Halaman Mahasiswa Single
Route::get('/mahasiswa/{mahasiswa:nim}', [MahasiswaController::class, 'show']);

// halaman Tampilan Kategori dengan slug sebagai penentu
Route::get('/categories/{category:slug}', [MahasiswaController::class, 'category']);

// halaman tampilan Semua Kategori
Route::get('/categories', [MahasiswaController::class, 'categories']);

// halaman tampilan data mahasiswa pilihan
Route::get('/admin/{user:username}',[MahasiswaController::class, 'mahasiswa']);

// Halaman Login 
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

// Halaman Registrasi
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

// Input Data Registrasi
Route::post('/register', [RegisterController::class, 'store']);

// User Melakukan Aksi Login
Route::post('/login', [LoginController::class, 'authenticate']);

// Halaman Dashboard (Untuk Yang sudah login)
Route::get('/dashboard', function() {
    return view('dashboard.dashboard', ['title' => 'Dashboard']);
})->middleware('auth');

// Halaman Data Mahasiswa (Untuk Admin Yang Login)
Route::resource('/dashboard/mahasiswa', DashboardMahasiswaController::class)->middleware('auth');

// Logout
Route::post('/logout', [LoginController::class, 'logout']);

// Membuat Slug Otomatis
Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('admin');

// Halaman Kategori
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

