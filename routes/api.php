<?php

$router->group('api')->namespace('App\Controllers\Api');

$router->get('/usuarios', 'UsuarioApiController:index');
$router->get('/usuarios/{id}', 'UsuarioApiController:show');

$router->get('/veiculos', 'VeiculoApiController:index');
$router->get('/veiculos/{id}', 'VeiculoApiController:show');

$router->get('/agendamentos', 'AgendamentoApiController:index');
$router->get('/agendamentos/{id}', 'AgendamentoApiController:show');
$router->get('/agendamentos/disponiveis', 'AgendamentoApiController:disponiveis');
$router->post('/agendamentos', 'AgendamentoApiController:store');
