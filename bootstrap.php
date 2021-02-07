<?php

ob_start();
header('Content-Type: text/html; charset=utf-8');
set_time_limit(0);
date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

// Verifica se o autoload do Composer está configurado
$composer = __DIR__ . '/vendor/autoload.php';
if (!file_exists($composer)) {
    die('<b>Execute o comando:</b> composer install<br>');
}
require $composer;

// Verifica se o arquivo .env existe
$env = __DIR__ . '/.env';
if (!file_exists($env)) {
    die('<b>Execute o comando:</b> cp .env.example .env');
}

// Configuração do debug
ini_set('display_errors', env('APP_DEBUG', true));

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Carregar o eloquent
new App\Models\Database();

// Carregar as rotas
require __DIR__ . '/routes/route.php';
