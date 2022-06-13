<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\CalculatorController;
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

Route::get('/',[HomeController::class, 'index']);
Route::get('/about',[HomeController::class, 'about']);
Route::get('/contact',[HomeController::class, 'contact']);



Route::get('/registration', function () {
    return view('registration');
});
Route::get('/calculator/calculator', [CalculatorController::class, 'calculate']);


Route::get('/shop/{category?}/{items?}', [CarsController::class, 'getCategory']);
Route::get('cars/search', [CarsController::class,'getName'])->name('cars.getName');
Route::get('/searchNav', [CarsController::class,'getSearchNav'])->name('nav.searchNav');

Route::resource('cars', CarsController::class);







