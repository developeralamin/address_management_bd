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
use App\Http\Controllers\Backend\DashboardController;
Route::get('/dashboard',[DashboardController::class,'index'])->name('/dashboard');
Route::get('/',[DashboardController::class,'index'])->name('/dashboard');

// Route::get('/', function () {
//     return view('dashboard');
// });


//Route for UserGroup
use App\Http\Controllers\Backend\DivisionController;
Route::get('division',[DivisionController::class, 'index'])->name('division');
Route::get('division/create',[DivisionController::class, 'create'])->name('division.create');
Route::post('division',[DivisionController::class, 'store'])->name('division.store');
Route::get('division/edit/{id}',[DivisionController::class,'edit'])->name('division.edit');

Route::post('division/update/{id}',[DivisionController::class,'update'])->name('division.update');
// Route::get('division/details/{id}',[DivisionController::class,'details'])->name('division.details');
Route::delete('division/{id}',[DivisionController::class,'destroy']);



// Route::get('district',[DistrictController::class, 'index'])->name('district');
// Route::get('district/create',[DistrictController::class, 'create'])->name('district.create');
// Route::post('district',[DistrictController::class, 'store'])->name('district.store');
// Route::get('district/edit/{id}',[DistrictController::class,'edit'])->name('district.edit');

// Route::post('district/update/{id}',[DistrictController::class,'update'])->name('district.update');
// // Route::get('district/details/{id}',[DistrictController::class,'details'])->name('district.details');
// Route::delete('district/{id}',[DistrictController::class,'destroy']);

use App\Http\Controllers\Backend\ZillaController;
Route::resource('district', ZillaController::class);

use App\Http\Controllers\Backend\UpazillaController;
Route::resource('upazilla', UpazillaController::class);


use App\Http\Controllers\Backend\DefaultController;
Route::get('/get-district',[DefaultController::class, 'index'])->name('default.get-district');

Route::get('/get-upazilla',[DefaultController::class, 'upazilla'])->name('default.get-upazilla');

Route::get('/get-union',[DefaultController::class, 'union'])->name('default.get-union');
Route::get('/get-word',[DefaultController::class, 'word'])->name('default.get-word');



use App\Http\Controllers\Backend\UnionController;
Route::resource('union_all', UnionController::class);

use App\Http\Controllers\Backend\WordNoController;
Route::resource('word_no_all', WordNoController::class);

use App\Http\Controllers\Backend\VillageController;
Route::resource('village', VillageController::class);


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
