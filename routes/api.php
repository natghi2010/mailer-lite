<?php

use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\Api\FieldController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::resource('/subscribers',SubscriptionController::class);
    Route::get('/subscribers/{id}/fields',[FieldController::class,'getFieldsBySubscriber'])->name("subscribers.fields");
    Route::resource('/fields',FieldController::class);
});



