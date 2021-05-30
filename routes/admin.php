<?php

// namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\UserCompaniesController;
use App\Http\Livewire\Cities\CityComponent;
use App\Http\Livewire\Products\ProductComponent;
use App\Http\Livewire\Countries\CountryComponent;
use App\Http\Livewire\States\StateComponent;

use App\Http\Controllers\Admin\CityController;


Route::prefix('/admin')->group(function(){
    Route::get('/', [DashboardController::class,'getDashboard']);
    Route::get('/users',[UserController::class,'getUsers'])->name('users');

    //Module Products-
    Route::get('/products/product', [ProductComponent::class,'default'])->name('products');
    Route::get('/products/add', [ProductController::class,'getProductAdd']);
    Route::post('/products/add', [ProductController::class,'postProductAdd']);
    Route::get('/product/{idMarca}/edit',[ProductController::class,'getProductEdit']);
    Route::post('/products/{id}/edit', [ProductController::class,'postProductEdit']);

    //Module Categories
    Route::get('/categories', [CategoryController::class,'getHome'])->name('categories');
    Route::post('/categories/add', [CategoryController::class,'categoryAdd']);
    Route::get('/categories/{id}/edit', [CategoryController::class,'getCategoryEdit']);
    Route::post('/categories/{id}/edit', [CategoryController::class,'postCategoryEdit']);
    Route::get('/categories/{id}/delete', [CategoryController::class,'getCategoryDelete']);

    //map module
    Route::get('/location', 'MapController@getLocation')->name('location');

    Route::get('/countries/countries', [CountryComponent::class, 'default'])->name('countries');

    Route::get('/states/state', [StateComponent::class, 'default'])->name('states');
    // Route::get('/states/add', [StateController::class, 'create']);
    // Route::post('/states/add', [StateController::class, 'store']);

    Route::get('/cities/city', [CityComponent::class, 'default'])->name('cities');
    Route::get('/cities', [CityController::class, 'index']);
    Route::get('/cities/add', [CityController::class, 'create']);
    // Route::get('/cities/add', [CityController::class, 'create']);
    // Route::post('/cities/add', [CityController::class, 'store']);

    // para los combos anidados
    Route::get('/country', [CountryController::class, 'country']);
    Route::post('/state', [CountryController::class, 'state']);
    Route::post('/city', [CountryController::class, 'city']);
    Route::post('/company', [CountryController::class, 'company']);

    Route::get('/companies', [CompanyController::class, 'index']);
    Route::get('/companies/add', [CompanyController::class, 'create']);
    Route::post('/companies/add', [CompanyController::class, 'store']);

    Route::get('/usercompanies/{id}', [UserCompaniesController::class, 'index']);
    Route::get('/usercompanies/add/{id}', [UserCompaniesController::class, 'create']);
    Route::post('/usercompanies/add/{id}', [UserCompaniesController::class, 'store']);

    Route::post('/upload', [ProductController::class, 'upload']);
    Route::post('/progress', [ProductController::class, 'progress']);
    Route::post('/deletePhoto', [ProductController::class, 'deletePhoto']);
    Route::post('/setCoverImage', [ProductController::class, 'setCoverImage']);
});

