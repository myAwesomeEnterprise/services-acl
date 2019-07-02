<?php

$router->group([
    'prefix' => '/abilities',
], function () use ($router) {

    $router->get('/', 'AbilityController@all');
    $router->post('/', 'AbilityController@store');
    $router->get('/{ability}', 'AbilityController@get');
    $router->put('/{ability}', 'AbilityController@update');
    $router->delete('/{ability}', 'AbilityController@destroy');

});

$router->group([
    'prefix' => '/roles',
], function () use ($router) {
    $router->get('/', 'RoleController@all');
    $router->post('/', 'RoleController@store');
    $router->get('/{role}', 'RoleController@get');
    $router->put('/{role}', 'RoleController@update');
    $router->delete('/{role}', 'RoleController@destroy');
});
