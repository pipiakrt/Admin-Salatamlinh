<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\AccountController;
use App\Http\Controllers\Api\CategoryController;

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

Route::resources([
    'auth' => AuthController::class,
    'products' => ProductsController::class,
    'images' => ImageController::class,
    'banners' => BannerController::class,
    'sliders' => SliderController::class,
    'accounts' => AccountController::class,
]);