<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RepositoryController;

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
})->name('home');

Route::get('/profile', function () {
    return view('profile');
})->name('profile')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/create-repository', [RepositoryController::class, 'create'])->name('create-repository');
    Route::post('/create-repository', [RepositoryController::class, 'store']);
});

require __DIR__ . '/auth.php';
