@extends('layouts.main')

{{--Esse titulo será substituido em  @yield('title') no arquivo main.blade.php--}}
@section('title', 'HDC Events')

{{--Esse conteúdo será substituido em  @yield('content') no arquivo main.blade.php--}}
@section('content')

@foreach($events as $event)
    <p>{{$event->title}} -- {{$event->description}}</p>
@endforeach

@endsection