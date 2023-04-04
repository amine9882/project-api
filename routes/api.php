<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group( function () {
    
    Route::post('logout', [AuthController::class, 'logout']);

});
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

//category
Route::post('category', [CategoryController::class, 'create']);
Route::get('viewcategory/{id}', [CategoryController::class,'store']);
Route::get('edit-category/{id}', [CategoryController::class,'edit']);

Route::put('update-category/{id}', [CategoryController::class,'update']);

Route::delete('destroy-category/{id}', [CategoryController::class,'destroy']);
//product
Route::post('product', [ProductController::class, 'create']);
Route::get('view-product', [ProductController::class, 'store']);
Route::get('edit-product/{id}', [ProductController::class, 'edit']);
Route::put('update-product/{id}', [ProductController::class, 'update']);
Route::delete('destroy-product/{id}', [ProductController::class,'destroy']);

//frentend





