<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DevController;
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

// header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
// header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length');
// header('Access-Control-Allow-Origin: *');

/* API ROUTES */
// Route::post('/login/{credentials}', [
//     'uses' => 'DevController@loginAPI',
// ]);

// Route::post('/login' , [DevController::class,'loginAPI']);
Route::post('/login' , [AuthenticatedSessionController::class,'loginMobileApp']);
Route::post('/get-batch-options' , [DevController::class,'getBatchOptions']);
Route::post('/add-batch' , [DevController::class,'addBatch']);
Route::post('/process-receipt' , [DevController::class,'processReceipt']);
Route::post('/get-barcode' , [DevController::class,'getBarcodeData']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
