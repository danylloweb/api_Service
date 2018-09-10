<?php


Route::resource('users', 'UsersController', ['except' => ['create', 'edit']]);
Route::resource('companies', 'CompaniesController', ['except' => ['create', 'edit']]);
Route::resource('contacts', 'ContactsController', ['except' => ['create', 'edit']]);

Route::any('/{url}','HomeController@template');