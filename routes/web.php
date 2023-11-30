<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\WriterController;
use App\Http\Controllers\GenreController;
// use App\Http\Controllers\MovieController;
use App\Http\Controllers\Admin\MovieController as AdminMovieController;
use App\Http\Controllers\User\MovieController as UserMovieController;

use App\Http\Controllers\HomeController;

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

// Route::resource('directors', DirectorController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Route::resource('directors', DirectorController::class);
    // Route::resource('writers', WriterController::class);
    // Route::resource('genres', GenreController::class);
    // Route::resource('movies', MovieController::class);
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::resource('/user/movies', UserMovieController::class)->middleware(['auth'])->names('user.movies')->only(['index', 'show']);
    Route::resource('/books', UserBookController::class)->middleware(['auth', 'role:user,admin'])->names('user.books')->only(['index', 'show']);
    // Route::resource('/admin/books', AdminBookController::class)->middleware(['auth'])->names('admin.books');
    Route::resource('/admin/movies', AdminMovieController::class)->middleware(['auth', 'role:admin'])->names('admin.movies');
});

Route::get('/home', [HomeController::class, 'index'])->name('home.index');

require __DIR__.'/auth.php';
