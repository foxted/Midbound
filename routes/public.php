<?php

// Tracking Pixel
Route::get('/_mb.gif', 'TrackingPixelController@show')->name('tracking-url');

// Validate email address
Route::get('validate/{email}', 'Auth\ValidateController@index')->name('auth.validate');