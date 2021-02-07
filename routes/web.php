<?php

$router->group(null)->namespace('App\Controllers');

$router->get('/', function ($data) {
    echo '<h1><center>' . env('APP_NAME', 'Project') . '</center></h1>';
});
