@extends('layouts.structure')

@section('title', $tarefa->titulo)

@section('content')

<h1>Detalhe Tarefa <a href="/">Voltar</a></h1>

<img src="/img/tarefas/{{ $tarefa->image }}"></img>

<h1>{{ $tarefa->titulo }}</h1>

<h2>Dono: {{ $dono->name }}</h2>

@endsection