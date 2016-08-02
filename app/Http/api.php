<?php

//Route::resource('prospects', 'ProspectsController');
Route::resource('events', 'VisitorEventsController', ['only' => ['index']]);
