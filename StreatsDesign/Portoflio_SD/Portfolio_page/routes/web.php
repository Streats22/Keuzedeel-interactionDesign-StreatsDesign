<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/Posting', function () {
    return view('Posting');
})->middleware(['auth'])->name('Posting');

Route::get('/Usermanger', function () {
    return view('Usermanger');
})->middleware(['auth'])->name('Usermanger');

require __DIR__.'/auth.php';
