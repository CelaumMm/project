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
        response($agendamentos);
    }
}
