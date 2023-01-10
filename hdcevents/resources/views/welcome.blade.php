<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        {{--Todas as pastas que estão dentro da pasta public podem ser acessadas com a / antes do nome da pasta que tem o arquivo que eu quero--}}

        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/scripts.js"></script>
    
    </head>
    <body>
        <h1>Algum Título</h1>
        <img src="/img/banner.jpg" alt="Banner">
        <!--Para inserir diretivas do Blande, usamos @-->
        @if(10 > 5)
            <p>A condição é True</p>
        @endif

        <p>{{$user}}</p> <!--o que é passado é o nome da chave do array que eu defini na view-->

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


    </body>
</html>
