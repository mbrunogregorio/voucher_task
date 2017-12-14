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

/*$router->get('/', function () use ($router) {
    return $router->app->version();
});*/
Route::get('/',['uses'=>'SpecialOffersController@index']);

$router->group(['prefix' => 'recipients'], function () use ($router) {
        Route::get('/',['as'=>'recipients.index', 'uses'=>'RecipientsController@index']);
        Route::get('/create',['as'=>'recipients.create', 'uses'=>'RecipientsController@create']);
        Route::post('/store',['as'=>'recipients.store', 'uses'=>'RecipientsController@store']);
        Route::get('/{id}',['as'=>'recipients.view', 'uses'=>'RecipientsController@view']);
        Route::get('/{id}/edit',['as'=>'recipients.edit', 'uses'=>'RecipientsController@edit']);
        Route::post('/{id}/edit',['as'=>'recipients.update', 'uses'=>'RecipientsController@update']);
        Route::delete('/{id}',['as'=>'recipients.destroy', 'uses'=>'RecipientsController@delete']);
        Route::get('/{id}/vouchers',['as'=>'recipients.vouchers', 'uses'=>'RecipientsController@vouchers']);
});


$router->group(['prefix' => 'special_offers'], function () use ($router) {
    Route::get('/',['as'=>'special_offers.index', 'uses'=>'SpecialOffersController@index']);
    Route::get('/create',['as'=>'special_offers.create', 'uses'=>'SpecialOffersController@create']);
    Route::post('/store',['as'=>'special_offers.store', 'uses'=>'SpecialOffersController@store']);
    Route::get('/{id}',['as'=>'special_offers.view', 'uses'=>'SpecialOffersController@view']);
    Route::get('/{id}/edit',['as'=>'special_offers.edit', 'uses'=>'SpecialOffersController@edit']);
    Route::post('/{id}/edit',['as'=>'special_offers.update', 'uses'=>'SpecialOffersController@update']);
    Route::delete('/{id}',['as'=>'special_offers.destroy', 'uses'=>'SpecialOffersController@delete']);
    Route::get('/{id}/vouchers',['as'=>'special_offers.vouchers', 'uses'=>'SpecialOffersController@vouchers']);
    Route::get('/{id}/vouchers/form',['as'=>'special_offers.vouchers.form', 'uses'=>'SpecialOffersController@vouchers_form']);
    Route::post('/{id}/vouchers/generate',['as'=>'special_offers.vouchers.generate', 'uses'=>'SpecialOffersController@vouchers_generate']);
});
