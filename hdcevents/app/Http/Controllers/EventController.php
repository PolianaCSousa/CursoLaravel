<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event; //usou o namespace para o controller ter acesso ao Model Event

class EventController extends Controller
{
    public function index() {

        //a variavel $events está recebendo todos os dados do BD por meio do model usando o comando Event::all()
        $events = Event::all(); //all é um comando do ORM

        //eu posso passar a variavel que contem o valor, ou o valor diretamente, como foi feito pra a chave de nome profissao
        return view('welcome',['events' => $events]); 

    }

    public function create() {
        return view('events.create');
    }
}
