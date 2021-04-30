<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MemberController;
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
    return view('home');
});
Route::get('/member', [MemberController::class ,'index'])->name('member');
Route::get('/saran/member', [SaranController::class ,'index'])->name('saran');
Route::get('/pengaduan/member', [PengaduanController::class ,'index'])->name('pengaduan');
