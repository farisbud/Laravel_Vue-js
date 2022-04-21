<?php

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

//route web
Route::get('/','indexController@index');
Route::get('/single-page/{sid}/show/{id}','indexController@show');
Route::get('/sub-all/{sub}','indexController@tampil_sub');
Route::get('/all-post/show','indexController@tampil_all')->name('all');
Route::get('/search-site','indexController@searchSite');
Route::get('/about-us','indexController@aboutUs')->name('about');

// route web finance
Route::get('/data-finance','financeController@index');
Route::get('/data-finance/{id}/detail','financeController@show');

// route web excel
Route::get('/finance','excelController@index');
Route::get('/data-excel/{id}/detail','excelController@show');

//route abouts us


//route admin
Route::post('/login','Admin\LoginController@log_in')->name('log_in');
Route::get('/logout','Admin\LoginController@log_out')->name('log_out');


//saat dihosting tapi gambar tidak muncul
// Route::get('/linkstorage', function () {
//      $targetFolder = base_path().'/storage/app/public'; 
//      $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage'; 
//      symlink($targetFolder, $linkFolder); });


//clear cache
// Route::get('/clear-cache', function() {
//     $exitCode = Artisan::call('cache:clear');
//     // return what you want
// });

// Route::get('/clear-cache', function() {
//     $exitCode = Artisan::call('config:clear');
//     // return what you want
// });

Route::middleware(['AuthCheck'])->group(function () {
    
    Route::get('/admin-login','Admin\LoginController@index');
    Route::get('/admin/beranda','Admin\HomeController@index');
    
    //kategori
    Route::get('/admin/kategori/','Admin\CategoryController@index')->name('kategori');
    Route::get('/admin/kategori/tambah','Admin\CategoryController@create')->name('tambah_kat');
    Route::post('/admin/kategori/','Admin\CategoryController@store')->name('store_cat');
    Route::delete('/admin/kategori/{cat}','Admin\CategoryController@destroy');
    Route::get('/admin/kategori/{cat}/edit','Admin\CategoryController@edit');
    Route::patch('/admin/kategori/{cat}','Admin\CategoryController@update');

    //sub kategori
    Route::get('/admin/sub-kategori/','Admin\SubCategoryController@index');
    Route::get('/admin/sub-kategori/{sub}/lihat','Admin\SubCategoryController@show');
    Route::get('/admin/sub-kategori/tambah','Admin\SubCategoryController@create');
    Route::post('/admin/sub-kategori/','Admin\SubCategoryController@store')->name('store_sub');
    Route::delete('/admin/sub-kategori/{sub}','Admin\SubCategoryController@destroy');
    Route::get('/admin/sub-kategori/{sub}/edit','Admin\SubCategoryController@edit');
    Route::patch('/admin/sub-kategori/{sub}','Admin\SubCategoryController@update');

    //konten
    Route::get('/admin/konten/','Admin\ContentController@index');
    Route::get('/admin/konten/tambah','Admin\ContentController@create');
    Route::post('/admin/konten/','Admin\ContentController@store')->name('store_content');
    Route::delete('/admin/konten/{cont}','Admin\ContentController@destroy');
    Route::get('/admin/konten/findSub','Admin\ContentController@findSub');
    Route::get('/admin/konten/{cont}/edit','Admin\ContentController@edit');
    Route::patch('/admin/konten/{cont}','Admin\ContentController@update');
    //bisa pakai ini

    // perusahaan
    Route::get('/admin/perusahaan','Admin\PerusahaanController@index');
    Route::get('/admin/perusahaan/tambah','Admin\PerusahaanController@create');
    Route::post('/admin/perusahaan','Admin\PerusahaanController@store')->name('store_per');
    Route::delete('/admin/perusahaan/{per}','Admin\PerusahaanController@destroy');
    Route::get('/admin/perusahaan/{per}/edit','Admin\PerusahaanController@edit');
    Route::get('/admin/perusahaan/{per}/detail','Admin\PerusahaanController@show');
    Route::patch('/admin/perusahaan/{per}','Admin\PerusahaanController@update');

    //link-data
    Route::get('/admin/data-link','Admin\LinkDataController@index');
    Route::get('/admin/data-link/{link}/tambah','Admin\LinkDataController@create');
    Route::get('/admin/data-link/{link}/show','Admin\LinkDataController@show');
    Route::post('/admin/data-link','Admin\LinkDataController@store')->name('store_link');
    Route::get('/admin/data-link/{link}/edit','Admin\LinkDataController@edit');
    Route::patch('/admin/data-link/{link}','Admin\LinkDataController@update');
    Route::delete('/admin/data-link/{link}','Admin\LinkDataController@destroy');

    //link-excel
    Route::get('/admin/data-excel','Admin\DataExcelController@index');
    Route::get('/admin/data-excel/{excel}/tambah','Admin\DataExcelController@create');
    Route::post('/admin/data-excel','Admin\DataExcelController@store')->name('store_excel');
    Route::get('/admin/data-excel/{excel}/show','Admin\DataExcelController@show');
    Route::get('/admin/data-excel/{excel}/edit','Admin\DataExcelController@edit');
    Route::patch('/admin/data-excel/{excel}','Admin\DataExcelController@update');
    Route::delete('/admin/data-excel/{excel}','Admin\DataExcelController@destroy');

    //akun
    Route::get('/admin/akun','Admin\AkunController@index');
    Route::get('/admin/akun/tambah','Admin\AkunController@create');
    Route::post('/admin/akun','Admin\AkunController@store')->name('store_akun');
    Route::get('/admin/akun/{akun}/edit','Admin\AkunController@edit');
    Route::patch('/admin/akun/{akun}','Admin\AkunController@update');
    Route::delete('/admin/akun/{akun}','Admin\AkunController@destroy');

    //navbar

    Route::get('/admin/navbar','Admin\navBarController@index');
    Route::get('/admin/navbar/{nav}/edit','Admin\navBarController@edit');
    Route::patch('/admin/navbar/{nav}','Admin\navBarController@update');

    //About Us
    Route::get('/admin/about-us','Admin\AboutUsController@index');
    Route::get('/admin/about-us/tambah','Admin\AboutUsController@create');
    Route::post('/admin/about-us','Admin\AboutUsController@store')->name('store_aboutUs');
    Route::get('/admin/about-us/{about}/edit','Admin\AboutUsController@edit');
    Route::patch('/admin/about-us/{about}','Admin\AboutUsController@update');
    Route::delete('/admin/about-us/{about}','Admin\AboutUsController@destroy');

    //Route::resource('/admin/kategori/', 'Admin\CategoryController');
});


