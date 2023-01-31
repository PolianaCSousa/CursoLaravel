@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>
<div id="events-container" class="col-md-12">
    @if($search)
        <h2>Buscando por: {{ $search }}</h2>
    @else
        <h2>Próximos Eventos</h2>
        <p class="subtitle">Veja os eventos do próximos dias</p>
    @endif
    <div id="cards-container" class="row">
         @if(count($events) == 0 && $search) 
           <p>Não foi possível encontrar nenhum evento com {{ $search }}. <br><a href="/">Ver todos os eventos disponíveis!</a></p>
        @elseif(count($events) == 0)<!--se ñ tiver nenhum evento ele fala e ñ entra no foreach ja que o array estaravazio-->
            <p>Não há eventos disponíveis.</p>
        @else
            @foreach($events as $event)
            <div class="card col-md-3">
                <img src="/img/events/{{ $event->image }}" alt="{{$event->title}}">
                <div class="card-body">
                    <p class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</p>
                    <h5 class="card-title">{{$event->title}}</h5>
                    <p class="card-participants">X Participantes</p>
                    <a href="/events/{{ $event->id }}" class="btn btn-primary">Saber mais</a>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</div>
@endsection