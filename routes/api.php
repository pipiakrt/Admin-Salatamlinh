<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\AccountController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CategoryHightlightController;
use App\Http\Controllers\Api\LangdingpageController;
use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProductHightlightController;
use App\Http\Controllers\Api\ProductHotController;
use App\Http\Controllers\Api\ProductTopController;
use App\Http\Controllers\Api\PromotionController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\CheckingController;

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
    'categories' => CategoryController::class,
    'notifications' => NotificationController::class,
    'promotions' => PromotionController::class,
    'menus' => MenuController::class,
    'posts' => PostController::class,
    'orders' => OrderController::class,
    'langdingpages' => LangdingpageController::class,
    'categoryhightlights' => CategoryHightlightController::class,
    'products' => ProductController::class,
    'producthightlights' => ProductHightlightController::class,
    'producthots' => ProductHotController::class,
    'producttops' => ProductTopController::class,
    'images' => ImageController::class,
    'banners' => BannerController::class,
    'reports' => ReportController::class,
    'members' => MemberController::class,
    'sliders' => SliderController::class,
    'accounts' => AccountController::class,
    'checkings' => CheckingController::class,
]);