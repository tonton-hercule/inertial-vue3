<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuteursController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CollectionsController;
use App\Http\Controllers\EditeursController;
use App\Http\Controllers\ParutionsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\StatutsController;
use App\Http\Controllers\UsersController;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name("index");
/*
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::group(['prefix' => "admin", 'middleware' => ['auth', 'verified']], function () {
    Route::resource('roles', RolesController::class);
    Route::resource('statuts', StatutsController::class);
    Route::resource('users', UsersController::class);
    Route::resource('auteurs', AuteursController::class);
    Route::resource('editeurs', EditeursController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('collections', CollectionsController::class);
    Route::resource('publications', ParutionsController::class);
    //Route post
    Route::resource('posts', PostController::class);
    //Route Blog
    Route::resource('blogs',BlogController::class);

});

Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard'); ///, 'can' => ['roleUser' => auth()->user()->can('viewAny', User::class)]

require __DIR__.'/auth.php';
