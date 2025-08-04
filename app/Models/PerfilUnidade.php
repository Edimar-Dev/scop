<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfilUnidade extends Model
{
    /** @use HasFactory<\Database\Factories\PerfilUnidadeFactory> */
    use HasFactory;

    protected $table = 'perfil_unidades';

    protected $fillable = [
        'unidade_id',
        'perfil_id',
        'limite_recomendado',
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
