<?php

// Newsletter registration
Route::post('newsletter', 'Guest\MailchimpController@store')->name('newsletter.store');