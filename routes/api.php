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


Route::resource('cuentas', 'CuentasAPIController');

Route::resource('tranferencias', 'TranferenciasAPIController');

Route::resource('divisas', 'DivisasAPIController');

Route::resource('countries', 'CountriesAPIController');

Route::resource('foreing_exchanges', 'ForeingExchangeAPIController');

Route::resource('banks', 'BanksAPIController');

Route::resource('documents_types', 'DocumentsTypeAPIController');

Route::resource('acounts_types', 'AcountsTypeAPIController');

Route::resource('acounts', 'AcountsAPIController');

Route::resource('currency_histories', 'CurrencyHistoryAPIController');

Route::resource('statuses', 'StatusAPIController');

Route::resource('transactions', 'TransactionAPIController');

Route::resource('assignments', 'AssignmentsAPIController');