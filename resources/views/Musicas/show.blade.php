@extends('layout')
@section('titulo')
@endsection
@section('header')
@endsection
@section('conteudo')
<ul>
 <b>Titulo: </b>{{$musica->titulo}}<br>
 @foreach($musica->albuns as  $album)
    <b>Album: </b><a style="color:#000000" href="{{route('albuns.show',['id'=>$album->id_album])}}">{{$album->titulo}}</a><br>
 @endforeach
    <b>Musico: </b><a style="color:#000000" href="{{route('musicos.show',['id'=>$musica->musicos->id_musico])}}">{{$musica->musicos->nome}}</a><br>
    <b>Genero: </b>{{$musica->genero->designacao}}
@endsection