@extends('layout')
@section('titulo')
Musicos
@endsection
@section('header')
Musicos:
@endsection
@section('conteudo')
<ul>
@foreach($musicos as $musico)
<li>
<a style="color:#000000" href="{{route('musicos.show',['id'=>$musico->id_musico])}}">
<h5>{{$musico->nome}}</h5>
</li>
@endforeach
<br>
@if(auth()->check())
<a href="{{route('musicos.create')}}" class="btn btn-secondary">Adicionar Musico</a>
@endif
@endsection