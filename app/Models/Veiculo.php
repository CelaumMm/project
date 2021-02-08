<?php

namespace App\Models;

use App\Models\Agendamento;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $table = 'veiculos';
    
    protected $fillable = ['marca', 'modelo', 'versao', 'preco', 'localidade', 'imagem'];

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

    public function getImagemAttribute($value)
    {
        if ($value) {
            return env('APP_URL') . $value;
        }
    }
}
