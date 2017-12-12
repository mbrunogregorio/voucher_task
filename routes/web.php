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


Route::get('/recipients',['as'=>'recipients.index', 'uses'=>'RecipientsController@index']);
Route::get('/recipients/{id}',['as'=>'recipients.view', 'uses'=>'RecipientsController@view']);
Route::get('/recipients/{id}/edit',['as'=>'recipients.edit', 'uses'=>'RecipientsController@edit']);
Route::post('/recipients/{id}/edit',['as'=>'recipients.update', 'uses'=>'RecipientsController@update']);
Route::delete('/recipients/{id}',['as'=>'recipients.destroy', 'uses'=>'RecipientsController@delete']);

