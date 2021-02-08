<?php

namespace App\Models;

use App\Models\Agendamento;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    
    protected $fillable = [
        'nome',
        'telefone',
        'email',
        'senha',
    ];

    protected $hidden = [
        'senha',
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
        return $this->hasMany(Agendamento::class, 'usuario_id', 'id');
    }
}
