<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/admin', function () {
    return view('layouts.admin');
});

Route::get('admin/categories', [CategoriesController::class, 'index'])->name('categories.index');
Route::get('admin/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
Route::post('admin/categories', [CategoriesController::class, 'store'])->name('categories.store');
Route::get('admin/categories/{id}', [CategoriesController::class, 'show'])->name('categories.show');
Route::get('admin/categories/{id}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
Route::put('admin/categories/{id}', [CategoriesController::class, 'update'])->name('categories.update');
Route::delete('admin/categories/{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy');

Route::resource('admin/products', ProductController::class)->middleware(['auth','password.confirm']);
