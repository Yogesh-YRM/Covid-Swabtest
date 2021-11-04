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

Route::group([
    'prefix'=>config('admin.prefix'),
    'namespace'=>'App\\Http\\Controllers',
],function () {


    

    Route::get('login','LoginAdminController@formLogin')->name('admin.login');
    Route::post('login','LoginAdminController@login');

    Route::middleware(['auth:admin'])->group(function () {
        Route::post('logout','LoginAdminController@logout')->name('admin.logout');
        Route::view('/','dashboard')->name('dashboard');
        Route::view('/admin','data-admin')->name('admin')->middleware('can:role,"admin"');

        Route::get('adminCrud', 'adminController@manageAdmins')->name('admin.manageAdmins.adminCrud')->middleware('can:role,"admin","editor"');
        Route::get('adminCrud-Create', 'adminController@manageAdmins_Create')->name('admin.manageAdmins.adminCrud-Create')->middleware('can:role,"admin","editor"');
        Route::post('adminCrud-save', 'adminController@manageAdmins_save')->name('admin.manageAdmins.adminCrud-save')->middleware('can:role,"admin","editor"');
        Route::resource('adminregistratie','AdminRegisterController');

        //DR only authorized users can use the scanner 
        Route::get('/qrscanner', function () {
            return File::get(public_path() . '/custom/qrScanner.html');
        })->middleware('can:role,"admin","editor","medical","scanner"');
    });
   
});
