<?php

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

Route::group(['namespace' => 'API'], function () {
    Route::group(['prefix' => '/employee'], function () {
        Route::get('/index', 'EmployeeController@index')
            ->name('employee.index');

        Route::get('/index/{department_id}', 'EmployeeController@index')
            ->name('employee.indexByDepartment');

        Route::get('/managers/index', 'EmployeeController@managerIndex')
            ->name('employee.manager.index');

        Route::get('/director/index', 'EmployeeController@directorIndex')
            ->name('employee.director.index');

        Route::put('/store', 'EmployeeController@store')
            ->name('employee.store');

        Route::patch('/update/{id}', 'EmployeeController@update')
            ->name('employee.update');

        Route::delete('/destroy/{id}', 'EmployeeController@destroy')
            ->name('employee.destroy');

    });

    Route::group(['prefix' => '/department'], function() {
        Route::get('/index', 'DepartmentController@index')
            ->name('department.index');
    });

    Route::group(['prefix' => '/position'], function() {
        Route::get('/index', 'PositionController@index')
            ->name('position.index');
    });

    Route::group(['prefix' => '/structure'], function () {
        Route::get('/index', 'StructureController@index')
            ->name('structure.index');
    });
});
