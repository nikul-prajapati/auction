<?php
/**
 * Teams
 *
 */
Route::group(['namespace' => 'Frontend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Teams'], function () {
        //Route::resource('teams', 'TeamsController');
        //For Datatable
        Route::post('teams/get', 'TeamsController@index')->name('team_fr.get');
    });
    
});