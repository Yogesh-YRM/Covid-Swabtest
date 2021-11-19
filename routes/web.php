<?php

use Illuminate\Support\Facades\Route;

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
    return view('registratie.preregister');
});
Route::resource('registeren','App\Http\Controllers\RegisterController');
Route::post('pre_registration','App\Http\Controllers\RegisterController@preregister')->name('preregister');
Route::get('result_pdf/{id}','App\Http\Controllers\RegisterController@result_pdf')->name('result_pdf');

Route::group([
    'prefix'=>config('admin.prefix'),
    'namespace'=>'App\\Http\\Controllers',
],function () {




    Route::get('login','LoginAdminController@formLogin')->name('admin.login');
    Route::post('login','LoginAdminController@login');

    Route::middleware(['auth:admin'])->group(function () {
        Route::post('logout','LoginAdminController@logout')->name('admin.logout');
        Route::view('/','dashboard')->name('dashboard');
//         Route::view('/admin','data-admin')->name('admin')->middleware('can:role,"admin"');

        Route::resource('authorizeUsers', 'AuthorizeUsersController');
        Route::resource('users', 'UsersController');
        Route::resource('vaccinatie', 'VaccinationController');
        Route::resource('adminregistratie','AdminRegisterController');
        Route::get('result/{id}/{result}','AdminRegisterController@result')->name('result');
        Route::get('resultaten','AdminRegisterController@resultaatoverzicht')->name('resultaatoverzicht');

        //DR only authorized users can use the scanner
        Route::get('/vaccinatie-eqrscanner', function () {
            return File::get(public_path() . '/custom/vaccinatie-eqrscanner.html');
        })->middleware('can:role,"admin","editor","medical","scanner"');
        Route::get('/pcr-qrscanner', function () {
            return File::get(public_path() . '/custom/pcr_qrScanner.html');
        })->middleware('can:role,"admin","editor","medical","scanner"');
    });

});
