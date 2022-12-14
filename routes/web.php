<?php

use App\Http\Controllers\{
    LikedPostsController,
    PostsController
};

use Illuminate\Support\Facades\Route;

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
});

Route::get('/dashboard', [PostsController::class,'index'])->middleware(['auth'])->name('dashboard');

Route::resource('/posts' , PostsController::class );
Route::resource('/liked' , LikedPostsController::class );


require __DIR__.'/auth.php';
