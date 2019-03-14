<?php
/**
 * Player_Information
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Player_Information'], function () {
        Route::resource('playerinformations', 'PlayerinformationsController');
        //For Datatable
        Route::post('playerinformations/get', 'PlayerinformationsTableController')->name('playerinformations.get');
    });
    
});