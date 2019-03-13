<?php
/**
 * Routes for : Players
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
	
	Route::group( ['namespace' => 'Player'], function () {
	    Route::get('players', 'PlayersController@index')->name('players.index');
	    
	    Route::get('players/{player}/edit', 'PlayersController@edit')->name('players.edit');
	    Route::patch('players/{player}', 'PlayersController@update')->name('players.update');
	    Route::delete('players/{player}', 'PlayersController@destroy')->name('players.destroy');
	    //For Datatable
	    Route::post('players/get', 'PlayersTableController')->name('players.get');
	});
	
});