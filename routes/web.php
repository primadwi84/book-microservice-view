<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewsController;

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

require __DIR__.'/auth.php';

Route::get('/first',[ViewsController::class,'index']);
Route::get('/create', [ViewsController::class, 'create']);
Route::post('/store', [ViewsController::class, 'store']); //INSERT DATA
Route::get('/first/{id}/edit', [ViewsController::class, 'edit']);
Route::patch('/first/{id}/update', [ViewsController::class, 'update']);
Route::get('{id}/delete', [ViewsController::class, 'delete']);