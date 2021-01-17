@extends('layout')
@section('titulo')
@endsection
@section('header')
@endsection
@section('conteudo')
<ul>
 <b>Designacao: </b>{{$generos->designacao}}<br>
 <b>Observações: </b>{{$generos->observacoes}}<br>
 @if(auth()->check())
 <a href="{{route('generos.edit', ['id'=>$generos->id_genero])}}" class="btn btn-secondary">Editar Genero</a>
 <a href="{{route('generos.delete', ['id'=>$generos->id_genero])}}" class="btn btn-secondary">Eliminar Genero</a>
 @endif
@endsection