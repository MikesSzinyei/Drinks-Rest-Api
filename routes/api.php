<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DrinkController;
use App\Http\Controllers\Api\TypeController;
use App\Http\Controllers\Api\PackageController;
use App\Http\Controllers\Api\AuthController;

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

Route::group(["middleware" => ["auth:sanctum"]], function() {

    Route::post("/newdrink", [DrinkController::class,"newDrink"]);
    Route::put("/modifydrink", [DrinkController::class,"modifyDrink"]);
    Route::delete("/deletedrink", [DrinkController::class,"deleteDrink"]);

    Route::post("/addtype", [TypeController::class,"addType"]);
    Route::put("/modifytype", [TypeController::class,"modifyType"]);
    Route::delete("/deletetype", [TypeController::class,"deleteType"]);

    Route::post("/addpackage", [PackageController::class,"addPackage"]);
    Route::put("/modifypackage", [PackageController::class,"modifyPackage"]);
    Route::delete("/deletepackage", [PackageController::class,"deletePackage"]);

    Route::post("/logout", [AuthController::class, "logout"]);

    Route::get("/drinks", [DrinkController::class,"getDrinks"]);
});


Route::get("/onedrink", [DrinkController::class,"getDrink"]);

Route::get("/type", [TypeController::class,"getTypes"]);

Route::get("/package", [PackageController::class,"getPackages"]);

Route::post("/register", [AuthController::class, "register"]);/*->middleware("throttle:100, 43200")*/;
Route::post("/login", [AuthController::class, "login"])/*->middleware("throttle:100, 43200")*/;

