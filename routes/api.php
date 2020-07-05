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

Route::post('/add', 'Api\CalculatorController@add');
Route::post('/subtract', 'Api\CalculatorController@subtract');
Route::post('/multiply', 'Api\CalculatorController@multiply');
Route::post('/divide', 'Api\CalculatorController@divide');
Route::post('/squareRoot', 'Api\CalculatorController@squareRoot');

Route::post('/save', 'Api\StoreController@save');
Route::get('/retrieve', 'Api\StoreController@retrieve');
Route::post('/clear', 'Api\StoreController@clear');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
