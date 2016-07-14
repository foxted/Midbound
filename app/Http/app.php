<?php

Route::get('dashboard', 'DashboardController@show')->name('dashboard');
Route::resource('prospects', 'ProspectsController', ['only' => ['index']]);
