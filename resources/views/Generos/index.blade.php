@extends('layout')
@section('titulo')
Generos
@endsection
@section('header')
Generos:
@endsection
@section('conteudo')
<ul>
@foreach($generos as $genero)
<li>
<a style="color:#000000" href="{{route('generos.show',['id'=>$genero->id_genero])}}">
<h5>{{$genero->designacao}}</h5>
</li>
@endforeach
<br>
@if(auth()->check())
<a href="{{route('generos.create')}}" class="btn btn-secondary">Adicionar Genero</a>
@endif
@endsection