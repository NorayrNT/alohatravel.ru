<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {
    
    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource('about', AboutController::class);
    $router->resource('armenia', ArmeniaController::class);
    $router->resource('cars', CarController::class);
    $router->resource('chats', ChatController::class);
    $router->resource('contacts', ContactController::class);
    $router->resource('currencies', CurrencyController::class);
    $router->resource('extremes', ExtremeController::class);
    $router->resource('ins', InController::class);
    $router->resource('in-tours', InTourController::class);
    $router->resource('outs', OutController::class);
    $router->resource('out-tours', OutTourController::class);
    $router->resource('individuals', IndividualController::class);
    $router->resource('locales', LocaleController::class);
    $router->resource('users', UserController::class);
    $router->resource('services', ServicesController::class);
    $router->resource('in-days', InDayController::class);
    $router->resource('navs', NavController::class);
    $router->resource('pages', PagesController::class);
    $router->resource('partners', PartnersController::class);
    $router->resource('social-links', SocialLinksController::class);
    $router->resource('subscribers', SubscribersController::class);
    $router->resource('tour-statuses', TourStatusesController::class);
    $router->resource('tour-types', TourTypeController::class);
    $router->resource('why-wes', WhyWeController::class);
    $router->resource('apartments', ApartmentsController::class);
    $router->resource('shipping-types', ShippingTypeController::class);
    $router->resource('shippings', ShippingsController::class);
});
