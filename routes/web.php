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

Route::get('/step1', 'QuestionController@step1');
Route::post('/submit-step1', 'QuestionController@saveStep1');

Route::get('/step2', 'QuestionController@step2');
Route::post('/submit-step2', 'QuestionController@saveStep2');

Route::get('/step3', 'QuestionController@step3');
Route::post('/submit-step3', 'QuestionController@saveStep3');

Route::get('/step4', 'QuestionController@step4');
Route::post('/submit-step4', 'QuestionController@saveStep4');

Route::get('/hasil', 'QuestionController@calcResult');


