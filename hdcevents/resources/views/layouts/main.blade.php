<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{--Teremos uma seção chamada title que mudará o título da página dinamicamente--}}
        <title>@yield('title')</title>

        {{--Todas as pastas que estão dentro da pasta public podem ser acessadas com a / antes do nome da pasta que tem o arquivo que eu quero--}}
        <!-- Fonte do Google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!--CSS da aplicação-->
        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/scripts.js"></script>
    
    </head>
    <body>
        {{--Teremos uma seção chamada content que mudará o conteúdo da página dinamicamente--}}
        @yield('content')
        <footer>
            <p>HDC Events &copy; 2023</p>
        </footer>
    </body>
</html>
