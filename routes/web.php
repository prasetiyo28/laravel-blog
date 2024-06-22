<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\Api\BlogPostAPIController;
use App\Http\Controllers\CommentController;
use Spatie\Permission\Middlewares\RoleMiddleware;

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

Auth::routes();

// Route::middleware(['role:admin,user'])->group(function () {
    Route::resource('posts', BlogPostController::class);
// });



Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');



Route::get('/api/posts', [BlogPostAPIController::class, 'index']);