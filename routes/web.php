<?php

use App\Http\Controllers\FilmController;
use App\Http\Middleware\ValidateYear;
use App\Http\Middleware\ValidateUrl;
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

Route::middleware('year')->group(function() {
    Route::group(['prefix'=>'filmout'], function(){
        // Routes included with prefix "filmout"
        Route::get('oldFilms/{year?}',[FilmController::class, "listOldFilms"])->name('oldFilms');
        Route::get('newFilms/{year?}',[FilmController::class, "listNewFilms"])->name('newFilms');
        Route::get('films/{year?}/{genre?}',[FilmController::class, "listFilms"])->name('listFilms');
    });
});


Route::middleware('year')->group(function() {
    Route::group(['prefix'=>'filmout'], function(){
        // ... Otras rutas existentes

        // Nueva ruta para películas ordenadas por año descendente
        Route::get('allFilmsDescending', [FilmController::class, "listAllFilmsDescending"])
            ->name('allFilmsDescending');
    });
});

Route::middleware('year')->group(function() {
    Route::group(['prefix'=>'filmout'], function(){
        // ... Otras rutas existentes

        // Nueva ruta para el contador de películas
        Route::get('filmCount', [FilmController::class, "filmCount"])
            ->name('filmCount');
    });
});


Route::post('/createFilm', [FilmController::class, 'createFilm'])->name('createFilm');
