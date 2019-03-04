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
Route::get('/borrower', function() {
    return "hello workd!";
});

Route::get('/helloworld', 'HelloworldController@index');

Route::get('borrower/create', [
	    'uses' => 'BorrowerController@create',
            'as' => 'borrower.create'
]);

Route::post('borrower', [
	    'uses' => 'BorrowerController@store',
           'as' => 'borrower.store'
]);
