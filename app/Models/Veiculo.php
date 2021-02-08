<?php

namespace App\Models;

use App\Models\Agendamento;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $table = 'veiculos';
    
    protected $fillable = [
        'nome',
    ];

    const CREATED_AT = 'criado';
	const UPDATED_AT = 'atualizado';

    /**
     * Tem muitos agendamentos
     *
     * @return void
     */
    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class, 'veiculo_id', 'id');
    }
}
