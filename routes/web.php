<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RelationsController;
use App\Http\Controllers\UserController;

use App\Models\Category;
use App\Models\Product;
use App\Models\Product_category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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


Route::get("login",[UserController::class,"login"])->name("login");
Route::get("logout",[UserController::class,"logout"]);
Route::post("login",[UserController::class,"loginrequest"]);

Route::group(['prefix'=>"admin/category","middleware"=>"auth"],function(){

    Route::get("/",[CategoryController::class,"index"]);
    Route::get("/create",[CategoryController::class,"create"]);
    Route::post("/store",[CategoryController::class,"store"]);
    Route::get("/delete/{id}",[CategoryController::class,"destroy"]);
    Route::get("/edit/{id}",[CategoryController::class,"edit"]);
    Route::post("/update",[CategoryController::class,"update"]);

});


Route::group(['prefix'=>"admin/product","middleware"=>"auth"],function(){

    Route::get("/",[ProductController::class,"index"]);
    Route::get("/create",[ProductController::class,"create"]);
    Route::post("/store",[ProductController::class,"store"]);
    Route::get("/delete/{id}",[ProductController::class,"destroy"]);
    Route::get("/edit/{id}",[ProductController::class,"edit"]);
    Route::post("/update",[ProductController::class,"update"]);
    Route::get("/showCategory/{product_id}",[ProductController::class,"getProductCategory"])->name('product.category');
    Route::post("saveCategoryProduct",[ProductController::class,"saveCategoryProduct"])->name('save.product.category');


});



//Trival
