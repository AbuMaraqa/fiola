<?php

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

Route::get('/', function () {
    if (!auth()->check()){
        return redirect('/login');
    }
    else{
        return redirect('/home');
    }
});

Auth::routes([
    'register'=>false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'users','middleware'=>'auth'],function (){
    Route::get('/index',[App\Http\Controllers\UsersController::class , 'index'])->name('users.index');
    Route::get('/add',[App\Http\Controllers\UsersController::class , 'add'])->name('users.add');
    Route::post('/create',[App\Http\Controllers\UsersController::class , 'create'])->name('users.create');
    Route::get('/edit/{id}',[App\Http\Controllers\UsersController::class , 'edit'])->name('users.edit');
    Route::post('/update/{user_id}',[App\Http\Controllers\UsersController::class , 'update'])->name('users.update');
});

Route::group(['prefix'=>'manufacturers','middleware'=>'auth'],function (){
    Route::get('/index',[App\Http\Controllers\ManufacturersController::class , 'index'])->name('manufacturers.index');
    Route::get('/add',[App\Http\Controllers\ManufacturersController::class , 'add'])->name('manufacturers.add');
    Route::post('/create',[App\Http\Controllers\ManufacturersController::class , 'create'])->name('manufacturers.create');
    Route::get('/edit/{id}',[App\Http\Controllers\ManufacturersController::class , 'edit'])->name('manufacturers.edit');
    Route::put('/update',[App\Http\Controllers\ManufacturersController::class , 'update'])->name('manufacturers.update');
});

Route::group(['prefix'=>'products','middleware'=>'auth'],function (){
    Route::get('/index',[App\Http\Controllers\ProductsController::class , 'index'])->name('products.index');
    Route::get('/add',[App\Http\Controllers\ProductsController::class , 'add'])->name('products.add');
    Route::post('/create',[App\Http\Controllers\ProductsController::class , 'create'])->name('products.create');
    Route::get('/edit/{id}',[App\Http\Controllers\ProductsController::class , 'edit'])->name('products.edit');
    Route::put('/update',[App\Http\Controllers\ProductsController::class , 'update'])->name('products.update');
    Route::get('/details/{id}',[App\Http\Controllers\ProductsController::class , 'details'])->name('products.details');
});

Route::group(['prefix'=>'suppliers','middleware'=>'auth'],function (){
    Route::get('/index',[App\Http\Controllers\SuppliersController::class , 'index'])->name('suppliers.index');
    Route::get('/add',[App\Http\Controllers\SuppliersController::class , 'add'])->name('suppliers.add');
    Route::post('/create',[App\Http\Controllers\SuppliersController::class , 'create'])->name('suppliers.create');
    Route::get('/edit/{id}',[App\Http\Controllers\SuppliersController::class , 'edit'])->name('suppliers.edit');
    Route::put('/update',[App\Http\Controllers\SuppliersController::class , 'update'])->name('suppliers.update');
    Route::get('/details/{id}',[App\Http\Controllers\SuppliersController::class , 'details'])->name('suppliers.details');
});

Route::group(['prefix'=>'clients','middleware'=>'auth'],function (){
    Route::get('/index',[App\Http\Controllers\ClientController::class , 'index'])->name('clients.index');
    Route::get('/add',[App\Http\Controllers\ClientController::class , 'add'])->name('clients.add');
    Route::post('/create',[App\Http\Controllers\ClientController::class , 'create'])->name('clients.create');
    Route::get('/edit/{id}',[App\Http\Controllers\ClientController::class , 'edit'])->name('clients.edit');
    Route::put('/update',[App\Http\Controllers\ClientController::class , 'update'])->name('clients.update');
    Route::get('/details/{id}',[App\Http\Controllers\ClientController::class , 'details'])->name('clients.details');
});

Route::group(['prefix'=>'delivery','middleware'=>'auth'],function (){
    Route::get('/index',[App\Http\Controllers\DeliveryController::class , 'index'])->name('delivery.index');
    Route::get('/add',[App\Http\Controllers\DeliveryController::class , 'add'])->name('delivery.add');
    Route::post('/create',[App\Http\Controllers\DeliveryController::class , 'create'])->name('delivery.create');
    Route::get('/edit/{id}',[App\Http\Controllers\DeliveryController::class , 'edit'])->name('delivery.edit');
    Route::put('/update',[App\Http\Controllers\DeliveryController::class , 'update'])->name('delivery.update');
    Route::get('/details/{id}',[App\Http\Controllers\DeliveryController::class , 'details'])->name('delivery.details');
});

Route::group(['prefix'=>'categories','middleware'=>'auth'],function (){
    Route::get('/index',[App\Http\Controllers\CategoriesController::class , 'index'])->name('categories.index');
    Route::get('/add',[App\Http\Controllers\CategoriesController::class , 'add'])->name('categories.add');
    Route::post('/create',[App\Http\Controllers\CategoriesController::class , 'create'])->name('categories.create');
    Route::get('/edit/{id}',[App\Http\Controllers\CategoriesController::class , 'edit'])->name('categories.edit');
    Route::put('/update',[App\Http\Controllers\CategoriesController::class , 'update'])->name('categories.update');
    Route::get('/details/{id}',[App\Http\Controllers\CategoriesController::class , 'details'])->name('categories.details');
});

Route::group(['prefix'=>'pos','middleware'=>'auth'],function (){
    Route::get('/index',[App\Http\Controllers\PosController::class , 'index'])->name('pos.index');
    Route::get('/add',[App\Http\Controllers\PosController::class , 'add'])->name('pos.add');
    Route::post('/create',[App\Http\Controllers\PosController::class , 'create'])->name('pos.create');
    Route::get('/edit/{id}',[App\Http\Controllers\PosController::class , 'edit'])->name('pos.edit');
    Route::put('/update',[App\Http\Controllers\PosController::class , 'update'])->name('pos.update');
    Route::get('/details/{id}',[App\Http\Controllers\PosController::class , 'details'])->name('pos.details');
});

Route::group(['prefix'=>'colors','middleware'=>'auth'],function (){
    Route::get('/index',[App\Http\Controllers\ColorController::class , 'index'])->name('colors.index');
    Route::get('/add',[App\Http\Controllers\ColorController::class , 'add'])->name('colors.add');
    Route::post('/create',[App\Http\Controllers\ColorController::class , 'create'])->name('colors.create');
    Route::get('/edit/{id}',[App\Http\Controllers\ColorController::class , 'edit'])->name('colors.edit');
    Route::put('/update',[App\Http\Controllers\ColorController::class , 'update'])->name('colors.update');
    Route::get('/details/{id}',[App\Http\Controllers\ColorController::class , 'details'])->name('colors.details');
});

Route::group(['prefix'=>'invoices','middleware'=>'auth'],function (){
    Route::get('/index',[App\Http\Controllers\InvoicesController::class , 'index'])->name('invoices.index');
    Route::get('/add',[App\Http\Controllers\InvoicesController::class , 'add'])->name('invoices.add');
    Route::post('/create',[App\Http\Controllers\InvoicesController::class , 'create'])->name('invoices.create');
    Route::get('/edit/{id}',[App\Http\Controllers\InvoicesController::class , 'edit'])->name('invoices.edit');
    Route::put('/update',[App\Http\Controllers\InvoicesController::class , 'update'])->name('invoices.update');
    Route::get('/details/{id}',[App\Http\Controllers\InvoicesController::class , 'details'])->name('invoices.details');
});

Route::group(['prefix'=>'sales','middleware'=>'auth'],function (){
    Route::get('/index/{invoice_id}',[App\Http\Controllers\SalesController::class , 'index'])->name('sales.index');
    Route::get('/add',[App\Http\Controllers\InvoicesController::class , 'add'])->name('invoices.add');
    Route::post('/create',[App\Http\Controllers\SalesController::class , 'create'])->name('sales.create');
    Route::get('/edit/{id}',[App\Http\Controllers\InvoicesController::class , 'edit'])->name('invoices.edit');
    Route::put('/update',[App\Http\Controllers\InvoicesController::class , 'update'])->name('invoices.update');
    Route::get('/details/{id}',[App\Http\Controllers\InvoicesController::class , 'details'])->name('invoices.details');
});


