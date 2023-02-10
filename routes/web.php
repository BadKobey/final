<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\StockController;
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

Route::group(['namespace' => 'Main'], function (){
    Route::get('/','IndexController')->name('maim.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['role:admin'])->prefix('admin_panel')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('homeAdmin'); // /admin

    Route::resource('stock', StockController::class);
    Route::resource('product', ProductController::class);
});
/*
Route::get('{page}', \App\Http\Controllers\Client\IndexController::class)->where('page', '.*');
*/

Route::get('file-import-export', [ProductController::class, 'fileImportExport']);
Route::post('file-import', [ProductController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [ProductController::class, 'fileExport'])->name('file-export');
