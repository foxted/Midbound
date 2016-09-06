<?php

// Activity
Route::resource('activity', 'ActivityController', ['only' => ['index']]);

// Prospects
Route::resource('prospects', 'ProspectsController', ['only' => ['update']]);

// Settings
Route::resource('websites', 'WebsitesController', ['only' => ['index', 'show', 'store', 'destroy']]);

// Email Developer
Route::post('email-developer/{websites}', 'EmailDeveloperController@store');