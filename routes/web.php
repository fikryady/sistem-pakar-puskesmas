<?php

use App\Http\Controllers\BantuanController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardDiseaseController;
use App\Http\Controllers\DashboardHistoryController;
use App\Http\Controllers\DashboardRuleController;
use App\Http\Controllers\DashboardSymptomController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/informasi', [InformasiController::class, 'index'])->name('informasi');
Route::get('/bantuan', [BantuanController::class, 'index'])->name('bantuan');

Route::get('/user/{username}/edit', [UserController::class, 'edit'])->name('profile.edit');
Route::put('/user/update', [UserController::class, 'update'])->name('profile.update');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/konsultasi', [ConsultationController::class, 'index'])->name('index');
Route::post('/konsultasi/proses', [ConsultationController::class,'process'])->name('process');
Route::get('/konsultasi/result/{kodeKonsultasi}', [ConsultationController::class,'result'])->name('result');
Route::get('/konsultasi/cetak/{kodeKonsultasi}', [ConsultationController::class, 'cetak'])->name('cetak');

Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');

Route::get('/register', [RegisterController::class, 'index'])->name('registrasi');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('admin');

Route::resource('/dashboard/diseases', DashboardDiseaseController::class)->middleware('admin');

Route::resource('/dashboard/symptoms', DashboardSymptomController::class)->middleware('admin');

Route::resource('/dashboard/users', DashboardUserController::class)->middleware('admin');

Route::resource('/dashboard/rules', DashboardRuleController::class)->middleware('admin');

Route::resource('/dashboard/histories', DashboardHistoryController::class)->middleware('admin');
Route::get('/cetak-laporan', [DashboardHistoryController::class, 'cetakLaporan'])->middleware('admin')->name('cetak_laporan');