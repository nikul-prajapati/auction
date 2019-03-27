<?php
/**
 * Bid
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Bid'], function () {
        Route::resource('bids', 'BidsController');
        // Route::get('bids/{id?}','BidsController@art');
        //For Datatable
        Route::post('bids/get', 'BidsTableController')->name('bids.get');
        Route::post('bids', 'BidsController@store');

    });
    
});