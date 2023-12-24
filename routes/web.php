<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;

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

Auth::routes(['reset' => false]);

Route::group(['auth', 'middleware' => ['pembaca']], function () {
    Route::get('/penulis', function () {
        return view('penulis');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/pembaca', function () {
        return view('pembaca');
    });
});

Route::redirect('/', '/login');