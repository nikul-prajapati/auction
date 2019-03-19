<?php
/**
<<<<<<< HEAD
 * Selectcaptain
=======
 * Select_Captain
>>>>>>> ac05c5a21c931d217e05f9713175aa9a694eef49
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
<<<<<<< HEAD
    Route::group( ['namespace' => 'Selectcaptain'], function () {
=======
    Route::group( ['namespace' => 'Select_Captain'], function () {
>>>>>>> ac05c5a21c931d217e05f9713175aa9a694eef49
        Route::resource('selectcaptains', 'SelectcaptainsController');
        //For Datatable
        Route::post('selectcaptains/get', 'SelectcaptainsTableController')->name('selectcaptains.get');
    });
    
});