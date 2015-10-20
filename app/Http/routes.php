<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', ['as' => 'top-all', 'uses' => 'TopListController@all']);
Route::get('top/{serverId}/', ['as' => 'top-server', 'uses' => 'TopListController@server']);

Route::get('/player/{id}/{serverId}', ['as' => 'view-player', 'uses' => 'PlayerController@show']);

Route::get('/search/', ['as' => 'player-search', 'uses' => 'SearchController@index']);
Route::post('/search/', ['as' => 'player-search-post', 'uses' => 'SearchController@playerSearch']);

Route::get('/redirect/top/{serverId}', ['as' => 'redirect-top', 'uses' => 'RedirectController@redirectTop']);
Route::get('/redirect/player/{accountID}/{serverId}', ['as' => 'redirect-stats', 'uses' => 'RedirectController@redirectStats']);

Route::post('/player/getSteamData/{steamId}', ['as' => 'get-steam-data', 'uses' => 'PlayerController@getSteamPlayerData']);
