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
	    return view('borrower');
});
Route::get('/','BorrowerController@createStep1');

Route::get('borrower/create-step1', [
	    'uses' => 'BorrowerController@createStep1',
            'as' => 'borrower.create_step_1'
]);
Route::post('borrower/create-step1', [
	    'uses' => 'BorrowerController@createStep1',
           'as' => 'borrower.create_step_1'
]);

Route::get('borrower/create-step2', [
	    'uses' => 'BorrowerController@createStep2',
            'as' => 'borrower.create_step_2'
]);
Route::post('borrower/store', [
	    'uses' => 'BorrowerController@store',
           'as' => 'borrower.store'
]);

