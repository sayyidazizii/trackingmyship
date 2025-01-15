<?php

use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\KurirController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\LacakController as ApiLacakController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\LacakController;
use App\Http\Controllers\api\pengirimanController;
use App\Models\Kurir;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/layanan', [LayananController::class, 'index']);
Route::get('/layanan/{id}', [LayananController::class, 'show']);
Route::post('/layanan-create', [LayananController::class, 'store']);
Route::put('/layanan/{id}', [LayananController::class, 'update']);

Route::get('/kurir', [KurirController::class, 'index']);
Route::get('/kurir/{id}', [KurirController::class, 'show']);
Route::post('/kurir-create', [KurirController::class, 'store']);


Route::get('/lacak', [LacakController::class, 'index']);
Route::get('/lacak/{kode}', [LacakController::class, 'show']);
Route::get('/pengiriman', [pengirimanController::class, 'index']);
Route::post('/pengiriman', [pengirimanController::class, 'store']);
Route::put('/pengiriman/{id}', [pengirimanController::class, 'update']);

// Route::get('/lacak', function(){
//     dd('test api');
// });
