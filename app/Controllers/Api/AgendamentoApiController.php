<?php

namespace App\Controllers\Api;

use App\Models\Agendamento;

class AgendamentoApiController
{
    protected $agendamento;

    public function __construct()
    {
        $this->agendamento = new Agendamento();
    }

    public function index()
    {
        $agendamentos = $this->agendamento->with(['usuario', 'veiculo'])->orderBy('id', 'ASC')->get();
        return response($agendamentos);
    }

    public function show($id)
    {
        $agendamento = $this->agendamento->with(['usuario', 'veiculo'])->find($id);

        if (!$agendamento->toArray()) {
            return response(['message' => 'Not Found'], 404);
        }
        
        return response($agendamento);
    }

    public function disponiveis()
    {
        $agendamentos = $this->agendamento
            ->orderBy('dia', 'ASC')
            ->orderBy('horario', 'ASC')
            ->get(['dia', 'horario']);

        $indisponiveis = $agendamentos->toArray();

        $dataHoraDisponivel = dataHoraDisponivel($indisponiveis);

        return response($dataHoraDisponivel);
    }

    public function store($request)
    {
        $usuario = $this->agendamento->create($request);
        
        return response($usuario, 201);
    }
}
