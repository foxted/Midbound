<?php

Route::resource('websites', 'WebsitesController', ['only' => ['index', 'store', 'destroy']]);
Route::resource('events', 'VisitorEventsController', ['only' => ['index']]);
