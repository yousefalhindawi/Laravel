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
// Route::get('/cars/common_file/layout', function () {
//     return view('layout');
// });

Route::get('cars/search', [CarsController::class,'getId']);
// Route::get('cars/index', [CarsController::class,'index']);


Route::resource('cars', CarsController::class);

// Route::get('cars/search', [CarsController::Class,'index']);





