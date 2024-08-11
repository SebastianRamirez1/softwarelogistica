<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\InformeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::apiResource('productos', ProductoController::class);
Route::apiResource('inventarios', InventarioController::class);
Route::apiResource('pedidos', PedidoController::class);
Route::apiResource('ubicaciones', UbicacionController::class);
Route::apiResource('informes', InformeController::class);
