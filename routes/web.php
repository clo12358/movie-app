<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\DirectorController;
use App\Http\Controllers\Admin\DirectorController as AdminDirectorController;
use App\Http\Controllers\User\DirectorController as UserDirectorController;
// use App\Http\Controllers\WriterController;
use App\Http\Controllers\Admin\WriterController as AdminWriterController;
use App\Http\Controllers\User\WriterController as UserWriterController;
// use App\Http\Controllers\GenreController;
use App\Http\Controllers\Admin\GenreController as AdminGenreController;
use App\Http\Controllers\User\GenreController as UserGenreController;
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

// Route::resource('/home', HomeController::class)->middleware(['auth', 'role:user,admin'])->names('user.home');
//     Route::resource('/admin/home', HomeController::class)->middleware(['auth', 'role:admin'])->names('admin.home');


Route::middleware('auth')->group(function () {

    // Route::resource('directors', DirectorController::class);
    // Route::resource('writers', WriterController::class);
    // Route::resource('genres', GenreController::class);
    // Route::resource('movies', MovieController::class);
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User/Admin Movies
    Route::resource('/movies', UserMovieController::class)->middleware(['auth', 'role:user,admin'])->names('user.movies')->only(['index', 'show']);
    Route::resource('/admin/movies', AdminMovieController::class)->middleware(['auth', 'role:admin'])->names('admin.movies');

    // User/Admin Writers
    Route::resource('/writers', UserWriterController::class)->middleware(['auth', 'role:user,admin'])->names('user.writers')->only(['index', 'show']);
    Route::resource('/admin/writers', AdminWriterController::class)->middleware(['auth', 'role:admin'])->names('admin.writers');

    // User/Admin Genres
    Route::resource('/genres', UserGenreController::class)->middleware(['auth', 'role:user,admin'])->names('user.genres')->only(['index', 'show']);
    Route::resource('/admin/genres', AdminGenreController::class)->middleware(['auth', 'role:admin'])->names('admin.genres');

    // User/Admin Directors
    Route::resource('/directors', UserDirectorController::class)->middleware(['auth', 'role:user,admin'])->names('user.directors')->only(['index', 'show']);
    Route::resource('/admin/directors', AdminDirectorController::class)->middleware(['auth', 'role:admin'])->names('admin.directors');
});

Route::get('/home', [HomeController::class, 'index'])->name('home.index');

require __DIR__.'/auth.php';
