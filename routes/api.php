<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\Api\TypeController;
use App\Http\Controllers\Api\PackageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/drinks", [DrinkController::class,"getDrinks"]);
Route::get("/drink", [DrinkController::class,"getDrink"]);
Route::post("/newdrink", [DrinkController::class,"newDrink"]);
Route::get("/type", [TypeController::class,"getTypes"]);
Route::get("/package", [PackageController::class,"getPackages"]);