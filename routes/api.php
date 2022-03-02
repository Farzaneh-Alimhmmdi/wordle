<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WordController;
use App\Http\Controllers\GameController;
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
Route::get('/show' ,[WordController::class, 'show']);
Route::put('/edit/{id}' ,[WordController::class, 'update']);
Route::post('/insert' ,[WordController::class, 'insert']);
Route::post('/play' ,[GameController::class, 'play']);
// Route::get('/docs', function() {
// 	return view('swagger.index');
// 	;
// });
