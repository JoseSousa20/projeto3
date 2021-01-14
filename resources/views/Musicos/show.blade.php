@extends('layout')
@section('titulo')
@endsection
@section('header')
@endsection
@section('conteudo')
<ul>
 <b>Nome: </b>{{$musico->nome}}<br>
 <b>Nacionalidade: </b>{{$musico->nacionalidade}}<br>
 <b>Data de Nascimento: </b>{{$musico->data_nascimento}}<br>
 @foreach($musico->albuns as  $album)
    <b>Album: </b><a style="color:#000000" href="{{route('albuns.show',['id'=>$album->id_album])}}">{{$album->titulo}}</a><br>
 @endforeach
 @foreach($musico->musica as $musica)
    <b>Musicas: </b><a style="color:#000000" href="{{route('musicas.show',['id'=>$musica->id_musica])}}">{{$musica->titulo}}</a><br>
 @endforeach
<b>Created_at: </b>{{$musico->created_at}}<br>
<b>Updated_at: </b>{{$musico->updated_at}}<br>
<br>
<a href="{{route('musicos.edit', ['id'=>$musico->id_musico])}}" class="btn btn-secondary">Editar Musico</a>
<a href="{{route('musicos.delete', ['id'=>$musico->id_musico])}}" class="btn btn-secondary">Eliminar Musico</a>
@endsection