<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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
    return view('welcome');})->name('home.index');

Route::get('/searchNav', [PostController::class, 'getName'])->name('posts.getName');
Route::resource('posts',PostController::class)->middleware('AuthCheck');

Route::resource('tags', TagController::class)->middleware('AuthCheck');

// Route::post('posts' ,[PostController::class,'update'])->name('posts.index');
// Route::get('posts',[PostController::class ,'getName'])->name('posts.getName');




Route::get('/loginUser',[UserController::class,'loginUser'])->name('users.loginUser')->middleware('AuthCheck');
Route::post('/loginAuthenticate',[UserController::class,'loginAuthenticate'])->name('users.Authenticate');
Route::get('/logOut',[UserController::class,'logOut'])->name('users.logOut');
Route::get('registration',[UserController::class,'create'])->name('users.register')->middleware('AuthCheck');
Route::resource('users',UserController::class)->except(['create']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Route::group(['middleware',['AuthCheck']], function(){
//     Route::resource('posts',PostController::class);
// Route::resource('tags', TagController::class);
// Route::get('/loginUser',[UserController::class,'loginUser'])->name('users.loginUser');
// Route::get('/logOut',[UserController::class,'logOut'])->name('users.logOut');
// Route::post('/loginAuthenticate',[UserController::class,'loginAuthenticate'])->name('users.Authenticate');
// Route::resource('users',UserController::class);
// });
