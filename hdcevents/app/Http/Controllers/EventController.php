<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $nome = "Poliana";
        $idade = 22;
        $arr = [1,2,3,4,5];    
        $nomes = ["Maria", "João", "Carlos", "Luiz"];

        //eu posso passar a variavel que contem o valor, ou o valor diretamente, como foi feito pra a chave de nome profissao
        return view('welcome',['user'=>$nome, 'idade'=>$idade, 'profissao'=>"Estudante", 'array'=>$arr, 'nomes'=>$nomes]); 
    }

    public function create(){
        return view('events.create');
    }

}
