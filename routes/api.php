<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['namespace' => 'Api'], function () use ($router) {
    $router->group(['prefix' => 'api'], function () use ($router) {

        $router->group(['prefix' => 'recipients'], function () use ($router) {
            Route::get('/', ['as' => 'recipients.index', 'uses' => 'RecipientsController@index']);
            Route::post('/vouchers', ['as' => 'recipients.vouchers', 'uses' => 'RecipientsController@vouchers']);
        });

        $router->group(['prefix' => 'special_offers'], function () use ($router) {
            Route::get('/', ['as' => 'special_offers.index', 'uses' => 'SpecialOffersController@index']);
            Route::get('/{id}/vouchers', ['as' => 'special_offers.vouchers', 'uses' => 'SpecialOffersController@vouchers']);
        });

        $router->group(['prefix' => 'voucher'], function () use ($router) {
            Route::post('/check/', ['as' => 'voucher.check', 'uses' => 'VouchersController@check']);
        });

    });
});
