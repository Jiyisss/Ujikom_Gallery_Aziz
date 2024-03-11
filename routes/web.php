<?php
use App\Http\Controllers\registerController;
use App\Http\Controllers\fotogaleriController;
use App\Http\Controllers\crudController;
use App\Http\Controllers\searchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sessioncontroller;

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

Route::get('/', [fotogaleriController::class, 'home'])->name('halaman-home');

Route::get('/register', [registerController::class, 'register'])->name('register.form');
Route::post('/register', [registerController::class, 'registeraksi'])->name('register.aksi');

Route::get('/input', [crudController::class,'index'])
    ->name('indexinput')
    ->middleware('auth');
Route::post('/kirim-post', [crudController::class, 'store'])->name('input-data');
Route::get('/edit/{id}/', [crudController::class, 'edit'])->name('edit-data');
Route::post('/edit/{id}/', [crudController::class, 'update'])->name('update-data');
Route::get('/delete/{id}', [crudController::class, 'destroy'])->name('delete-data');
Route::get('/search/', [SearchController::class, 'search'])->name('search');

Route::get('like/{postId}', [fotogaleriController::class, 'likePost'])->name('like');
Route::get('unlike/{postId}', [fotogaleriController::class, 'unlikePost'])->name('unlike');
Route::post('/komen/{postId}', [fotogaleriController::class, 'komen'])->name('komen');




Route::get('/profile', [fotogaleriController::class, 'profile'])
->name('profile')
->middleware('auth');

Route::get('/sesi', [sessioncontroller::class,'index'])->name('login');
Route::post('/sesi/login', [sessioncontroller::class,'login'])->name('sesi.login');
Route::get('/sesi/logout', [sessionController::class, 'logout'])->name('sesi.logout');

Route::get('/{id}', [fotogaleriController::class, 'singlepage'])
    ->name('singlepage')
    ->middleware('auth');

