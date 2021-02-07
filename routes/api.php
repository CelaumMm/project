<?php

$router->group('api')->namespace('App\Controllers\Api');

$router->get('/users', 'UserApiController:index');
