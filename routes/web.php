<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

// API Email
use App\Http\Controllers\SendEmail;

// Admin Namespace
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Admin\AkunController;
use App\Http\Controllers\Admin\DompetController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\PaketController;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Admin\PenerimaController;
use App\Http\Controllers\Admin\PengirimanController;

use App\Http\Controllers\Admin\ImportLayananController;
use App\Http\Controllers\Admin\KurirController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\ProfileAdminController;

// User Namespace
use App\Http\Controllers\User\HomeUserController;
use App\Http\Controllers\User\ProfileUserController;
use App\Http\Controllers\User\PengirimanUserController;
use App\Http\Controllers\User\PembayaranUserController;
use App\Http\Controllers\User\TopUpController;
use App\Http\Controllers\User\pageLacakController;
use App\Http\Controllers\User\cekOngkosController;

// homepae namaspace
use App\Http\Controllers\Homepage\HomepageController;
use App\Http\Controllers\Homepage\LacakController;

use App\Http\Controllers\Homepage\LoginController;
use App\Http\Controllers\Homepage\CekController;


// kurir namespace
use App\Http\Controllers\Kurir\homeKurirController;

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

Route::get('/', function () {
    return view('homepage.dashboardhome');
});


Route::get('/send-email', [SendEmail::class, 'index']);

Route::get('/home', [HomepageController::class, 'index']);
Route::get('/lacakpaket', [LacakController::class, 'index1']);
Route::get('/cek', [CekController::class, 'index']);
// Rute untuk admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index']);

        // Resource Controller
        Route::resource('akun', AkunController::class);
        Route::resource('pengiriman', PengirimanController::class);
        Route::resource('paket', PaketController::class);
        Route::resource('penerima', PenerimaController::class);
        Route::resource('pembayaran', PembayaranController::class);
        Route::resource('kurir', KurirController::class);
        Route::resource('dompet', DompetController::class);
        Route::resource('layanan', LayananController::class);
        Route::resource('paket', PaketController::class);

        // profile
        Route::get('/profile', [ProfileAdminController::class, 'show']);
        Route::patch('/profile/{id}', [ProfileAdminController::class, 'update']);

        // Laporan Controller
        Route::get('/laporan', [LaporanController::class, 'index']);
        Route::get('/laporan/laporanPDF', [LaporanController::class, 'exportPDF']);
        Route::get('/laporan/laporanExcel', [LaporanController::class, 'exportPengiriman']);

        // import excel
        Route::post('layanan/importLayanan', [ImportLayananController::class, 'importLayanan']);
    });
});

// Rute untuk user
Route::middleware(['auth', 'user'])->group(function () {
    Route::prefix('my')->group(function () {

        // Route::get('/home', [TopUpController::class, 'ceksaldo']);

        Route::get('/home', [HomeUserController::class, 'index']);
        Route::get('/profile', [ProfileUserController::class, 'index']);
        Route::patch('/profile/{id}', [ProfileUserController::class, 'update']);
        // Pengiriman Controller
        Route::get('/pengirimanUser', [PengirimanUserController::class, 'index']);
        Route::post('/pengirimanUser/update', [PengirimanUserController::class, 'store']);
        Route::get('/pengirimanUser/create', [PengirimanUserController::class, 'create']);
        Route::post('/pengirimanUser/pull', [PengirimanUserController::class, 'pul']);
        // Pembayaran Controller
        Route::get('/pembayaranUser', [PembayaranUserController::class, 'index']);
        Route::get('/pembayaranUser/laporanPDF', [PembayaranUserController::class, 'exportPDF']);
        Route::get('/lacak', [pageLacakController::class, 'index1']);
        Route::get('/cek', [cekOngkosController::class, 'index']);

        // Resource Controller
        // Route::resource('transaksi', transaksiController::class);

        // Dompetku Controller
        Route::get('/dompetku', [TopUpController::class, 'index'])->name('my.dompetku');
        Route::get('/dompetku/cari', [TopUpController::class, 'cari']);
        Route::post('/dompetku/store', [TopUpController::class, 'store']);
        Route::get('/dompetku/payment/{id}', [TopUpController::class, 'payment'])->name('my.dompet.payment');
        Route::get('/dompetku/success/{id}', [TopUpController::class, 'success']);
        Route::get('/dompetku/laporanPDF', [TopUpController::class, 'exportPDF']);
    });
});

Route::middleware(['auth', 'kurir'])->group(function () {
    Route::prefix('kurir')->group(function () {

        Route::get('/home', [homeKurirController::class, 'index']);
        Route::post('/home/store/{id}', [homeKurirController::class, 'store']);
        Route::get('/maps', [homeKurirController::class, 'maps']);
        Route::get('/profile', [homeKurirController::class, 'profile']);
        Route::post('/profile/update', [homeKurirController::class, 'update']);
    });
});


// route sementara api
Route::get('layananapi', [LayananController::class, 'apiLayanan']);
Route::get('layananapi/ {id}', [LayananController::class, 'apiLayananDetail']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// membuat link storage
Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    dd(Artisan::output());
});
