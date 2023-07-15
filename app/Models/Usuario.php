<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $usuarios = [
        'Data de Criação' => 'datetime:d/m/Y H:i:s'
    ];

    protected $fillable = ['Nome', 'E-mail', 'Senha', 'Data de Nascimento'];
}
