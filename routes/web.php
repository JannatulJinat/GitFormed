<?php

use App\Models\Watcher;
use App\Models\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WatcherController;
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
    switch ($sortOption) {
        case 'alphabetical':
            $repositories = Repository::orderBy('repository_name')->get();
            break;
        case 'latest':
            $repositories = Repository::orderBy('created_at')->get();
            break;
        case 'watchers':
            $repositories = Repository::withCount('watchers')
                ->orderBy('watchers_count', 'desc')->get();
            break;
        default:
            $repositories = Repository::all();
    }
    return view('welcome', compact('repositories',));
})->name('home');

Route::get('/profile', function () {
    $repositories = Repository::where('user_id', auth()->id())->get();
    $watchedrepositoryIds = Watcher::where('user_id', auth()->id())->pluck('repository_id');
    $watchedrepositories = Repository::whereIn('id', $watchedrepositoryIds)->get();
    return view('profile', compact(['repositories', 'watchedrepositories']));
})->name('profile')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/create-repository', [RepositoryController::class, 'create'])->name('create-repository');
    Route::post('/create-repository', [RepositoryController::class, 'store']);

    Route::get('/{user_name}/{repository_title}/create-pull-request', [PullRequestController::class, 'create'])->name('create-pull-request');
    Route::post('/{user_name}/{repository_title}/create-pull-request', [PullRequestController::class, 'store'])->name('store-pull-request');

    Route::get('/store-watcher', [WatcherController::class, 'store'])->name('store-watcher');
});
Route::get('/{user_name}/{repository_title}', [RepositoryController::class, 'show'])->name('single-repository');

require __DIR__ . '/auth.php';
