<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
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
Route::group(["middleware" => ["auth:sanctum"]], function(){
    Route::post("/new", [ProductController::class, "store"]);
    Route::post("/logout", [AuthController::class, "logout"]);
    Route::put("/all/{product}", [ProductController::class, "update"]);
    Route::delete("/all/{id}", [ProductController::class, "destroy"]);
});

Route::post("/register", [AuthController::class, "register"]);
Route::post("/login", [AuthController::class, "login"]);
Route::get("/all", [ProductController::class, "index"]);
Route::get("/all/{id}", [ProductController::class, "show"]);
Route::get("/all/search/{name}", [ProductController::class, "search"]);
Route::get("/all/filter/{material}", [ProductController::class, "filter"]);
