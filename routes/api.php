<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WordController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::get('/word', function() {
// 	return response(['word' => 'karim']);
// 	;
// });

// Route::post('/word', function() {
// 	$word = request()->get('word');
// 	return response(['word' => "Hello ". $word]);
// });
Route::get('/creation' ,[WordController::class, 'create']);
Route::post('/insert' ,[WordController::class, 'insert']);
Route::put('/creation/{oldword}' ,[WordController::class, 'update']);