<?php

namespace App\Models;

use App\Models\Usuario;
use App\Models\Veiculo;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $table = 'agendamentos';
    
    protected $fillable = [
        'usuario_id',
        'veiculo_id',
        'dia',
        'horario',
    ];

    const CREATED_AT = 'criado';
	const UPDATED_AT = 'atualizado';

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id');
    }

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class, 'veiculo_id', 'id');
    }
}
