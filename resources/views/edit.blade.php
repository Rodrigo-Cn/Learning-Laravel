@extends('layouts.structure')
@section('title','Editando')

@section('content')

    <h1>Criar Tarefa <a href="/">Voltar</a></h1>

    <form action="/edit/{{$tarefa->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" name="titulo" value=" {{$tarefa->titulo}} " id="">
        <input type="text" name="descricao" value=" {{$tarefa->descricao}} " id="">
        <select name="status" id="">
            <option value="1">Feito</option>
            <option value="0">Não Feito</option>
        </select>
        <button type="submit">Editar</button>
    </form>

@endsection