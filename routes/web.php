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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';


Route::prefix('')->group(function(){
    Route::get('/',[MyController::class,'index'])->name('customer.index');
    // Route::get('/new-products/{number}',[MyController::class,'getnewproduct']);
});



Route::prefix('store')->group(function () {
    Route::get('/', [Store::class, 'index'])->name('store');
    Route::get('/manu/{manu_id}', [Store::class, 'show_manuid']);
    Route::get('/type/{type_id}', [Store::class, 'show_typeid']);
    Route::get('keyword/', [Store::class,'search'])->name('keyword');

});
Route::prefix('product')->group(function () {
    Route::get('/{id}', [Product_detail::class, 'show']);
});

Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin', 'auth']], function () {
    Route::get('', function () {
        return view('admin.index');
    })->name('admin');

    Route::prefix('products')->group(function () {
        Route::get('', [AdminController::class, 'show_products'])->name('products');
        Route::get('/add', [AdminController::class, 'show_add_product']);
        Route::get('/edit/{product_id}', [AdminController::class, 'show_edit_product']);
        Route::post('/add-product', [AdminController::class, 'add_product']);
        Route::post('/edit-product', [AdminController::class, 'edit_product']);
        Route::get('/delete-product/{id}', [AdminController::class, 'delete_product']);
    });
    Route::prefix('protypes')->group(function () {
        Route::get('', [AdminController::class, 'show_protypes'])->name('protypes');
        Route::get('/add', [AdminController::class, 'show_add_protype']);
        Route::get('/edit/{type_id}', [AdminController::class, 'show_edit_protype']);
        Route::post('/add-protype', [AdminController::class, 'add_protype']);
        Route::post('/edit-protype', [AdminController::class, 'edit_protype']);
        Route::get('/delete-protype', [AdminController::class, 'delete_protype']);
    });
    Route::prefix('manufactures')->group(function () {
        Route::get('', [AdminController::class, 'show_manufactures'])->name('manufactures');
        Route::get('/add', [AdminController::class, 'show_add_manufacture']);
        Route::get('/edit/{manu_id}', [AdminController::class, 'show_edit_manufacture']);
        Route::post('/add-manufacture', [AdminController::class, 'add_manufacture']);
        Route::post('/edit-manufacture', [AdminController::class, 'edit_manufacture']);
        Route::get('/delete-manufacture', [AdminController::class, 'delete_manufacture']);
    });
});

Route::get('/send', [MyController::class, 'sendMail'])->name('send.mail');

Route::post('/add-to-card', [CartController::class, 'addtocard']);
Route::get('/remove-card/{id}', [CartController::class, 'removecard']);
Route::get('/add-wishlist/{product_id}',[MyController::class,'addwishlist']);