<?php

Route::get('/', 'GuestController@home');
Route::get('/styles', 'GuestController@styles');


// Tracking Pixel
Route::get('/_mb.gif', 'TrackingPixelController@show');