<?php

use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\CategoryController;
use App\http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\PerusahaanController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
    
// });

 Route::middleware('AuthCheck:api')->group( function() {

    Route::get('admin/kategori',[CategoryController::class, 'index']);
Route::post('save_kategori','Admin\CategoryController@store');
Route::put('update_kategori/{cat}','Admin\CategoryController@update');
Route::delete('delete_kategori/{cat}','Admin\CategoryController@destroy');

 });



//admin
Route::get('admin/',[HomeController::class, 'count']);
//kategori

//sub_categori
Route::get('admin/sub_kategori','Admin\SubCategoryController@index');
Route::get('getSubKategori/{id}','Admin\SubCategoryController@show');
Route::post('save_sub','Admin\SubCategoryController@store');
Route::put('update_sub/{sub}','Admin\SubCategoryController@update');
Route::delete('delete_sub/{sub}','Admin\SubCategoryController@destroy');
//konten
Route::get('admin/konten','Admin\ContentController@index');
Route::get('findSub','Admin\ContentController@findSub');
Route::post('save_konten','Admin\ContentController@store');
Route::get('admin/getGambar/{id}','Admin\ContentController@edit');
Route::post('update_konten/{cont}','Admin\ContentController@update');
Route::delete('delete_konten/{id}','Admin\ContentController@destroy');

//perusahaan
Route::get('admin/perusahaan','Admin\PerusahaanController@index');
Route::post('save_perusahaan','Admin\PerusahaanController@store');
Route::delete('delete_perusahaan/{id}','Admin\PerusahaanController@destroy');
Route::put('update_perusahaan/{id}','Admin\PerusahaanController@update');

//data_link
Route::get('admin/data_link','Admin\LinkDataController@index');
Route::get('getDataLink/{id}','Admin\LinkDataController@show');
Route::post('save_link','Admin\LinkDataController@store');
Route::put('update_link/{id}','Admin\LinkDataController@update');
Route::delete('delete_link/{id}','Admin\LinkDataController@destroy');

//data_excel
Route::get('admin/data_excel','Admin\DataExcelController@index');
Route::get('getDataExcel/{id}','Admin\DataExcelController@show');
Route::post('save_excel','Admin\DataExcelController@store');
Route::put('update_excel/{id}','Admin\DataExcelController@update');
Route::delete('delete_excel/{id}','Admin\DataExcelController@destroy');
//akun
Route::get('admin/akun','Admin\AkunController@index');
Route::post('save_akun','Admin\AkunController@store');
Route::put('update_akun/{akun}','Admin\AkunController@update');
Route::delete('delete_akun/{akun}','Admin\AkunController@destroy');

//navbar
Route::get('admin/navbar','Admin\navBarController@index');
Route::put('update_navbar/{nav}','Admin\navBarController@update');
//about
Route::get('admin/about','Admin\AboutUsController@index');
Route::get('getGambar/{about}','Admin\AboutUsController@edit');
Route::post('update_about/{about}','Admin\AboutUsController@update');

