<?php
/**
 * warehouse
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'warehouse'], function () {
        Route::resource('warehouses', 'WarehousesController');
        //For Datatable
        Route::post('warehouses/get', 'WarehousesTableController')->name('warehouses.get');
    });
    
});