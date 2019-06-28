<?php
/**
 * purchaseorderdetails
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'purchaseorderdetail'], function () {
        Route::resource('purchaseorderdetails', 'PurchaseorderdetailsController');
        //For Datatable
        Route::post('purchaseorderdetails/get', 'PurchaseorderdetailsTableController')->name('purchaseorderdetails.get');
    });
    
});