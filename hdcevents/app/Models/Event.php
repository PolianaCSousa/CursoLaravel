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

    protected $dates = ['date']; //esse atributto $dates coloca a data no formato certo antes de salvar no BD

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

}
