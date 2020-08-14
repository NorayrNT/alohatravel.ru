<?php

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

Route::get('/home',function() { return view('index'); })->name('home');
Route::get('/',function() { return view('index'); });
Route::get('/armenia',function() { return view('armenia'); });
Route::post('/password-reset',"UserController@passwordReset");
Route::post('/login',"UserController@login");
Route::get("/login",function() { return view('layouts.register-login.login'); })->name('login')->middleware('guest');
Route::get('/about',function() { return view('about');});
Route::get('/contacts',function() {  return view('contacts'); });
Route::post("/contact-us","IndexController@contactUs");
Route::get("/terms",function() { return view('terms'); });
Route::post('/change-lang',"IndexController@changeLang");
Route::post('/change-currency',"IndexController@changeCurrency");
Route::post("/subscribe","IndexController@subscribe");
Route::post("/change-contacts","IndexController@changeContacts");

Route::prefix('/tours')->group(function() {
    Route::get('incoming',function() { return view('tours.incoming'); });
    Route::get('individual',function() { return view('tours.individual'); });
    Route::get("extreme",function() { return view('tours.extreme'); });
    Route::get('incoming-type/{slug}','IndexController@incomingTypes');
    Route::get('incoming-tour/{type_id}','IndexController@incomingTour');
    Route::get('outgoings/{country_id?}','IndexController@outgoing');
    Route::get('outgoing/{type}','IndexController@outgoingTour');
});

Route::prefix("/services")->group(function() {
    Route::prefix("rentals")->group(function() {
        Route::get("apartments","IndexController@apartments");
        Route::get('cars',function() { return view("services.cars"); });
    });
    Route::get("transportation",function() { return view("services.transport"); });
    Route::post("cars/get-images","IndexController@carImages");
    Route::post("apartments/get-images","IndexController@apartmentImages");
    Route::post("individual/get-images","IndexController@individualImages");
});


Route::prefix('user')->group(function() {
    Route::post("register","UserController@register");
    Route::group([
        'middleware' => 'auth'
    ],function() {
        Route::get('logout',"UserController@logout");
        Route::get('account',"UserController@account");
        Route::post('update','UserController@update');
    });
    
});

