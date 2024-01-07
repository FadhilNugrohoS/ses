<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Atasan\{
    BarangController as A_BarangController,
    PemesananController,
    DataAktualController,
    DashboardController as A_DashboardController,
    PeramalanController,
    LoginController,
    UserController
};
use App\Http\Controllers\Karyawan\{
    BarangController as K_BarangController, 
    PemesananController as K_PemesananController,
    DashboardController as K_DashboardController,
};

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
    Route::get('/',function(){
        return view('Auth.login');
    });
    Auth::routes();

    Route::group(['prefix' => 'atasan', 'middleware' =>['isAtasan','auth']], function(){

        /*  Route Atasan */

        //home
        Route::get('/dashboard',[A_DashboardController::class,'index'])->name('atasan.dashboard');

        //Barang
        Route::resource('barangs',A_BarangController::class);

        //Pemesanan
        Route::resource('pemesanans',PemesananController::class);
        Route::get('pemesanans/{id}/proses',[PemesananController::class,'proses'])->name('pemesanans.proses');
        Route::post('/pemesanans/fetch',[PemesananController::class,'fetch'])->name('pemesanans.dependent');
        Route::post('/pemesanans/fetch1',[PemesananController::class,'fetch1'])->name('pemesanans.fetch1');
        Route::post('/pemesanans/fetch2',[PemesananController::class,'fetch2'])->name('pemesanans.fetch2');

        //Data Aktual
        Route::resource('/data',DataAktualController::class);
        Route::post('/data/barang',[DataAktualController::class,'barang'])->name('data.dependent');
        Route::post('/data/fetch1',[DataAktualController::class,'fetch1'])->name('data.fetch1');
        Route::get('/perhitungan',[DataAktualController::class,'proses'])->name('data.proses');

        //Peramalan
        Route::resource('peramalan',PeramalanController::class);
        Route::get('peramalans/result',[PeramalanController::class,'result'])->name('peramalan.result');
        Route::post('peramalan/proses',[PeramalanController::class,'proses'])->name('peramalan.proses');

        //User
        Route::resource('user',UserController::class);

        /* Route Atasan End */


});

//Routing Role Karyawan
Route::group(['prefix' => 'karyawan', 'middleware' => ['isKaryawan', 'auth']], function ()
{
    //home
    Route::get('/dashboard',[K_DashboardController::class,'index'])->name('karyawan.dashboard');

    Route::resource('barang',K_BarangController::class);

        //Pemesanan
        Route::resource('pemesanan',K_PemesananController::class);
        Route::get('pemesanan/{id}/proses',[K_PemesananController::class,'proses'])->name('karyawan.pemesanan.proses');
        Route::post('/pemesanan/fetch',[K_PemesananController::class,'fetch'])->name('pemesanan.dependent');
        Route::post('/pemesanan/fetch1',[K_PemesananController::class,'fetch1'])->name('pemesanan.fetch1');
        Route::post('/pemesanan/fetch2',[K_PemesananController::class,'fetch2'])->name('pemesanan.fetch2');

});



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
