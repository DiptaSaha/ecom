<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\PagesController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\DivisionController;
use App\Http\Controllers\Backend\SliderController;


/*
|--------------------------------------------------------------------------
| Frontend Website Routes are here
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/','App\Http\Controllers\Frontend\PagesController@index')->name('homepage');

Route::group(['prefix'=>'products'], function() {
    Route::get('/','App\Http\Controllers\Frontend\PagesController@products')->name('allProducts');
    Route::get('/{slug}','App\Http\Controllers\Frontend\PagesController@productshow')->name('product.show');
    Route::get('/category','App\Http\Controllers\Frontend\PagesController@productCategory')->name('product.category');
    Route::get('/category/{slug}','App\Http\Controllers\Frontend\PagesController@categoryShow')->name('category.show');
    
});
Route::group(['prefix'=>'cart'], function() {
    Route::get('/','App\Http\Controllers\Frontend\CartController@index')->name('cart.items');
    Route::post('/store','App\Http\Controllers\Frontend\CartController@store')->name('cart.store');
    Route::post('/update/{id}','App\Http\Controllers\Frontend\CartController@update')->name('cart.update');
    Route::post('/destroy/{id}','App\Http\Controllers\Frontend\CartController@destroy')->name('cart.destroy');
    
});

Route::group(['prefix'=>'checkout'], function() {
    Route::get('/','App\Http\Controllers\Frontend\OrderController@index')->name('checkout.page');
    Route::post('/store','App\Http\Controllers\Frontend\OrderController@store')->name('order.store');
});




/*
|--------------------------------------------------------------------------
| Backend Admin Web Routes are here
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login/customer','App\Http\Controllers\Auth\LoginController@showCustomerLoginForm');
Route::post('/login/customer','App\Http\Controllers\Auth\LoginController@customerLogin');

Route::get('/register/customer','App\Http\Controllers\Auth\RegisterController@showCustomerRegisterForm');
Route::post('/register/customer','App\Http\Controllers\Auth\RegisterController@createCustomer');

Auth::routes(['verify' => true]);
Route::group(['prefix' => 'admin'], function() {
    Route::get('/dashboard', 'App\Http\Controllers\Backend\PagesController@index')->name('dashboard')->middleware('auth','verified');
    Route :: view('/customer','customer');


            //Brand Route For CRUD 
        Route ::group(['prefix'=>'brand'], function(){
        Route::get('/manage', [BrandController::class, 'index'])->name('brand.manage');
        Route::get('/create', [BrandController::class, 'create'])->name('brand.create');
        Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
        Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
        Route::post('/edit/{id}', [BrandController::class, 'update'])->name('brand.update');
        Route::post('/delete/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');
    });
            //Category Route For CRUD 
        Route ::group(['prefix'=>'category'], function(){
        Route::get('/manage', [CategoryController::class, 'index'])->name('category.manage');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/edit/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::post('/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });
            //Product Route For CRUD 
        Route ::group(['prefix'=>'product'], function(){
        Route::get('/manage', [ProductController::class, 'index'])->name('product.manage');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/edit/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::post('/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    });

        //Division Route For CRUD 
        Route ::group(['prefix'=>'division'], function(){
        Route::get('/manage', [DivisionController::class, 'index'])->name('division.manage');
        Route::get('/create', [DivisionController::class, 'create'])->name('division.create');
        Route::post('/store', [DivisionController::class, 'store'])->name('division.store');
        Route::get('/edit/{id}', [DivisionController::class, 'edit'])->name('division.edit');
        Route::post('/edit/{id}', [DivisionController::class, 'update'])->name('division.update');
        Route::post('/delete/{id}', [DivisionController::class, 'destroy'])->name('division.destroy');
    });
        //District Route For CRUD 
        Route ::group(['prefix'=>'district'], function(){
        Route::get('/manage', [DistrictController::class, 'index'])->name('district.manage');
        Route::get('/create', [DistrictController::class, 'create'])->name('district.create');
        Route::post('/store', [DistrictController::class, 'store'])->name('district.store');
        Route::get('/edit/{id}', [DistrictController::class, 'edit'])->name('district.edit');
        Route::post('/edit/{id}', [DistrictController::class, 'update'])->name('district.update');
        Route::post('/delete/{id}', [DistrictController::class, 'destroy'])->name('district.destroy');
    });
        //Slider Route For CRUD 
        Route ::group(['prefix'=>'slider'], function(){
        Route::get('/manage', [SliderController::class, 'index'])->name('slider.manage');
        Route::get('/create', [SliderController::class, 'create'])->name('slider.create');
        Route::post('/store', [SliderController::class, 'store'])->name('slider.store');
        Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
        Route::post('/edit/{id}', [SliderController::class, 'update'])->name('slider.update');
        Route::post('/delete/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');
    });
            
   

   
    
});


