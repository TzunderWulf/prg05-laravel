<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;
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

Route::get('/', [CharacterController::class, 'getLatest']);
Route::get('/about', function() { return view('about'); });

// Character related business
Route::get('/characters', [CharacterController::class, 'index']);
Route::get('/characters/{character}', [CharacterController::class, 'show'])
    ->name('character.show');

Route::middleware('auth')->group(function() {
    Route::get('/add', [CharacterController::class, 'create']);
    Route::post('/store-form', [CharacterController::class, 'store']);

    Route::get('/edit/{character}', [CharacterController::class, 'edit'])
        ->name('edit');
    Route::post('/store-edit/{character}', [CharacterController::class, 'update'])
        ->name('store-edit');

    Route::post('/change-status', [CharacterController::class, 'changeStatus'])
        ->name('change-status');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])
    ->name('home');
Route::get('/admin-home', [CharacterController::class, 'showAdminDashboard'])
    ->middleware('auth')
    ->name('admin-home');
