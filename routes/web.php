<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\Product_detail;
use App\Http\Controllers\SendMail;
use App\Http\Controllers\Store;

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
    return view('customer.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';




Route::prefix('store')->group(function(){
    Route::get('/',[Store::class,'index'])->name('store');
    Route::get('/manu/{manu_id}',[Store::class,'show_manuid']);
    Route::get('/type/{type_id}',[Store::class,'show_typeid']);
});
Route::prefix('product')->group(function(){
    Route::get('/{id}',[Product_detail::class,'show']);
});
Route::get('/send',[MyController::class,'sendMail'])->name('send.mail');


