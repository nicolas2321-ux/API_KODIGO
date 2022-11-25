<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
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


Route::post('register', [UserController::class,'register']);
Route::post('login', [UserController::class,'authenticate']);

Route::group(['middleware' => ['jwt.verify']], function() {
Route::get('/article',[ArticleController::class,'index']);
Route::post('/article/{id_use}',[ArticleController::class,'store']);
Route::put('/article/{id}/',[ArticleController::class,'update']);
Route::delete('/article/{id}/{user_id}',[ArticleController::class,'destroy']);

Route::post('user',[UserController::class,'getAuthenticatedUser']);

});