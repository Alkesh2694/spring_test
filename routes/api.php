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

// Route::group(['prefix' => 'v1'], function () {
//     Route::post('store', 'CashFreeController@store')->name('cashfree.store');
//     Route::post('success', 'CashFreeController@success')->name('cashfree.success');
// });

Route::group(['prefix'=>'v1'],function(){
    //fetch all user with companies
    Route::get('/users','UserController@index')->name('users.index');
    Route::group(['prefix'=>'companies'],function(){
    Route::get('/{id}','CompanyController@show')->name('companies.show');
    Route::delete('/{id}','CompanyController@destroy')->name('companies.show');
});
});
