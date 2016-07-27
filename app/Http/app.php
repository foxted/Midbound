<?php

Route::get('dashboard', 'DashboardController@show')->name('dashboard');
Route::get('activity', 'ActivityController@index')->name('activity');
Route::resource('prospects', 'ProspectsController', ['only' => ['show']]);
