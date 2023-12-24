<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Artikel;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\SanctumAuthController;

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

Route::post('login', [SanctumAuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('/showAllArtikels', [ArtikelController::class, 'index']);

    Route::get('/showArtikel/{artikel}', [ArtikelController::class, 'show']);

    Route::post('/create-artikel', [ArtikelController::class, 'store']);

    Route::put('/update-artikel/{artikel}', [ArtikelController::class, 'update'])->middleware('penulis');

    Route::delete('/delete-artikel/{artikel}', [ArtikelController::class, 'destroy'])->middleware('penulis');

    Route::get('/logout', [SanctumAuthController::class, 'logout']);
});

// Route::post('/createArtikel', [ArtikelController::class, 'store'])->name('create.api');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
