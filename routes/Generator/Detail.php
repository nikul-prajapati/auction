<?php
/**
 * Details
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Detail'], function () {
        Route::resource('details', 'DetailsController');
        //For Datatable
        Route::post('details/get', 'DetailsTableController')->name('details.get');
    });
    
});