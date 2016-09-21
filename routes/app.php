<?php

// Dashboard
//Route::get('dashboard', 'DashboardController@show')->name('dashboard');

// Activity
Route::get('activity/{filter?}', 'ActivityController@index')->name('activity');
Route::resource('prospects', 'ProspectsController', ['only' => ['show']]);

// Websites
Route::get('install', 'InstallWebsiteController@index')->name('websites.install');

// Search
Route::get('search', 'SearchController@index')->name('search');

// Authentication
Route::get('/logout', 'Auth\LoginController@logout');
