<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',                 function () {return view('welcome');});
Route::get('/cartoon',          function () {return view('welcome');});
Route::get('/xray',            function () {return view('welcome');});
Route::get('/pytrends',            function () {return view('welcome');});
Route::get('/facetrend',            function () {return view('welcome');});
Route::get('/facedumy',            function () {return view('welcome');});
Route::get('/cartoonhome',            function () {return view('welcome');});


Route::get('/akbar2',            function () {return view('welcome');});

Auth::routes();

Route::get('/linkadd',          function () {return view('welcome');});
Route::get('/sticker',          function () {return view('welcome');});

Route::get('/hello/{id}',       [App\Http\Controllers\LinkaddController::class, 'view']);
Route::post('/hello',           [App\Http\Controllers\LinkaddController::class, 'store']);