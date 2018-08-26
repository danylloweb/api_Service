<?php
Route::get('/','HomeController@template');
Route::any('/{url}','HomeController@template');