<?php

use App\Http\Controllers\CartContoller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerPanelController;
use App\Http\Controllers\CustomerViewController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsersController;
use App\Models\Products;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confim' => false,
]);

Route::middleware(['auth'])->group(function () {

    Route::resource('/users', UsersController::class);

    // role
    Route::get('/roles', [RoleController::class,'index'])->name('role_index');
    Route::post('/roles', [RoleController::class,'store'])->name('role_store');
    Route::get('/roles/{role}', [RoleController::class,'edit'])->name('role_edit');
    Route::put('/roles/{role}', [RoleController::class,'update'])->name('role_update');
    Route::get('/searchrole', [RoleController::class,'search'])->name('role_search');


    // product
    Route::resource('/products', ProductController::class);
    Route::get('/searchproduct', [ProductController::class,'search'])->name('product_search');

    // category
    Route::get('/categories', [CategoryController::class,'index'])->name('category_index');
    Route::get('/categories/create', [CategoryController::class,'create'])->name('category_create');
    Route::post('/categories', [CategoryController::class,'store'])->name('category_store');
    Route::get('/categories/{category}', [CategoryController::class,'edit'])->name('category_edit');
    Route::put('/categories/{category}', [CategoryController::class,'update'])->name('category_update');
    Route::get('/searchcategory', [CategoryController::class,'search'])->name('category_search');

    // customer view from admin panel
    Route::get('/customers', [CustomerViewController::class,'index'])->name('customer_view_index');
    Route::get('/customershow/{customer}', [CustomerViewController::class,'show'])->name('customer_show');

    // customer contact from admin
    Route::get('/customers_contact',[CustomerViewController::class,'contact'])->name('customer_contact');

    // order list
    Route::get('/orderlist',[OrderController::class,'orderlist']);
    Route::get('/orderlistsubmit/{order}/done',[OrderController::class,'ordersubmit']);
});

// customer panel
Route::get('/',[CustomerPanelController::class,'index'])->name('customer_index');

Route::get('/customerlogin',[CustomerPanelController::class,'login'])->name('customer_login')->middleware('alreadyLoggedIn');

Route::get('/customersignup',[CustomerPanelController::class,'signup'])->name('customer_signup')->middleware('alreadyLoggedIn');

Route::post('/customersignup',[CustomerPanelController::class,'signup_store'])->name('customer_signup_store');
Route::post('/customerlogin',[CustomerPanelController::class,'login_store'])->name('customer_login_store');
Route::get('/customerlogout',[CustomerPanelController::class,'logout'])->name('customer_logout');

Route::post('/ordersubmit',[CustomerPanelController::class,'submit'])->name('order_submit');

Route::get('/productdetial/{product}',[CustomerPanelController::class,'detail'])->name('product_detail');

// cart page
Route::get('/order',[CartContoller::class,'index'])->name('cart_index');
Route::get('/order/{order}/cancel',[CartContoller::class,'cancel']);
Route::post('/ordercheckout',[CartContoller::class,'checkout'])->name('order_checkout');

// all product page
Route::get('/allproducts',[CustomerPanelController::class,'allproduct']);
Route::get('/searchproducts', [CustomerPanelController::class,'search'])->name('products_search');

// contact us page
Route::get('/contact_us',[CustomerPanelController::class,'contact_us']);
Route::post('/contact_us',[CustomerPanelController::class,'contact_us_post'])->name('contact_us_post');