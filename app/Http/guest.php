<?php

Route::get('/', 'GuestController@home');
Route::get('/styles', 'GuestController@styles');

// Registration...
Route::get('/register', 'Auth\RegisterController@showRegistrationForm');
$router->post('/register', 'Auth\RegisterController@register');