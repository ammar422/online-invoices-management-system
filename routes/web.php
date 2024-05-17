<?php

use App\Models\Invoice;
use App\Models\InvoicesDetail;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

route::get('tst/{id}', 'Invoice\InvoicesAttachmetntController@show');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
route::middleware('auth')->group(function () {
    Route::resource('invoices', 'Invoice\InvoiceController');
    Route::resource('sections', 'Section\SectionController');
    route::resource('products', 'Product\ProductController');
    route::resource('invoices_details', 'Invoice\InvoicesDetailController');
    route::resource('invoice_attachments','Invoice\InvoicesAttachmetntController');
    route::get('open_file/{id}/{file}','Invoice\InvoicesAttachmetntController@showFile')->name('invoice_attachments.show_file');
    route::get('download_file/{id}/{file}','Invoice\InvoicesAttachmetntController@downloadFile')->name('invoice_attachments.download_file');
    Route::get('/{page}', 'AdminController@index')->middleware('auth');
});
