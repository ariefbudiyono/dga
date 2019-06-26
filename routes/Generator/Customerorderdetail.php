<?php
/**
 * customerorderdetail
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'customerorderdetail'], function () {
        //CustomerOrder Autocomplete form field
        Route::get('customerorderdetails/getcustomerorder', 'CustomerOrderDetailsController@getcustomerorder')->name('customerorderdetails.getcustomerorder');
        Route::get('customerorderdetails/getproduct', 'CustomerOrderDetailsController@getProduct')->name('customerorderdetails.getproduct');

        Route::resource('customerorderdetails', 'CustomerorderdetailsController');
        //For Datatable
        Route::post('customerorderdetails/get', 'CustomerorderdetailsTableController')->name('customerorderdetails.get');

        
    });
    
});


