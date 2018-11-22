<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('cuentas', 'CuentasController');

Route::resource('tranferencias', 'TranferenciasController');

Route::resource('divisas', 'DivisasController');

Route::resource('countries', 'CountriesController');

Route::resource('foreingExchanges', 'ForeingExchangeController');

Route::resource('banks', 'BanksController');

Route::resource('documentsTypes', 'DocumentsTypeController');

Route::resource('acountsTypes', 'AcountsTypeController');

Route::resource('acounts', 'AcountsController');

Route::resource('currencyHistories', 'CurrencyHistoryController');

Route::resource('statuses', 'StatusController');

Route::resource('transactions', 'TransactionController');

Route::get('calculadora', 'TransactionController@calculadora')->name('calculadora.create');

Route::post('calcula','TransactionController@calcular')->name('calculadora.calcula');

Route::resource('assignments', 'AssignmentsController');

Route::post('atender','AssignmentsController@atender')->name('atender.atender');

Route::resource('users','UsersController');