<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Product_detail;
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
})->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::prefix('store')->group(function () {
    Route::get('/', [Store::class, 'index'])->name('store');
    Route::get('/manu/{manu_id}', [Store::class, 'show_manuid']);
    Route::get('/type/{type_id}', [Store::class, 'show_typeid']);
});
Route::prefix('product')->group(function () {
    Route::get('/{id}', [Product_detail::class, 'show']);
});

Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin', 'auth']], function () {
    Route::get('', function () {
        return view('admin.index');
    })->name('admin');
    Route::prefix('products')->group(function () {
        Route::get('', [AdminController::class, 'index']);
        Route::get('/add', [AdminController::class, 'show_add_product']);
        Route::get('/edit/{product_id}', [AdminController::class, 'show_edit_product']);
    });
    
});

Route::get('/send', [MyController::class, 'sendMail'])->name('send.mail');

Route::post('/add-to-card', [CartController::class, 'addtocard']);
Route::get('/remove-card/{id}', [CartController::class, 'removecard']);
