<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/' , [\App\Http\Controllers\HomeController::class , 'index']);

Route::get('/landing', function () {
    return view('landing-page/index');
});



Auth::routes();

Route::get('/banding' , [\App\Http\Controllers\HomeController::class , 'banding' ])->name('banding');
Route::get('/bandingKota' , [\App\Http\Controllers\HomeController::class , 'banding' ])->name('banding.kota');
Route::get('/bandingKecamatan' , [\App\Http\Controllers\HomeController::class , 'banding' ])->name('banding.kecamatan');
Route::get('/bandingProvinsi' , [\App\Http\Controllers\HomeController::class , 'banding' ])->name('banding.provinsi');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/storeFoodRequest/' , [\App\Http\Controllers\FoodRequestController::class , 'storeFoodRequest'])->name('storeFoodRequest');
Route::post('/storeFoodNonRequest/' , [\App\Http\Controllers\NonFoodRequestController::class , 'storeRequest'])->name('storeRequest');

Route::post('/updateProfile' , [\App\Http\Controllers\HomeController::class , 'updateProfile'])->name('updateProfile');


Route::prefix('admin')->middleware('auth')->group(function (){

    Route::middleware('role')->group(function () {
        Route::get('/dashboard/main', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
//    Route::get('/pemetaan/provinsi' , [\App\Http\Controllers\AdminController::class)->name('admin.provinsiIndex');
        Route::get('/pemetaan/wargaProvinsi', [\App\Http\Controllers\AdminController::class, 'wargaProvinsiIndex'])->name('admin.wargaProvinsi');
        Route::post('/pemetaan/wargaProvinsi', [\App\Http\Controllers\AdminController::class, 'storeProvinsi'])->name('admin.storeProvinsi');
        Route::put('/pemetaan/wargaProvinsi/{id}', [\App\Http\Controllers\AdminController::class, 'updateProvinsi'])->name('admin.updateProvinsi');
        Route::get('/pemetaan/deleteProvinsi/{id}', [\App\Http\Controllers\AdminController::class, 'deleteProvinsi'])->name('admin.deleteProvinsi');

        //pemetaan warga kota
        Route::get('/pemetaan/wargaKota', [\App\Http\Controllers\AdminController::class, 'wargaKotaIndex'])->name('admin.wargaKota');
        Route::post('/pemetaan/wargaKota/', [\App\Http\Controllers\AdminController::class, 'storeKota'])->name('admin.storeKota');
        Route::get('/pemetaan/deleteKota/{id}', [\App\Http\Controllers\AdminController::class, 'deleteKota'])->name('admin.deleteKota');
        Route::put('/pemetaan/wargaKota/{id}', [\App\Http\Controllers\AdminController::class, 'updateKota'])->name('admin.updateKota');

        //pemetaan warga kecamatan

        Route::get('/pemetaan/wargaKecamatan', [\App\Http\Controllers\AdminController::class, 'wargaKecamatanIndex'])->name('admin.wargaKecamatan');
        Route::post('/pemetaan/wargaKecamatan/', [\App\Http\Controllers\AdminController::class, 'storeKecamatan'])->name('admin.storeKecamatan');
        Route::put('/pemetaan/wargaKecamatan/{id}', [\App\Http\Controllers\AdminController::class, 'updateKecamatan'])->name('admin.updateKecamatan');
        Route::get('/pemetaan/deleteKecamatan/{id}', [\App\Http\Controllers\AdminController::class, 'deleteKecamatan'])->name('admin.deleteKecamatan');

        //makanan

        Route::get('/makanan/', [\App\Http\Controllers\FoodCategoryController::class, 'index'])->name('admin.foodIndex');
        Route::post('/makanan/', [\App\Http\Controllers\FoodCategoryController::class, 'storeFood'])->name('admin.storeFood');
        Route::put('/makanan/{id}', [\App\Http\Controllers\FoodCategoryController::class, 'updateFood'])->name('admin.updateFood');
        Route::get('/deleteMakanan/{id}', [\App\Http\Controllers\FoodCategoryController::class, 'deleteFood'])->name('admin.deleteFood');

        //FoodProd

        Route::get('/foodPord', [\App\Http\Controllers\FoodProdController::class, 'index'])->name('admin.foodProdIndex');
        Route::post('/foodProd', [\App\Http\Controllers\FoodProdController::class, 'storeFoodProd'])->name('admin.storeFoodProd');
        Route::put('/update/foodProd/{id}', [\App\Http\Controllers\FoodProdController::class, 'updateFoodProd'])->name('admin.updateFoodProd');
        Route::get('/delete/foodProd/{id}', [\App\Http\Controllers\FoodProdController::class, 'deleteFoodProd'])->name('admin.deleteFoodProd');

        //marketmaping

        Route::get('/marketMaping', [\App\Http\Controllers\MarketMapingController::class, 'index'])->name('admin.marketMapingIndex');
        Route::post('/marketMaping', [\App\Http\Controllers\MarketMapingController::class, 'storeMarket'])->name('admin.storeMarketMaping');
        Route::put('/marketMaping/{id}', [\App\Http\Controllers\MarketMapingController::class, 'updateMarket'])->name('admin.updateMarketMaping');
        Route::get('/delete/marketMaping/{id}', [\App\Http\Controllers\MarketMapingController::class, 'deleteMarket'])->name('admin.deleteMarketMaping');

        //agri

        Route::get('/agriMaping', [\App\Http\Controllers\agriController::class, 'index'])->name('admin.agriIndex');
        Route::post('/agriMaping', [\App\Http\Controllers\agriController::class, 'storeAgri'])->name('admin.storeAgri');
        Route::put('/agriMaping/{id}', [\App\Http\Controllers\agriController::class, 'updateAgri'])->name('admin.updateAgri');
        Route::get('/delete/agriMaping/{id}', [\App\Http\Controllers\agriController::class, 'deleteAgri'])->name('admin.deleteAgri');

        //requestFood

        Route::get('/requestFood'  , [\App\Http\Controllers\FoodRequestController::class , 'index'])->name('admin.foodReqIndex');
        Route::get('/acceptRequestFood/{id}' , [\App\Http\Controllers\FoodRequestController::class , 'acceptRequest'])->name('admin.acceptRequestFood');
        Route::get('/onProgressFood/{id}' , [\App\Http\Controllers\FoodRequestController::class , 'runProgress'])->name('admin.runProgressFood');
        Route::get('/rejectRequestFood/{id}' , [\App\Http\Controllers\FoodRequestController::class , 'rejectedRequest'])->name('admin.rejectRequestFood');
        Route::get('/doneProgressFood/{id}' , [\App\Http\Controllers\FoodRequestController::class , 'doneRequest'])->name('admin.doneProgressFood');
        Route::get('/downloadFoodSupportedDocument/{id}' , [\App\Http\Controllers\FoodRequestController::class , 'downloadFIle'] )->name('admin.downloadDocFood');


        //NonrequestFood

        Route::get('/nonrequestFood'  , [\App\Http\Controllers\NonFoodRequestController::class , 'index'])->name('admin.NonFoodRequestIndex');
        Route::get('/acceptNonRequestFood/{id}' , [\App\Http\Controllers\NonFoodRequestController::class , 'acceptRequest'])->name('admin.acceptRequestNonFood');
        Route::get('/onProgressNonFood/{id}' , [\App\Http\Controllers\NonFoodRequestController::class , 'runProgress'])->name('admin.runProgressNonFood');
        Route::get('/rejectRequestNonFood/{id}' , [\App\Http\Controllers\NonFoodRequestController::class , 'rejectedRequest'])->name('admin.rejectRequestNonFood');
        Route::get('/doneProgressNonFood/{id}' , [\App\Http\Controllers\NonFoodRequestController::class , 'doneRequest'])->name('admin.doneProgressNonFood');
        Route::get('/downloadFoodSupportedDocument/{id}' , [\App\Http\Controllers\NonFoodRequestController::class , 'downloadFIle'] )->name('admin.downloadDocFood');


        //visualisasi

        Route::get('/visualisasi/wilayah' , [\App\Http\Controllers\WilayahController::class , 'wilayah'])->name('visualisasi.wilayah.index');
        Route::get('/visualisasi/kecamatan/search' , [\App\Http\Controllers\WilayahController::class , 'kecamatan'])->name('visualisasi.search.kecamatan');
        Route::get('/visualisasi/kota/search' , [\App\Http\Controllers\WilayahController::class , 'kota'])->name('visualisasi.search.kota');
        Route::get('/visualisasi/provinsi/search' , [\App\Http\Controllers\WilayahController::class , 'provinsi'])->name('visualisasi.search.provinsi');

        Route::get('/visualisasi/provinsi/banding' , [\App\Http\Controllers\WilayahController::class , 'bandingProvinsi'])->name('visualisasi.banding.provinsi');

        Route::get('/visualisasi/kecamatan/banding' , [\App\Http\Controllers\WilayahController::class , 'bandingKecamatan'])->name('visualisasi.banding.kecamatan');
        Route::get('/visualisasi/kota/banding' , [\App\Http\Controllers\WilayahController::class , 'bandingKota'])->name('visualisasi.banding.kota');
        Route::get('/visualisasi/banding' , [\App\Http\Controllers\WilayahController::class , 'banding'])->name('visualisasi.wilayah.banding');
    });
});
