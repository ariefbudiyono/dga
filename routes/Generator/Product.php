<?php
/**
 * product
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'product'], function () {
        Route::resource('products', 'ProductsController');
        //For Datatable
        Route::post('products/get', 'ProductsTableController')->name('products.get');
    });
    
});