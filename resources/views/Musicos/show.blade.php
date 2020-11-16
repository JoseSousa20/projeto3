@extends('layout')
@section('titulo')
@endsection
@section('header')
@endsection
@section('conteudo')
<ul>
 <b>Nome: </b>{{$musico->nome}}<br>
 <b>Nacionalidade: </b>{{$musico->nacionalidade}}<br>
 <b>Data de Nascimento; </b>{{$musico->data_nascimento}}<br>
 @foreach($musico->albuns as  $album)
    <b>Album: </b>{{$album->titulo}}<br>
 @endforeach
 @foreach($musico->musica as $musica)
    <b>Musicas: </b>{{$musica->titulo}}
 @endforeach
@endsection