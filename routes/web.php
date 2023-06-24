<?php

use App\Http\Controllers\Backend\backEndController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontendController::class, 'index'])->name('Front.index');
Route::get('/single-post', [FrontendController::class, 'single'])->name('Front.single');

route::group(['prefix'=>'dashboard'], function(){
    Route::get('/admin', [BackEndController::class, 'index'])->name('Backend.index');
    Route::resource('category', CategoryController::class);
    // Route::resource('category', CategoryController::class);
    // Route::resource('tag', TagController::class);
    // Route::resource('sub_category', SubCategoryController::class);
    // Route::resource('post', PostController::class);
});

Route::get('/dashboard', function () {
    return view('Backend.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
