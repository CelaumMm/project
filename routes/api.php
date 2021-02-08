<?php

$router->group('api')->namespace('App\Controllers\Api');

$router->get('/usuarios', 'UsuarioApiController:index');
$router->get('/agendamentos', 'AgendamentoApiController:index');
$router->get('/veiculos', 'VeiculoApiController:index');
