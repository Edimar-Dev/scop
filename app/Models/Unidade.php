<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    /** @use HasFactory<\Database\Factories\UnidadeFactory> */
    use HasFactory;

    protected $fillable = [
        'nome',
        'sigla',
    ];

     public function servidores()
    {
        return $this->hasMany(Servidor::class);
    }

    public function perfilUnidades()
    {
        return $this->hasMany(PerfilUnidade::class);
    }
}
