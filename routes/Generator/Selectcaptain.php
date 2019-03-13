<?php
/**
 * Select_Captain
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Select_Captain'], function () {
        Route::resource('selectcaptains', 'SelectcaptainsController');
        //For Datatable
        Route::post('selectcaptains/get', 'SelectcaptainsTableController')->name('selectcaptains.get');
    });
    
});