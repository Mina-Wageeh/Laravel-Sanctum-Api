<?php

use App\Http\Controllers\Api\ProductController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix'=>'products'] , function()
{
    Route::get('/index' , [ProductController::class , 'index']);
    Route::get('/show/{id}' , [ProductController::class , 'show']);
    Route::post('/store' , [ProductController::class , 'store']);
    Route::post('/delete/{id}' , [ProductController::class , 'delete']);
    Route::get('/search/{name}' , [ProductController::class , 'search']);
});
