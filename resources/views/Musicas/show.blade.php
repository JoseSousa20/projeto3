@extends('layout')
@section('titulo')
@endsection
@section('header')
@endsection
@section('conteudo')
<ul>
 <b>Titulo: </b>{{$musica->titulo}}<br>
 @foreach($musica->albuns as  $album)
    <b>Album: </b>{{$album->titulo}}<br>
 @endforeach
    <b>Musico: </b>{{$musica->musicos->nome}}<br>
    <b>Genero: </b>{{$musica->genero->designacao}}
@endsection