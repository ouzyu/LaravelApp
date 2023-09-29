<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => 'auth'], function() {
    Route::resource('users', UsersController::class, ['only' => ['index', 'show', 'edit', 'update']]);
    Route::post('users/{id}/follow', [UsersController::class, 'follow'])->name('follow');
    Route::delete('users/{id}/unfollow', [UsersController::class, 'unfollow'])->name('unfollow');
});

require __DIR__.'/auth.php';
