<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});

Route::get('/lorem-ipsum-generator', function()
{
    return View::make('li-generator');
});

Route::get('/random-user-generator', function()
{
    return View::make('ru-generator');
});

Route::get('/xkcd-password-generator', function()
{
    return View::make('xkcd-generator');
});

Route::post('/generateLI', 'P3@generateLI');

Route::post('/generateRU', 'P3@generateRU');

Route::post('/generatePassword', 'P3@generatePassword');

Route::get('/test', function()
{
    return View::make('test');
});