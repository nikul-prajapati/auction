<?php

/**
 * Global Routes
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('lang/{lang}', 'LanguageController@swap');

/* ----------------------------------------------------------------------- */
Route::get('/contactus',function()
{
	return view('frontend.contactus');
});


Route::get('/aboutus',function()
{
	return view('frontend.aboutus');
});

/*
 * Frontend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
    includeRouteFiles(__DIR__.'/Frontend/');
});

/* ----------------------------------------------------------------------- */

/*
 * Backend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    /*
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     */
    includeRouteFiles(__DIR__.'/Backend/');
});
//Route::get('register/sub', function () { return view('register'); })->name('sub');
   Route::get('register/details', 'frontend\auth\loginController@showLoginForm');

   Route::resource('details', 'detailsController');

/*
* Routes From Module Generator
*/
includeRouteFiles(__DIR__.'/Generator/');

