<?php
/**
 * Bidding
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Bidding'], function () {
        Route::resource('biddings', 'BiddingsController');
        //For Datatable
        Route::post('biddings/get', 'BiddingsTableController')->name('biddings.get');
    });
    
});