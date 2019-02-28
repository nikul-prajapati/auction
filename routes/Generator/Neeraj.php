<?php
/**
 * Neerj
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Neeraj'], function () {
        Route::resource('neerajs', 'NeerajsController');
        //For Datatable
        Route::post('neerajs/get', 'NeerajsTableController')->name('neerajs.get');
    });
    
});