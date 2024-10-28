@extends('layouts.structure')

@section('title','Dashboard')

@section('content')

    <p><a href="/event/create">Adicionar Tarefa</a></p>

    <form action="/" method="GET">
        <p>
            <input type="text" name="titulo" placeholder="Título"></input>
            <button type="submit">Buscar</button>
        </p>
    </form>

    @foreach ($tarefas as $tarefa)
        <p>{{ $tarefa->titulo }} <a href="/event/{{$tarefa->id}}">Detalhes</a>  <a href="/delete/{{$tarefa->id}}">Deletar</a>  <a href="/edit/{{$tarefa->id}}">Editar</a></p>
    @endforeach

@endsection