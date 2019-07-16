<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('fizz-buzz', 'FizzBuzzController@index');

Route::get('decor', 'DecoratorTestController@index');

Route::get('state', 'StateTestController@index');

Route::get('sd', 'SudController@show');

Route::get('html-parser', 'HtmlParserController@index');

Route::get('g-sheet-test', 'GoogleSheetsExample@index');

Route::resource('todo', 'TodoController');

Route::get('recursive-sq', function () {
    return view('recursive_square');
});


