<?php

use App\Http\Controllers\DesignControllers;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\UsermangerController;

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
Route::get('/Design', [DesignController::class, 'Design']);
Route::get('/Logo', [LogoController::class, 'Logo']);
Route::get('/About', [AboutController::class, 'about']);
Route::get('/Web', [WebController::class, 'webPage']);
Route::get('/Contact', [ContactController::class, 'Contact']);

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');



//Route::get('/UsermangerController', function () {
//    return view('UsermangerController');
//})->name('UsermangerController');

Route::prefix( '/dashboard')->middleware(['auth'])->group(function (){

    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resources([
        'post' => PostController::class,
    ]);
    Route::resources([
        'design' => DesignControllers::class,
    ]);
    Route::resources([
        'users' => UsermangerController::class,
    ]);
});

require __DIR__.'/auth.php';

