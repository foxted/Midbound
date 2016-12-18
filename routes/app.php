<?php

// Dashboard
//Route::get('dashboard', 'DashboardController@show')->name('dashboard');

// Activity
Route::get('activity/{filter?}', 'ActivityController@index')->name('activity');
Route::resource('prospects', 'ProspectsController', ['only' => ['show', 'edit', 'update']]);

// Websites
Route::get('install', 'InstallWebsiteController@index')->name('websites.install');

// Search
Route::get('search', 'SearchController@index')->name('search');

// Authentication
Route::get('logout', 'Auth\LoginController@logout');

// TeamMember
Route::post('settings/teams/{team}/invitations', 'Settings\Teams\MailedInvitationController@store');
Route::delete('settings/teams/{team}/members/{team_member}', 'Settings\Teams\TeamMemberController@destroy');
