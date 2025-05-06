<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register' , [AuthController::class , 'register']);
Route::post('/logout' , [AuthController::class , 'logout']);


Route::group(['prefix'=>'products'] , function()
{
    Route::get('/index' , [ProductController::class , 'index']);
    Route::get('/show/{id}' , [ProductController::class , 'show']);
    Route::get('/search/{name}' , [ProductController::class , 'search']);
});


Route::group([ 'prefix'=>'products'  , 'middleware' => 'auth:sanctum'] , function()
{
    Route::post('/store' , [ProductController::class , 'store']);
    Route::post('/delete/{id}' , [ProductController::class , 'delete']);
});
