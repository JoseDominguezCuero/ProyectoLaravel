<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
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

//Route::get('/usuario', function(){
   // return "Hola desde la ruta de usuario";
//});
Route::get('/usuario/{nombre_usuario?}', 
[PersonaController::class , 'mostrar'])-> where
('nombre_usuario' , '[A-Za-z]+');

Route::get('/users', [PersonaController::class , 'show']);
Route::get('/user/form/{id?}',[PersonaController::class , 'form'])->name('user.form');
Route::get('/user/form/{id?}',[PersonaController::class , 'update'])->name('user.update');
Route::post('/user/save',[PersonaController::class , 'save'])->name('user.save');
Route::get('/user/delete/{id}',[PersonaController::class , 'delete'])->name('user.delete');
Auth::routes();

Route::get('/areas', [AreaController::class , 'show']);
Route::get('/area/form/{id?}',[AreaController::class , 'form'])->name('area.form');
Route::post('/area/save',[AreaController::class , 'save'])->name('area.save');
Route::get('/area/delete/{id}',[AreaController::class , 'delete'])->name('area.delete');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::resource('invoice', InvoiceController);
