<?php

// Main route for administration
Route::get('rest-tokens', 'KalebClark\RestTokens\RestTokensController@index');
Route::get('rest-tokens/new', 'KalebClark\RestTokens\RestTokensController@create');
