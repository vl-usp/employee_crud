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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'API'], function () {
    Route::group(['prefix' => '/crud'], function () {
        Route::get('/index', 'CrudController@index')
            ->name('crud.index');

        Route::get('/create', 'CrudController@create')
            ->name('crud.create');

        Route::patch('/store', 'CrudController@store')
            ->name('crud.store');

        Route::get('/edit/{id}/', 'CrudController@edit')
            ->name('crud.edit');

        Route::patch('/update/{id}', 'CrudController@update')
            ->name('crud.update');

        Route::delete('/destroy/{id}', 'CrudController@destroy')
            ->name('crud.destroy');
    });

    Route::group(['prefix' => '/structure'], function () {

    });
});
