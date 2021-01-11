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
<a style="color:#000000" href="{{route('musicas.show',['id'=>$musica->id_musica])}}">
<h5>{{$musica->titulo}}</h5>
</li>
@endforeach
<a href="{{route('musicas.create')}}" class="btn btn-secondary">Adicionar Musica</a>
@endsection