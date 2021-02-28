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

Route::get('/', function () {
    return view('welcome');
});

//Table View
Route::get('/list', [App\Http\Controllers\tableController::class, 'create'])->name('list');

Route::get('/list/{id}', [App\Http\Controllers\csvController::class, 'exportCSV'])->name('list.id.csv');