<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\ProductoController;

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
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inventarios', function () {
    return view('pages.inventarios');
})->name('inventarios');

Route::get('/pedidos', function () {
    return view('pages.pedidos');
})->name('pedidos');

Route::get('/ubicaciones', function () {
    return view('pages.ubicaciones');
})->name('ubicaciones');

Route::get('/informes', function () {
    return view('pages.informes');
})->name('informes');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('productos', App\Http\Controllers\ProductoController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('api')->group(function () {
    Route::get('/inventarios', [InventarioController::class, 'index']);
    Route::post('/inventarios', [InventarioController::class, 'store']);
    Route::put('/inventarios/{id}', [InventarioController::class, 'update']);
    Route::delete('/inventarios/{id}', [InventarioController::class, 'destroy']);
    Route::get('/pedidos', [PedidoController::class, 'index']);
    Route::post('/pedidos', [PedidoController::class, 'store']);
    Route::get('/pedidos/{id}', [PedidoController::class, 'show']);
    Route::put('/pedidos/{id}', [PedidoController::class, 'update']);
    Route::delete('/pedidos/{id}', [PedidoController::class, 'destroy']);
    Route::get('/informes', [InformeController::class, 'index']);
    Route::post('/informes', [InformeController::class, 'store']);
    Route::get('productos', [ProductoController::class, 'index']);
    Route::post('productos', [ProductoController::class, 'store']);
    Route::get('productos/{id}', [ProductoController::class, 'show']);
    Route::put('productos/{id}', [ProductoController::class, 'update']);
    Route::delete('productos/{id}', [ProductoController::class, 'destroy']);
});

require __DIR__.'/auth.php';
