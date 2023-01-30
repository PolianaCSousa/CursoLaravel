@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie o seu evento</h1>
    <form action="/events" method="POST" enctype="multipart/form-data"> <!-- O enctype é necessario para enviar arquivos pelo formulario HTML -->
        @csrf
        <div class="form-group">
            <label for="image">Imagem do evento:</label>
            <input type="file" id="image" name="image" class="from-control-file">
        </div>
        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Evento">
        </div>
        <div class="form-group">
            <label for="date">Data do evento:</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>
        <div class="form-group">
            <label for="title">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Local do Evento">
        </div>
        <div class="form-group">
            <label for="title">O evento é privado?</label>
            <select name="private" id="private" class="form-control">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Descrição:</label>
            <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?"> </textarea>
        </div>
        <div class="form-group">
            <label for="title">Adicione intens de infraestrutura:</label>
            <!--no atributo name, usamos o [] quando vamos receber um ou mais itens-->
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras 
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Palco"> Palco 
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Cerveja Grátis"> Cerveja Grátis 
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Open Food"> Open Food 
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Brindes"> Brindes
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Criar Evento">
        <!--Pelo que entendi, ao clicar no submit (botao de criar evento) a aplicação acessa, por meio da rota post, a action store do meu controller-->
    </form>
</div>
@endsection