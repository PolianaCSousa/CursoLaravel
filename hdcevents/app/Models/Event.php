<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//esse model ta me dando acesso ao meu banco de dados
class Event extends Model
{
    use HasFactory;

    //aqui eu estou fazendo o casting para o atributo items. Estou dizendo que ele é do tipo array
    protected $casts = [ 'items' => 'array']; 
}
