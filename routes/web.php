<?php

use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\FskController;
use App\Http\Controllers\GamesCollectionController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PublisherController;
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
    return redirect()->route('games-collection.index');
})->name('home');

Route::resource('games-collection', GamesCollectionController::class);
Route::resource('console', ConsoleController::class);
Route::resource('publisher', PublisherController::class);
Route::resource('developer', DeveloperController::class);
Route::resource('language', LanguageController::class);
Route::resource('fsk', FskController::class);