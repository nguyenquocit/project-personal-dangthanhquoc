<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\OrderController;
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
Route::get('/logout', [RegisteredUserController::class, 'logout']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';

//admin
Route::get('/admin/home', [ProductController::class, 'homeadmin']);
Route::get('/admin/pages/tables/type-product', [ProductController::class, 'showAllProductsType']);
Route::get('/admin/pages/tables/order', [ProductController::class, 'showAllorder']);
Route::get('/admin/pages/tables/user', [ProductController::class, 'showAllUsers']);
//user
Route::get('/deleteuser/{id}', [ProductController::class, 'remoteuser']);
Route::get('/edituser', [ProductController::class, 'edituser']);
Route::get('/admin/pages/forms/edituser/{id}', [ProductController::class, 'getuseredit']);
Route::get('/adduser', [ProductController::class, 'addnewuser']);
Route::get('/admin/pages/forms/adduser', [ProductController::class, 'adduser']);
//order
Route::get('/deleteorder/{id}', [ProductController::class, 'remoteorder']);
Route::get('/editorder', [ProductController::class, 'editorder']);
Route::get('/admin/pages/forms/editorder/{id}', [ProductController::class, 'getorderedit']);
Route::get('/addorder', [ProductController::class, 'addnewOrder']);
Route::get('/admin/pages/forms/addorder', [ProductController::class, 'addOrder']);
Route::get('/changestatus/{id}', [ProductController::class, 'changestatus']);
//type=product
Route::get('/deletetype/{id}', [ProductController::class, 'remotetype']);
Route::get('/admin/pages/forms/add-type', [ProductController::class, 'addNewTypeProduct']);
Route::get('/admin/pages/forms/edit-type/{id}', [ProductController::class, 'editType']);
Route::get('/addType', [ProductController::class, 'addTypes']);
Route::get('/editType', [ProductController::class, 'editTypeprd']);
//manufacture
Route::get('/editmanu', [ProductController::class, 'editmanufacture']);
Route::get('/admin/pages/forms/editmanu/{id}', [ProductController::class, 'editmanu']);
Route::get('/deletemanu/{id}', [ProductController::class, 'remotemanu']);
Route::get('/admin/pages/forms/addnew-manu', [ProductController::class, 'addmanufacture']);
Route::get('/addmanu', [ProductController::class, 'addManus']);
Route::get('/admin/pages/tables/manufacture', [ProductController::class, 'showAllManufacture']);
//admin/product
Route::get('/admin/pages/tables/product', [ProductController::class, 'showAllProducts']);
Route::get('/admin/pages/forms/addproduct', [ProductController::class, 'addNewProduct']);
Route::get('/deleteProduct/{id}', [ProductController::class, 'remoteProduct']);
Route::get('/editproduct', [ProductController::class, 'editProducts']);
Route::get('/addproducts', [ProductController::class, 'addProducts']);
Route::get('/admin/pages/forms/editproduct/{id}', [ProductController::class, 'editProduct']);
//cart
Route::get('/cart', [CartController::class, 'showCart']);
Route::get('/deletecart/{id}', [CartController::class, 'remotecart']);
Route::get('/add-gio-hang/{id}', [CartController::class, 'addToCart'])->name('add_gio_hang');
//wishlist
Route::get('/listw', [ProductController::class, 'showWishlist']);
Route::get('/add-wish-list/{id}', [WishlistController::class, 'addwl'])->name('add_wish_list');
Route::get('/delete/{id}', [WishlistController::class, 'remoteWl']);

Route::get('/your-order', [OrderController::class, 'yourOder']);
Route::get('/checkout', [ProductController::class, 'order']);


Route::get('/shop-details/{id}', [ProductController::class, 'getProductById']);
Route::get('/search-result', [ProductController::class, 'searchProduct']);
Route::get('/getproductbyprice', [ProductController::class, 'searchProduct']);
Route::get('/category/{id}', [ProductController::class, 'getProductByTypeId']);
Route::get('/', [ProductController::class, 'showAllProduct']);