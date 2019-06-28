<?php
/**
 * purchaseorders
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'purchaseorder'], function () {

        //Get Autocompplete Supplier
        Route::get('purchaseorders/getsuppliers', 'PurchaseordersController@getSuppliers')->name('purchaseorders.getsuppliers');

        Route::resource('purchaseorders', 'PurchaseordersController');
        //For Datatable
        Route::post('purchaseorders/get', 'PurchaseordersTableController')->name('purchaseorders.get');
    });
    
});