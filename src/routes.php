<?php

// Main route for administration
Route::get('rest-tokens', 'KalebClark\RestTokens\RestTokensController@index');
Route::get('rest-tokens/new', 'KalebClark\RestTokens\RestTokensController@newToken');
Route::get('rest-tokens/fetchToken', 'KalebClark\RestTokens\RestTokensController@createToken');
Route::post('rest-tokens/create', 'KalebClark\RestTokens\RestTokensController@create');
Route::post('rest-tokens/activate/{id}', 'KalebClark\RestTokens\RestTokensController@activate');
Route::delete('/rest-tokens/{id}', 'KalebClark\RestTokens\RestTokensController@delete');

