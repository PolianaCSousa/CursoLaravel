<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event; //usou o namespace para o controller ter acesso ao Model Event

class EventController extends Controller
{
    public function index() {

        $search = request('search');

        if($search){
            
            //A linha abaixo representa o seguinte comando SQL: WHERE title LIKE %$search%
            $events = Event::where([['title', 'like', '%'.$search.'%']])->get();

        }else{
            //a variavel $events está recebendo todos os dados do BD por meio do model usando o comando Event::all()
            $events = Event::all(); //all é um comando do ORM

        }

        
        //eu posso passar a variavel que contem o valor, ou o valor diretamente, como foi feito pra a chave de nome profissao
        return view('welcome',['events' => $events, 'search' => $search]); 

    }

    public function create() {
        return view('events.create');
    }

    //por meio do request consigo os dados que vieram do formulário
    public function store(Request $request) {
       
        $event = new Event;

        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items;

        //image upload
        if($request->hasFile('image') && $request->file('image')->isValid()) { //verifica se a imagem inserida é válida

            $requestImage = $request->image; //a variavel requestImage vai receber a imagem
            $extension = $requestImage->extension(); //o método extension retorna a extensão da imagem
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension); //concatenando o nome da imagem com a data que ele foi salva 
            //A função md5() converte a string em um hash md5 (criptografia)
            $requestImage->move(public_path('img/events'), $imageName); //salvando a imagem na pasta /img/events

            $event->image = $imageName; //o que será salvo de fato no BD será o  nome da imagem apenas
        }
        
        $user = auth()->user(); //o metodo auth me da acesso ao usuario logado
        $event->user_id = $user->id; //o id do usuario logado sera salvo junto com as informaçoes do evento, logo ele será o dono do evento

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id) {

        $event = Event::findOrFail($id);

        return view('events.show', ['event' => $event]);
    }

}
