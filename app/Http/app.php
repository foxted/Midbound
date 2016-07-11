<?php

Route::get('/dashboard', 'DashboardController@show')->middleware('auth')->name('app.dashboard');
