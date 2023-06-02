<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::view('add' , 'addmember');
Route::get('test',[TestController::class, 'getData']);
Route::post('addData',[TestController::class, 'addData']);
Route::get('delete/{id}',[TestController::class, 'deleteData']);
Route::get('/update/{id}',[TestController::class, 'updateData'])->name('up');
Route::post('/update',[TestController::class, 'update'])->name('update');