<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    /** @use HasFactory<\Database\Factories\PerfilFactory> */
    use HasFactory;

       protected $fillable = [
        'nome',
    ]; 

     public function servidores()
    {
        return $this->hasMany(Servidor::class); 
    }

}
