<?php

// =============================================
// HOME PAGE ===================================
// =============================================
Route::get('/', function()
{
    return View::make('index');
});

Route::get('/create', function()
{
    return View::make('create');
});

Route::get('/update', function()
{
    return View::make('update');
});

Route::get('/delete', function()
{
    return View::make('delete');
});

// =============================================
// API ROUTES ==================================
// =============================================
Route::group(array('prefix' => 'api'), function() {

    // since we will be using this just for CRUD, we won't need create and edit
    // Angular will handle both of those forms
    // this ensures that a user can't access api/create or api/edit when there's nothing there
    Route::resource('songs', 'SongController');
});

// =============================================
// CATCH ALL ROUTE =============================
// =============================================
// all routes that are not home or api will be redirected to the frontend
// this allows angular to route them
App::missing(function($exception)
{
    return View::make('index');
});
