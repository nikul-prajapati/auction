<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', 'FrontendController@index')->name('index');
Route::post('/get/states', 'FrontendController@getStates')->name('get.states');
Route::post('/get/cities', 'FrontendController@getCities')->name('get.cities');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        /*
         * User Account Specific
         */
        Route::get('account', 'AccountController@index')->name('account');


        

        /*
         * User Profile Specific
         */
        Route::patch('profile/update', 'ProfileController@update')->name('profile.update');

        /*
         * User Profile Picture
         */
        Route::patch('profile-picture/update', 'ProfileController@updateProfilePicture')->name('profile-picture.update');
    });



});


        /*
         * Teams Name Specific
         */
        Route::get('teams', 'Teams\TeamsController@index');


        /*
         * Player Records Specific
         */
        Route::get('player_record', 'PlayerRecord\PlayerRecordController@index');


         /*
         * Teams Name and player name Specific
         */
        Route::get('Teamdetails', 'Team_details\Team_detailsController@index');

        
         /*
         * Player Name and price after bid
         */
        Route::get('BidInformation', 'BidInformation\BidInformationController@index');
        

      
/*
* Show pages
*/
Route::get('pages/{slug}', 'FrontendController@showPage')->name('pages.show');
