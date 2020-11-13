@extends('layout')
@section('titulo')
Musicas
@endsection
@section('header')
Musicas:
@endsection
@section('conteudo')
<ul>
@foreach($musicas as $musica)
<li>
<h5>{{$musica->titulo}}</h5>
</li>
@endforeach
@endsection