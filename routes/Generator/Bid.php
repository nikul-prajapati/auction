<?php
/**
 * Bid
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Bid'], function () {
        Route::resource('bids', 'BidsController');
        //For Datatable
        Route::post('bids/get', 'BidsTableController')->name('bids.get');
    });
    
});