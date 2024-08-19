<?php


use App\Http\Controllers\Admin\AnnexTypeAdminController;
use App\Http\Controllers\Admin\Category\CategoryAdminController;
use App\Http\Controllers\Admin\Category\SubcategoryAdminController;
use App\Http\Controllers\Admin\CityAdminController;
use App\Http\Controllers\Admin\CountryAdminController;
use App\Http\Controllers\Admin\CurrencyAdminController;
use App\Http\Controllers\Admin\LanguageAdminController;
use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes();



Route::get('/all-register', [App\Http\Controllers\Auth\RegisterSessionController::class, 'index'])->name('rsc');
Route::post('/all-register', [App\Http\Controllers\Auth\RegisterSessionController::class, 'updateOrRegister'])->name('rsc');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::controller(CategoryAdminController::class)
        ->prefix('categories')
        ->name('category.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/edit/{category}', 'edit')->name('edit');
            Route::patch('/{category}', 'update')->name('update');
            Route::delete('/{category}', 'destroy')->name('destroy');
            Route::controller(SubcategoryAdminController::class)
                ->prefix('subcategories')
                ->name('subcategory.')
                ->group(function () {
                    Route::get('/{category}/', 'index')->name('index');
                    Route::get('/{category}/create', 'create')->name('create');
                    Route::post('/{category}', 'store')->name('store');
                    Route::get('/edit/{subcategory}', 'edit')->name('edit');
                    Route::patch('/{subcategory}', 'update')->name('update');
                    Route::delete('/{subcategory}', 'destroy')->name('destroy');
                });
        });
    Route::controller(CountryAdminController::class)
        ->prefix('countries')
        ->name('country.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/edit/{country}', 'edit')->name('edit');
            Route::patch('/{country}', 'update')->name('update');
            Route::delete('/{country}', 'destroy')->name('destroy');
        });
    Route::controller(CurrencyAdminController::class)
        ->prefix('currencies')
        ->name('currency.')
        ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/edit/{currency}', 'edit')->name('edit');
        Route::patch('/{currency}', 'update')->name('update');
        Route::delete('/{currency}', 'destroy')->name('destroy');
    });
    Route::controller(CityAdminController::class)
        ->prefix('cities')
        ->name('city.')
        ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/edit/{city}', 'edit')->name('edit');
        Route::patch('/{city}', 'update')->name('update');
        Route::delete('/{city}', 'destroy')->name('destroy');
    });
    Route::controller(LanguageAdminController::class)
        ->prefix('languages')
        ->name('language.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/edit/{language}', 'edit')->name('edit');
            Route::patch('/{language}', 'update')->name('update');
            Route::delete('/{language}', 'destroy')->name('destroy');
        });
    Route::controller(AnnexTypeAdminController::class)
        ->prefix('annex-types')
        ->name('annex.type.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/edit/{type}', 'edit')->name('edit');
            Route::patch('/{type}', 'update')->name('update');
            Route::delete('/{type}', 'destroy')->name('destroy');
        });
});

Route::middleware('auth')->group(function () {
    Route::controller(StatusController::class)
        ->prefix('/')
        ->name('status.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
        });
});
