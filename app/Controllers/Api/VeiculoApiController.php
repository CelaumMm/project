<?php

namespace App\Controllers\Api;

use App\Models\Veiculo;

class VeiculoApiController
{
    protected $veiculo;

    public function __construct()
    {
        $this->veiculo = new Veiculo();
    }

    public function index()
    {
        $veiculos = $this->veiculo->with(['agendamentos'])->orderBy('id', 'ASC')->get();
        response($veiculos);
    }

    public function show($id)
    {
        $veiculo = $this->veiculo->with(['agendamentos'])->find($id);

        if (!$veiculo->toArray()) {
            return response(['message' => 'Not Found'], 404);
        }
        
        response($veiculo);
    }
}
