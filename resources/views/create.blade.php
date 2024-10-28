@extends('layouts.structure')
@section('title','Criar tarefa')

@section('content')

    <h1>Criar Tarefa <a href="/">Voltar</a></h1>

    <form action="/event/create" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" id="">
        <input type="text" name="titulo" id="">
        <input type="text" name="descricao" id="">
        <select name="status" id="">
            <option value="1">Feito</option>
            <option value="0">Não Feito</option>
        </select>
        <button type="submit">Criar</button>
    </form>

@endsection