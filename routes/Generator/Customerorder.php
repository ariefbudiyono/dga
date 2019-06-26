<?php
/**
 * customerorders
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'customerorder'], function () {
        Route::resource('customerorders', 'CustomerOrdersController');
        //For Datatable
        Route::post('customerorders/get', 'CustomerOrdersTableController')->name('customerorders.get');
    });
    
});