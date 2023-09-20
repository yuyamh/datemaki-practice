<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MyPostController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;

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
    return view('welcome');
})->name('welcome');

Route::get('/page/terms', [PageController::class, 'terms'])->name('page.terms');
Route::get('/page/policy', [PageController::class, 'policy'])->name('page.policy');
Route::get('/page/contact', [PageController::class, 'contact'])->name('page.contact');

Route::middleware('auth')->group(function () {
    Route::resource('/posts', PostController::class)->except('index');
    Route::get('/myposts', [MyPostController::class, 'index'])->name('myposts.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/posts/{post}/unbookmark', [BookmarkController::class, 'destroy'])->name('bookmarks.destroy');
    Route::post('/posts/{post}/bookmark', [BookmarkController::class, 'store'])->name('bookmarks.store');
    Route::get('/bookmarks', [PostController::class, 'bookmark_posts'])->name('bookmarks');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::resource('/users', UserController::class)->only(['index', 'show']);

require __DIR__.'/auth.php';
