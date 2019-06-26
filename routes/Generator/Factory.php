<?php
/**
 * factories
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'factory'], function () {
        Route::resource('factories', 'FactoriesController');
        //For Datatable
        Route::post('factories/get', 'FactoriesTableController')->name('factories.get');
    });
    
});