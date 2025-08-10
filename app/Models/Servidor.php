<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servidor extends Model
{
    /** @use HasFactory<\Database\Factories\ServidorFactory> */
    use HasFactory;

     protected $table = 'servidores';

    protected $fillable = [
        'nome',
        'cpf',
        'email',
        'matricula',
        'unidade_id',
        'perfil_id',
        'observacoes',
    ];

    public function unidade()
    {
        return $this->belongsTo(Unidade::class);
    }

    public function perfil()
    {
        return $this->belongsTo(Perfil::class);
    }
}
