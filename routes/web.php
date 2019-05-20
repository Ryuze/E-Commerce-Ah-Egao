<?php
use Illuminate\Support\Facades\Route;
use App\Product;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ProductController;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::resource('/', 'IndexController');
Route::get('item/{id}', 'IndexController@show');
// Route::get('/view', 'ProductController@index')->name('product.index');

Auth::routes();

Route::middleware(['auth'])->group(function (){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/profile', 'ProfileController');
    Route::resource('/chart', 'ChartController');
    Route::get('chart/{id}', 'ChartController@show');
    
    Route::middleware(['admin'])->group(function (){
        Route::get('/admin', 'HomeController@admin')->middleware('admin');
        Route::resource('/product', 'ProductController');
        Route::get('/delete', 'ProductController@delete')->name('product.delete');
        Route::get('/pesanan', 'ChartController@pesanan')->name('pesanan');
        Route::resource('/konfirmasi', 'KonfirmasiController');
    });
});