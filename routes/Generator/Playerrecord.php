<?php
/**
 * Player_Records
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Player_Record'], function () {
        Route::resource('playerrecords', 'PlayerrecordsController');
        //For Datatable
        Route::post('playerrecords/get', 'PlayerrecordsTableController')->name('playerrecords.get');
    });
    
});