<?php
/**
 * suppliers
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'supplier'], function () {
        Route::resource('suppliers', 'SuppliersController');
        //For Datatable
        Route::post('suppliers/get', 'SuppliersTableController')->name('suppliers.get');
    });
    
});