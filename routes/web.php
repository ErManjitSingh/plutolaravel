<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\LocationsiteController;
use App\Http\Controllers\ActivityPriceController;
use App\Http\Controllers\BatchController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
// Route::resource('products', ProductController::class);
// Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware('auth.dashboard');
    // resource

    Route::resource('categories', CategoryController::class);
    Route::resource('countries', CountryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('states', StateController::class);
    Route::resource('districts', DistrictController::class);
    Route::resource('cities', CityController::class);
    Route::resource('locationsites', LocationsiteController::class);
    Route::resource('activity_prices', ActivityPriceController::class);
    Route::resource('batches', BatchController::class);
    // Endresource

    // Product Routing
    Route::GET('images', [ProductController::class, 'images'])->name('images');
    Route::GET('add-product', [ProductController::class, 'index'])->name('add-product');
    Route::POST('product-store', [ProductController::class, 'store'])->name('product-store');
    Route::GET('calendar', [ActivityPriceController::class, 'index'])->name('calendar');
    Route::GET('calendar', [HomeController::class, 'calendar'])->name('calendar');
    // Endproduct Routing
    
    //  delete
    Route::GET('delete-category/{id}', [CategoryController::class, 'destroy'])->name('delete-category');
    Route::GET('deleteproduct/{id}', [ProductController::class, 'destroy'])->name('deleteproduct');
    Route::GET('delete-price/{id}', [ActivityPriceController::class, 'destroy'])->name('delete-price');
    Route::GET('deletebatch/{id}', [BatchController::class, 'destroy'])->name('deletebatch');
    // Route::GET('tour-galary',[ProductController::class,'galary'])->name('tour-galary');
    // enddelete

    Route::GET('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
