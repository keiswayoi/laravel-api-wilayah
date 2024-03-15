<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\WilayahController;
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

Route::get('/tes', [TestController::class, 'index']);
Route::get('/kecamatan', [WilayahController::class, 'kecamatan']);
Route::get('/kelurahan', [WilayahController::class, 'kelurahan']);
