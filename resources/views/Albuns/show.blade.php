@extends('layout')
@section('titulo')
@endsection
@section('header')
@endsection
@section('conteudo')
<ul>
 <b>Titulo: </b>{{$album->titulo}}<br>
 <b>Data de Lançamento: </b>{{$album->data_lancamento}}<br>
    <b>Musico: </b><a style="color:#000000" href="{{route('musicos.show',['id'=>$album->musicos->id_musico])}}">{{$album->musicos->nome}}</a><br>
    @foreach($album->generos as $genero)
    <b>Genero: </b>{{$genero->designacao}}
 @endforeach
 <b>Observações: </b>{{$album->observacoes}}<br>
 @if(auth()->check())
 <a href="{{route('albuns.edit', ['id'=>$album->id_album])}}" class="btn btn-secondary">Editar Album</a>
 <a href="{{route('albuns.delete', ['id'=>$album->id_album])}}" class="btn btn-secondary">Eliminar Album</a>
 @endif
@endsection