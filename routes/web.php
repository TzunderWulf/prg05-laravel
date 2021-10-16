<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharactersController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [CharactersController::class, 'getLatest']);
Route::get('/about', function() { return view('about'); });

// Character related business
Route::get('/characters', [CharactersController::class, 'index']);
Route::get('/characters/{character}', [CharactersController::class, 'show'])
    ->name('character.show');

Route::get('/add', [CharactersController::class, 'create'])
    ->middleware('auth');
Route::post('/store-form', [CharactersController::class, 'store'])
    ->middleware('auth');

Route::get('/edit/{character}', [CharactersController::class, 'edit'])
    ->middleware('auth')
    ->name('edit');
Route::post('/store-edit/{character}', [CharactersController::class, 'update'])
    ->middleware('auth')
    ->name('store-edit');

Route::post('/change-status', [CharactersController::class, 'changeStatus'])
    ->middleware('auth')
    ->name('change-status');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])
    ->name('home');
Route::get('/admin-home', [CharactersController::class, 'showLatestChanges'])
    ->name('admin-home');
