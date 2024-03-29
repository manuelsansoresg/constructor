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
Route::get('/{page}', [App\Http\Controllers\LandingController::class, 'index']);
Route::get('/web/{page}', [App\Http\Controllers\LandingController::class, 'index']);

Route::post('/correo/send', [App\Http\Controllers\LandingController::class, 'sendEmail']);


Route::resource('/admin/settings', App\Http\Controllers\SettingController::class);
Route::get('/admin/settings/{setting_id}/image/delete/{type}', [App\Http\Controllers\SettingController::class, 'deleteImage']);
//*guardar seleccion del dominio
Route::post('/admin/settings/setDomain', [App\Http\Controllers\SettingController::class, 'setDomain']);

Route::post('/page/store', [App\Http\Livewire\ConstructorComponent::class, 'storePage']);
Route::post('/image/add', [App\Http\Livewire\ConstructorComponent::class, 'imageAdd']);

Route::get('close_sesion', function() {
    session()->forget('is_model_open_post_id' . \Auth::user()->id);

    auth()->logout(); // or Auth::logout();

    return redirect('/'); // or to another route
});



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
    
    Route::post('/widget/{widget_id}/{page_id}/store', [App\Http\Controllers\AddWidgetsController::class, 'addElementContact']);
    
    Route::post('/producto/store', [App\Http\Controllers\AddWidgetsController::class, 'storeProduct']);
    Route::post('/add-element-producto/store', [App\Http\Controllers\AddWidgetsController::class, 'addElementProducto']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::get('getDataWidget/{section_id}/{widget_id}/{page_actual}', [App\Http\Livewire\ConstructorComponent::class, 'getDataWidget'])->name('home');
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('widget/{section_id}/{page_actual}/create', [App\Http\Livewire\ConstructorComponent::class, 'createWidget']);
    
    
    Route::get('encabezado/{page}/{widget_id}/edit', [App\Http\Controllers\WidgetHeaderController::class, 'edit']);
    Route::get('carusel/{page}/{widget_id}/edit', [App\Http\Controllers\WidgetCaruselController::class, 'edit']);
    
    Route::get('texto/{page}/{widget_id}/edit', [App\Http\Controllers\WidgetTextController::class, 'edit']);
    
    Route::post('texto/image/upload', [App\Http\Controllers\WidgetTextController::class, 'uploadImage']);
    Route::get('texto/image/server', [App\Http\Controllers\WidgetTextController::class, 'imageServer']);
    Route::post('texto/image/delete/server', [App\Http\Controllers\WidgetTextController::class, 'deleteImageServer']);

    Route::get('two-columns/{page}/{widget_id}/edit', [App\Http\Controllers\WidgetTwoColumnController::class, 'edit']);
    Route::get('parallax/{page}/{widget_id}/edit', [App\Http\Controllers\WidgetParallaxController::class, 'edit']);
    Route::get('video/{page}/{widget_id}/edit', [App\Http\Controllers\WidgetVideoController::class, 'edit']);
    Route::get('galeria/{page}/{widget_id}/edit', [App\Http\Controllers\WidgetGalleryController::class, 'edit']);
    Route::get('contacto/{page}/{widget_id}/edit', [App\Http\Controllers\WidgetContactController::class, 'edit']);
    
    Route::get('producto/{page}/{widget_id}/edit', [App\Http\Controllers\WidgetProductController::class, 'edit']);
    Route::get('producto/{product_id}/get', [App\Http\Controllers\WidgetProductController::class, 'getProduct']);
    
    Route::get('template/{widget_id}/{type}/exist', [App\Http\Controllers\WidgetProductController::class, 'isExistTemplate']);
    Route::post('template/create', [App\Http\Controllers\WidgetProductController::class, 'createTemplate']);
    
    Route::post('template/store', [App\Http\Controllers\WidgetProductController::class, 'storeTemplate']);
    
    Route::post('/page/constructor/store', [App\Http\Livewire\ConstructorComponent::class, 'storeConfiguration']);
    
    /* Route::post('/page/constructor/install-domain', [App\Http\Livewire\ConstructorComponent::class, 'installDomain']); */
    Route::resource('/domains', App\Http\Controllers\DomainController::class);
    Route::get('/domains/{domain_id}/delete', [App\Http\Controllers\DomainController::class, 'destroy']);

    Route::get('image/{widget_id}/{name_widget}/{name_image}/delete', [App\Http\Livewire\ConstructorComponent::class, 'deleteImage']);

});

Route::group(['prefix' => 'api'], function () {
    Route::resource('/user', App\Http\Controllers\Api\UserController::class);
    Route::post('/user/{user_id}/update', [App\Http\Controllers\Api\UserController::class, 'update']);
    Route::post('/user/{user_id}/update-password', [App\Http\Controllers\Api\UserController::class, 'updatePassword']);
    Route::get('/user/{user_id}/delete', [App\Http\Controllers\Api\UserController::class, 'deleteUser']);
});
