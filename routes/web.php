<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\SaranController;
use App\Http\Controllers\Admin\PengaduanController;

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
    return view('pages.login');
});
Route::get('login', [LoginController::class ,'index'])->name('login');
Route::post('postlogin', [LoginController::class ,'login'])->name('postlogin');

// Route::middleware(['admin'])->group(function () {
//     Route::get('home', [HomeController::class ,'index'])->name('homeadmin');
//     Route::get('postlogout', [LoginController::class ,'logout'])->name('postlogout');
//     Route::get('member', [MemberController::class ,'index'])->name('member');
//     Route::get('saran/member', [SaranController::class ,'index'])->name('saran');
//     Route::get('pengaduan/member', [PengaduanController::class ,'index'])->name('pengaduan');
// });


Route::group(['middleware' => 'auth:admin'], function () {
    //
    Route::get('postlogout', [LoginController::class ,'logout'])->name('postlogout');
    //
    Route::get('home', [HomeController::class ,'index'])->name('homeadmin');
    //
    Route::post('tambah/member', [MemberController::class ,'add']);
    Route::put('update/member', [MemberController::class ,'update'])->name('upmember');
    Route::delete('hapus/member/{id?}', [MemberController::class ,'remove'])->name('hapusmember');
    Route::get('edit/member/{id?}', [MemberController::class ,'get']);
    Route::get('member', [MemberController::class ,'index'])->name('member');
    //
    Route::get('saran/member', [SaranController::class ,'index'])->name('saran');
    Route::delete('hapus/saran/member/{id?}', [SaranController::class ,'remove'])->name('hapussaran');
    //
    Route::get('pengaduan/member', [PengaduanController::class ,'index'])->name('pengaduan');
    Route::delete('hapus/pengaduan/member/{id?}', [PengaduanController::class ,'remove'])->name('hapuspengaduan');
});
