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
Auth::routes();
Route::get('/', [App\Http\Controllers\LandingController::class, 'index']);
Route::get('/web/{page}', [App\Http\Controllers\LandingController::class, 'index']);





Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/admin/settings', App\Http\Controllers\SettingController::class);


Route::post('/page/store', [App\Http\Livewire\ConstructorComponent::class, 'storePage']);
Route::post('/image/add', [App\Http\Livewire\ConstructorComponent::class, 'imageAdd']);

Route::get('close_sesion', function() {
    session()->forget('is_model_open_post_id' . \Auth::user()->id);

    auth()->logout(); // or Auth::logout();

    return redirect('/'); // or to another route
});

Route::get('/admin/getDataWidget/{section_id}/{widget_id}/{page_actual}', [App\Http\Livewire\ConstructorComponent::class, 'getDataWidget'])->name('home');

Route::group(['prefix' => 'widgets'], function () {
    Route::post('/header/store', [App\Http\Controllers\AddWidgetsController::class, 'storeHeader']);
    Route::post('/carusel/store', [App\Http\Controllers\AddWidgetsController::class, 'storeCarusel']);
    Route::post('/texto/store', [App\Http\Controllers\AddWidgetsController::class, 'storeTexto']);
    Route::post('/two-columns/store', [App\Http\Controllers\AddWidgetsController::class, 'storeTwoColumns']);
    Route::post('/parallax/store', [App\Http\Controllers\AddWidgetsController::class, 'storeParallax']);
    Route::post('/video/store', [App\Http\Controllers\AddWidgetsController::class, 'storeVideo']);
    Route::post('/gallery/store', [App\Http\Controllers\AddWidgetsController::class, 'storeGallery']);
    Route::post('/contacto/store', [App\Http\Controllers\AddWidgetsController::class, 'storeContact']);
    Route::post('/add-element-contacto/store', [App\Http\Controllers\AddWidgetsController::class, 'addElementContact']);
    
    Route::post('/setting/store', [App\Http\Controllers\AddWidgetsController::class, 'storeSetting']);
});
