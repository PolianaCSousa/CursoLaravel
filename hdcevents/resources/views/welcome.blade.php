@extends('layouts.main')

{{--Esse titulo será substituido em  @yield('title') no arquivo main.blade.php--}}
@section('title', 'HDC Events')

{{--Esse conteúdo será substituido em  @yield('content') no arquivo main.blade.php--}}
@section('content')

<h1>Algum Título</h1>
<img src="/img/banner.jpg" alt="Banner">
<!--Para inserir diretivas do Blade, usamos @-->
@if(10 > 5)
    <p>A condição é True</p>
@endif

<p>{{$user}}</p> <!--o que é passado é o nome da chave do array que eu defini na rota-->

@if($user == "Ana")
    <p>O nome inserido não foi Poliana</p>
@else
    <p>Bem vinda, {{$user}}! Atualmente você tem {{$idade}} anos e trabalha como {{$profissao}}</p>
@endif

@for($i = 0; $i < count($array); $i++)
    <p>{{$array[$i]}} - {{$i}}</p>
    @if($i == 2)
    <p>O i é 2</p>
    @endif
@endfor

{{--NOVA FORMA DE ACESSAR OS ÍNDICES USANDO FOREACH: existe no Blade uma variável chamada $loop que acessa os índices: $loop->index--}}

@foreach($nomes as $nome)
    <p>{{$nome}} está no índice {{$loop->index}}</p>
@endforeach

<!--Todo código entre as diretivas php e endphp será código php puro -->
@php
    $name = "Poli poli";
    echo "<br>$name<br>";
@endphp

<!--COMENTÁRIOS HTML APARECEM NO NAVEGADOR (É SO INSPENCIONAR A PÁGINA)-->
{{--Comentários do Blade não aparecem no navegador--}}

@endsection