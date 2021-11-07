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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('vaccinatieQR','App\Http\Controllers\ApiController@vaccinatie_QRvalidation')->name('vaccinatie_QRvalidation');
Route::post('PCRQR','App\Http\Controllers\ApiController@PCR_QRvalidation')->name('PCR_QRvalidation');
