<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIcontroller;
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

Route::get('/getallproducts',[APIcontroller::class,'getAllProducts']);
Route::post('/addproduct',[APIcontroller::class,'addProduct']);
Route::delete('/deleteproduct/{id}',[APIcontroller::class,'deleteproduct']);
Route::get('/singleproduct/{id}',[APIcontroller::class,'singleproduct']);
Route::post('/updateproduct',[APIcontroller::class,'updateproduct']);
