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
<li>{{$album->titulo}}<br></li>
@endforeach
@else
<h1 style="color:#ff0000">ERRO</h1>
@endif
@endsection