<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Backend\CmsController;
use App\Http\Controllers\Web\Backend\UserController;
use App\Http\Controllers\Web\Backend\CategoryController;
use App\Http\Controllers\Web\Backend\PropertyController;
use App\Http\Controllers\Web\Backend\AminitiesController;

Route::get('categories', [CmsController::class, 'index'])->name('categories.index');

Route::get('AllUsers', [UserController::class, 'index'])->name('users.index');

Route::get('supportproperty/create', [CmsController::class, 'supportcreate'])->name('support.create');
Route::post('supportproperty/update', [CmsController::class, 'supportupdate'])->name('support.update');

Route::get('chooseproperty/create', [CmsController::class, 'propertycreate'])->name('chooseproperty.create');
Route::post('chooseproperty/update', [CmsController::class, 'propertyupdate'])->name('chooseproperty.update');

Route::get('administration/create', [CmsController::class, 'administrationcreate'])->name('administration.create');
Route::post('administration/update', [CmsController::class, 'administrationupdate'])->name('administration.update');

Route::get('useability/create', [CmsController::class, 'useabilitycreate'])->name('useability.create');
Route::post('useability/update', [CmsController::class, 'useabilityupdate'])->name('useability.update');

Route::get('about/create', [CmsController::class, 'aboutcreate'])->name('about.create');
Route::post('about/update', [CmsController::class, 'aboutupdate'])->name('about.update');

Route::get('aboutwork/create', [CmsController::class, 'aboutworkcreate'])->name('aboutwork.create');
Route::post('aboutwork/update', [CmsController::class, 'aboutworkupdate'])->name('aboutwork.update');

Route::get('placeworksection/create', [CmsController::class, 'placeworksectioncreate'])->name('placeworksection.create');
Route::post('placeworksection/update', [CmsController::class, 'placeworksectionupdate'])->name('placeworksection.update');

Route::get('ownsection/create', [CmsController::class, 'ownsectioncreate'])->name('ownsection.create');
Route::post('ownsection/update', [CmsController::class, 'ownsectionupdate'])->name('ownsection.update');

Route::get('listing/create', [CmsController::class, 'listingcreate'])->name('listing.create');
Route::post('listing/update', [CmsController::class, 'listingupdate'])->name('listing.update');

Route::get('modernsection/create', [CmsController::class, 'modernsectioncreate'])->name('modernsection.create');
Route::post('modernsection/update', [CmsController::class, 'modernsectionupdate'])->name('modernsection.update');

//Category Routes
Route::controller(CategoryController::class)->group(function (){
    Route::get('categories','index')->name('categories.index');
    Route::get('categories/create','create')->name('categories.create');
    Route::post('categories/store','store')->name('categories.store');
    Route::get('categories/{id}/edit','edit')->name('categories.edit');
    Route::patch('categories/{id}/update','update')->name('categories.update');
    Route::delete('categories/{id}/destroy','destroy')->name('categories.destroy');
    Route::get('categories/status/{id}','status')->name('categories.status');
    // Route::get('','')->name('');
});

//Property Type Routes
Route::controller(PropertyController::class)->group( function () {
    Route::get('property','index')->name('property.index');
    Route::get('property/create','create')->name('property.create');
    Route::post('property/store','store')->name('property.store');
    Route::get('property/{id}/edit','edit')->name('property.edit');
    Route::patch('property/{id}/update','update')->name('property.update');
    Route::delete('property/destroy/{id}','destroy')->name('property.destroy');
    Route::get('property/status/{id}','status')->name('property.status');
    Route::get('property/parking/{id}','parking')->name('property.parking');
    Route::post('property/viewmodel/{id}','viewdataonmodel')->name('property.viewmodel');
    Route::get('property/categorySearch','categorysearch')->name('property.search');
    Route::get('property/categoryadvanceSearch','advancesearch')->name('property.advancesearch');
    
});

//Aminities Routes
Route::controller(AminitiesController::class)->group(function (){
    Route::get('aminities','index')->name('aminities.index');
    ROute::get('aminities/create','create')->name('aminities.create');
    Route::post('aminities/store','store')->name('aminities.store');
    Route::get('aminities/{id}/edit','edit')->name('aminities.edit');
    Route::patch('aminities/{id}/update','update')->name('aminities.update');
    Route::delete('aminities/destroy/{id}','destroy')->name('aminities.destroy');
    Route::get('aminities/status/{id}','status')->name('aminities.status');
});
