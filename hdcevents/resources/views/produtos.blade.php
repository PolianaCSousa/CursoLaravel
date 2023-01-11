@extends('layouts.main')

@section('title', 'Produtos')

@section('content')

    <h1>Tela de produtos</h1>

    <!--CODIGO DA ROTA COM PARÂMETRO OBRIGATÓRIO-->
    {{--<p>Exibindo produto id: {{$id}}--}}

    <!--CODIGO DA ROTA COM PARÂMETRO NÃO OBRIGATÓRIO-->
    {{--
    @if($id != null)
        <p>Exibindo produto id: {{$id}}</p>
    @endif
    --}}

    <!--CÓDIGO DA ROTA COM PARÂMETRO POR MEIO DE QUERY-->
    @if($busca != '')
        <p>O usuário está buscando por: {{$busca}}</p>
    @endif

@endsection 