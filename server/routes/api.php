<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

$controllerPackage="App\Http\Controllers";

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(["prefix"=>"/users"],function () use ($controllerPackage)
{
    $usersController=$controllerPackage."\UsersLoginController";
    Route::post("/new",$usersController."@addNewUser");
    Route::post("/login",$usersController."@makeLogin");
    Route::post("/details",$usersController."@userInfo")->middleware(["auth:api"]);
});
Route::group(["prefix"=>"/sellers"],function () use ($controllerPackage)
{
    $sellersController=$controllerPackage."\SellersLoginController";
    Route::post("/new",$sellersController."@addNewSeller");
    Route::post("/login",$sellersController."@makeLogin");
    Route::post("/details",$sellersController."@sellerInfo")->middleware(["auth:sellers"]);
    Route::post("/logout",$sellersController."@logout")->middleware(["auth:sellers"]);
});


Route::group(["prefix"=>"/products"],function () use($controllerPackage)
{
    $productsController=$controllerPackage."\ProductsController";
    Route::get("/get/",$productsController."@getProductsByPage");
    Route::get("/get/{productId}",$productsController."@getProducts");


    Route::post("/new",$productsController."@addNewProduct")->middleware(["auth:sellers"]);
    Route::post("/update",$productsController."@updateProduct")->middleware(["auth:sellers"]);
    Route::post("/delete",$productsController."@deleteProduct")->middleware(["auth:sellers"]);
});


Route::group(["prefix"=>"/cart"],function () use($controllerPackage)
{
    $productsController=$controllerPackage."\ProductsController";

    Route::post("/add",$productsController."@addNewProduct")->middleware(["auth:api"]);
    Route::post("/update",$productsController."@updateProduct")->middleware(["auth:api"]);
    Route::post("/delete",$productsController."@deleteProduct")->middleware(["auth:api"]);
    Route::post("/check-out",$productsController."@checkOutProduct")->middleware(["auth:api"]);
});

Route::group(["prefix"=>"/review"],function ()use($controllerPackage) {
    $productsReviewController=$controllerPackage."\ProductsReviewController";
    Route::post("/add",$productsReviewController."@addReview")->middleware(["auth:api"]);
    Route::post("/update",$productsReviewController."@updateReview")->middleware(["auth:api"]);
});


Route::group(["prefix"=>"/order"],function ()use($controllerPackage) {
    $productsReviewController=$controllerPackage."\OrdersController";
    Route::post("/add",$productsReviewController."@addNewOrder")->middleware(["auth:api"]);
    Route::post("/get/page/{pageNumber}",$productsReviewController."@getOrdersByPage")->middleware(["auth:api"]);
    Route::post("/get/all",$productsReviewController."@getAllOrders")->middleware(["auth:api"]);
});



Route::get('/payment','App\Http\Controllers\PaymentGatewayController@pay');
Route::post('/payment/status', 'App\Http\Controllers\PaymentGatewayController@paymentCallback');
