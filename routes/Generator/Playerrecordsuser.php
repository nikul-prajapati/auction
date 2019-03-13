<?php
/**
 * Playerrecords_User
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Playerrecords_User'], function () {
        Route::resource('playerrecordsusers', 'PlayerrecordsusersController');
        //For Datatable
        Route::post('playerrecordsusers/get', 'PlayerrecordsusersTableController')->name('playerrecordsusers.get');
    });
    
});