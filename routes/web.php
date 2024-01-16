<?php

use App\Models\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RepositoryController;
use App\Http\Controllers\PullRequestController;

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

Route::get('/', function (Request $request) {
    $sortOption = $request->input('sort', 'default');
    switch($sortOption){
        default:
            $repositories = Repository::all();
    }
    return view('welcome', compact('repositories'));
})->name('home');

Route::get('/profile', function () {
    return view('profile');
})->name('profile')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/create-repository', [RepositoryController::class, 'create'])->name('create-repository');
    Route::post('/create-repository', [RepositoryController::class, 'store']);

    Route::get('/{user_name}/{repository_title}/create-pull-request', [PullRequestController::class, 'create'])->name('create-pull-request');
    Route::post('/{user_name}/{repository_title}/create-pull-request', [PullRequestController::class, 'store'])->name('store-pull-request');
});
Route::get('/{user_name}/{repository_title}', [RepositoryController::class, 'show'])->name('single-repository');

require __DIR__ . '/auth.php';
