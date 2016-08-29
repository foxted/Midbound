<?php

// Dashboard
Route::get('dashboard', 'DashboardController@show')->name('dashboard');

// Activity
Route::get('activity', 'ActivityController@index')->name('activity');
Route::resource('prospects', 'ProspectsController', ['only' => ['show']]);

// Websites
Route::get('install', 'InstallWebsiteController@index')->name('websites.install');

// Search
Route::get('search', 'SearchController@index');

// Authentication
$router->get('/logout', 'Auth\LoginController@logout');