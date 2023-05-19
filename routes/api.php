<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum', 'role:Dosen']], function () {
    Route::apiResource('dashboard_dsn', 'Dashboard\Dosen\DosenController' );
});

Route::group(['middleware' => ['auth:sanctum', 'role:Mahasiswa']], function () {
   Route::get('dashboard_mhs', 'Dashboard\Mahasiswa\MhsController@index' );
   Route::post('pengajuan', 'Dashboard\Mahasiswa\MhsController@store');

});

//Route::middleware('auth:sanctum', 'guard_access:web')->group(function () {
//    Route::resource('dashboard', DosenController::class);
//});
