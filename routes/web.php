<?php

use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\LinkController;
use App\Http\Controllers\Back\ProfilesController;
use App\Http\Controllers\Back\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/companel/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('companel/dashboard',[DashboardController::class,'indexShow'])->name('dashboard');
    
    Route::get('companel/profile',[ProfilesController::class,'index'])->name('profile');
    Route::get('companel/profile/edit',[ProfilesController::class,'profileEdit'])->name('profiles.edit');
    Route::post('companel/profile/edit',[ProfilesController::class,'profileStore'])->name('profiles.store');
    Route::get('companel/change/password',[ProfilesController::class,'passwordChange'])->name('change.pass'); 
    Route::post('companel/update/password',[ProfilesController::class,'passwordUpdates'])->name('updates.password');

    Route::get('companel/links',[LinkController::class,'index'])->name('link.index');
    Route::get('companel/links/create',[LinkController::class,'create'])->name('link.create');
    Route::post('companel/links/store',[LinkController::class,'store'])->name('link.store');
     Route::get('companel/links/edit/{id}',[LinkController::class,'edit'])->name('link.edit');
     Route::put('companel/links/update/{id}', [LinkController::class, 'update'])->name('link.update');
      Route::delete('companel/links/delete/{id}', [LinkController::class, 'delete'])->name('link.delete');
      Route::get('link/{short_url}', [LinkController::class, 'shortenLink'])->name('short_url');
      Route::get('companel/inactive/links/{id}', [LinkController::class, 'inactiveLink'])->name('inactive.link');
     Route::get('companel/active/links/{id}', [LinkController::class, 'activeLink'])->name('active.link');
   
      Route::get('companel/category',[CategoryController::class,'index'])->name('categories.index');
     Route::get('companel/create/category',[CategoryController::class,'create'])->name('categories.create');
    Route::post('companel/category/store',[CategoryController::class,'store'])->name('categories.store');
    Route::get('companel/category/edit/{id}',[CategoryController::class,'edit'])->name('categories.edit');
     Route::put('companel/category/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
     Route::delete('companel/category/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');

    // Route::get('companel/change/password',[LinkController::class,'passwordChange'])->name('change.pass'); 
    // Route::post('companel/update/password',[LinkController::class,'passwordUpdates'])->name('updates.password');
    // Route::post('logout',[DashboardController::class,'logout'])->name('logout');
});
 

 
//  Route::middleware(['auth', 'verified'])->group(function () {
   


    //  Route::get('companel/category',[CategoryController::class,'index'])->name('categories.index');
    //  Route::get('companel/create/category',[CategoryController::class,'create'])->name('categories.create');
    // Route::post('companel/category/store',[CategoryController::class,'store'])->name('categories.store');
    // Route::get('companel/category/edit/{id}',[CategoryController::class,'edit'])->name('categories.edit');
    //  Route::put('companel/category/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    //  Route::delete('companel/category/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');

    // Route::get('companel/change/password',[LinkController::class,'passwordChange'])->name('change.pass'); 
    // Route::post('companel/update/password',[LinkController::class,'passwordUpdates'])->name('updates.password');
  // });




 

require __DIR__.'/auth.php';
