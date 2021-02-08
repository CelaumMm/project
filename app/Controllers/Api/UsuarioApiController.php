<?php

namespace App\Controllers\Api;

use App\Models\Usuario;

class UsuarioApiController
{
    protected $usuario;

    public function __construct()
    {
        $this->usuario = new Usuario();
    }

    public function index()
    {
        $usuarios = $this->usuario->with(['agendamentos'])->orderBy('id', 'ASC')->get();
        response($usuarios);
    }
}
