<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('unsigned_files','API\SignorController@ReadyForScan');
Route::get('unsigned_files/{id}','API\SignorController@DownloadForScan');
Route::post('signed_files/{id}','API\SignorController@DownloadSigned');
Route::post('error_logs','API\SignorController@Errors');