<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login',[App\Http\Controllers\API\UserController::class,'login']);
Route::post('register',[App\Http\Controllers\API\UserController::class,'register']);
Route::post('logout',[App\Http\Controllers\API\UserController::class,'logout'])->middleware('auth:api');;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:api']], function () {
    Route::post('orangtua',[App\Http\Controllers\API\OrangtuaController::class,'store']);
    Route::post('anak',[App\Http\Controllers\API\OrangtuaController::class,'tambahAnak']);
    Route::get('anak',[App\Http\Controllers\API\OrangtuaController::class,'dataAnak']);
    Route::get('anak/{id}',[App\Http\Controllers\API\OrangtuaController::class,'anak']);
    Route::put('anak/{id}',[App\Http\Controllers\API\OrangtuaController::class,'updateAnak']);
    Route::post('pemeriksaanfisik',[App\Http\Controllers\API\PemeriksaanFisikController::class,'store']);
    Route::post('pemeriksaangigi',[App\Http\Controllers\API\PemeriksaanGigiController::class,'store']);
    Route::get('kecamatan',[App\Http\Controllers\API\SekolahController::class,'getKecamatan']);
    Route::get('kelurahan/{id}',[App\Http\Controllers\API\SekolahController::class,'getKelurahan']);
    Route::get('sekolah/{id}',[App\Http\Controllers\API\SekolahController::class,'listSekolah']);
    

});
