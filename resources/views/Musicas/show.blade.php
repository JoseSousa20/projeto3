@extends('layout')
@section('titulo')
@endsection
@section('header')
@endsection
@section('conteudo')
<ul>
<b>Titulo: </b>{{$musica->titulo}}<br>
<b>Album: </b><a style="color:#000000" href="{{route('albuns.show',['id'=>$musica->albuns->id_album])}}">{{$musica->albuns->titulo}}</a><br>

@if(isset($musica->musicos->nome))
   <b>Musico: </b><a style="color:#000000" href="{{route('musicos.show',['id'=>$musica->musicos->id_musico])}}">{{$musica->musicos->nome}}</a><br>
@endif
<b>Genero: </b>{{$musica->genero->designacao}}
@endsection