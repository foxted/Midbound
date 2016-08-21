<?php

Route::get('/', 'GuestController@home')->name('home');
Route::get('/styles', 'GuestController@styles');

// Registration...
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
Route::post('/register', 'Auth\RegisterController@register');