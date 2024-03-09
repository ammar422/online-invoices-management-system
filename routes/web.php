<?php

use App\Models\Section;
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

// route::get('tst',function(){
//     return getSectionName();
//     });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
route::middleware('auth')->group(function () {
    Route::resource('invoices', 'Invoice\InvoiceController');
    Route::resource('sections', 'Section\SectionController');
    route::resource('products','Product\ProductController');
    Route::get('/{page}', 'AdminController@index')->middleware('auth');
});
