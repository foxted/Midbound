<?php

Route::get('/', 'GuestController@home')->name('home');
Route::get('plans', 'GuestController@plans')->name('plans');
Route::get('styles', 'GuestController@styles');

// Authentication...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
Route::post('login', 'Auth\LoginController@login');

// Two-Factor Authentication Routes...
Route::get('login/token', 'Auth\LoginController@showTokenForm');
Route::post('login/token', 'Auth\LoginController@verifyToken');

// Registration...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
Route::post('register', 'Auth\RegisterController@register');
