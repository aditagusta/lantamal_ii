<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Admin\SaranController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Android
Route::post('register', [MemberController::class ,'registerMember']);
Route::post('login', [MemberController::class ,'loginMember']);

Route::group(["middleware" => "auth:member"], function() {
    Route::post('pengaduan', [PengaduanController::class ,'addPengaduan']);
    Route::post('saran', [SaranController::class ,'addSaran']);
});
