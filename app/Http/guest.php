<?php

Route::get('/', 'GuestController@home')->name('home');
Route::get('/styles', 'GuestController@styles');

// Authentication...
$router->get('/login', 'Auth\LoginController@showLoginForm');
$router->post('/login', 'Auth\LoginController@login');

// Two-Factor Authentication Routes...
$router->get('/login/token', 'Auth\LoginController@showTokenForm');
$router->post('/login/token', 'Auth\LoginController@verifyToken');

// Registration...
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
Route::post('/register', 'Auth\RegisterController@register');