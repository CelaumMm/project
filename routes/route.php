<?php

$router = new CoffeeCode\Router\Router(env('APP_URL'));

/**
 * WEB
 */
require __DIR__ . '/web.php';

/**
 * API
 */
require __DIR__ . '/api.php';

/**
 * ERROR
 */
$router->group("error");
$router->get('/{errcode}', function ($data) {
    echo "<h1><center>Erro {$data['errcode']}</center></h1>";
});

$router->dispatch();

if ($router->error()) {
    $router->redirect("/error/{$router->error()}");
}
