<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event; //usou o namespace para o controller ter acesso ao Model Event
use App\Models\User; 

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

        /*
        User::where('id','=',$event->user_id) : retorna o usuário cujo id seja igual ao id do $event->user_id (id salvo no BD). OBS: pode omitir o sinal de igual, o Laravel entende a mesma coisa.
        first() : ele vai retornar o primeiro usuário que encontrar com o id informado
        toArray() : os dados do usuário serão retornados em um array
        */ 
        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner]);
    }

    public function dashboard(){

        $user = auth()->user();

        $events = $user->events;

        $eventsAsParticipant = $user->eventsAsParticipant;

        return view('events.dashboard', ['events' => $events, 'eventsasparticipant' => $eventsAsParticipant]);

    }

    public function destroy($id) {
            
        //estou buscando o evento com o id informado com o findOrFail e em seguida já o deleto com o delete()
        Event::findOrFail($id)->delete();
        
        return redirect('/dashboard')->with('msg', 'Evento excluído com sucesso!');
    }

    public function edit($id) {

        $event = Event::findOrFAIL($id);

        $user = auth()->user();

        if($user->id != $event->user_id){
            return redirect('/dashboard');
        }

        return view('events.edit', ['event' => $event]);

    }

    public function update(Request $request) {

        $data = $request->all();

        //image upload
        if($request->hasFile('image') && $request->file('image')->isValid()) { //verifica se a imagem inserida é válida

            $requestImage = $request->image; //a variavel requestImage vai receber a imagem
            $extension = $requestImage->extension(); //o método extension retorna a extensão da imagem
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension); //concatenando o nome da imagem com a data que ele foi salva 
            //A função md5() converte a string em um hash md5 (criptografia)
            $requestImage->move(public_path('img/events'), $imageName); //salvando a imagem na pasta /img/events

            $data['image'] = $imageName; //o que será salvo de fato no BD será o  nome da imagem apenas
        }

        //o request recebeu o id que foi passado na rota
        Event::findOrFail($request->id)->update($data);
        return redirect('/dashboard')->with('msg', 'Evento editado com sucesso!');
    }

    public function joinEvent($id) {
    
        $user = auth()->user();

        $user->eventsAsParticipant()->attach($id);

        $event = Event::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Sua presença está confirmada no evento ' . $event->title);
    }

}
