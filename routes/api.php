<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CraftsmanController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostNumberController;
use App\Http\Controllers\PriceRangeController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\TradeTypeController;
use App\Http\Controllers\UserController;
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
Route::post("/register", [AuthController::class, "register"]);
Route::post('/login', [AuthController::class, 'login']);

Route::group(["middleware" => ['auth:sanctum']], function() {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/types', [TradeTypeController::class, 'index']);
    Route::get('/types/{id}', [TradeTypeController::class, 'show']);


});

Route::resource('regions', RegionController::class);
Route::get('/regions/search/{region}', [RegionController::class,'search']);
//___________PRICE__RANGE_______________________________________
Route::resource('price_ranges', PriceRangeController::class);
Route::get('/price_ranges/search/{range}', [PriceRangeController::class,'search']);

//____________POST_NUMBER________________________________________________
Route::resource('post_numbers', PostNumberController::class);
Route::get('/post_numbers/search/{city}', [PostNumberController::class,'search']);

//____________TRADE_TYPE_________________________________________________________
Route::resource('trade-types', TradeTypeController::class);
Route::get('/trade-types/search/{type}', [TradeTypeController::class,'search']);
//____________USER_________________________________________________________
Route::resource('users', UserController::class);
Route::get('/users/search/{user}', [UserController::class,'search']);

//____________craftsman_________________________________________________________
Route::resource('craftsmen', CraftsmanController::class);
Route::get('craftsmen/ratings/{id}', [CraftsmanController::class, "ratings"]);
Route::get('craftsmen/comments/{id}', [CraftsmanController::class, "comments"]);
Route::resource('craftsmen', CraftsmanController::class);
Route::get('/craftsmen/search/{user}', [CraftsmanController::class,'search']);
//____________COMMENTS_________________________________________________________
Route::resource('comments', CommentController::class);
//____________RATINGS_________________________________________________________
Route::resource('ratings', RatingController::class);
// FILTER
Route::resource('filter', FilterController::class);

Route::resource("images", ImageController::class);

